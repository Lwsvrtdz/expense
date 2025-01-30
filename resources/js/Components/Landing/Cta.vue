<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    canRegister: Boolean,
});
</script>

<template>
    <div class="relative overflow-hidden bg-emerald-500 dark:bg-emerald-600">
        <div class="absolute inset-0">
            <svg class="absolute left-full top-0 -translate-x-1/2 -translate-y-3/4 transform lg:left-auto lg:right-full lg:translate-x-2/3 lg:translate-y-1/4" width="404" height="784" fill="none" viewBox="0 0 404 784">
                <defs>
                    <pattern id="8b1b5f72-e944-4457-af67-0c6d15a99f38" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                        <rect x="0" y="0" width="4" height="4" class="text-white/30" fill="currentColor" />
                    </pattern>
                </defs>
                <rect width="404" height="784" fill="url(#8b1b5f72-e944-4457-af67-0c6d15a99f38)" />
            </svg>
        </div>
        <div class="relative py-24">
            <div class="mx-auto max-w-7xl px-6 text-center">
                <h2 class="mb-4 text-3xl font-bold text-white md:text-4xl">
                    Ready to Transform Your Financial Life?
                </h2>
                <p class="mb-8 text-lg text-emerald-100">
                    Join thousands of users who have already taken control of their financial future.
                    Start your journey to financial freedom today.
                </p>
                <div class="flex flex-col items-center justify-center space-y-4 sm:flex-row sm:space-x-4 sm:space-y-0">
                    <Link
                        v-if="canRegister"
                        :href="route('register')"
                        class="group relative inline-flex items-center justify-center overflow-hidden rounded-lg bg-white px-8 py-3 text-lg font-semibold text-emerald-500 transition duration-300 ease-out hover:scale-105"
                    >
                        <span class="absolute inset-0 h-full w-full bg-gradient-to-br from-gray-100 via-white to-gray-100 opacity-0 transition-opacity duration-300 ease-out group-hover:opacity-100"></span>
                        <span class="relative flex items-center">
                            Get Started Free
                            <svg class="ml-2 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </span>
                    </Link>
                    <a
                        href="#features"
                        class="group relative inline-flex items-center justify-center overflow-hidden rounded-lg border-2 border-white px-8 py-3 text-lg font-semibold text-white transition duration-300 ease-out hover:scale-105"
                    >
                        <span class="absolute inset-0 h-full w-full bg-white opacity-0 transition-opacity duration-300 ease-out group-hover:opacity-10"></span>
                        <span class="relative">Learn More</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>