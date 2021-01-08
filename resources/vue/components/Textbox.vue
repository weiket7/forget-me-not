<template>
  <input type="text" :name="name" :value="value" class="form-control"
    :maxlength="maxLength"
    @input="updateValue($event.target.value)"/>
</template>

<script>
  export default {
    name: "textbox-component",
    props: {
      name: { type: String, required: false},
      value: { required: false},
      error: { type: String, required: false},
      maxLength: { type: Number, required: false }
    },
    computed: {
      inputClass() {
        return this.error ? "is-invalid" : "";
      }
    },
    methods: {
      updateValue: function (value) {
        this.$emit('input', value);
      }
    }
  }
</script>