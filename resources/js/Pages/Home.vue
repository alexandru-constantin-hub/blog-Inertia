<script setup>
import {Inertia} from "@inertiajs/inertia";
import Layout from "@/Shared/Layout.vue";
import { Link } from "@inertiajs/inertia-vue3";
import Card from "@/Components/Card.vue";
import moment from "moment";

defineProps({
  posts: Array
});

</script>
<template>
  <Layout :categories="categories">
    <section class="py-24 flex items-center justify-center bg-white">
      <div class="mx-auto max-w-[43rem]">
        <div class="text-center">
          <p class="text-lg font-medium leading-8 text-indigo-600/95">Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
          <h1 class="mt-3 text-[3.5rem] font-bold leading-[4rem] tracking-tight text-black">Maxime mollitia, molestiae quas vel sint</h1>
          <p class="mt-3 text-lg leading-relaxed text-slate-400">Veritatis obcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam nihil, eveniet aliquid culpa officia aut! Impedit sit sunt quaerat, odit, tenetur error, harum nesciunt ipsum debitis quas aliquid.</p>
        </div>
        <div class="mt-6 flex items-center justify-center gap-4">
          <a href="#" class="transform rounded-md bg-indigo-600/95 px-5 py-3 font-medium text-white transition-colors hover:bg-indigo-700">Read more</a>
          <a href="/dashboard" class="transform rounded-md border border-slate-200 px-5 py-3 font-medium text-slate-900 transition-colors hover:bg-slate-50"> Create an account </a>
        </div>
      </div>
    </section>
    <div class="flex-grow border-t"></div>
    <section class="py-24 flex items-center justify-center bg-white">
      <div class="mx-auto max-w-[43rem]">
        <div class="text-center">
          <p class="text-lg font-medium leading-8 text-indigo-600/95">Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
          <h2 class="mt-3 text-[2.5rem] font-bold leading-[4rem] tracking-tight text-black">Latest posts</h2>
        </div>
        <div class="mt-6 flex items-center justify-center gap-4">
          <a href="/posts" class="transform rounded-md bg-indigo-600/95 px-5 py-3 font-medium text-white transition-colors hover:bg-indigo-700">Read all</a>
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
    <Card :posts="posts" />
    
    </div>
  </Layout>
</template>






