<script setup>
import DefaultLayout from '../layout/DefaultLayout.vue'
import Slider from '../component/Slider.vue'
import PostFilter from '../component/PostFilter.vue'
import PostSection from '../component/PostSection.vue'
import { ref } from 'vue'
import postsData from '../../data/posts.js'


// Giả lập phân loại post
const hotPosts = ref(postsData.filter(p => p.category === 'hot'))
const recentPosts = ref(postsData.filter(p => p.category === 'recent'))
const ownerPosts = ref(postsData.filter(p => p.category === 'owner'))
const verifiedPosts = ref(postsData.filter(p => p.category === 'verified'))
</script>
<template>
    <DefaultLayout>
        <div class="container py-4">
            <Slider />
            <PostFilter />

            <!-- Các block chuyên mục -->
            <PostSection title="Căn hộ hot" :posts="hotPosts" />
            <PostSection title="Mới cập nhật" :posts="recentPosts" />
            <PostSection title="Chính chủ" :posts="ownerPosts" />
            <PostSection title="Đã xác thực" :posts="verifiedPosts" />
        </div>
    </DefaultLayout>
</template>


