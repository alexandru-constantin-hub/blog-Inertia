<script setup>
import  {Link, usePage}  from "@inertiajs/inertia-vue3";
import moment from "moment";
import {Inertia} from "@inertiajs/inertia";


defineProps ({
    posts:Array
});


const submitPost = (id) => {
    return Inertia.get('/post/' + id)
}

const submitCategory = (id) => {
    return Inertia.get('/category/' + id)
}

const submitAuthor = (id) => {
    return Inertia.get('/authors/' + id)
}


</script>
<template>

    <div class="flex flex-col md:flex-row md:max-w-xl rounded-lg bg-white shadow-lg"
        v-for="post in posts"
        :key="post.id"
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
            :src="'/storage/'+post.image"
            alt="Post Image"
        />
        <div class="p-6 flex flex-col justify-between">
            <button @click="submitCategory(post.category_id)" class="py-2 text-green-700 inline-flex items-center mb-2" >
                {{post.category_title}}
            </button>
            <h5 class="text-gray-900 text-xl font-medium mb-2"><button @click="submitPost(post.id)">{{post.title}}</button></h5>
            <p class="text-gray-700 text-base mb-4">
              {{post.excerpt}}
            </p>
            <p class="text-gray-600 text-xs">Author: 
                <button @click="submitAuthor(post.user_id)" class="py-2 text-green-700 inline-flex items-center mb-2" >
                    {{post.user_name}}
            </button>
            </p>
            <p class="text-gray-600 text-xs">Publish date: {{ moment(post.updated_at).format("DD-MM-YYYY") }}</p>
        </div>
    </div>

    
</template>