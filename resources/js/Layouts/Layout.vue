<script setup lang="ts">
import FilamentAdminHeader from '@/Components/FilamentAdminHeader.vue';
import { usePage } from '@inertiajs/vue3';
import { ref } from 'vue';
// import User from '@/types/index';

const user = usePage().props.auth.user;

const isOpen = ref(false);

// if(user.role === 'admin') {
//     console.log('User is an admin');
// }
</script>

<template>
    <FilamentAdminHeader v-if="user" />
    <div class="flex flex-col">
        <header class="px-2 py-1 flex justify-between items-center from-slate-600 to-slate-400 bg-gradient-to-br">
            <!-- <p class="text-lg text-slate-100">Hello, {{ usePage().props.auth.user?.name ?? 'Guest' }}</p> -->
            <nav class="bg-slate-400 text-white px-4 py-3 rounded-lg hover:shadow-md">
                <div class="sm:hidden">
                    <button @click="isOpen = !isOpen" class="focus:outline-none">
                        <svg width="24" height="24" stroke="currentColor" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3 6H21" stroke="black" stroke-width="2" />
                            <path d="M3 12H21" stroke="black" stroke-width="2" />
                            <path d="M3 18H21" stroke="black" stroke-width="2" />
                        </svg>
                    </button>
                </div>
                <Transition>
                    <ul :class="{ 'block': isOpen, 'hidden': !isOpen }"
                        class="flex flex-col sm:hidden space-y-2 transition-all duration-300">
                        <li><a href="/" class="hover:underline hover:bg-slate-800">Home</a></li>
                        <li><a href="/about" class="hover:underline">About</a></li>
                        <li><a href="/services" class="hover:underline">Services</a></li>
                        <li><a href="/contact" class="hover:underline">Contact</a></li>
                    </ul>
                </Transition>
                <Transition>
                    <ul class="hidden sm:flex sm:flex-row space-x-4 transition-all duration-300">
                        <li><a href="/" class="hover:underline">Home</a></li>
                        <li><a href="/about" class="hover:underline">About</a></li>
                        <li><a href="/services" class="hover:underline">Services</a></li>
                        <li><a href="/contact" class="hover:underline">Contact</a></li>
                    </ul>
                </Transition>
            </nav>
            <div class="flex items-center space-x-4 text-white">
                <a href="/admin/login"
                    class="hover:underline hover:bg-slate-600 bg-slate-700 text-slate-100 px-4 py-2 rounded-lg shadow">Login</a>
                <a href="/admin/register"
                    class="hover:underline hover:bg-slate-200 bg-slate-100 text-slate-700 px-4 py-2 rounded-lg shadow active:border active:border-spacing-3 active:border-slate-500">Register</a>
            </div>
        </header>
        <main class="flex-grow container-fluid h-screen from-slate-500 to-slate-700 bg-gradient-to-t">
            <slot />
        </main>
    </div>
</template>

<style scoped>
/* Add any additional styles here */
</style>