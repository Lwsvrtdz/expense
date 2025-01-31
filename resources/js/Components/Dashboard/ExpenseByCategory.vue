<script setup>
import { Doughnut } from 'vue-chartjs';
import { Chart as ChartJS, ArcElement, Tooltip, Legend } from 'chart.js';

ChartJS.register(ArcElement, Tooltip, Legend);

defineProps({
    chartData: {
        type: Object,
        required: true
    }
});
</script>

<template>
    <div class="p-6 bg-white rounded-lg shadow-sm">
        <h3 class="mb-4 text-lg font-medium text-gray-900">Expense by Category</h3>
        <Doughnut :data="chartData" :options="{ responsive: true }" class="h-64" />
    </div>
</template>
