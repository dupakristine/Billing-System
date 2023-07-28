<template>
    <Head title="View Client" />

    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl bg-blue-800 p-2 rounded-xl text-center text-gray-100 leading-tight mb-10" style="font-size: 30px;">{{ client.name }}</h2>
                <div class="overflow-hidden shadow-sm sm:rounded-lg text-white" style="font-size: 40px;">
                    <div>
                        <table class="bg-blue-800 shadow-2xl" style="font-size: 18px; width: 1225px;">
                            <thead >
                                <tr>

                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Phone Number</th>
                                    <th>Balance</th>
                                    <th>Credit Limit</th>
                                    <th>Subscription Plan</th>
                                    <th>Subscription Expiry Date</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr>


                                    <td>{{ client.email }}</td>
                                    <td>{{ client.address }}</td>
                                    <td>{{ client.phone }}</td>
                                    <td>{{ client.balance }}</td>
                                    <td>{{ client.credit_limit }}</td>
                                    <td>{{ client.subscription_plan }}</td>
                                    <td>{{ client.subscription_expiry_date }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="flex justify-center" style="font-size: 20px;">
                            <Link class="bg-red-400 w-40 text-center m-10 shadow-lg p-3 rounded-2xl text-white hover:bg-slate-700 duration-75 mr-1 mb-2" :href="'/clients/' + client.id" method="delete" as="button">Delete</Link>
                            <a class="bg-green-400 w-40 text-center m-10 shadow-lg p-3 rounded-2xl text-white hover:bg-slate-700 duration-75 mr-1 mb-2" :href="'/clients/edit/' + client.id" as="button">Edit</a>
                            <a :href="'/clients/email/' + client.id" class="bg-yellow-500 w-40 text-center m-10 shadow-lg p-3 rounded-2xl text-white hover:bg-slate-700 duration-75 mr-1 mb-2" as="button">Send Email</a>
                            <a as="button" :href="'/clients/pdf/' + client.id" target="_blank" class="bg-red-500 w-40 text-center m-10 shadow-lg p-3 rounded-2xl text-white hover:bg-slate-700 duration-75 mb-2">Export PDF</a>
                        </div>
                        <div class="mt-60 float-right">
                            <h1><b>Total:</b> {{ client.subscription_plan }}</h1>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { usePage } from '@inertiajs/vue3';
import { computed } from 'vue'

const page = usePage()
const user = computed(() => page.props.auth.user)

const props = defineProps({
    'client': Object
})
</script>
