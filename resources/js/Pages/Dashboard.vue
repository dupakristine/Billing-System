<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { computed } from 'vue';
import NavLink from '@/Components/NavLink.vue';

const props = defineProps({
    clients: Array,
    users: Array
})

const clientCount = computed(() => props.clients ? props.clients.length : 0);
const userCount = computed(() => props.users ? props.users.length : 0);

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h2 class="font-Ink Free text-xl bg-blue-500 p-2 rounded-xl text-center text-gray-100 leading-tight mb-10" style="font-size: 50px;">The billing system ensures that customers are billed accurately and in a timely manner, which helps maintain a healthy cash flow and financial records for the business.</h2>
                <div class="overflow-hidden shadow-sm sm:rounded-lg text-white" style="font-size: 40px;">
                    <div>

                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
