<script setup>
import {Inertia} from "@inertiajs/inertia";
import Layout from "@/Shared/Layout.vue";
import { Link } from "@inertiajs/inertia-vue3";
import moment from "moment";

defineProps({
  posts: Object,
});

const submit = (id) => {
    Inertia.get('/post/' + id)
}
</script>
<template>
  <Layout>
    <div
      class="
        p-10
        grid grid-cols-1
        sm:grid-cols-1
        md:grid-cols-1
        lg:grid-cols-2
        xl:grid-cols-3
        gap-5
      "
    >
        <div class="flex flex-col md:flex-row md:max-w-xl rounded-lg bg-white shadow-lg"
        v-for="post in posts.data"
        :key="post.id"
        :href="post.url"
        >
          <img
            class="
              w-full
              h-96
              md:h-auto
              object-cover
              md:w-48
              rounded-t-lg
              md:rounded-none md:rounded-l-lg
            "
            src="https://mdbootstrap.com/wp-content/uploads/2020/06/vertical.jpg"
            alt=""
          />
          <div class="p-6 flex flex-col justify-between">
            <h5 class="text-gray-900 text-xl font-medium mb-2"><button @click="submit(post.id)">{{post.title}}</button></h5>
            <p class="text-gray-700 text-base mb-4">
              {{post.excerpt}}
            </p>
            <p class="text-gray-600 text-xs">Author: {{post.user_name}}</p>
            <p class="text-gray-600 text-xs">Publish date: {{ moment(post.updated_at).format("DD-MM-YYYY") }}</p>
          </div>
        </div>
    
    </div>
    <div class="mt-6">
      <template v-for="link in posts.links" :key="link.url">
        <Link v-if="link.url" :href="link.url" v-html="link.label" />
        <span v-else v-html="link.label" />
      </template>
    </div>
  </Layout>
</template>






