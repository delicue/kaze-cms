<script setup lang="ts">
import Layout from '@/Layouts/Layout.vue';
// import { Category, Post, User } from '@/types';

interface Post {
    id: number,
    title: string,
    content: string,
    user: User,
    category: Category,
}

interface User {
    id: number,
    name: string,
}

interface Category {
    id: number,
    name: string,
}

defineProps<{
    posts: Post[],
}>();

</script>

<template>
    <Layout>
        <div class="container p-4 mx-auto" :href="'/posts/{{ post.id }}'">
            <h1 class="mb-4 text-2xl text-slate-200 font-bold">Posts</h1>
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                <div v-for="post in posts" :key="post.id" class="p-4 bg-white rounded-lg shadow-md">
                    <h2 class="mb-2 text-xl font-semibold">{{ post.title }}</h2>
                    <p class="text-gray-700">{{ post.content }}</p>
                    <!-- <small class="text-gray-500 place-">{{ users.find((user: User) => user.id === post.user_id)?.name }}</small> -->
                </div>
            </div>
            <!-- <h1 class="mb-4 text-2xl font-bold">Categories</h1>
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                <div v-for="category in categories" :key="category.id" class="p-4 bg-white rounded-lg shadow-md">
                    <h2 class="mb-2 text-xl font-semibold">{{ category.name }}</h2>
                </div>
            </div>
            <h1 class="mb-4 text-2xl font-bold">Users</h1>
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                <div v-for="user in users" :key="user.id" class="p-4 bg-white rounded-lg shadow-md">
                    <h2 class="mb-2 text-xl font-semibold">{{ user.name }}</h2>
                </div>
            </div> -->
        </div>
    </Layout>
</template>

<style scoped>
.container {
    max-width: 1200px;
}
</style>