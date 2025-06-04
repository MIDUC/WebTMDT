<template>
    <div class="login-wrapper d-flex align-items-center justify-content-center min-vh-100 bg-light">
        <div class="card shadow-lg p-4 login-card animate-fade">
            <h3 class="text-center text-primary fw-bold mb-4">🔐 Đăng nhập Admin</h3>
            <form @submit.prevent="submitLogin">
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
                <button type="submit" class="btn btn-primary w-100 fw-semibold d-flex justify-content-center align-items-center gap-2">
                    <font-awesome-icon icon="right-to-bracket" /> Đăng nhập
                </button>
            </form>
        </div>
    </div>
</template>

<script setup>
import {ref} from 'vue'
import {FontAwesomeIcon} from '@fortawesome/vue-fontawesome'

const email = ref('')
const password = ref('')
const showPassword = ref(false)

function togglePasswordVisibility() {
    showPassword.value = !showPassword.value
}

function submitLogin() {
    console.log('Login with:', email.value, password.value)
    // TODO: Gọi API xử lý đăng nhập
    alert('Đăng nhập thành công (fake)')
}
</script>

<style scoped>
.login-card {
    width: 100%;
    max-width: 420px;
    border-radius: 16px;
    background: white;
    animation: fadeInUp 0.4s ease;
}

.login-wrapper {
    background-image: url('https://images.unsplash.com/photo-1570129477492-45c003edd2be?auto=format&fit=crop&w=1470&q=80');
    background-size: cover;
    background-position: center;
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
    border-color: #0d6efd;
    box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
}

.animate-fade {
    animation: fadeInUp 0.5s ease-in-out;
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
