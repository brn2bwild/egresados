<?php

namespace App\Http\Controllers;

use App\Models\Generacion;
use App\Models\Egresado;
use Illuminate\Http\Request;
use Inertia\Inertia;
use DB;

class EgresadoController extends Controller
{
    public function index()
    {
        $egresados = Egresado::select(
            'egresado.id',
            'egresado.nombre',
            'egresado.carrera',
            'egresado.matricula',
            'egresado.clave',
            'generacion_id',
            'generacion.name as generacion'
        )
            ->join('generacions', 'generacion.id', '=', 'egresados.generacion_id');
        $generacions = Generacion::all();
        return Inertia::render('Egresados/Index', [
            'egresados' => $egresados,
            'generacions' => $generacions
        ]);
    }
    public function create()
    {
        return Inertia::render('Egresados/RegisterCustom');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:45',
            'carrera' => 'required|max:20',
            'matricula' => 'required|max:8',
            'generacion_id' => 'required|max:9',
            'clave' => 'required|max:15'
        ]);
        Egresado::create($request->all());
        return redirect()->back();
        // $egresado = new Egresado($request->input());
        // $egresado->save();
        // return redirect('egresados');
    }
    public function show(Egresado $egresado)
    {
        //
    }
    public function showRegistrationFormCustom()
    {
        return Inertia::render('Egresados/RegisterCustom');
    }
    public function registerCustom(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:45',
            'carrera' => 'required|max:20',
            'matricula' => 'required|max:8',
            'generacion_id' => 'required|max:9',
            'clave' => 'required|max:15'
        ]);

        $egresado = new Egresado();
        $egresado->nombre = $request->input('nombre');
        $egresado->carrera = $request->input('carrera');
        $egresado->matricula = $request->input('matricula');
        $egresado->generacion_id = $request->input('generacion_id');
        $egresado->clave = $request->input('clave');
        $egresado->save();

        return redirect('egresados');
    }
    public function edit(Egresado $egresado)
    {
        //
    }
    public function update(Request $request, Egresado $egresado)
    {
        $request->validate([
            'nombre' => 'required|max:45',
            'carrera' => 'required|max:20',
            'matricula' => 'required|max:8',
            'generacion_id' => 'required|max:9',
            'clave' => 'required|max:15'
        ]);
        $egresado->update($request->input());
        return redirect('egresados');
    }
    public function destroy(Egresado $egresado)
    {
        $egresado->delete();
        return redirect('egresados');
    }
    public function EgresadoByGeneracion()
    {
        $data = Egresado::select(DB::raw('count(egresados.id) as count, generacions.name'))
            ->join('generacions', 'generacion.id', '=', 'egresados.generacion_id')
            ->groupBy('generacions,name')->get();
        return Inertia::render('Egresados/Graficas', ['data' => $data]);
    }
}
