<script setup>
import Header from '../component/Header.vue'
import Footer from '../component/Footer.vue'
</script>

<template>
    <div>
        <Header/>

        <main class="main-content">
            <slot/>
        </main>

        <Footer/>
    </div>
</template>


<style scoped>
.main-content {
    min-height: calc(100vh - 160px);
    padding: 24px;
}
</style>
