
<template>
    <textarea name="" id="editor" v-model="value"></textarea>       
</template>

<script>
  import ClassicEditor from '@ckeditor/ckeditor5-build-classic'
  export default {
    name: "TextEditor",
    props: {
      value: { required: false},
    },
    data() {
        return {
            editor: null,
        };
    },
    mounted() {
        let vue = this
        ClassicEditor.create(document.querySelector('#editor'), {
            ckfinder: {
            uploadUrl: 'api/upload-image?folder=blog'
            }
        }).then(editor => {
            editor.data.set(vue.value);
            editor.model.document.on( 'change:data', (e) => {
                vue.$emit('input', editor.getData());
            } );
            vue.editor = editor;
        }).catch(error => {
            console.log("TextEditor.vue error")
        });
    },
}
</script>
