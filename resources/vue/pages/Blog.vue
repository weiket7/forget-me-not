<template>
      <form @submit.prevent="onSubmit()">
    <card>
        <card-header>
            BLog - {{ blog.title }}
        </card-header>
        <card-body>
          <modal id="modal-delete" type="delete" :submitEvent="deleteBlog">
            Are you sure about deleting {{ blog.title}}?
          </modal>

            <div class="form-group">
                <label-component required>Title</label-component>
                <textbox-component v-model="blog.title"></textbox-component>
            </div>

            <div class="form-group">
              <label-component required>Feature on home</label-component>
              <radio-component v-model="blog.isFeatured" :options="{ '1': 'Yes', '0': 'No' }" :error="errors.get('isFeatured')"></radio-component>
            </div>

            <div class="form-group">
                <label-component required>Image</label-component>
                <image-component v-model="blog.image" name="image"
                  v-on:update-image="updateImage" 
                  :src="blog.image" folder="blog"></image-component>
            </div>

            <div class="form-group">
                <label-component required>Short Description</label-component>
                <textarea-component v-model="blog.shortDesc" :rows='5' :error="errors.get('shortDesc')"></textarea-component>
            </div>

            <div class="form-group">
              <label-component required>Content</label-component>
              <TextEditor v-model="blog.content" v-if="loaded"></TextEditor>
            </div>
        </card-body>
    <form-footer>
      <button type="submit" class="btn btn-success">Save</button>
      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete" v-if="!this.isCreate">
          Delete
      </button>
    </form-footer>
    </card>
      </form>
</template>

<script>
import axios from 'axios';
import FormMixin from "../form-mixin";
import TextEditor from '../components/TextEditor'

export default {
    name: "blog",
    data() {
      return {
        blog: {},
        blog_types: {},
        imageNew: null,
      }
    },
    methods: {
      onSubmit() {
        let form_data = this.blog;
        
        let config = {};
        if (this.imageNew) {
          form_data = new FormData();
          this.appendObjectToFormData(this.blog, form_data);
          form_data.append("imageNew", this.imageNew);
          
          config = {
            headers: {
              'content-type': 'multipart/form-data'
            }
          };
        }
        
        let url = 'api/blog/save';
        if (!this.isCreate) {
          url += '/'+ this.$route.params.blogId
        }
        
        axios.post(url, form_data, config)
          .then(this.onSuccess)
          .catch(this.onError);
      },
      onSuccess(response) {
        this.errors.clear();
        if (this.isCreate) {
          toastr.success("Blog added");
          this.blog.blogId = response.data;
          this.$router.push('/blog/save/'+this.blog.blogId);
          return;
        }
        toastr.success("Blog updated");
      },
      updateImage(file) {
        this.imageNew = file;
      },
      deleteBlog() {
        axios.post('api/delete-record?table=blog&column=blogId&id='+this.$route.params.blogId)
          .then(response => {
            toastr.success("Blog deleted");
            this.$router.push('/blog');
          })
          .catch(this.onError);
      }
    },
    mounted() {
      axios.get("api/blog/get/" + this.$route.params.blogId)
        .then(response => {
          this.blog = this.isCreate ? {} : response.data.blog;
          this.blog_types = response.data.blog_types;
          this.loaded = true;
        });
    },
    computed: {
      isCreate() {
        return this.$route.path == "/blog/save";
      },
      folder() {
        if (this.blog.type == 'G') {
          return 'blog/gone-to-good-homes';
        }
        if (this.blog.type == 'I') {
          return 'blog/dogs-in-need';
        }
        if (this.blog.type == 'N') {
          return 'blog/news-flash';
        }
        return "";
      }
    },
    components: {
        TextEditor
    },
    mixins: [FormMixin],
  }
</script>