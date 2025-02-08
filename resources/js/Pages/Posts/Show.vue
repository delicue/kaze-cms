<script setup lang="ts">
import { defineProps } from 'vue';

interface Post {
    title: string;
    content: string;
}

const props = defineProps<{ post: Post }>();
</script>

<template>
    <div class="container p-4 mx-auto">
        <div class="p-6 bg-white rounded-lg shadow-md">
            <h1 class="mb-4 text-3xl font-bold">{{ post.title }}</h1>
            <p class="text-gray-700">{{ post.content }}</p>
        </div>
    </div>
</template>

<style scoped>
.container {
    max-width: 800px;
}
</style>