
<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import DangerButton from '@/Components/DangerButton.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import CancelButton from '@/Components/CancelButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import SelectInput from '@/Components/SelectInput.vue';
import Modal from '@/Components/Modal.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { nextTick,ref } from 'vue';
import Swal from 'sweetalert2';

const nombreInput = ref(null);
const modal = ref(false);
const title = ref('');
const operation = ref(1);
const id = ref('');

const props = defineProps({
    egresados: {type:Object},
    generacions: {type:Object}
});

const form = useForm({
    nombre:'', carrera:'', matricula:'', generacion_id:'', clave:''
});

const openModal = (op, nombre, carrera, matricula, generacion, clave, egresadoid) => {
    modal.value = true;
    nextTick(() => nombreInput.value.focus());
    operation.value = op;
    id.value = egresadoid;
    if (op == 1) {
        title.value = 'Agregar Egresado';
    }
    else {
        title.value = 'Editar Egresado';
        form.nombre = nombre;
        form.carrera = carrera;
        form.matricula = matricula;
        form.generacion_id = generacion;
        form.clave = clave;
    }
}

const closeModal = () => {
    modal.value = false;
    form.reset();
}

const save = () => {
    if (operation.value == 1) {
        form.post(route('egresados.store'), {
            onSuccess: () => {ok('egresado creado')}
        });
    }
    else {
        form.put(route('egresados.update',id.value), {
            onSuccess: () => {ok('egresado Eliminado')}
        });
    }
}

const ok = (msj) => {
    form.reset();
    closeModal();
    Swal.fire({title:mdj,icon:'success'});
}

const deleteEngresado = (id, nombre) => {
    const alerta = Swal.mixin({
        buttonsStyling: true
    });
    alerta.fire({
        title: 'Deseas eliminar ' + nombre + ' ?',
        icon: 'question', showCancelButton: true,
        confirmButtonText: '<i class="fa-solid fa-check"></i>Eliminar',
        cancelButtonText: '<i class="fa-solid fa-ban"></i>Cancelar',
    }).then((result) => {
        if (result.isConfirmed) {
            form.delete(route('egresados.destroy', id), {
                onSuccess: () =>{ok('Egresado Eliminado')}
            });
        }
    });
}
</script>

<template>
    <Head title="Egresados" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Egresados</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white grid v-screen place-items-center">
                    <div class="p-6 flex-auto">
                        <PrimaryButton @click="event => openModal(1)">
                            <i class="fa-solid fa-plus-circle"></i>Agregar
                        </PrimaryButton>
                        <div class="mt-4 mb-2 overflow-x-auto">
                            <table class="table-auto border border-gray-400">
                                <thead>
                                    <tr class="bg-gray-700">
                                        <th class="px-2 py-2 text-white">
                                            #
                                        </th>
                                        <th class="px-2 py-2 text-white">
                                            Nombre
                                        </th>
                                        <th class="px-2 py-2 text-white">
                                            Carrrera
                                        </th>
                                        <th class="px-2 py-2 text-white">
                                            Matricula
                                        </th>
                                        <th class="px-2 py-2 text-white">
                                            Generacion
                                        </th>
                                        <th class="px-2 py-2 text-white">
                                            Clave
                                        </th>
                                        <th class="px-2 py-2 text-white">
                                            Accion
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-gray-700 border-b border-gray-600 text-gray-200">
                                    <tr v-for="egresado, i in egresados" :key="egresado.id">
                                        <td class="border border-gray-400 px-4 py-4">
                                            {{ i + 1 }}
                                        </td>
                                        <td class="border border-gray-400 px-4 py-4">
                                            {{ egresado.nombre }}
                                        </td>
                                        <td class="border border-gray-400 px-4 py-4">
                                            {{ egresado.carrera }}
                                        </td>
                                        <td class="border border-gray-400 px-4 py-4">
                                            {{ egresado.matricula }}
                                        </td>
                                        <td class="border border-gray-400 px-4 py-4">
                                            {{ egresado.generacion }}
                                        </td>
                                        <td class="border border-gray-400 px-4 py-4">
                                            {{ egresado.clave }}
                                        </td>
                                        <td class="border border-gray-400 px-4 py-4">
                                            <SecondaryButton
                                                @click="event => openModal(2, egresado.nombre, egresado.carrera, egresado.matricula, egresado.generacion_id, egresado.clave, egresado.id)">
                                                <i class="fa-solid fa-edit flex-auto"></i>
                                            </SecondaryButton>
                                            <DangerButton class="ml-2"
                                                @click="event => deleteEngresado(egresado.id, egresado.nombre)">
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
        <Modal :show="modal" @close="closeModal">
            <h2 class="p-3 text-lg font.medium ">{{ title }}</h2>
            <div class="p-3">
                <InputLabel for="nombre" value="Nombre:"></InputLabel>
                <TextInput id="nombre" ref="nombreInput"
                v-model="form.nombre" type="text" class="mt-1 block w-3/4"
                placeholder="Nombre"></TextInput>
                <InputError :message="form.errors.nombre" class="mt-2"></InputError>
            </div>

            <div class="p-3">
                <InputLabel for="carrera" value="Carrera:"></InputLabel>
                <TextInput id="carrera"
                v-model="form.carrera" type="text" class="mt-1 block w-3/4"
                placeholder="Carrera"></TextInput>
                <InputError :message="form.errors.carrera" class="mt-2"></InputError>
            </div>

            <div class="p-3">
                <InputLabel for="matricula" value="Matricula:"></InputLabel>
                <TextInput id="matricula"
                v-model="form.matricula" type="text" class="mt-1 block w-3/4"
                placeholder="Matricula"></TextInput>
                <InputError :message="form.errors.matricula" class="mt-2"></InputError>
            </div>

            <div class="p-3">
                <InputLabel for="generacion_id" value="Generacion:"></InputLabel>
                <SelectInput id="generacion_id" :options="generacions" label="Generación" deferred
                v-model="form.generacion_id" class="mt-1 block w-3/4"></SelectInput>
                <InputError :message="form.errors.generacion_id" class="mt-2"></InputError>
            </div>

            <div class="p-3">
                <InputLabel for="clave" value="Clave:"></InputLabel>
                <TextInput id="clave"
                v-model="form.clave" type="text" class="mt-1 block w-3/4"
                placeholder="Clave"></TextInput>
                <InputError :message="form.errors.clave" class="mt-2"></InputError>
            </div>
            <div class="p-3 mt-6">
                <PrimaryButton :disabled="form.processing" @click="save">
                    <i class="fa-solid fa-save"></i> Guardar
                </PrimaryButton>
            </div>
            <div class="p-3 mt-6 flex justify-end">
                <CancelButton class="ml-3" :disabled="form.processing"
                @click="closeModal">
                Cancelar
                </CancelButton>
            </div>
        </Modal>
    </AuthenticatedLayout>
</template>
