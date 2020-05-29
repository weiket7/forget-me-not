<template>
      <form @submit.prevent="onSubmit()">
    <card>
        <card-header>
            {{ page.title }}
        </card-header>
        <card-body>
            <div class="form-group">
                <label-component>Image</label-component>
                <image-component v-model="page.image" name="image"
                  v-on:update-image="updateImage" 
                  :src="page.image" folder=""></image-component>
            </div>

            <div class="form-group">
                <TextEditor v-model="page.content" v-if="loaded"></TextEditor>
            </div>
        </card-body>
    <form-footer>
       <button type="submit" class="btn btn-success">Save</button>
    </form-footer>
    </card>
      </form>
</template>

<script>
import axios from 'axios';
import TextEditor from '../components/TextEditor'
  import FormMixin from "../form-mixin";

export default {
    name: "Page",
    data() {
        return {
            page: {},
            loaded: false,
            imageNew: null,
        }
    },
    created() {
        this.getPage();
    },
    methods: {
        getPage() {
            axios.get("api/content/get/"+this.$route.params.page)
            .then(response => {
                this.page = response.data;
                this.loaded = true;
            });
        },
        updateImage(file) {
            this.imageNew = file;
        },
        onSubmit() {
            let form_data = this.page;
            
            let config = {};
            if (this.imageNew) {
                form_data = new FormData();
                this.appendObjectToFormData(this.page, form_data);
                form_data.append("imageNew", this.imageNew);
                
                config = {
                    headers: {
                    'content-type': 'multipart/form-data'
                    }
                };
            }
            
            let url = 'api/content/save/'+this.$route.params.page;

            axios.post(url, form_data, config)
                .then(this.onSuccess)
                .catch(this.onError);
        },
        onSuccess(response) {
            this.errors.clear();
            toastr.success("Page updated");
        },
    },
    watch: {
        $route() {
            this.getPage();
        }
    },
    components: {
        TextEditor
    },
    mixins: [FormMixin]

}
</script>