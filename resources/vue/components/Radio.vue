<template>
  <div class="">
    <div :class="className">
      <label v-for="(val, key) in options" class="radio">
        <input type="radio" v-if="isArray" v-bind:value="val" :checked="value == val" :name="name" @change="updateValue($event.target.value)">
        <input type="radio" v-if="!isArray" v-bind:value="key" :checked="value == key" :name="name" @change="updateValue($event.target.value)">
        {{ val }}
        <span></span>
      </label>
    </div>
    <span class="m-form__help m-form__error" v-if="error">
      {{ error }}
    </span>
  </div>
</template>

<script>
  export default {
    name: "radio-component",
    props: {
      name: { type: String, required: false},
      value: { required: false},
      error: { type: String, required: false},
      inline: { type: Boolean, required: false, default: true },
      options: {required: true}
    },
    methods: {
      updateValue: function (value) {
        if (value === "1") {
          value = 1;
        }
        if (value === "0") {
          value = 0;
        }
        this.$emit('input', value);
      }
    },
    computed: {
      className() {
        return this.inline ? 'radio-inline' : 'radio-list';
      },
      isArray() {
        return Array.isArray(this.options);
      }
    }
  }
</script>

<style scoped>

</style>