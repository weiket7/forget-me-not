<template>
    <div class="row">
        <div class="col-lg-12 col-xxl-12">
            <div class="card card-custom card-stretch gutter-b">
                <slot></slot>
            </div>
        </div>
    </div>
</template>


<script>
export default {
    name: 'Card',
}
</script>