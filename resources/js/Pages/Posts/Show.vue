<script setup>
import Layout from "@/Shared/Layout.vue";
import { Method } from "@inertiajs/inertia";
import { Link } from "@inertiajs/inertia-vue3";
import moment from "moment";

defineProps({
  post: Array,
  authorFirstName: String,
});


</script>

<template>
    
<Layout>
    <main class="mt-10">

        <div class="mb-4 md:mb-0 w-full mx-auto relative">
            <div class="px-4 lg:px-0">
                <h2 class="text-4xl font-semibold text-gray-800 leading-tight">
               {{post[0].title}}
                </h2>
                <a 
                href="#"
                class="py-2 text-green-700 inline-flex items-center justify-center mb-2"
                >
                {{post[0].category_title}}
                </a>
            </div>
            <img :src="'/images/'+post[0].image" class="w-full object-cover lg:rounded" style="height: 28em;"/>
        </div>

    <div class="flex flex-col lg:flex-row lg:space-x-12">

        <div class="px-4 lg:px-0 mt-12 text-gray-700 text-lg leading-relaxed w-full lg:w-3/4">
            <p class="pb-6">
                {{post[0].body}}
            </p>
            <p class="border-l-4 border-gray-500 pl-4 mb-6 italic rounded">
                {{post[0].excerpt}}
            </p>
            <p class="pb-6">
                {{post[0].body}}
            </p>
            <p class="pb-6">
                {{post[0].body}}
            </p>

        </div>

        <div class="w-full lg:w-1/4 m-auto mt-12 max-w-screen-sm">
            <div class="p-4 border-t border-b md:border md:rounded">
                <div class="flex py-2">
                    <img :src="'/storage/'+post[0].user_avatar" class="w-10 h-10 rounded-full mr-4" alt="avatar"/>
                    <div>
                    <p class="font-semibold text-gray-700 text-sm"> {{post[0].user_name}} </p>
                    <p class="font-semibold text-gray-600 text-xs"> Editor </p>
                    </div>
                </div>
                <p class="text-gray-700 py-3">
                    {{post[0].user_name.split(' ')[0]}} writes about technology
                    Yourself required no at thoughts delicate landlord it be. Branched dashwood do is whatever it.
                </p>
                <button class="px-2 py-1 text-gray-100 bg-green-700 flex w-full items-center justify-center rounded">
                    Other posts by {{post[0].user_name.split(' ')[0]}}
                    <i class='bx bx-user-plus ml-2' ></i>
                </button>
            </div>
        </div>

        </div>
    </main>
</Layout>

</template>
