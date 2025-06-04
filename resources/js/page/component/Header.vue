<template>
    <DefaultLayout>
        <nav class="navbar navbar-expand-lg bg-white shadow-sm sticky-top">
            <div class="container-fluid">
                <!-- Logo -->
                <router-link class="navbar-brand" to="/">
                    <img src="../../assets/img/home2.png" alt="Logo" height="40" />
                </router-link>

                <!-- Toggle mobile -->
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarContent"
                    aria-controls="navbarContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navbar nội dung -->
                <div class="collapse navbar-collapse justify-content-between" id="navbarContent">
                    <!-- Menu giữa -->
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <router-link to="/home" class="nav-link px-3">Trang chủ</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/about" class="nav-link px-3">Giới thiệu</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/contact" class="nav-link px-3">Liên hệ</router-link>
                        </li>
                    </ul>

                    <!-- Bên phải -->
                    <div class="d-flex align-items-center gap-3">
                        <!-- Nút đăng tin -->
                        <router-link to="profile" style="text-decoration: none">
                            <button class="btn btn-warning fw-semibold d-flex align-items-center gap-2">
                                <font-awesome-icon :icon="['far', 'square-plus']" />
                                Đăng tin
                            </button>
                        </router-link>

                        <!-- Dropdown tài khoản -->
                        <div class="dropdown">
                            <button
                                class="btn p-0 border-0 bg-transparent dropdown-toggle"
                                type="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                            >
                                <img
                                    src="https://cdn-icons-png.flaticon.com/512/6681/6681204.png"
                                    alt="user"
                                    class="rounded-circle"
                                    style="width: 35px; height: auto"
                                />
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                                <li>
                                    <router-link to="/profile" class="dropdown-item d-flex align-items-center gap-2">
                                        <font-awesome-icon icon="user" /> Quản lý tài khoản
                                    </router-link>
                                </li>
                                <li>
                                    <router-link to="/profile" class="dropdown-item d-flex align-items-center gap-2">
                                        <font-awesome-icon icon="folder-open" /> Quản lý tin đăng
                                    </router-link>
                                </li>
                                <li><hr class="dropdown-divider" /></li>
                                <li>
                                    <a class="dropdown-item text-danger d-flex align-items-center gap-2" href="#">
                                        <font-awesome-icon icon="right-from-bracket" /> Thoát
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </DefaultLayout>
</template>

<style scoped>
.nav-link {
    font-weight: 500;
    border-radius: 20px;
    transition: background-color 0.3s;
    text-align: center;
}

.nav-link:hover {
    background-color: #f2b80a;
    color: #fff !important;
}

.dropdown-menu {
    min-width: 180px;
    border-radius: 8px;
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
    animation: fadeIn 0.2s ease-in-out;
}

.dropdown-item {
    font-size: 14px;
    transition: background 0.2s;
}

.dropdown-item:hover {
    background-color: #f8f9fa;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(5px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>
<script setup lang="ts">
</script>
