<template>

    <Head title="Clients" />

    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl bg-blue-800 p-2 rounded-xl text-center text-gray-100 leading-tight mb-10" style="font-size: 30px;">Billing</h2>
                <div class="overflow-hidden shadow-sm sm:rounded-lg text-white" style="font-size: 40px;">
                    <div>
                        <div>
                            <input type="text" @keydown.enter="search($event)" name="" id="text-black" class="mb-10 rounded-xl shadow-lg" placeholder="Search Bill" style="color: black;">
                            <Link href="/clients/create" class="bg-blue-700 shadow-lg mt-2 text-dark rounded-xl hover:bg-blue-800 duration-100 hover:shadow-none p-5 float-right" style="font-size: 20px;">+ Create Bill</Link>
                        </div>
                        <div class="w-[49%] mb-4" v-for="client in clients" :key="client.id">
                            <ClientCard :client="client" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>

</template>

<script setup>
import { computed } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import ClientCard from '@/Components/ClientCard.vue';
import { Head, Link, router } from '@inertiajs/vue3';

const props = defineProps({
    clients: Array
})

function search(e) {
    router.visit('/clients/search/' + e.target.value, {
        only: ['clients']
    })
}


const clientCount = computed(() => props.clients.length);

</script>

<style>
    .res_btn{
        background-color: green;
        color: white;
        border-radius: 20px;
        padding: 10px;

    }
</style>
