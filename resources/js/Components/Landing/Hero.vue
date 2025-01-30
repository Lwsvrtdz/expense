<script setup>
import { Link } from '@inertiajs/vue3';
import { onMounted } from 'vue';

defineProps({
    canRegister: Boolean,
});

onMounted(() => {
    const elements = document.querySelectorAll('.hero-animate');
    elements.forEach((el, index) => {
        el.style.animationDelay = `${0.2 * (index + 1)}s`;
        el.classList.add('animate-fade-up');
    });
});
</script>

<template>
    <div class="relative overflow-hidden bg-gradient-to-b from-emerald-50 to-white pt-32 dark:from-gray-900 dark:to-gray-800">
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-[url('/grid.svg')] bg-center [mask-image:linear-gradient(180deg,white,rgba(255,255,255,0))]"></div>
        </div>
        <div class="container relative mx-auto px-6 py-16 text-center md:py-24">
            <div class="mx-auto max-w-3xl">
                <h1 class="hero-animate bg-gradient-to-r from-emerald-600 to-teal-400 bg-clip-text text-4xl font-bold text-transparent md:text-5xl lg:text-6xl">
                    Smart Money Management Made Simple
                </h1>
                <p class="hero-animate mt-6 text-lg text-gray-600 dark:text-gray-300 md:text-xl">
                    Track expenses, analyze spending patterns, and achieve your financial goals with our intuitive expense tracker.
                    Take control of your finances today.
                </p>
                <div class="hero-animate mt-10 flex justify-center space-x-4">
                    <Link
                        v-if="canRegister"
                        :href="route('register')"
                        class="group relative inline-flex items-center justify-center overflow-hidden rounded-lg bg-emerald-500 px-8 py-3 text-lg font-semibold text-white transition duration-300 ease-out hover:scale-105"
                    >
                        <span class="absolute inset-0 h-full w-full bg-gradient-to-br from-emerald-600 via-emerald-500 to-teal-400 opacity-0 transition-opacity duration-300 ease-out group-hover:opacity-100"></span>
                        <span class="relative">Start Tracking Free</span>
                    </Link>
                    <a
                        href="#features"
                        class="group relative inline-flex items-center justify-center overflow-hidden rounded-lg border border-gray-200 bg-white px-8 py-3 text-lg font-semibold text-gray-900 transition duration-300 ease-out hover:scale-105 dark:border-gray-700 dark:bg-gray-800 dark:text-white"
                    >
                        <span class="absolute inset-0 h-full w-full bg-gradient-to-br from-gray-100 via-gray-50 to-white opacity-0 transition-opacity duration-300 ease-out group-hover:opacity-100 dark:from-gray-700 dark:via-gray-800 dark:to-gray-900"></span>
                        <span class="relative flex items-center">
                            Learn More
                            <svg class="ml-2 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </span>
                    </a>
                </div>
                <div class="hero-animate mt-16">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Trusted by thousands of users worldwide</p>
                    <div class="mt-4 flex justify-center space-x-8">
                        <div v-for="i in 4" :key="i" class="h-8 w-24 rounded-md bg-gray-200 dark:bg-gray-700"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
@keyframes fade-up {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fade-up {
    animation: fade-up 0.5s ease-out forwards;
}

.hero-animate {
    opacity: 0;
}
</style>
