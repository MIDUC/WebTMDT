<template>
    <div class="login-wrapper d-flex align-items-center justify-content-center min-vh-100">
        <div class="overlay"></div>
        <div class="card shadow-lg p-4 login-card animate-fade position-relative">
            <h3 class="text-center fw-bold mb-3">📝 Đăng ký tài khoản</h3>

            <div class="d-flex gap-2 mb-4">
                <button class="btn btn-outline-danger w-50 d-flex align-items-center justify-content-center gap-2">
                    <font-awesome-icon :icon="['fab', 'google']" /> Google
                </button>
                <button class="btn btn-outline-primary w-50 d-flex align-items-center justify-content-center gap-2">
                    <font-awesome-icon :icon="['fab', 'facebook']" /> Facebook
                </button>
            </div>

            <form @submit.prevent="submitRegister">
                <div class="mb-3">
                    <label class="form-label">Họ tên</label>
                    <div class="input-group">
            <span class="input-group-text bg-white">
              <font-awesome-icon icon="user" class="text-secondary" />
            </span>
                        <input type="text" class="form-control" v-model="name" required />
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <div class="input-group">
            <span class="input-group-text bg-white">
              <font-awesome-icon icon="envelope" class="text-secondary" />
            </span>
                        <input type="email" class="form-control" v-model="email" required />
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Mật khẩu</label>
                    <div class="input-group">
            <span class="input-group-text bg-white">
              <font-awesome-icon icon="lock" class="text-secondary" />
            </span>
                        <input :type="showPassword ? 'text' : 'password'" class="form-control" v-model="password" required />
                        <button type="button" class="btn btn-outline-secondary" @click="togglePasswordVisibility">
                            <font-awesome-icon :icon="showPassword ? 'eye-slash' : 'eye'" />
                        </button>
                    </div>
                </div>
                <button type="submit" class="btn btn-orange w-100 fw-semibold d-flex justify-content-center align-items-center gap-2">
                    <font-awesome-icon icon="user-plus" /> Đăng ký
                </button>
                <div class="text-center mt-3 small">
                    Đã có tài khoản? <a href="#" class="text-decoration-none fw-semibold">Đăng nhập ngay</a>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

const name = ref('')
const email = ref('')
const password = ref('')
const showPassword = ref(false)

function togglePasswordVisibility() {
    showPassword.value = !showPassword.value
}

function submitRegister() {
    console.log('Register:', name.value, email.value, password.value)
    alert('Đăng ký thành công (fake)')
}
</script>

<style scoped>
.login-card {
    width: 100%;
    max-width: 460px;
    border-radius: 16px;
    background: white;
    animation: fadeInUp 0.4s ease;
    z-index: 2;
}

.login-wrapper {
    background-image: url('https://maisoninterior.vn/wp-content/uploads/2025/02/mau-van-phong-lam-viec-dep-02.jpg');
    background-size: cover;
    background-position: center;
    position: relative;
    padding: 20px;
}

.overlay {
    position: absolute;
    inset: 0;
    background: rgba(0, 0, 0, 0.4);
    z-index: 1;
}

input.form-control {
    border-radius: 0;
    transition: all 0.3s ease;
}

.input-group-text {
    border-radius: 12px 0 0 12px;
}

.input-group .btn {
    border-radius: 0 12px 12px 0;
}

input.form-control:focus {
    border-color: #198754;
    box-shadow: 0 0 0 0.2rem rgba(25, 135, 84, 0.25);
}

.animate-fade {
    animation: fadeInUp 0.5s ease-in-out;
}
.btn-orange {
    background-color: #f2b80a;
    border-color: #f2b80a;
    color: #fff;
}

.btn-orange:hover {
    background-color: #e0a800;
    border-color: #d39e00;
    color: #fff;
}
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: none;
    }
}
</style>
