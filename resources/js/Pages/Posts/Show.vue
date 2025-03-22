<script setup lang="ts">
import { defineProps } from 'vue';
import { Category, Post, User } from '@/types';
import Layout from '@/Layouts/Layout.vue';

defineProps<{
    post: Post,
    category: Category,
    user: User,
}>();

</script>

<template>
    <Layout>
        <main class="container p-4 mx-auto">
            <div class="p-6 bg-white rounded-lg shadow-md">
                <h1 class="mb-4 text-3xl font-bold">{{ post.title }}</h1>
                <p class="text-gray-700">{{ post.content }}</p>
                <small>{{ category }}</small>
            </div>
        </main>
    </Layout>
</template>

<style scoped>
.container {
    max-width: 800px;
}
</style>