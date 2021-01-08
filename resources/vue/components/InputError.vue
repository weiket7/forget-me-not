<template>
    <div class="invalid-feedback" v-if="error">
      {{ error }}
    </div>
</template>

<script>
  export default {
    name: "input-error",
    props: {
      error: { type: String, required: false},
    }
  }
</script>

<style scoped>
  .invalid-feedback {
    display: block;
  }
</style>