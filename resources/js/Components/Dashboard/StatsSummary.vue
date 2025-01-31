<script setup>
import SummaryCard from './SummaryCard.vue';

defineProps({
    stats: {
        type: Object,
        required: true,
        // Expected shape:
        // {
        //     balance: { amount: number, trend: string, subtitle: string },
        //     expenses: { amount: number, trend: string, subtitle: string },
        //     income: { amount: number, trend: string, subtitle: string },
        //     savings: { amount: number, trend: string, subtitle: string }
        // }
    }
});
</script>

<template>
    <div class="grid grid-cols-1 gap-6 md:grid-cols-4">
        <SummaryCard
            title="Total Balance"
            :amount="stats.balance.amount"
            :subtitle="stats.balance.subtitle"
            :trend="stats.balance.trend"
        />
        <SummaryCard
            title="Monthly Expenses"
            :amount="stats.expenses.amount"
            :subtitle="stats.expenses.subtitle"
            :trend="stats.expenses.trend"
        />
        <SummaryCard
            title="Monthly Income"
            :amount="stats.income.amount"
            :subtitle="stats.income.subtitle"
            :trend="stats.income.trend"
        />
        <SummaryCard
            title="Monthly Savings"
            :amount="stats.savings.amount"
            :subtitle="stats.savings.subtitle"
            :trend="stats.savings.trend"
        />
    </div>
</template>
