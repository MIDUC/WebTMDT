<template>
    <section class="mb-5">
        <h4 class="mb-3">{{ title }}</h4>
        <div class="row g-4">
            <div class="col-md-3" v-for="post in paginatedPosts" :key="post.id">
                <PostCard :post="post" />
            </div>
        </div>

        <Pagination
            v-model="currentPage"
            :total="posts.length"
            :perPage="perPage"
            class="mt-4"
        />
    </section>
</template>

<script setup>
import { ref, computed } from 'vue'
import PostCard from './PostCard.vue'
import Pagination from './Pagination.vue'

const props = defineProps({
    title: String,
    posts: Array,
    perPage: {
        type: Number,
        default: 4
    }
})

const currentPage = ref(1)

const paginatedPosts = computed(() => {
    if (!props.posts || !Array.isArray(props.posts)) return []
    const start = (currentPage.value - 1) * props.perPage
    return props.posts.slice(start, start + props.perPage)
})
</script>
