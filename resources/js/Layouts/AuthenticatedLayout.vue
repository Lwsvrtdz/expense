<script setup>
import { ref, onMounted, onBeforeUnmount } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/vue3';

const showingNavigationDropdown = ref(false);
const showSidebar = ref(window.innerWidth >= 768); // Show sidebar by default on larger screens

// Handle window resize
const handleResize = () => {
    showSidebar.value = window.innerWidth >= 768;
};

// Add resize event listener on component mount
onMounted(() => {
    window.addEventListener('resize', handleResize);
});

// Clean up event listener on component unmount
onBeforeUnmount(() => {
    window.removeEventListener('resize', handleResize);
});

const toggleSidebar = () => {
    showSidebar.value = !showSidebar.value;
};
</script>

<template>
    <div class="min-h-screen bg-gray-100">
        <!-- Top Navigation -->
        <nav class="bg-white border-b border-gray-100 fixed w-full z-10">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <!-- Left Side -->
                    <div class="flex items-center">
                        <!-- Sidebar Toggle Button for Mobile -->
                        <button
                            @click="toggleSidebar"
                            class="mr-2 p-2 rounded-md text-gray-500 hover:text-gray-900 hover:bg-gray-100 focus:outline-none md:hidden"
                        >
                            <svg 
                                class="h-6 w-6"
                                stroke="currentColor" 
                                fill="none" 
                                viewBox="0 0 24 24"
                            >
                                <path 
                                    v-if="showSidebar" 
                                    stroke-linecap="round" 
                                    stroke-linejoin="round" 
                                    stroke-width="2" 
                                    d="M6 18L18 6M6 6l12 12"
                                />
                                <path 
                                    v-else 
                                    stroke-linecap="round" 
                                    stroke-linejoin="round" 
                                    stroke-width="2" 
                                    d="M4 6h16M4 12h16M4 18h16"
                                />
                            </svg>
                        </button>
                        
                        <!-- Logo -->
                        <div class="shrink-0 flex items-center">
                            <Link :href="route('dashboard')">
                                <ApplicationLogo class="block h-9 w-auto fill-current text-gray-800" />
                            </Link>
                        </div>
                    </div>

                    <!-- Right Side -->
                    <div class="flex items-center">
                        <!-- Settings Dropdown -->
                        <div class="relative">
                            <Dropdown align="right" width="48">
                                <template #trigger>
                                    <span class="inline-flex rounded-md">
                                        <button
                                            type="button"
                                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                                        >
                                            {{ $page.props.auth.user.name }}

                                            <svg
                                                class="ml-2 -mr-0.5 h-4 w-4"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20"
                                                fill="currentColor"
                                            >
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"
                                                />
                                            </svg>
                                        </button>
                                    </span>
                                </template>

                                <template #content>
                                    <DropdownLink :href="route('profile.edit')"> Profile </DropdownLink>
                                    <DropdownLink :href="route('logout')" method="post" as="button">
                                        Log Out
                                    </DropdownLink>
                                </template>
                            </Dropdown>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <div class="flex pt-16">
            <!-- Sidebar -->
            <aside 
                :class="{'w-64': showSidebar, 'w-20': !showSidebar}"
                class="bg-white fixed left-0 h-full transition-all duration-300 ease-in-out border-r border-gray-200"
            >
                <div class="flex flex-col h-full">
                    <!-- Navigation Links -->
                    <nav class="flex-1 overflow-y-auto p-4 space-y-2">
                        <Link
                            :href="route('dashboard')"
                            class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors"
                            :class="{ 'bg-gray-100': route().current('dashboard') }"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                            </svg>
                            <span :class="{'opacity-0': !showSidebar}" class="ml-3 transition-opacity duration-300">
                                Dashboard
                            </span>
                        </Link>

                        <Link
                            :href="route('expenses.index')"
                            class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors"
                            :class="{ 'bg-gray-100': route().current('expenses.*') }"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z" />
                                <path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd" />
                            </svg>
                            <span :class="{'opacity-0': !showSidebar}" class="ml-3 transition-opacity duration-300">
                                Expenses
                            </span>
                        </Link>

                        <Link
                            :href="route('categories.index')"
                            class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors"
                            :class="{ 'bg-gray-100': route().current('categories.*') }"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z" />
                            </svg>
                            <span :class="{'opacity-0': !showSidebar}" class="ml-3 transition-opacity duration-300">
                                Categories
                            </span>
                        </Link>
                    </nav>
                </div>
            </aside>

            <!-- Main Content -->
            <main 
                :class="{'ml-64': showSidebar, 'ml-20': !showSidebar}"
                class="flex-1 transition-all duration-300 ease-in-out"
            >
                <!-- Page Heading -->
                <header v-if="$slots.header" class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <slot name="header" />
                    </div>
                </header>

                <!-- Page Content -->
                <div class="py-6">
                    <div class="mx-auto px-4 sm:px-6 lg:px-8">
                        <slot />
                    </div>
                </div>
            </main>
        </div>
    </div>
</template>

<style scoped>
.rotate-180 {
    transform: rotate(180deg);
}
</style>
