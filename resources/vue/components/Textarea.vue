<template>
  <div class="">
    <textarea :name="name" class="form-control" :class="inputClass" @input="updateValue($event.target.value)" :rows="rows" :maxlength="maxlength">{{ value }}</textarea>
    <span class="invalid-feedback" v-if="error">
      {{ error }}
    </span>
  </div>
</template>

<script>
  export default {
    name: "textarea-component",
    props: {
      name: { type: String, required: false},
      value: { required: false},
      error: { type: String, required: false},
      rows: { type: Number, required: false},
      maxlength: { type: Number, required: false }
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

<style scoped="">
  .m-form__help {
    color: #f4516c;
  }
</style>