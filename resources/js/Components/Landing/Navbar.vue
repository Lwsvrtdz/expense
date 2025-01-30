<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
});
</script>

<template>
    <nav class="fixed top-0 z-50 w-full bg-white/80 backdrop-blur-lg dark:bg-gray-900/80">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div class="flex items-center">
                        <svg class="h-8 w-8 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="ml-2 text-xl font-bold text-gray-900 dark:text-white">ExpenseFlow</span>
                    </div>
                    <div class="hidden space-x-8 md:flex">
                        <a href="#features" class="text-gray-600 transition-colors hover:text-emerald-500 dark:text-gray-300 dark:hover:text-emerald-400">Features</a>
                        <a href="#testimonials" class="text-gray-600 transition-colors hover:text-emerald-500 dark:text-gray-300 dark:hover:text-emerald-400">Testimonials</a>
                        <a href="#pricing" class="text-gray-600 transition-colors hover:text-emerald-500 dark:text-gray-300 dark:hover:text-emerald-400">Pricing</a>
                    </div>
                </div>
                <div v-if="canLogin" class="flex items-center space-x-4">
                    <Link
                        v-if="$page.props.auth.user"
                        :href="route('dashboard')"
                        class="rounded-lg bg-emerald-500 px-4 py-2 text-white shadow-lg shadow-emerald-500/20 transition-all hover:bg-emerald-600 hover:shadow-emerald-500/40 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2"
                    >
                        Dashboard
                    </Link>
                    <template v-else>
                        <Link
                            :href="route('login')"
                            class="text-gray-600 transition-colors hover:text-emerald-500 dark:text-gray-300 dark:hover:text-emerald-400"
                        >
                            Log in
                        </Link>
                        <Link
                            v-if="canRegister"
                            :href="route('register')"
                            class="rounded-lg bg-emerald-500 px-4 py-2 text-white shadow-lg shadow-emerald-500/20 transition-all hover:bg-emerald-600 hover:shadow-emerald-500/40 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2"
                        >
                            Get Started
                        </Link>
                    </template>
                </div>
            </div>
        </div>
    </nav>
</template>
