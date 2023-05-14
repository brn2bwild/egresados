<script setup>
import { defineProps } from 'vue';

const props = defineProps({
    id: {
        type: String,
        required: true
    },
    value: {
        type: String,
        required: true
    }
});

const updateValue = (event) => {
    const value = event.target.value;
    props['onUpdate:modelValue'](value);
};

</script>

<template>
    <select class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" :id="id"
        :value="value" @input="updateValue"></select>
</template>
