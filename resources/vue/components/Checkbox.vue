<template>
    <div :class="divClass">
      <label v-for="(val, key) in options" class="checkbox">
        <input type="checkbox" v-bind:value="key" :checked="isChecked(key, val)" :name="name" @change="updateValue(key, $event.target.value)">
        <span></span>
        {{ val }}
      </label>
    </div>
</template>

<script>
  export default {
    name: "checkbox-component",
    props: {
      name: { type: String, required: false},
      value: { required: false},
      error: { type: String, required: false},
      inline: { type: Boolean, required: false, default: true },
      options: {required: true}
    },
    methods: {
      updateValue: function (key, val) {
        let index = this.value.findIndex(item => item == val);
        if (index >= 0 === false) {
          index = this.value.findIndex(item => item == key);
        }
        if (index >= 0) {
          this.value.splice(index, 1);
        } else {
          this.value.push(key);
        }
        this.$emit('input', this.value);
      },
      isChecked(key, val) {
        if (this.value === undefined) {
          return "";
        }
        if (typeof this.value === 'string') {
          return this.value === val || this.value === key;
        }
        return this.value.findIndex(item => item == val) >= 0 || this.value.findIndex(item => item == key) >= 0;
      }
    },
    computed: {
      divClass() {
        return this.inline ? 'checkbox-inline' : 'checkbox-list';
      },
      inputClass() {
        return this.error ? "is-invalid" : "";
      },
      isArray() {
        return Array.isArray(this.options);
      }
    }
  }
</script>

<style scoped>

</style>