<template>
    <div class="card-header align-items-center mt-4">
        <h3 class="card-title align-items-start flex-column">
            <span class="font-weight-bolder text-dark">
                <slot></slot>
            </span>
            <span class="text-muted mt-3 font-weight-bold font-size-sm">
                {{ subTitle }}
            </span>
        </h3>
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