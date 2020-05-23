<template>
    <label>
        <slot></slot> <span v-if="required" class="required">*</span>
    </label>
</template>


<script>
  export default {
    name: "m-label",
    props: {
      required: {type: Boolean, default: false, required: false},
    }
  }
</script>

<style scoped>

</style>