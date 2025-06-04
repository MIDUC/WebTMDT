<template>
    <DefaultLayout>
        <div class="container py-5">
            <Slider />
            <PostFilter />
            <h4 class="mb-4 fw-bold">Kết quả tìm kiếm</h4>

            <div v-if="paginatedPosts.length === 0" class="alert alert-warning">
                Không tìm thấy bài đăng phù hợp.
            </div>

            <div v-else>
                <div
                    class="card mb-4 shadow-sm post-row"
                    v-for="post in paginatedPosts"
                    :key="post.id"
                >
                    <div class="row g-0 align-items-center">
                        <div class="col-md-4">
                            <img :src="post.image" class="img-fluid rounded-start w-100 h-100 object-fit-cover" style="height: 220px" />
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title text-primary fw-semibold">{{ post.title }}</h5>
                                <p class="mb-2 text-muted">
                                    <font-awesome-icon icon="location-dot" class="me-1 text-danger" /> {{ post.address }}
                                </p>
                                <p class="mb-2">
                                    <font-awesome-icon icon="ruler-combined" class="me-1" /> {{ post.area }} m² &nbsp;
                                    <font-awesome-icon icon="bed" class="me-1" /> {{ post.bedroom }} PN
                                </p>
                                <p class="fw-bold text-danger fs-5">
                                    <font-awesome-icon icon="money-bill-wave" class="me-1" /> {{ post.price }}
                                </p>
                                <div class="d-flex gap-2 mt-3">
                                    <a :href="`tel:${post.phone}`" class="btn btn-sm btn-success">
                                        <font-awesome-icon icon="phone" class="me-1" /> Gọi ngay
                                    </a>
                                    <a href="#" class="btn btn-sm btn-outline-primary">
                                        <font-awesome-icon :icon="['fab', 'zalo']" class="me-1" /> Zalo
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Phân trang -->
                <Pagination
                    v-model="currentPage"
                    :total="posts.length"
                    :perPage="4"
                    class="mt-4"
                />
            </div>
        </div>
    </DefaultLayout>
</template>

<script setup>
import { ref, computed } from 'vue'
import DefaultLayout from '../layout/DefaultLayout.vue'
import Pagination from "../component/Pagination.vue";
import Slider from "../component/Slider.vue";
import PostFilter from "../component/PostFilter.vue";

// Giả lập dữ liệu tìm kiếm
const posts = ref([
    {
        id: 1,
        title: 'Căn hộ cao cấp Vinhomes Q9',
        image: 'https://placehold.co/400x250',
        address: 'Thủ Đức, TP.HCM',
        price: '3.5 tỷ',
        area: 70,
        bedroom: 2,
        phone: '0901234567'
    },
    {
        id: 2,
        title: 'Chung cư Sunshine City',
        image: 'https://placehold.co/400x250',
        address: 'Cầu Giấy, Hà Nội',
        price: '4.2 tỷ',
        area: 85,
        bedroom: 3,
        phone: '0902345678'
    },
    {
        id: 3,
        title: 'Căn hộ The Manor Bình Thạnh',
        image: 'https://placehold.co/400x250',
        address: 'Bình Thạnh, TP.HCM',
        price: '3.9 tỷ',
        area: 75,
        bedroom: 2,
        phone: '0903456789'
    },
    // ... thêm dữ liệu nếu muốn test nhiều trang
])

const currentPage = ref(1)
const perPage = 10;

const pageCount = computed(() => Math.ceil(posts.value.length / perPage))

const paginatedPosts = computed(() => {
    const start = (currentPage.value - 1) * perPage
    return posts.value.slice(start, start + perPage)
})

</script>

<style scoped>
.post-row {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border-radius: 12px;
}

.post-row:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
}

</style>
