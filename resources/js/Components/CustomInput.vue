<template>
  <div class="field-wrapper ">
    <FloatLabel>
      <InputText
        v-model="internalValue"
        :id="id"
        :disabled="disabled"
        :maxlength="maxlength"
        :type="type"
        class="w-full"
      />
      <label :for="id">{{ label }}<span v-if="required">*</span></label>
    </FloatLabel>

    <Message severity="error" closable v-if="invalid">
      {{ invalid }}
    </Message>
  </div>
</template>
<script setup>
import { ref, watch, toRef } from "vue";
import FloatLabel from "primevue/floatlabel";
import Message from "primevue/message";
import InputText from "primevue/inputtext";

// Definir props una sola vez
const props = defineProps({
  modelValue: {},
  type: { type: String, default: "text" },
  required: { type: Boolean, default: false },
  upper: { type: Boolean, default: false },
  maxlength: { type: String },
  disabled: { type: Boolean, default: false },
  id: { type: String },
  label: { type: String },
  invalid: { type: String },
});

// Emit
const emit = defineEmits(["update:modelValue"]);

// Props reactivas
const modelValue = toRef(props, "modelValue");
const upper = toRef(props, "upper");

// Valor interno reactivo
const internalValue = ref(modelValue.value);

// Watchers
watch(modelValue, (newValue) => {
  internalValue.value = upper.value && newValue ? newValue.toUpperCase() : newValue;
});

watch(internalValue, (newValue) => {
  emit("update:modelValue", newValue);
});
</script>
