<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import DangerButton from '@/Components/DangerButton.vue';
import { Head, useForm, Link } from '@inertiajs/vue3';
import Swal from 'sweetalert2';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

// const props = defineProps({
//     generacions: { type: Object }
// });
const form = useForm({
    id: ''
});

const deleteGeneracion = (id, name) => {
    const alerta = Swal.mixin({
        buttonsStyling: true
    });
    alerta.fire({
        title: 'Deseas eliminar ' + name + ' ?',
        icon: 'question', showCancelButton: true,
        confirmButtonText: '<i class="fa-solid fa-check"></i>Eliminar',
        cancelButtonText: '<i class="fa-solid fa-ban"></i>Cancelar',
    }).then((result) => {
        if (result.isConfirmed) {
            form.delete(route('generacion.destroy', id));
        }
    });
}
</script>

<template>
    <Head title="Genneracions" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Egresados</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white grid v-screen place-items-center">
                    <div class="p-6 flex-auto">
                        <Link :href="route('generacions.create')"
                            :class="'px-4 py-2 bg-gray-800 text-white border rounded-md font-semibold text-xs'">
                        <i class="fa-solid fa-plus-circle"></i> Add
                        </Link>
                        <div class="mt-4 mb-2 overflow-x-auto">
                            <table class="table-auto border border-gray-400">
                                <thead>
                                    <tr class="bg-gray-700">
                                        <th class="px-2 py-2">
                                            #
                                        </th>
                                        <th class="px-2 py-2">
                                            Generacion
                                        </th>
                                        <th class="px-2 py-2">
                                            Accion
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-gray-700 border-b border-gray-600 text-gray-200">
                                    <tr v-for="generacion, i in generacions" :key="generacion.id">
                                        <td class="border border-gray-400 px-4 py-4">
                                            {{ i + 1 }}
                                        </td>
                                        <td class="border border-gray-400 px-4 py-4">
                                            {{ generacion.name }}
                                        </td>
                                        <td class="border border-gray-400 px-4 py-4 flex-auto">
                                            <Link :href="route('generacions.edit', generacion.id)"
                                                :class="'px-4 py-2 bg-yellow-500 text-white border rounded-md font-semibold text-xs'">
                                            <i class="fa-solid fa-edit"></i>
                                            </Link>
                                            <DangerButton class="ml-2"
                                                @click="event => deleteGeneracion(generacion.id, generacion.name)">
                                                <i class="fa-solid fa-trash flex-auto"></i>
                                            </DangerButton>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
