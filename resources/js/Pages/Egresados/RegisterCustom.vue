<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SelectInput from '@/Components/SelectInput.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/vue3';

// const props = defineProps({
//     egresados: { type: Object }
// });

const form = useForm({
    nombre: '',
    carrera: '',
    matricula: '',
    generacion: '',
    clave: ''
});

</script>

<template>
    <GuestLayout>

        <Head title="Register" />

        <!-- <div v-if="errors.length">
            <ul>
                <li v-for="error in errors" :key="error">{{ error }}</li>
            </ul>
        </div>
        <form @submit.prevent="submitForm">
            <div>
                <InputLabel for="nombre">Nombre</InputLabel>
                <InputError type="text" id="nombre" v-model="form.nombre" />
            </div>
            <div>
                <InputLabel for="carrera">Carrera</InputLabel>
                <InputError type="text" id="carrera" v-model="form.carrera" />
            </div>
            <div>
                <InputLabel for="matricula">Matrícula</InputLabel>
                <InputError type="text" id="matricula" v-model="form.matricula" />
            </div>
            <div>
                <InputLabel for="generacion">Generación</InputLabel>
                <SelectInput id="generacion" v-model="form.generacion_id">
                    <option v-for="generacion in generacions" :key="generacion.id" :value="generacion.id">{{ generacion.name
                    }}</option>
                </SelectInput>
            </div>
            <div>
                <InputLabel for="clave">Clave</InputLabel>
                <InputError type="text" id="clave" v-model="form.clave" />
            </div>
            <div>
                <PrimaryButton type="submit">Registrar</PrimaryButton>
            </div>
        </form> -->
        <form @submit.prevent="form.post(route('egresado.store'))">
            <div>
                <InputLabel for="nombre" value="Nombre" />
                <TextInput id="nombre" type="text" class="mt-1 block w-full" v-model="form.nombre" required autofocus
                    autocomplete="nombre" />
                <InputError class="mt-2" :message="form.errors.nombre" />
            </div>

            <div class="mt-4">
                <InputLabel for="carrera" value="Carrera" />
                <TextInput id="carrera" type="text" class="mt-1 block w-full" v-model="form.carrera" required
                    autocomplete="carrera" />
                <InputError class="mt-2" :message="form.errors.carrera" />
            </div>

            <div class="mt-4">
                <InputLabel for="matricula" value="Matricula" />
                <TextInput id="matricula" type="text" class="mt-1 block w-full" v-model="form.matricula" required
                    autocomplete="new-matricula" />
                <InputError class="mt-2" :message="form.errors.matricula" />
            </div>

            <div class="mt-4">
                <InputLabel for="generacion" value="Generacion" />
                <TextInput id="generacion" type="text" class="mt-1 block w-full" v-model="form.generacion" required
                    autocomplete="generacion" />
                <InputError class="mt-2" :message="form.errors.generacion" />
            </div>

            <div class="mt-4">
                <InputLabel for="clave" value="Clave" />
                <TextInput id="clave" type="text" class="mt-1 block w-full" v-model="form.clave" required
                    autocomplete="clave" />
                <InputError class="mt-2" :message="form.errors.clave" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <PrimaryButton >
                    Registrar
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>
