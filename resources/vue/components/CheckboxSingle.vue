<template>
    <div>
        <label class="checkbox">
            <input type="checkbox" :checked="value" :name="name" @change="updateValue()">Hell
            <span></span>
        </label>
        <span class="m-form__help m-form__error" v-if="error">
        {{ error }}
        </span>
  </div>
</template>

<script>
  export default {
    name: "checkbox-single",
    props: {
      name: { type: String, required: false},
      value: { required: false},
      error: { type: String, required: false},
    },
    methods: {
      updateValue: function (key, val) {
        
        this.$emit('input', this.value);
      },
    },
  }
</script>

<style scoped>

</style>