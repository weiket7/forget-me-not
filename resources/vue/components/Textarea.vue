<template>
  <textarea :name="name" class="form-control" @input="updateValue($event.target.value)" rows="3">{{ value }}</textarea>
</template>

<script>
  export default {
    name: "textarea-component",
    props: {
      name: { type: String, required: false},
      value: { required: false},
      error: { type: String, required: false},
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