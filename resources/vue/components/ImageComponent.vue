<template>
  <div class="col-lg-3">
    <input type="file" :name="name" @input="updateValue($event)" class="form-control" :class="inputClass">
    <span class="invalid-feedback" v-if="error">
      {{ error }}
    </span>
    <br>
    <div :id="'image-' + name">
      <img :src="'images/'+folder+'/'+src" v-if="src" style="max-height: 150px"/>
    </div>

  </div>
</template>

<script>
  export default {
    name: "image-component",
    props: {
      name: { type: String, required: false },
      value: { required: false },
      error: { type: String, required: false },
      src: { required: false },
      folder: { required: false }
    },
    computed: {
      inputClass() {
        return this.error ? "is-invalid" : "";
      },
    },
    methods: {
      updateValue: function (e) {
        var reader = new FileReader();
        var vue = this
        reader.onload = function (e) {
          var img = $('<img/>', {
            style: 'max-height: 150px;',
            src: e.target.result
          });
          $('#image-'+vue.name).html(img);
        };
        var file = e.target.files[0];
        reader.readAsDataURL(file);

        this.$emit('update-image', file);
      }
    }
  }
</script>