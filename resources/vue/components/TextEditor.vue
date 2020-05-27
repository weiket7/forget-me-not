
<template>
    <textarea name="" id="editor"></textarea>       
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
            editor.model.document.on('change:data', (e) => {
                console.log(editor.getData());
                vue.$emit('input', editor.getData());
            } );
            vue.editor = editor;
        }).catch(error => {
            console.log("TextEditor.vue error")
        });        
    },
}
</script>
