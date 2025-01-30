<script setup>
import { Head } from '@inertiajs/vue3';
import { onMounted } from 'vue';
import Navbar from '@/Components/Landing/Navbar.vue';
import Hero from '@/Components/Landing/Hero.vue';
import Features from '@/Components/Landing/Features.vue';
import Testimonials from '@/Components/Landing/Testimonials.vue';
import Pricing from '@/Components/Landing/Pricing.vue';
import Cta from '@/Components/Landing/Cta.vue';
import Footer from '@/Components/Landing/Footer.vue';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
});

onMounted(() => {
    // Add smooth scroll behavior for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
});
</script>

<template>
    <Head title="ExpenseFlow - Smart Personal Finance Tracker" />
    
    <div class="min-h-screen bg-white antialiased dark:bg-gray-900">
        <Navbar :can-login="canLogin" :can-register="canRegister" />
        <Hero :can-register="canRegister" />
        <Features />
        <Testimonials />
        <Pricing :can-register="canRegister" />
        <Cta :can-register="canRegister" />
        <Footer />
    </div>
</template>

<style>
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
    animation: fade-up 0.5s ease-out;
}
</style>
