<template>
      <form @submit.prevent="onSubmit()">
    <card>
        <card-header>
            {{ page.title }}
        </card-header>
        <card-body>
            <div class="form-group">
                <label-component>Title</label-component>
                <textbox-component v-model="page.title"></textbox-component>
            </div>

            <div class="form-group">
                <TextEditor v-model="page.content" :value="page.content" v-if="loaded"></TextEditor>
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

export default {
    name: "Page",
    data() {
        return {
            page: {},
            loaded: false,
        }
    },
    created() {
        axios.get("api/content/get/"+"donate")
            .then(response => {
                this.page = response.data;
                this.loaded = true;
            });
    },
    components: {
        TextEditor
    }
}
</script>