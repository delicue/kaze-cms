<script setup lang="ts">
import { defineProps } from 'vue';

interface Post {
    id: number;
    title: string;
    content: string;
    // author_id
}

const props = defineProps<{ posts: Post[] }>();

</script>

<template>
    <div class="container p-4 mx-auto">
        <h1 class="mb-4 text-2xl font-bold">Posts</h1>
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
            <div v-for="post in posts" :key="post.id" class="p-4 bg-white rounded-lg shadow-md">
                <h2 class="mb-2 text-xl font-semibold">{{ post.title }}</h2>
                <p class="text-gray-700">{{ post.content }}</p>
            </div>
        </div>
    </div>
</template>

<style scoped>
.container {
    max-width: 1200px;
}
</style>