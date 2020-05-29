<template>
    <!-- Modal-->
    <div class="modal fade" :id="id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" v-if="title">
                    <h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <slot></slot>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                    <button type="button" :class="className" class="btn font-weight-bold" @click="onModalSubmit()">Delete</button>
                </div>
            </div>
        </div>
    </div>
</template> 

<script>
export default {
    name: "modal",
    props: {
        title: { required: false },
        id: { required: true },
        type: { required: false },
        submitEvent: { required: false }
    },
    computed: {
        className() {
            if(this.type === "delete") {
                return "btn-danger";
            }
            return "btn-primary"
        },
    },
    methods: {
        onModalSubmit() {
            $('#'+this.id).modal('hide');
            this.submitEvent();
        }
    }
}
</script>