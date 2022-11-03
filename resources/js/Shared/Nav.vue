<template>
    <nav>
        <ul>
            <li>
                <NavLink :href="route('home')" :active="route().current('home')">
                    Home
                </NavLink>
            </li>
            <li>
                <NavLink :href="route('dashboard')" :active="route().current('dashboard')">
                    Dashboard
                </NavLink>
            </li>
        </ul>
    </nav>
</template>

<script setup>
import {Link} from '@inertiajs/inertia-vue3';
import NavLink from '@/Components/NavLink.vue';

</script>