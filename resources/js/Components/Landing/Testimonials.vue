<template>
    <section class="bg-white py-24 dark:bg-gray-900 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-xl text-center">
                <h2 class="text-lg font-semibold leading-8 tracking-tight text-emerald-600">Testimonials</h2>
                <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 dark:text-white sm:text-4xl">
                    Loved by users everywhere
                </p>
            </div>
            <div class="mx-auto mt-16 flow-root max-w-2xl sm:mt-20 lg:mx-0 lg:max-w-none">
                <div class="-mt-8 sm:-mx-4 sm:columns-2 sm:text-[0] lg:columns-3">
                    <div v-for="testimonial in testimonials" :key="testimonial.author" class="pt-8 sm:inline-block sm:w-full sm:px-4">
                        <figure class="rounded-2xl bg-gray-50 p-8 text-sm leading-6 dark:bg-gray-800">
                            <blockquote class="text-gray-900 dark:text-gray-100">
                                <p>"{{ testimonial.content }}"</p>
                            </blockquote>
                            <figcaption class="mt-6 flex items-center gap-x-4">
                                <img class="h-10 w-10 rounded-full bg-gray-50" :src="testimonial.image" :alt="testimonial.author">
                                <div>
                                    <div class="font-semibold text-gray-900 dark:text-white">{{ testimonial.author }}</div>
                                    <div class="text-gray-600 dark:text-gray-400">{{ testimonial.role }}</div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
const testimonials = [
    {
        content: "ExpenseFlow has completely transformed how I manage my finances. The insights and analytics help me make better financial decisions.",
        author: "Sarah Johnson",
        role: "Small Business Owner",
        image: "https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
    },
    {
        content: "The budgeting features are incredible. I've saved more money in the last 3 months than I did all of last year.",
        author: "Michael Chen",
        role: "Software Engineer",
        image: "https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
    },
    {
        content: "Simple, intuitive, and powerful. ExpenseFlow is exactly what I needed to keep track of my personal finances.",
        author: "Emily Rodriguez",
        role: "Freelance Designer",
        image: "https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
    }
];
</script>
