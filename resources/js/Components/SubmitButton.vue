<template>
    <Button 
    :loading="isLoading"
    :label="title"
    :disabled="isLoading"
    @click="submit"
    class="p-button"
    icon="pi pi-check"
     />
</template>
<script setup>
import Button from "primevue/button";
import { ref } from "vue";

const props = defineProps({
    form: {
        type: Object,
        required: true,
    },
    route: {
        type: String,
        required: true,
    },
    title: {
        type: String,
        default: "Enviar",
    },
});

const isLoading = ref(false);

function submit() {
    isLoading.value = true;

    // Si usas Ziggy:
    props.form.post(route(props.route), {
        onSuccess: () => {
            isLoading.value = false;
            props.form.reset(); // <--- limpiar el formulario
        },
        onError: () => {
            isLoading.value = false;
        },
    });

}
</script>
