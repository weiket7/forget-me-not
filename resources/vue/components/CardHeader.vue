<template>
    <div class="card-header align-items-center mt-4">
        <h3 class="card-title">
            <slot></slot>
        </h3>
        <div class="card-toolbar">
            <slot name="toolbar">

            </slot>
        </div>
    </div>
</template>

<script>
export default {
    name: 'CardHeader',
    props: {
        subTitle: { required: false }
    }
}
</script>