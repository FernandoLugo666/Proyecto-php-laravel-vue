<template>
    <form @submit.prevent="submit">
        <div class="pb-8 pt-8">
            <CustomInput v-model="form.title" label="Titulo" required />
        </div>
        <CustomInput v-model="form.slug" label="Slug:" required />

        <div>
            <SubmitButton :form="form" title="Crear" route="crear">
            </SubmitButton>
        </div>
    </form>
</template>

<script setup>
import CustomInput from "@/Components/CustomInput.vue";
import SubmitButton from "@/Components/SubmitButton.vue";
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    title: "",
    slug: "",
});
</script>
