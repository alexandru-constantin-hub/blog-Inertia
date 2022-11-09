<script setup>
import  {Link}  from "@inertiajs/inertia-vue3";
defineProps ({
    elements:Array
});
</script>
<template>

<div class="flex justify-center">
    <div v-for="(element, index) in elements" :key="index" class="inline-flex space-x-2">
        <Link v-if="element.url" :href="element.url" v-html="element.label.replace('Next','').replace('Previous','')" as="button" class="mx-0.5 w-10 h-10 rounded-full text-indigo-600 transition-colors duration-150 rounded-full focus:shadow-outline hover:bg-indigo-100" :class="element.active == true ? 'shadow-outline bg-indigo-100' : '' " />
        <span v-else v-html="element.label.replace('Next','').replace('Previous','')" class="mx-0.5 pt-2" />
    </div>
    
</div>

    
</template>