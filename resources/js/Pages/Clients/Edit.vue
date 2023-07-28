<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
    client: Object
})

const form = useForm({
    name: props.client.name,
    email: props.client.email,
    address: props.client.address,
    phone: props.client.phone,
    balance: props.client.balance,
    credit_limit: props.client.credit_limit,
    subscription_plan: props.client.subscription_plan,
    subscription_expiry_date: props.client.subscription_expiry_date,
    notes: props.client.notes,
    pic: props.client.pic,

})

function submit() {

    if (form.price === '') {
        // If the price is empty, call the updatePrice function to calculate and set it
        updatePrice();
    }

    // Now, the form.price value should be updated with the calculated price

    form.patch('/clients/' + props.client.id)
}


</script>

<template>
    <Head title="Edit Client" />

    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl bg-blue-800 p-2 rounded-xl text-center text-gray-100 leading-tight mb-10" style="font-size: 30px;">Edit</h2>
                <div class="overflow-hidden shadow-sm sm:rounded-lg text-white" style="font-size: 40px;">
                    <div style="font-size: 20px;">
                        <form @submit.prevent="submit" class="flex">
                            <div class="flex-1 pr-4">
                                <h4 class="text-xl mb-4">Information</h4>

                                <div class="form-field text-black " >
                                    <label for="name">Name</label>
                                    <input required type="text" id="name" v-model="form.name" class="border-0 text-white" style="background-color: transparent; border-bottom: 0px solid white;">
                                </div>

                                <div class="form-field text-black">
                                    <label for="email">Email</label>
                                    <input required type="email" id="email" v-model="form.email" class="border-0 text-white" style="background-color: transparent; border-bottom: 0px solid white;">
                                </div>

                                <div class="form-field text-black">
                                    <label for="address">Address</label>
                                    <input required type="text" id="address" v-model="form.address" class="border-0 text-white" style="background-color: transparent; border-bottom: 0px solid white;">
                                </div>

                                <div class="form-field text-black">
                                    <label for="phone">Phone Number</label>
                                    <input required type="text" id="phone" v-model="form.phone" class="border-0 text-white" style="background-color: transparent; border-bottom: 0px solid white;">
                                </div>

                                <div class="form-field text-black">
                                    <label for="balance">Balance</label>
                                    <input required type="number" id="balance" v-model="form.balance" class="border-0 text-white" style="background-color: transparent; border-bottom: 0px solid white;">
                                </div>

                                <div class="form-field text-black">
                                    <label for="credit_limit">Credit limit</label>
                                    <input required type="number" id="credit_limit" v-model="form.credit_limit" class="border-0 text-white" style="background-color: transparent; border-bottom: 0px solid white;">
                                </div>

                                <div class="form-field text-black">
                                    <label for="subscription_plan">Subscription Plan</label>
                                    <input required type="text" id="subscription_plan" v-model="form.subscription_plan" class="border-0 text-white" style="background-color: transparent; border-bottom: 0px solid white;">
                                </div>

                                <div class="form-field text-black">
                                    <label for="subscription_expiry_date">Subscription Expiry Date</label>
                                    <input required type="date" id="subscription_expiry_date" v-model="form.subscription_expiry_date" class="border-0 text-white" style="background-color: transparent; border-bottom: 0px solid white;">
                                </div>

                                <div class="form-field text-black">
                                    <label for="note">Note</label>
                                    <input required type="text" id="note" v-model="form.notes" class="border-0 text-white" style="background-color: transparent; border-bottom: 0px solid white;">
                                </div>
                                <button class="mt-2 bg-blue-500 text-white rounded-2xl p-5 hover:bg-slate-50 hover:text-black duration-200" type="submit">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </AuthenticatedLayout>
</template>
