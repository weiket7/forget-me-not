<template>
  <label class="col-form-label">
    <slot></slot>
  </label>
</template>

<script>
  export default {
    name: "static-text",
    props: {
      value: {type: String, required: false},
    }
  }
</script>
