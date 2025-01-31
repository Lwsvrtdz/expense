<script setup>
defineProps({
    transactions: {
        type: Array,
        required: true
    }
});
</script>

<template>
    <div class="bg-white rounded-lg shadow-sm">
        <div class="p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-medium text-gray-900">Recent Transactions</h3>
                <button class="text-sm text-indigo-600 hover:text-indigo-900">View All</button>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="text-sm text-gray-500 border-b">
                        <tr>
                            <th class="pb-3 text-left">Description</th>
                            <th class="pb-3 text-left">Category</th>
                            <th class="pb-3 text-left">Date</th>
                            <th class="pb-3 text-right">Amount</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm">
                        <tr v-for="transaction in transactions" :key="transaction.id" class="border-b last:border-b-0">
                            <td class="py-4">{{ transaction.description }}</td>
                            <td class="py-4">{{ transaction.category }}</td>
                            <td class="py-4">{{ transaction.date }}</td>
                            <td class="py-4 text-right" :class="transaction.amount > 0 ? 'text-green-600' : 'text-red-600'">
                                {{ transaction.amount > 0 ? '+' : '' }}${{ Math.abs(transaction.amount).toFixed(2) }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
