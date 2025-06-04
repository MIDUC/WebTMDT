<template>
    <footer class="footer bg-dark text-white position-relative">
        <!-- Background image -->
        <img src="https://wikiland.vn/wp-content/uploads/bat-dong-san/du-an-bat-dong-san-wikiland.jpeg" class="footer-bg" alt="footer background" />

        <!-- Overlay content -->
        <div class="footer-overlay py-5">
            <div class="row list-block">
                <!-- Cột 1: Logo & mô tả -->
                <div class="col-md-3 mb-4 mb-md-0">
                    <h4 class="fw-bold">Bất Động Sản Market</h4>
                    <p class="text-white-50 small">
                        Nền tảng kết nối người mua và người bán nhà đất khắp cả nước. Chúng tôi luôn đồng hành cùng bạn.
                    </p>
                </div>

                <!-- Cột 2: Menu nhanh -->
                <div class="col-md-3 mb-4 mb-md-0">
                    <h5 class="fw-semibold mb-3">Liên kết nhanh</h5>
                    <ul class="list-unstyled text-white-50">
                        <li><a href="#" class="text-white-50 text-decoration-none">Trang chủ</a></li>
                        <li><a href="#" class="text-white-50 text-decoration-none">Dự án</a></li>
                        <li><a href="#" class="text-white-50 text-decoration-none">Tin tức</a></li>
                        <li><a href="#" class="text-white-50 text-decoration-none">Liên hệ</a></li>
                    </ul>
                </div>

                <!-- Cột 3: Liên hệ + Mạng xã hội -->
                <div class="col-md-3 mb-4 mb-md-0">
                    <h5 class="fw-semibold mb-3">Liên hệ</h5>
                    <p class="small mb-2"><font-awesome-icon icon="envelope" class="me-2" /> contact@batdongsanmarket.vn</p>
                    <p class="small mb-3"><font-awesome-icon icon="phone" class="me-2" /> 0123 456 789</p>

                    <div class="d-flex gap-3">
                        <a href="#" class="text-white-50 fs-5"><font-awesome-icon :icon="['fab', 'facebook']" /></a>
                        <a href="#" class="text-white-50 fs-5"><font-awesome-icon :icon="['fab', 'twitter']" /></a>
                        <a href="#" class="text-white-50 fs-5"><font-awesome-icon :icon="['fab', 'instagram']" /></a>
                        <a href="#" class="text-white-50 fs-5"><font-awesome-icon :icon="['fab', 'linkedin']" /></a>
                    </div>
                </div>

                <!-- ✅ Cột 4: Hình ảnh bất động sản -->
                <div class="col-md-3">
                    <h5 class="fw-semibold mb-3">Hình ảnh nổi bật</h5>
                    <div class="row g-2">
                        <div class="col-4">
                            <img src="https://cdn.hita.com.vn/storage/blog/meo-vat-gia-dinh/anh-ngoi-nha-9.jpg" alt="bds1" class="img-fluid rounded" />
                        </div>
                        <div class="col-4">
                            <img src="https://cdn.hita.com.vn/storage/blog/meo-vat-gia-dinh/anh-ngoi-nha-10.jpg" alt="bds1" class="img-fluid rounded" />
                        </div>
                        <div class="col-4">
                            <img src="https://cdn.hita.com.vn/storage/blog/meo-vat-gia-dinh/anh-ngoi-nha-11.jpg" alt="bds1" class="img-fluid rounded" />
                        </div>
                        <div class="col-4">
                            <img src="https://cdn.hita.com.vn/storage/blog/meo-vat-gia-dinh/anh-ngoi-nha-12.jpg" alt="bds1" class="img-fluid rounded" />
                        </div>
                        <div class="col-4">
                            <img src="https://cdn.hita.com.vn/storage/blog/meo-vat-gia-dinh/anh-ngoi-nha-13.jpg" alt="bds1" class="img-fluid rounded" />
                        </div>
                        <div class="col-4">
                            <img src="https://cdn.hita.com.vn/storage/blog/meo-vat-gia-dinh/anh-ngoi-nha-14.jpg" alt="bds1" class="img-fluid rounded" />
                        </div>
                    </div>
                </div>
            </div>


            <!-- Dòng bản quyền -->
            <hr class="border-light opacity-25 my-4" />
            <div class="text-center small text-white-50">
                © 2025 Bất Động Sản Market. All rights reserved.
            </div>
        </div>
    </footer>
</template>

<script setup>
</script>

<style scoped>
.footer {
    position: relative;
    overflow: hidden;
    min-height: 320px;
}

.footer-bg {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    z-index: 0;
    filter: brightness(0.4);
}

.footer-overlay {
    position: relative;
    z-index: 1;
    backdrop-filter: blur(3px);
    background-color: rgba(0, 0, 0, 0.4);
    border-top: 1px solid rgba(255, 255, 255, 0.1);
}
.list-block{
    padding-inline: 30px;
}
</style>
