<template>
  <div class="image-input image-input-outline" id="kt_image_1">
    <div :id="'image-'+name" class="image-input-wrapper" :style="style"></div>

    <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title data-original-title="Change avatar">
      <i class="fa fa-pen icon-sm text-muted"></i>
      <input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg" @input="updateValue($event)" />
      <input type="hidden" name="profile_avatar_remove" />
    </label>

    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
      <i class="ki ki-bold-close icon-xs text-muted"></i>
    </span>
    <span
      @click="remove"
      v-if="canRemove"
      class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
      data-action="remove"
      data-toggle="tooltip"
      title
      data-original-title="Remove avatar"
    >
      <i class="ki ki-bold-close icon-xs text-muted"></i>
    </span>
  </div>
</template>

<script>
//metronic_v7.0.8/theme/html/demo1/dist/crud/file-upload/image-input.html
export default {
  name: "ImageInput",
  props: {
    name: { type: String, required: true },
    value: {},
    folder: { type: String, required: false },
    canRemove: { type: Boolean, required: false, default: false },
  },
  data() {
    return {
      style: "",
    };
  },
  mounted() {
    if (!this.value) {
      this.style = "background-image: url(assets/media/users/blank.png)";
    } else {
      this.style = `background-image: url(images/${this.folder}/${this.value})`;
    }
  },
  methods: {
    updateValue: function (e) {
      var reader = new FileReader();
      var vue = this;
      reader.onload = function (e) {
        vue.style = "background-image: url(" + e.target.result + ")";
      };
      var file = e.target.files[0];
      reader.readAsDataURL(file);

      this.$emit("input", file);
    },
    remove() {
      this.style = "background-image: url(assets/media/users/blank.png)";
    },
  },
};
</script>