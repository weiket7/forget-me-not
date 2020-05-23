<template>
    <div class="row">
        <div class="col-lg-12 col-xxl-12">
            <!--begin::Mixed Widget 1-->
            <div class="card card-custom card-stretch gutter-b">
                <!--begin::Header-->
                <div class="card-header align-items-center border-0 mt-4">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="font-weight-bolder text-dark">Recent Activities</span>
                        <span class="text-muted mt-3 font-weight-bold font-size-sm">890,344 Sales</span>
                    </h3>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body ">
                    <slot></slot>  
                </div>
                <!--end::Body-->
            </div>
            <!--end::Mixed Widget 1-->
        </div>
    </div>
</template>


<script>
export default {
    name: 'Menu',
    props: ["menu"]
}
</script>