<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import StatsSummary from '@/Components/Dashboard/StatsSummary.vue';
import ExpenseTrend from '@/Components/Dashboard/ExpenseTrend.vue';
import ExpenseByCategory from '@/Components/Dashboard/ExpenseByCategory.vue';
import TransactionsTable from '@/Components/Dashboard/TransactionsTable.vue';

const monthlyData = {
    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
    datasets: [{
        label: 'Expenses',
        data: [1200, 1900, 1500, 1800, 1400, 1600],
        borderColor: '#6366f1',
        tension: 0.4
    }]
};

const categoryData = {
    labels: ['Food', 'Transport', 'Shopping', 'Bills', 'Entertainment'],
    datasets: [{
        data: [30, 20, 25, 15, 10],
        backgroundColor: ['#6366f1', '#8b5cf6', '#d946ef', '#ec4899', '#f43f5e']
    }]
};

const recentTransactions = ref([
    { id: 1, description: 'Grocery Shopping', amount: -120.50, category: 'Food', date: '2025-01-30' },
    { id: 2, description: 'Electric Bill', amount: -85.00, category: 'Bills', date: '2025-01-29' },
    { id: 3, description: 'Monthly Salary', amount: 3000.00, category: 'Income', date: '2025-01-28' },
    { id: 4, description: 'Restaurant Dinner', amount: -45.00, category: 'Food', date: '2025-01-27' },
]);

const stats = {
    balance: {
        amount: 4520.00,
        trend: 'up',
        subtitle: '↑ 8.2% vs last month'
    },
    expenses: {
        amount: 1600.00,
        trend: 'down',
        subtitle: '↑ 12.5% vs last month'
    },
    income: {
        amount: 3000.00,
        trend: 'neutral',
        subtitle: 'Regular salary'
    },
    savings: {
        amount: 1400.00,
        trend: 'up',
        subtitle: '46.7% of income'
    }
};
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Financial Dashboard
                </h2>
                <button class="px-4 py-2 text-white bg-indigo-600 rounded-lg hover:bg-indigo-700">
                    Add Expense
                </button>
            </div>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <!-- Summary Cards -->
                <div class="mb-6">
                    <StatsSummary :stats="stats" />
                </div>

                <!-- Charts Section -->
                <div class="grid grid-cols-1 gap-6 mb-6 lg:grid-cols-2">
                    <ExpenseTrend :chart-data="monthlyData" />
                    <ExpenseByCategory :chart-data="categoryData" />
                </div>

                <!-- Recent Transactions -->
                <TransactionsTable :transactions="recentTransactions" />
            </div>
        </div>
    </AuthenticatedLayout>
</template>
