<template>
  <label class="checkbox">
    <input type="checkbox" :value="value" :name="name" @change="updateValue($event.target.checked)" />
    <slot></slot>
    <span></span>
  </label>
</template>

<script>
export default {
  name: "checkbox-single",
  props: {
    name: { type: String, required: false },
    value: { required: false },
    error: { type: String, required: false },
  },
  methods: {
    updateValue: function (isChecked) {
      this.$emit("input", isChecked);
    },
  },
};
</script>

<style scoped>
</style>