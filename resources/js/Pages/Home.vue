<script setup lang="ts">
import FilamentAdminHeader from '@/Components/FilamentAdminHeader.vue';
import Layout from '@/Layouts/Layout.vue';
import { Head, usePage } from '@inertiajs/vue3';

</script>

<template>

    <Head title="Home" />
    <FilamentAdminHeader />
    <Layout>
        <main
            class="bg-slate-600 text-slate-100 from-slate-500 to-sky-900 bg-gradient-to-b p-4">
            <h1 class="text-6xl text-center mb-4">Welcome</h1>
            <div class="text-center">
                <a href="/posts" class="px-4 py-2 rounded bg-slate-800 text-slate-100 text-2xl">Posts</a>
                <a href="/categories" class="px-4 py-2 rounded bg-slate-800 text-slate-100 text-2xl">Categories</a>
            </div>
        </main>
    </Layout>
</template>