<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import {useForm } from '@inertiajs/inertia-vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import {reactive, ref} from 'vue';

let form = useForm({
    title: '',
    excerpt: '',
    body: '',
    category_id: '',
    image: '',
})


let submit = () => {
    form.post('/posts');
}



</script>

<template>
    <AppLayout title="Create a post">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create a post
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <form @submit.prevent="submit" class="max-w-md mx-auto mt-9 mb-9">
                        <InputLabel value="Title" for="title" />
                        <input v-model="form.title" class="rounded-lg border border-gray-400 p-2 mb-4 w-full mt-2" type="text" name="title" id="title">
                        <InputError :message="form.errors.title" class="mb-2" />
                            
                        <InputLabel value="Excerpt" for="excerpt" class="mb-2" />
                        <input v-model="form.excerpt" class="rounded-lg border border-gray-400 p-2 mb-4 w-full mt-2" type="text" name="excerpt" id="excerpt">
                        <InputError :message="form.errors.excerpt" />

                        <InputLabel value="Body" for="body" />
                        <textarea v-model="form.body" class="rounded-lg border border-gray-400 p-2 mb-4 w-full mt-2" type="text" name="body" id="body" />
                        <InputError :message="form.errors.body" class="mb-2" />
                        
                        <InputLabel value="Category" for="categories" />
                        <select v-model="form.category_id" id="categories" class="mt-2 mb-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                            <option v-for="category in $page.props.categories" :value="category.id" :key="category.id">{{category.title}}</option>
                        </select>
                        <InputError :message="form.errors.category_id"  class="mb-2" />

                        <InputLabel value="Image" for="image" />
                        <input type="file" id="image" @input="form.image = $event.target.files[0]" class="w-full mt-2" />
                        
                        <PrimaryButton type="submit" class="mt-9 block" :disabled="form.processing">Submit</PrimaryButton>
                    </form>
                </div>
            </div>        
         </div>
    </AppLayout>
</template>