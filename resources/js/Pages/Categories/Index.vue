<script lang="ts" setup>
defineProps<{
    categories: Array <{
        id: number;
        name: string;
    } >;
}>();
</script>

<template>
    <div class="p-4">
        <h1 class="mb-4 text-2xl font-bold">Categories</h1>
        <ul class="pl-5 list-disc">
            <li v-for="category in categories" :key="category.id" class="mb-2">
                {{ category.name }}
            </li>
        </ul>
    </div>
</template>

<style scoped>
/* Add your styles here */
</style>