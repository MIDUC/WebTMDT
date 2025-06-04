<template>
    <DefaultLayout>
        <div class="container py-5">
            <div class="row">
                <!-- Sidebar trái -->
                <div class="col-md-3">
                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-body text-center">
                            <div class="avatar-wrapper mx-auto mb-2">
                                <img :src="avatar" class="rounded-circle shadow avatar-img" alt="avatar" />
                                <label class="avatar-upload">
                                    <input type="file" @change="handleAvatarUpload" />
                                    <font-awesome-icon icon="camera" />
                                </label>
                            </div>
                            <h6 class="fw-semibold mt-2">Nguyễn Văn A</h6>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item" :class="{ active: currentTab === 'post' }" @click="currentTab = 'post'">
                                📝 Đăng tin mới
                            </li>
                            <li class="list-group-item" :class="{ active: currentTab === 'manage' }" @click="currentTab = 'manage'">
                                📂 Quản lý tin đăng
                            </li>
                            <li class="list-group-item" :class="{ active: currentTab === 'profile' }" @click="currentTab = 'profile'">
                                👤 Thông tin hồ sơ
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Nội dung bên phải -->
                <div class="col-md-9">
                    <div class="card shadow-sm border-0 p-4">
                        <!-- Form đăng tin -->
                        <div v-if="currentTab === 'post'">
                            <h5 class="mb-4 fw-bold">📝 Đăng tin mới</h5>
                            <form @submit.prevent="submitPost" class="row g-3">
                                <!-- Loại hình -->
                                <div class="col-md-6">
                                    <label class="form-label">Loại hình <span class="text-danger">*</span></label>
                                    <select v-model="formData.type" class="form-select" required>
                                        <option disabled value="">Chọn loại hình</option>
                                        <option> Căn hộ </option>
                                        <option> Nhà riêng </option>
                                        <option> Nhà mặt phố </option>
                                        <option> Nhà trọ, phòng trọ </option>
                                        <option> Biệt thự </option>
                                        <option> Văn phòng </option>
                                    </select>
                                </div>

                                <!-- Tỉnh/TP -->
                                <div class="col-md-6">
                                    <label class="form-label">Tỉnh / Thành phố</label>
                                    <input class="form-control" v-model="formData.city" disabled value="Đà Nẵng" />
                                </div>

                                <!-- Địa chỉ chi tiết -->
                                <div class="col-md-6">
                                    <label class="form-label">Quận / Huyện</label>
                                    <input class="form-control" v-model="formData.district" required />
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Phường / Xã</label>
                                    <input class="form-control" v-model="formData.ward" required />
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Đường phố</label>
                                    <input class="form-control" v-model="formData.street" placeholder="VD: Hoàng Diệu" required />
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Số nhà</label>
                                    <input class="form-control" v-model="formData.houseNumber" required />
                                </div>

                                <!-- Tiêu đề & Mô tả -->
                                <div class="col-12">
                                    <label class="form-label">Tiêu đề</label>
                                    <input class="form-control" v-model="formData.title" required />
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Mô tả chi tiết</label>
                                    <textarea class="form-control" v-model="formData.description" rows="4" required @input="blockLinks"></textarea>
                                    <small class="text-muted">* KHôNG được chèn link trong mô tả</small>
                                </div>

                                <!-- Thông tin thêm -->
                                <div class="col-md-6">
                                    <label class="form-label">Giá</label>
                                    <input class="form-control" v-model="formData.price" placeholder="VD: 5 triệu" required />
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Theo</label>
                                    <select class="form-select" v-model="formData.priceUnit">
                                        <option>Tháng</option>
                                        <option>Tuần</option>
                                        <option>Ngày</option>
                                        <option>Quý</option>
                                        <option>Năm</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Diện tích (m²)</label>
                                    <input class="form-control" v-model="formData.area" required />
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Phòng ngủ</label>
                                    <input class="form-control" v-model="formData.bedroom" />
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Phòng tắm</label>
                                    <input class="form-control" v-model="formData.bathroom" />
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Hướng nhà</label>
                                    <select class="form-select" v-model="formData.direction">
                                        <option disabled value="">-- Chọn hướng --</option>
                                        <option>Đông</option>
                                        <option>Tây</option>
                                        <option>Nam</option>
                                        <option>Bắc</option>
                                        <option>Đông Bắc</option>
                                        <option>Đông Nam</option>
                                        <option>Tây Bắc</option>
                                        <option>Tây Nam</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Giá điện (kWh)</label>
                                    <input class="form-control" v-model="formData.electricPrice" />
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Giá nước (m³)</label>
                                    <input class="form-control" v-model="formData.waterPrice" />
                                </div>

                                <!-- Tiện ích -->
                                <div class="col-12">
                                    <label class="form-label">Tiện ích</label>
                                    <div class="d-flex flex-wrap gap-2">
                                        <div class="form-check" v-for="item in utilities" :key="item">
                                            <input class="form-check-input" type="checkbox" :value="item" v-model="formData.utilities" />
                                            <label class="form-check-label">{{ item }}</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Video YouTube -->
                                <div class="col-12">
                                    <label class="form-label">Link video YouTube</label>
                                    <input class="form-control" v-model="formData.video" />
                                </div>

                                <!-- Iframe bản đồ -->
                                <div class="col-12">
                                    <label class="form-label">Iframe bản đồ Google</label>
                                    <textarea class="form-control" v-model="formData.mapIframe" rows="2"></textarea>
                                </div>

                                <!-- Nút submit -->
                                <div class="col-12 text-end">
                                    <button class="btn btn-primary">Đăng tin</button>
                                </div>
                            </form>
                        </div>

                        <!-- Quản lý tin -->
                        <div v-else-if="currentTab === 'manage'">
                            <h5 class="mb-4 fw-bold">📂 Quản lý tin đăng</h5>
                            <ul class="nav nav-tabs mb-3">
                                <li class="nav-item" v-for="tab in statusTabs" :key="tab">
                                    <button class="nav-link" :class="{ active: statusFilter === tab }" @click="statusFilter = tab">
                                        {{ tab }}
                                    </button>
                                </li>
                            </ul>

                            <!-- Tìm kiếm -->
                            <div class="mb-3">
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Tìm theo tiêu đề..."
                                    v-model="searchKeyword"
                                />
                            </div>

                            <div class="row g-3">
                                <div
                                    class="col-md-6"
                                    v-for="item in filteredPosts"
                                    :key="item.id"
                                >
                                    <div class="card h-100 shadow-sm border-0 overflow-hidden post-item">
                                        <img :src="item.image" class="card-img-top" style="height: 180px; object-fit: cover" />
                                        <div class="card-body">
                                            <h6 class="fw-semibold text-primary">{{ item.title }}</h6>
                                            <p class="text-muted small mb-1">
                                                <font-awesome-icon icon="map-marker-alt" class="me-1" /> {{ item.address || 'Địa chỉ chưa cập nhật' }}
                                            </p>
                                            <p class="mb-0">
                                                <font-awesome-icon icon="tag" class="me-1 text-success" /> {{ item.price }}
                                            </p>
                                        </div>
                                        <div class="card-footer d-flex justify-content-between">
                                            <span class="badge bg-secondary">{{ item.status }}</span>
                                            <a href="#" class="btn btn-sm btn-outline-primary">Xem chi tiết</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Thông tin hồ sơ -->
                        <div v-else-if="currentTab === 'profile'">
                            <h5 class="mb-4 fw-bold">👤 Thông tin hồ sơ</h5>
                            <p><strong>Họ tên:</strong> {{ profile.name }}</p>
                            <p><strong>Email:</strong> {{ profile.email }}</p>
                            <p><strong>Số điện thoại:</strong> {{ profile.phone }}</p>
                            <button class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#editProfileModal">Chỉnh sửa</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal chỉnh sửa -->
            <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title fw-bold" id="editProfileModalLabel">Chỉnh sửa thông tin</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form @submit.prevent="saveProfile">
                                <div class="mb-3">
                                    <label class="form-label">Họ tên</label>
                                    <input v-model="editProfile.name" type="text" class="form-control" required />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input v-model="editProfile.email" type="email" class="form-control" required />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Số điện thoại</label>
                                    <input v-model="editProfile.phone" type="text" class="form-control" required />
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                    <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </DefaultLayout>
</template>

<script setup>
import { ref, computed } from 'vue'
import DefaultLayout from '../layout/DefaultLayout.vue'

const currentTab = ref('post')
const avatar = ref('https://placehold.co/100x100')
const searchKeyword = ref('')

const formData = ref({
    type: '',
    city: 'Đà Nẵng',
    district: '',
    ward: '',
    street: '',
    houseNumber: '',
    title: '',
    description: '',
    price: '',
    priceUnit: 'Tháng',
    area: '',
    bedroom: '',
    bathroom: '',
    direction: '',
    electricPrice: '',
    waterPrice: '',
    utilities: [],
    video: '',
    mapIframe: ''
})

function handleAvatarUpload(event) {
    const file = event.target.files[0]
    if (file) avatar.value = URL.createObjectURL(file)
}

const statusTabs = ['Tất cả', 'Đang hiển thị', 'Đã ẩn', 'Đã hết hạn']
const statusFilter = ref('Tất cả')

const userPosts = ref([
    {
        id: 1,
        title: 'Căn hộ Sunrise City',
        price: '3.2 tỷ',
        status: 'Đang hiển thị',
        image: 'https://placehold.co/600x400',
        address: 'Quận 7, TP.HCM'
    },
    {
        id: 2,
        title: 'Nhà phố Quận 7',
        price: '7.8 tỷ',
        status: 'Đã ẩn',
        image: 'https://placehold.co/600x400',
        address: 'Quận 7, TP.HCM'
    },
    {
        id: 3,
        title: 'Đất nền Bình Chánh',
        price: '1.5 tỷ',
        status: 'Đã hết hạn',
        image: 'https://placehold.co/600x400',
        address: 'Bình Chánh, TP.HCM'
    },
    {
        id: 4,
        title: 'Căn hộ Q.2 view sông',
        price: '2.9 tỷ',
        status: 'Đang hiển thị',
        image: 'https://placehold.co/600x400',
        address: 'Quận 2, TP.HCM'
    }
])


const filteredPosts = computed(() => {
    let posts = userPosts.value
    if (statusFilter.value !== 'Tất cả') {
        posts = posts.filter(p => p.status === statusFilter.value)
    }
    if (searchKeyword.value.trim()) {
        posts = posts.filter(p => p.title.toLowerCase().includes(searchKeyword.value.toLowerCase()))
    }
    return posts
})
const profile = ref({
    name: 'Nguyễn Văn A',
    email: 'nguyenvana@example.com',
    phone: '0901234567'
})

const editProfile = ref({ ...profile.value })

function saveProfile() {
    profile.value = { ...editProfile.value }
    const modal = bootstrap.Modal.getInstance(document.getElementById('editProfileModal'))
    modal.hide()
}



const utilities = ["Camera", "Bảo vệ", "PCCC", "Thang máy", "Chỗ để xe", "Wifi"]

function blockLinks(e) {
    const val = e.target.value
    if (/https?:\/\//i.test(val)) {
        formData.value.description = val.replace(/https?:\/\/[\w\-._~:/?#\[\]@!$&'()*+,;=%]+/gi, '')
    }
}

function submitPost() {
    alert('Đăng tin thành công!')
    console.log(formData.value)
}
</script>
<style scoped>
.avatar-wrapper {
    position: relative;
    width: 120px;
    height: 120px;
}

.avatar-img {
    width: 120px;
    height: 120px;
    object-fit: cover;
    border: 4px solid #fff;
    transition: 0.3s;
}

.avatar-upload {
    position: absolute;
    bottom: 0;
    right: 0;
    background: #f2b80a;
    border-radius: 50%;
    padding: 6px;
    cursor: pointer;
    box-shadow: 0 0 6px rgba(0, 0, 0, 0.2);
    transition: background 0.3s;
    color: white;
}

.avatar-upload:hover {
    background: #d39e00;
}

.avatar-upload input[type='file'] {
    display: none;
}
</style>
