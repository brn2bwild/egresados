<?php

namespace App\Http\Controllers;

use App\Models\Generacion;
use Illuminate\Http\Request;
use Inertia\Inertia;

class GeneracionController extends Controller
{
    public function index()
    {
        $generacions = Generacion::all();
        return Inertia::render('Generacions/Index', ['generacions' => $generacions]);
    }
    public function create()
    {
        return Inertia::render('Generacions/Create');
    }
    public function store(Request $request)
    {
        $request->validate(['generacion' => 'required|max:9']);
        $generacion = new Generacion($request->input());
        $generacion->save();
        return redirect('generacions');
    }
    public function show(Generacion $generacion)
    {
        //
    }
    public function edit(Generacion $generacion)
    {
        return Inertia::render('Generacions/Edit', ['generacion' => $generacion]);
    }
    public function update(Request $request, Generacion $generacion)
    {
        $request->validate(['generacion' => 'required|max:9']);
        $generacion->update($request->all());
        return redirect('generacions');
    }
    public function destroy(Generacion $generacion)
    {
        $generacion->delete();
        return redirect('generacions');
    }
}
