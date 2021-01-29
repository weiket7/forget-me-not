<template>
      <form @submit.prevent="onSubmit()">
    <card>
        <card-header>
            Blog - {{ blog.title }}
        </card-header>
        <card-body>
          <modal id="modal-delete" type="delete" :submitEvent="deleteBlog">
            Are you sure about deleting {{ blog.title}}?
          </modal>

            <div class="form-group">
                <label-component required>Title</label-component>
                <textbox-component v-model="blog.title" :error="errors.get('title')"></textbox-component>
            </div>

            <div class="form-group">
              <label-component>Feature on home <small>(existing featured post will become unfeatured)</small></label-component>
              <checkbox-single name="isFeatured" :value="1" v-model="blog.isFeatured">Yes</checkbox-single> 
            </div>

            <div class="form-group" :class="errors.get('type') ? 'validated' : ''">
              <label-component required>Type</label-component>
              <radio-component v-model="blog.type" :options="blogTypes" :error="errors.get('type')"></radio-component>
            </div>

            <div class="form-group">
                <label-component required>Image</label-component>
                <image-component v-model="blog.image" name="image"
                  v-on:update-image="updateImage" 
                  :src="blog.image" folder="blog"
                  :error="errors.get('imageNew')">
                </image-component>

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
import ImageComponent from "../components/ImageComponent"

export default {
    name: "blog",
    data() {
      return {
        blog: {
          content: ""
        },
        blogTypes: {},
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
      const url = "api/blog/get" + (this.isCreate ? "" : "/"+this.$route.params.blogId);
      axios.get(url)
        .then(response => {
          this.blog = this.isCreate ? this.blog : response.data.blog;
          this.blogTypes = response.data.blogTypes;
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
        TextEditor,
        ImageComponent
    },
    mixins: [FormMixin],
  }
</script>