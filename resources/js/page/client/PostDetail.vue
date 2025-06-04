<template>
    <DefaultLayout>
        <div class="container py-5">
            <Slider />
            <PostFilter />
            <div class="row g-4">
                <!-- Cột trái: Nội dung bài đăng -->
                <div class="col-lg-8">
                    <!-- ✅ Slide ảnh nâng cấp với thumbnail -->
                    <div class="mb-4">
                        <div id="productCarousel" class="carousel slide shadow-sm rounded overflow-hidden" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div
                                    class="carousel-item"
                                    :class="{ active: index === 0 }"
                                    v-for="(img, index) in post.images"
                                    :key="index"
                                >
                                    <img :src="img" class="d-block w-100" style="object-fit: cover; height: 420px" />
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </button>
                        </div>

                        <!-- Thumbnail nhỏ bên dưới -->
                        <div class="d-flex gap-2 mt-2 justify-content-center">
                            <img
                                v-for="(img, index) in post.images"
                                :key="'thumb' + index"
                                :src="img"
                                class="img-thumbnail shadow-sm border"
                                style="width: 80px; height: 60px; object-fit: cover; cursor: pointer"
                                @click="goToSlide(index)"
                            />
                        </div>
                    </div>

                    <h2 class="fw-bold text-primary mb-3">{{ post.title }}</h2>
                    <p class="mb-2 text-muted">
                        <font-awesome-icon icon="location-dot" class="me-1 text-danger" /> {{ post.address }}
                    </p>
                    <p class="mb-2">
                        <font-awesome-icon icon="ruler-combined" class="me-1 text-secondary" /> {{ post.area }} m² &nbsp;
                        <font-awesome-icon icon="bed" class="me-1 text-secondary" /> {{ post.bedroom }} PN
                    </p>
                    <p class="text-danger fw-semibold fs-5">
                        <font-awesome-icon icon="money-bill-wave" class="me-1" /> Giá: {{ post.price }}
                    </p>

                    <hr />

                    <div class="mb-4">
                        <h5 class="fw-semibold mb-3">Mô tả chi tiết</h5>
                        <p>{{ post.description }}</p>
                    </div>

                    <div class="mb-4">
                        <h5 class="fw-semibold mb-3">Vị trí trên bản đồ</h5>
                        <div class="ratio ratio-16x9 rounded shadow-sm">
                            <!-- TODO: Đặt iframe sau khi có toạ độ -->
                            <iframe src="https://maps.google.com" frameborder="0"></iframe>
                        </div>
                    </div>
                </div>

                <!-- Cột phải: Thông tin người đăng -->
                <div class="col-lg-4">
                    <div class="p-4 shadow-sm border rounded">
                        <div class="d-flex align-items-center mb-3">
                            <img src="https://placehold.co/60x60" class="rounded-circle me-3" alt="user" />
                            <div>
                                <h6 class="mb-0">Nguyễn Văn A</h6>
                                <small class="text-muted">Người đăng tin</small>
                            </div>
                        </div>

                        <div class="mb-3">
                            <p class="mb-1">
                                <font-awesome-icon icon="phone" class="me-2 text-success" /> {{ post.phone }}
                            </p>
                            <p>
                                <font-awesome-icon :icon="['fab', 'zalo']" class="me-2 text-primary" /> zalo.me/abcxyz
                            </p>
                        </div>

                        <div class="d-grid gap-2">
                            <a :href="`tel:${post.phone}`" class="btn btn-success">
                                <font-awesome-icon icon="phone" class="me-2" /> Gọi hotline
                            </a>
                            <a href="#" class="btn btn-outline-primary">
                                <font-awesome-icon :icon="['fab', 'zalo']" class="me-2" /> Liên hệ Zalo
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gợi ý bài viết tương tự -->
            <div class="mt-5">
                <h4 class="fw-bold mb-4">Căn hộ tương tự</h4>
                <div class="row g-4">
                    <div class="col-md-3" v-for="item in relatedPosts" :key="item.id">
                        <PostCard :post="item" />
                    </div>
                </div>
            </div>
        </div>
    </DefaultLayout>
</template>

<script setup>
import PostCard from '../component/PostCard.vue'
import { ref } from 'vue'
import DefaultLayout from '../layout/DefaultLayout.vue'
import Slider from '../component/Slider.vue'
import PostFilter from '../component/PostFilter.vue'
import { Carousel } from 'bootstrap'


const post = ref({
    title: 'Căn hộ cao cấp The Landmark',
    images: [
        'https://placehold.co/800x400?text=Hinh+1',
        'https://placehold.co/800x400?text=Hinh+2',
        'https://placehold.co/800x400?text=Hinh+3'
    ],
    address: 'Vinhomes Central Park, Bình Thạnh, TP.HCM',
    area: 90,
    bedroom: 3,
    price: '4.5 tỷ',
    phone: '0901234567',
    description: 'Căn hộ view sông, full nội thất, pháp lý rõ ràng, hỗ trợ vay 70%.'
})

const relatedPosts = ref([
    {
        id: 1,
        title: 'Căn hộ Vinhomes chính chủ',
        image: 'https://placehold.co/400x250',
        price: '4.2 tỷ',
        phone: '0902345678',
        category: 'owner'
    },
    {
        id: 2,
        title: 'Căn hộ hot Landmark Plus',
        image: 'https://placehold.co/400x250',
        price: '4.7 tỷ',
        phone: '0903456789',
        category: 'hot'
    },
    {
        id: 3,
        title: 'The Manor - Đã xác thực',
        image: 'https://placehold.co/400x250',
        price: '3.9 tỷ',
        phone: '0904567890',
        category: 'verified'
    },
    {
        id: 4,
        title: 'Căn hộ mới cập nhật Q.2',
        image: 'https://placehold.co/400x250',
        price: '3.5 tỷ',
        phone: '0905678901',
        category: 'recent'
    }
])


function goToSlide(index) {
    const carouselEl = document.querySelector('#productCarousel')
    if (carouselEl) {
        const instance = Carousel.getInstance(carouselEl) || new Carousel(carouselEl)
        instance.to(index)
    }
}
</script>

<style scoped>
</style>
