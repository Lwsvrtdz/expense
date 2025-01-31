<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { ref } from 'vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import DangerButton from '@/Components/DangerButton.vue';

const props = defineProps({
    categories: Array
});

const formatCurrency = (amount) => {
    return new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'USD'
    }).format(amount);
};
</script>

<template>
    <Head title="Categories" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Categories</h2>
                <Link :href="route('categories.create')" class="px-4 py-2 bg-gray-800 text-white rounded-md hover:bg-gray-700">
                    Add Category
                </Link>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            <div v-for="category in categories" :key="category.id" 
                                class="bg-white rounded-lg shadow p-6 border border-gray-200">
                                <div class="flex items-center justify-between mb-4">
                                    <div class="flex items-center space-x-3">
                                        <div :style="{ backgroundColor: category.color }" 
                                            class="w-4 h-4 rounded-full"></div>
                                        <h3 class="text-lg font-semibold">{{ category.name }}</h3>
                                    </div>
                                    <div class="flex space-x-2">
                                        <Link :href="route('categories.edit', category.id)">
                                            <PrimaryButton>Edit</PrimaryButton>
                                        </Link>
                                        <Link :href="route('categories.destroy', category.id)" method="delete" as="button">
                                            <DangerButton>Delete</DangerButton>
                                        </Link>
                                    </div>
                                </div>
                                <p class="text-gray-600 mb-4">{{ category.description }}</p>
                                <div class="border-t pt-4">
                                    <div class="flex justify-between text-sm">
                                        <span class="text-gray-600">Total Expenses:</span>
                                        <span class="font-semibold">{{ formatCurrency(category.expenses_sum_amount || 0) }}</span>
                                    </div>
                                    <div class="flex justify-between text-sm mt-2">
                                        <span class="text-gray-600">Number of Expenses:</span>
                                        <span class="font-semibold">{{ category.expenses_count || 0 }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
