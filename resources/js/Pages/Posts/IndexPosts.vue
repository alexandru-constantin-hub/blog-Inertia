<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link, useForm } from '@inertiajs/inertia-vue3';
import { Inertia } from '@inertiajs/inertia';

defineProps({
  posts: Object
});

let deletePost = ($id) => {
    Inertia.delete('/dashboard/post/deletePost/' + $id);
}


</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div v-if="posts.length < 1" class="flex flex-col mt-9 mb-9">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="ml-20">
                                <p>You didn't publish any post</p>
                                <p>Why you don't <Link href="/dashboard/postCreate" class="text-blue-500 text-sm">create a post</Link></p>
                            </div>
                        </div>
                    </div>        
                    <div v-else class="flex flex-col mt-9 mb-9">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                <Link href="/dashboard/postCreate" class="ml-6 mb-9 text-blue-500 text-sm">Create a post</Link>
                                <div class="overflow-hidden">
                                    <table class="min-w-full">
                                        <thead class="bg-white border-b">
                                            <tr>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Image
                                            </th>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Title
                                            </th>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Excerpt
                                            </th>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Actions
                                            </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(post, index) in posts" :key="index" :class="{'bg-gray-100': $index % 2 === 0, 'bg-white': $index % 2 !== 0 }" class="border-b">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><img v-if="post.image" :src="'/storage/'+post.image" alt="Post Image" class="object-fill h-7 w-7"></td>
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    {{post.title}}
                                                </td>
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    {{post.excerpt}}
                                                </td>
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    <Link :href="'/dashboard/postEdit/'+post.id" class="text-blue-500 text-sm mr-4">Edit</Link>
                                                    <button @click="deletePost(post.id)" class="text-red-500 text-sm">Delete</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </AppLayout>
</template>