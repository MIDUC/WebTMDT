<template>
    <div class="post-filter card p-4 mb-5 border-0 shadow-lg animate-fade">
        <div class="row g-3 align-items-end">
            <div class="col-md-4">
                <label class="form-label">Từ khoá</label>
                <input type="text" class="form-control filter-input" placeholder="Nhập từ khoá tìm kiếm..." v-model="keyword" />
            </div>
            <div class="col-md-3">
                <label class="form-label">Loại BĐS</label>
                <select class="form-select filter-select" v-model="type">
                    <option disabled value="">Chọn loại</option>
                    <option>Chung cư</option>
                    <option>Nhà riêng</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label">Khu vực</label>
                <select class="form-select filter-select" v-model="location">
                    <option disabled value="">Chọn khu vực</option>
                    <option>Hà Nội</option>
                    <option>TP.HCM</option>
                </select>
            </div>
            <div class="col-md-2 d-flex gap-2">
                <button class="btn btn-warning w-100 fw-semibold shadow-sm transition">🔍 Tìm kiếm</button>
                <button class="btn btn-outline-secondary px-3 d-flex align-items-center justify-content-center" @click="resetFilter" title="Đặt lại bộ lọc">
                    <font-awesome-icon icon="rotate-right" />
                </button>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

const keyword = ref('')
const type = ref('')
const location = ref('')

function resetFilter() {
    keyword.value = ''
    type.value = ''
    location.value = ''
}
</script>

<style scoped>
.post-filter {
    border-radius: 16px;
    background: #fff;
    transition: box-shadow 0.3s ease;
}

.post-filter:hover {
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
}

.filter-input,
.filter-select {
    border-radius: 12px;
    transition: all 0.3s ease;
}

.filter-input:focus,
.filter-select:focus {
    border-color: #ffc107;
    box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.25);
}

.btn.transition:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

.animate-fade {
    animation: fadeIn 0.4s ease;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(12px);
    }
    to {
        opacity: 1;
        transform: none;
    }
}
</style>
