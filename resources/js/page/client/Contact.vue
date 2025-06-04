<template>
    <DefaultLayout>
    <div class="container py-5">
        <h2 class="fw-bold mb-4 text-center">Liên hệ với chúng tôi</h2>

        <div class="row g-4">
            <div class="col-md-6">
                <div class="p-4 shadow-sm border rounded bg-white">
                    <h5 class="mb-3">Chi nhánh Hà Nội</h5>
                    <p><font-awesome-icon icon="location-dot" class="me-2 text-danger" /> 123 Nguyễn Trãi, Thanh Xuân, Hà Nội</p>
                    <p><font-awesome-icon icon="phone" class="me-2 text-success" /> 0243 456 789</p>
                    <p><font-awesome-icon icon="envelope" class="me-2 text-primary" /> hanoi@batdongsanmarket.vn</p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="p-4 shadow-sm border rounded bg-white">
                    <h5 class="mb-3">Chi nhánh TP. HCM</h5>
                    <p><font-awesome-icon icon="location-dot" class="me-2 text-danger" /> 456 Nguyễn Thị Minh Khai, Quận 3, TP.HCM</p>
                    <p><font-awesome-icon icon="phone" class="me-2 text-success" /> 0283 456 789</p>
                    <p><font-awesome-icon icon="envelope" class="me-2 text-primary" /> hcm@batdongsanmarket.vn</p>
                </div>
            </div>
        </div>

        <div class="text-center mt-5">
            <img src="https://placehold.co/800x300?text=Li%C3%AAn+H%E1%BB%87" class="img-fluid rounded shadow" alt="Liên hệ">
        </div>
    </div>
        </DefaultLayout>
</template>

<script setup>
import DefaultLayout from "../layout/DefaultLayout.vue";
</script>

<style scoped>
</style>
