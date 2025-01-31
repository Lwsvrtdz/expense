<script setup>
import { Line } from 'vue-chartjs';
import { Chart as ChartJS, CategoryScale, LinearScale, PointElement, LineElement, Title, Tooltip, Legend } from 'chart.js';

ChartJS.register(CategoryScale, LinearScale, PointElement, LineElement, Title, Tooltip, Legend);

defineProps({
    chartData: {
        type: Object,
        required: true
    }
});
</script>

<template>
    <div class="p-6 bg-white rounded-lg shadow-sm">
        <h3 class="mb-4 text-lg font-medium text-gray-900">Expense Trend</h3>
        <Line :data="chartData" :options="{ responsive: true }" class="h-64" />
    </div>
</template>
