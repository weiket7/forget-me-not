<template>
  <div>
    <input type="text" :name="name" :value="value" class="form-control" :class="inputClass" @input="updateValue($event.target.value)"/>
    <span class="invalid-feedback" v-if="error">
      {{ error }}
    </span>
  </div>
</template>

<script>
  export default {
    name: "textbox-component",
    props: {
      name: { type: String, required: false},
      value: { required: false},
      error: { type: String, required: false},
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