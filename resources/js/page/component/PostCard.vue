// ✅ FILE: src/components/PostCard.vue
<template>
    <router-link class="custom-none-decoration" to="/post-detail">
        <div class="card h-100 shadow-sm post-card position-relative overflow-hidden">
            <!-- ✅ Badge theo loại tin -->
            <div class="badge-wrapper">
      <span v-if="post.category === 'verified'" class="badge badge-verified">
        <font-awesome-icon icon="circle-check" class="me-1" /> Xác thực
      </span>
                <span v-else-if="post.category === 'hot'" class="badge badge-hot">
        <font-awesome-icon icon="fire" class="me-1" /> Tin hot
      </span>
                <span v-else-if="post.category === 'owner'" class="badge badge-owner">
        <font-awesome-icon icon="user-check" class="me-1" /> Chính chủ
      </span>
            </div>

            <div class="img-container position-relative">
                <img :src="post.image" class="card-img-top" alt="Ảnh bất động sản" />
                <div class="img-overlay d-flex justify-content-center align-items-center">
                    <a href="#" class="btn btn-sm btn-primary">👁️ Xem ngay</a>
                </div>
            </div>

            <div class="card-body">
                <h5 class="card-title custom-title">{{ post.title }}</h5>
                <p class="card-text small text-muted mb-1">
                    <font-awesome-icon icon="location-dot" class="me-1" /> {{ post.address || 'Địa chỉ chưa cập nhật' }}
                </p>
                <p class="card-text mb-1">
                    <font-awesome-icon icon="ruler-combined" class="me-1" /> {{ post.area || '---' }} m² &nbsp;
                    <font-awesome-icon icon="bed" class="me-1" /> {{ post.bedroom || '---' }} PN
                </p>
                <p class="fw-bold text-danger mb-0" style="font-size: 20px">
                    <font-awesome-icon icon="money-bill-wave" class="me-1" />{{ post.price }} / Tháng
                </p>
            </div>

            <div class="card-footer d-flex justify-content-between align-items-center">
                <a :href="`tel:${post.phone}`" class="btn btn-sm btn-success">
                    <font-awesome-icon icon="phone" class="me-1" /> Gọi ngay
                </a>
                <a href="#" class="btn btn-sm btn-outline-primary">
                    <font-awesome-icon :icon="['fab', 'zalo']" class="me-1" /> Zalo
                </a>
            </div>
        </div>
    </router-link>

</template>

<script setup>
// Thuộc tính bổ sung: address, area, bedroom, category
defineProps(['post'])
</script>

<style scoped>
.card:hover{
    cursor: pointer;
}
.post-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border-radius: 12px;
}

.post-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
}

.img-container {
    position: relative;
}

.img-overlay {
    position: absolute;
    inset: 0;
    background: rgba(0, 0, 0, 0.4);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.img-container:hover .img-overlay {
    opacity: 1;
}

.img-overlay .btn {
    padding: 8px 16px;
    font-weight: 500;
}
.custom-title{
    font-weight: 700;
}
/* ✅ Badge nhãn tin */
.badge-wrapper {
    position: absolute;
    top: 12px;
    left: 12px;
    z-index: 10;
    display: flex;
    flex-direction: column;
    gap: 6px;
}

.badge {
    font-size: 0.75rem;
    padding: 4px 10px;
    border-radius: 20px;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    color: white;
}

.badge-verified {
    background-color: #198754; /* green */
}

.badge-hot {
    background-color: #dc3545; /* red */
}

.badge-owner {
    background-color: #ffc107; /* yellow */
    color: #000;
}
</style>
