<template>
      <form @submit.prevent="onSubmit()">
    <card>
        <card-header>
            {{ pageName }}
        </card-header>
        <card-body>
            <div class="form-group">
                <label-component>Title</label-component>
                <textbox-component v-model="page.title"></textbox-component>
            </div>

            <!-- <div class="form-group">
                <label-component>Image</label-component>
                <textbox-component v-model="page.title"></textbox-component>
            </div> -->

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
        }
    },
    created() {
        this.getPage();
    },
    computed: {
        pageName() {
            return this.$route.params.page;
        }
    },
    methods: {
        getPage() {
            axios.get("api/content/get/"+this.$route.params.page)
            .then(response => {
                this.page = response.data;
                this.loaded = true;
            });
        },
        onSubmit() {
            let url = 'api/content/save/'+this.$route.params.page;
    
            axios.post(url, this.page)
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