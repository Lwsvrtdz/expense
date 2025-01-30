<script setup>
const features = [
    {
        title: 'Smart Expense Tracking',
        description: 'Effortlessly log and categorize your daily expenses with our intelligent categorization system.',
        icon: 'M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
        gradient: 'from-emerald-400 to-cyan-400',
    },
    {
        title: 'Visual Analytics',
        description: 'Gain insights into your spending patterns with beautiful interactive charts and detailed reports.',
        icon: 'M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z',
        gradient: 'from-purple-400 to-pink-400',
    },
    {
        title: 'Smart Budgeting',
        description: 'Set and track budgets with intelligent alerts to help you stay within your financial goals.',
        icon: 'M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z',
        gradient: 'from-orange-400 to-red-400',
    },
    {
        title: 'Bill Reminders',
        description: 'Never miss a payment with automated bill reminders and payment tracking.',
        icon: 'M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9',
        gradient: 'from-blue-400 to-indigo-400',
    },
    {
        title: 'Multi-Currency',
        description: 'Track expenses in multiple currencies with real-time exchange rate conversions.',
        icon: 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
        gradient: 'from-green-400 to-emerald-400',
    },
    {
        title: 'Secure Cloud Sync',
        description: 'Access your financial data securely from any device with real-time cloud synchronization.',
        icon: 'M12 15V3m0 12l-4-4m4 4l4-4M2 17l.621 2.485A2 2 0 004.561 21h14.878a2 2 0 001.94-1.515L22 17',
        gradient: 'from-teal-400 to-cyan-400',
    },
];
</script>

<template>
    <div id="features" class="bg-white py-24 dark:bg-gray-900">
        <div class="container mx-auto px-6">
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="bg-gradient-to-r from-emerald-600 to-teal-400 bg-clip-text text-3xl font-bold text-transparent sm:text-4xl">
                    Everything you need to manage your finances
                </h2>
                <p class="mt-4 text-lg text-gray-600 dark:text-gray-300">
                    Powerful features to help you take control of your financial life.
                </p>
            </div>
            <div class="mt-16 grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                <div
                    v-for="feature in features"
                    :key="feature.title"
                    class="group relative rounded-2xl bg-white p-8 shadow-lg shadow-gray-200/50 transition-all duration-300 hover:scale-105 hover:shadow-xl dark:bg-gray-800 dark:shadow-none"
                >
                    <div class="flex h-16 w-16 items-center justify-center rounded-xl bg-gradient-to-r shadow-lg transition-all duration-300 group-hover:scale-110"
                        :class="feature.gradient"
                    >
                        <svg
                            class="h-8 w-8 text-white"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                :d="feature.icon"
                            />
                        </svg>
                    </div>
                    <h3 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">
                        {{ feature.title }}
                    </h3>
                    <p class="mt-2 text-gray-600 dark:text-gray-300">
                        {{ feature.description }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>
