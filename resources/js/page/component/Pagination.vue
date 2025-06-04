<template>
    <nav v-if="pageCount > 1">
        <ul class="pagination justify-content-center">
            <li class="page-item" :class="{ disabled: modelValue === 1 }">
                <button class="page-link" @click="$emit('update:modelValue', modelValue - 1)">«</button>
            </li>

            <li
                v-for="page in paginationRange"
                :key="page + '-page'"
                class="page-item"
                :class="{ active: page === modelValue, disabled: page === '...' }"
            >
                <button class="page-link" @click="$emit('update:modelValue', page)" :disabled="page === '...'">
                    {{ page }}
                </button>
            </li>

            <li class="page-item" :class="{ disabled: modelValue === pageCount }">
                <button class="page-link" @click="$emit('update:modelValue', modelValue + 1)">»</button>
            </li>
        </ul>
    </nav>
</template>

<script setup>
import { computed } from 'vue'
const props = defineProps({
    modelValue: Number,
    total: Number,
    perPage: Number
})

const pageCount = computed(() => Math.ceil(props.total / props.perPage))

const paginationRange = computed(() => {
    const total = pageCount.value
    const current = props.modelValue
    const delta = 2
    const range = []

    const start = Math.max(2, current - delta)
    const end = Math.min(total - 1, current + delta)

    if (start > 2) range.push('...')

    for (let i = start; i <= end; i++) {
        range.push(i)
    }

    if (end < total - 1) range.push('...')

    return [1, ...range, total > 1 ? total : null].filter(Boolean)
})
</script>

<style scoped>
.pagination {
    gap: 6px;
}

.page-item .page-link {
    border-radius: 8px;
    padding: 6px 14px;
    color: #333;
    border: 1px solid #dee2e6;
    transition: all 0.3s ease;
    font-weight: 500;
}

.page-item .page-link:hover {
    background-color: #f2b80a;
    color: #fff;
    border-color: #f2b80a;
}

.page-item.active .page-link {
    background-color: #f2b80a;
    color: white;
    border-color: #f2b80a;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
}

.page-item.disabled .page-link {
    color: #aaa;
    pointer-events: none;
    background-color: #f8f9fa;
    border-color: #dee2e6;
}
</style>
