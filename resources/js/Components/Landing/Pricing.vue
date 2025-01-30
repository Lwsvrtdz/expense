<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    canRegister: Boolean,
});

const plans = [
    {
        name: 'Free',
        price: '$0',
        description: 'Perfect for getting started with expense tracking.',
        features: [
            'Basic expense tracking',
            'Monthly reports',
            'Up to 50 transactions/month',
            'Export to CSV',
            'Email support'
        ],
        cta: 'Get Started',
        featured: false
    },
    {
        name: 'Pro',
        price: '$9',
        description: 'Everything you need for personal finance management.',
        features: [
            'Unlimited expense tracking',
            'Advanced analytics',
            'Custom categories',
            'Budget planning',
            'Priority support',
            'Multiple accounts'
        ],
        cta: 'Start Free Trial',
        featured: true
    },
    {
        name: 'Business',
        price: '$29',
        description: 'Advanced features for small businesses and teams.',
        features: [
            'Everything in Pro',
            'Team collaboration',
            'Receipt scanning',
            'Expense approval flow',
            'API access',
            'Custom integration'
        ],
        cta: 'Contact Sales',
        featured: false
    }
];
</script>

<template>
    <section id="pricing" class="bg-white py-24 dark:bg-gray-900 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-4xl text-center">
                <h2 class="text-base font-semibold leading-7 text-emerald-600">Pricing</h2>
                <p class="mt-2 text-4xl font-bold tracking-tight text-gray-900 dark:text-white sm:text-5xl">
                    Choose the right plan for you
                </p>
            </div>
            <p class="mx-auto mt-6 max-w-2xl text-center text-lg leading-8 text-gray-600 dark:text-gray-300">
                Start with our free plan and upgrade as you grow. All plans include a 14-day free trial.
            </p>
            <div class="isolate mx-auto mt-16 grid max-w-md grid-cols-1 gap-y-8 sm:mt-20 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                <div v-for="(plan, planIdx) in plans" :key="plan.name" 
                    :class="[
                        'relative flex flex-col rounded-3xl p-8 ring-1',
                        plan.featured ? 
                            'bg-gray-900 ring-gray-900 dark:bg-emerald-500 dark:ring-emerald-500' : 
                            'ring-gray-200 dark:ring-gray-700',
                        planIdx === 1 ? 'lg:z-10 lg:rounded-l-none lg:rounded-r-none' : '',
                        planIdx === 0 ? 'lg:rounded-r-none' : '',
                        planIdx === 2 ? 'lg:rounded-l-none' : '',
                    ]"
                >
                    <div class="flex items-center justify-between gap-x-4">
                        <h3 
                            :class="[
                                'text-lg font-semibold leading-8',
                                plan.featured ? 'text-white' : 'text-gray-900 dark:text-white'
                            ]"
                        >
                            {{ plan.name }}
                        </h3>
                    </div>
                    <p 
                        :class="[
                            'mt-4 text-sm leading-6',
                            plan.featured ? 'text-gray-300' : 'text-gray-600 dark:text-gray-300'
                        ]"
                    >
                        {{ plan.description }}
                    </p>
                    <p class="mt-6 flex items-baseline gap-x-1">
                        <span 
                            :class="[
                                'text-4xl font-bold tracking-tight',
                                plan.featured ? 'text-white' : 'text-gray-900 dark:text-white'
                            ]"
                        >
                            {{ plan.price }}
                        </span>
                        <span 
                            :class="[
                                'text-sm font-semibold leading-6',
                                plan.featured ? 'text-gray-300' : 'text-gray-600 dark:text-gray-300'
                            ]"
                        >
                            /month
                        </span>
                    </p>
                    <ul 
                        :class="[
                            'mt-8 space-y-3 text-sm leading-6',
                            plan.featured ? 'text-gray-300' : 'text-gray-600 dark:text-gray-300'
                        ]"
                        role="list"
                    >
                        <li v-for="feature in plan.features" :key="feature" class="flex gap-x-3">
                            <svg class="h-6 w-5 flex-none" :class="plan.featured ? 'text-white' : 'text-emerald-600'" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                            </svg>
                            {{ feature }}
                        </li>
                    </ul>
                    <Link
                        v-if="canRegister"
                        :href="route('register')"
                        :class="[
                            'mt-8 block rounded-md px-3 py-2 text-center text-sm font-semibold leading-6 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2',
                            plan.featured ?
                                'bg-white text-gray-900 hover:bg-gray-100 focus-visible:outline-white' :
                                'bg-emerald-600 text-white hover:bg-emerald-500 focus-visible:outline-emerald-600'
                        ]"
                    >
                        {{ plan.cta }}
                    </Link>
                </div>
            </div>
        </div>
    </section>
</template>
