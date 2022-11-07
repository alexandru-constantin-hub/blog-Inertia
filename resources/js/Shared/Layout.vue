<script setup>
import Nav from '@/Shared/Nav.vue';
import Footer from '@/Shared/Footer.vue';

</script>

<template>
    <div class="max-w-screen-lg mx-auto">
        <Nav :categories="categories" />
        <slot />
        <Footer />
    </div>
   
</template>
