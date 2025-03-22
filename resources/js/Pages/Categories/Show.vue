<script setup lang="ts">
import { defineProps } from 'vue';

interface Category {
    id: number;
    name: string;
}

defineProps<{ category: Category }>();

</script>

<template>
    <div>
        <h1>Category Details</h1>
        <div class="p-4 mb-4 border rounded shadow">
            <p class="text-lg font-semibold">ID: {{ category.id }}</p>
            <p class="text-lg">Name: {{ category.name }}</p>
        </div>
    </div>
    </template>
