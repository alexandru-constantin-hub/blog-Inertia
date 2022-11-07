<template>
    <nav>
       <div class="mt-3 space-y-1 flex">
            <NavLink :href="route('home')" :active="route().current('home')" class="mr-3">
                    Home
            </NavLink>            
            <NavLink :href="route('posts')" :active="route().current('posts')" class="mr-3">
                    Posts
            </NavLink>
            <div class="flex items-center">
                <Dropdown align="right" width="48">
                    <template #trigger>
                        <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                            Categories
                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </template>
                    <template #content>
                        <DropdownLink v-for="category in $page.props.categories" as="button" @click="submit(category.id)" :key="category.id">
                            {{category.title}}
                        </DropdownLink>
                    </template>
                </Dropdown>
            </div>      
               
            
            <NavLink :href="route('dashboard')" :active="route().current('dashboard')" class="mr-3">
                    Dashboard
            </NavLink>
       </div>         
            
                
            
       
    </nav>
</template>

<script setup>
import {Inertia} from "@inertiajs/inertia";
import {Link} from '@inertiajs/inertia-vue3';
import NavLink from '@/Components/NavLink.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';


const submit = (id) => {
    Inertia.get('/category/' + id)
}




</script>