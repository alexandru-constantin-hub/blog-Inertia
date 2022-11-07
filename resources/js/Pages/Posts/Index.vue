<script setup>

import Layout from "@/Shared/Layout.vue";
import  Link from "@inertiajs/inertia-vue3";
import Pagination from "@/Components/Pagination.vue";
import Card from "@/Components/Card.vue";
import moment from "moment";

defineProps({
  posts: Object,
});


</script>
<template>
  <Layout>
    <section class="py-24 flex items-center justify-center bg-white">
        <div class="mx-auto max-w-[43rem]">
            <div class="text-center">
            <p class="text-lg font-medium leading-8 text-indigo-600/95">Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
            <h1 class="mt-3 text-[3.5rem] font-bold leading-[4rem] tracking-tight text-black">All posts</h1>
            </div>
        </div>
    </section>
    <div
      class="
        grid grid-cols-1
        sm:grid-cols-1
        md:grid-cols-1
        lg:grid-cols-2
        xl:grid-cols-2
        gap-5
      "
    >
        <Card :posts="posts.data"/>
    
    </div>
    <div class="mt-10 pt-10 ">
      <Pagination :elements="posts.links" />
    </div>
  </Layout>
</template>






