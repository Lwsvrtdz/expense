<script setup>
defineProps({
    title: {
        type: String,
        required: true
    },
    amount: {
        type: Number,
        required: true
    },
    subtitle: {
        type: String,
        required: true
    },
    trend: {
        type: String,
        default: 'neutral' // 'up', 'down', or 'neutral'
    }
});
</script>

<template>
    <div class="p-6 bg-white rounded-lg shadow-sm">
        <h3 class="text-sm font-medium text-gray-500">{{ title }}</h3>
        <p class="text-2xl font-semibold text-gray-900">${{ amount.toFixed(2) }}</p>
        <span class="text-sm" :class="{
            'text-green-600': trend === 'up',
            'text-red-600': trend === 'down',
            'text-gray-500': trend === 'neutral'
        }">{{ subtitle }}</span>
    </div>
</template>
