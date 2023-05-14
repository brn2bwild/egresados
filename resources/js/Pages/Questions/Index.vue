<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SelectInput from '../../Components/SelectInput.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

// defineProps({
// });

const form = useForm({

});

const generos = ['Hombre', 'Mujer']
const generoSeleccionado = ref(null)

const est_civils = ['Soltero(a)', 'Casado(a)', 'Otro']
const est_civilSeleccionado = ref(null)

</script>

<template>
    <GuestLayout>

        <Head title="Encuesta" />

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit">

            <div>
                <InputLabel value="I. PERFIL DE EGRESADO" />
            </div>

            <div class="mt-4">
                <InputLabel for="nombre" value="Nombre:" />
                <TextInput id="nombre" type="text" class="mt-1 block w-full" v-model="form.nombre" required autofocus
                    autocomplete="nombre" />
                <InputError class="mt-2" :message="form.errors.nombre" />
            </div>

            <div class="mt-4">
                <InputLabel for="carrera" value="Carrera:" />
                <TextInput id="carrera" type="text" class="mt-1 block w-full" v-model="form.carrera" required
                    autocomplete="carrera" />
                <InputError class="mt-2" :message="form.errors.carrera" />
            </div>

            <div class="mt-4">
                <InputLabel for="matricula" value="Matricula:" />
                <TextInput id="matricula" type="text" class="mt-1 block w-full" v-model="form.matricula" required
                    autocomplete="new-matricula" />
                <InputError class="mt-2" :message="form.errors.matricula" />
            </div>

            <div class="mt-4">
                <InputLabel for="generacion" value="Generacion:" />
                <TextInput id="generacion" type="text" class="mt-1 block w-full" v-model="form.generacion" required
                    autocomplete="generacion" />
                <InputError class="mt-2" :message="form.errors.generacion" />
            </div>

            <div class="mt-4">
                <InputLabel for="clave" value="Clave:" />
                <TextInput id="clave" type="text" class="mt-1 block w-full" v-model="form.clave" required
                    autocomplete="clave" />
                <InputError class="mt-2" :message="form.errors.clave" />
            </div>

            <div class="mt-4">
                <InputLabel for="fecha" value="Fecha:" />
                <TextInput id="fecha" type="text" class="mt-1 block w-full" v-model="form.fecha" required autofocus
                    autocomplete="fecha" />
                <InputError class="mt-2" :message="form.errors.fecha" />
            </div>

            <div class="mt-4">
                <InputLabel for="fecha de nacimiento" value="Fecha de Nacimiento:" />
                <TextInput id="fecha de nacimiento" type="text" class="mt-1 block w-full" v-model="form.fecha_de_nacimiento"
                    required autofocus autocomplete="fecha de nacimiento" />
                <InputError class="mt-2" :message="form.errors.fecha_de_nacimiento" />
            </div>

            <div class="mt-4">
                <InputLabel for="curp" value="CURP:" />
                <TextInput id="curp" type="text" class="mt-1 block w-full" v-model="form.curp" required
                    autocomplete="curp" />
                <InputError class="mt-2" :message="form.errors.curp" />
            </div>

            <div class="mt-4">
                <label class="flex items-center">
                    <InputLabel for="genero" value="Sexo:" />
                    <div class="p-2">
                        <SelectInput id="genero" v-model="generoSeleccionado">
                            <option v-for="genero in generos" :value="genero">{{ genero }}</option>
                        </SelectInput>
                    </div>
                    <InputLabel for="est_civil" value="Estado Civil:" />
                    <div class="p-2">
                        <SelectInput id="est_civil" v-model="est_civilSeleccionado">
                            <option v-for="est_civil in est_civils" :value="est_civil">{{ est_civil }}</option>
                        </SelectInput>
                    </div>
                </label>
            </div>

            <div class="mt-4">
                <InputLabel for="domicilio" value="Domicilio:" />
                <TextInput id="domicilio" type="text" class="mt-1 block w-full" v-model="form.domicilio" required
                    autocomplete="domicilio" />
                <InputError class="mt-2" :message="form.errors.domicilio" />
            </div>

            <div class="mt-4">
                <InputLabel for="calle" value="Calle:" />
                <TextInput id="calle" type="text" class="mt-1 block w-full" v-model="form.calle" required
                    autocomplete="calle" />
                <InputError class="mt-2" :message="form.errors.calle" />
            </div>

            <div class="mt-4">
                <InputLabel for="no" value="No:" />
                <TextInput id="no" type="text" class="mt-1 block w-full" v-model="form.no" required
                    autocomplete="no" />
                <InputError class="mt-2" :message="form.errors.no" />
            </div>

            <div class="mt-4">
                <InputLabel for="colonia" value="Colonia:" />
                <TextInput id="colonia" type="text" class="mt-1 block w-full" v-model="form.colonia" required
                    autocomplete="colonia" />
                <InputError class="mt-2" :message="form.errors.colonia" />
            </div>

            <div class="mt-4">
                <InputLabel for="c_p" value="C.P." />
                <TextInput id="c_p" type="text" class="mt-1 block w-full" v-model="form.c_p" required
                    autocomplete="c_p" />
                <InputError class="mt-2" :message="form.errors.c_p" />
            </div>

            <div class="mt-4">
                <InputLabel for="ciudad" value="Ciudad:" />
                <TextInput id="ciudad" type="text" class="mt-1 block w-full" v-model="form.ciudad" required
                    autocomplete="ciudad" />
                <InputError class="mt-2" :message="form.errors.ciudad" />
            </div>

            <div class="mt-4">
                <InputLabel for="municipio" value="Municipio:" />
                <TextInput id="municipio" type="text" class="mt-1 block w-full" v-model="form.municipio" required
                    autocomplete="municipio" />
                <InputError class="mt-2" :message="form.errors.municipio" />
            </div>

            <div class="mt-4">
                <InputLabel for="estado" value="Estado:" />
                <TextInput id="estado" type="text" class="mt-1 block w-full" v-model="form.estado" required
                    autocomplete="estado" />
                <InputError class="mt-2" :message="form.errors.estado" />
            </div>

            <div class="mt-4">
                <InputLabel for="telefono" value="Telefono:" />
                <TextInput id="telefono" type="text" class="mt-1 block w-full" v-model="form.telefono" required
                    autocomplete="telefono" />
                <InputError class="mt-2" :message="form.errors.telefono" />
            </div>

            <div class="mt-4">
                <InputLabel for="e_mail" value="E_mail:" />
                <TextInput id="e_mail" type="text" class="mt-1 block w-full" v-model="form.e_mail" required
                    autocomplete="e_mail" />
                <InputError class="mt-2" :message="form.errors.e_mail" />
            </div>

            <div class="mt-4">
                <InputLabel for="tel_casa_pa" value="Tel. Casa paterna:" />
                <TextInput id="tel_casa_pa" type="text" class="mt-1 block w-full" v-model="form.tel_casa_pa" required
                    autocomplete="tel_casa_pa" />
                <InputError class="mt-2" :message="form.errors.tel_casa_pa" />
            </div>














            <div class="mt-4">
                <InputLabel for="ingles" value="Dominio de idioma extranjero: Ingles" />
                <TextInput id="ingles" type="text" class="mt-1 block w-full" v-model="form.ingles" required
                    autocomplete="ingles" />
                <InputError class="mt-2" :message="form.errors.ingles" />
            </div>

            <div class="mt-4">
                <InputLabel for="otro" value="Otro:" />
                <TextInput id="otro" type="text" class="mt-1 block w-full" v-model="form.otro" required
                    autocomplete="otro" />
                <InputError class="mt-2" :message="form.errors.otro" />
            </div>

            <div class="mt-4">
                <InputLabel for="m_pq_c" value="Manejo de paquetes computacionales (especificar):" />
                <TextInput id="m_pq_c" type="text" class="mt-1 block w-full" v-model="form.m_pq_c" required
                    autocomplete="m_pq_c" />
                <InputError class="mt-2" :message="form.errors.m_pq_c" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <PrimaryButton>
                    Siguiente
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>
