<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    address: '',
    phone: '',
    balance: '',
    credit_limit: '',
    main_courses: '',
    subscription_plan: '',
    subscription_expiry_date: '',
    subscription_expiry_date: '',
    notes: '',
    pic: null
});

function submit() {
    // Check if the price field is empty
    if (form.price === '') {
        // If the price is empty, call the updatePrice function to calculate and set it
        updatePrice();
    }

    // Now, the form.price value should be updated with the calculated price
    form.post('/clients/');
}

</script>

<template>
    <Head title="Create Client" />

    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl bg-blue-800 p-2 rounded-xl text-center text-gray-100 leading-tight mb-10" style="font-size: 30px;">Create Bill</h2>
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


                                <div class="form-field text-black">
                                    <label for="pic">Cover Picture</label>
                                    <input required type="file" @input="form.pic = $event.target.files[0]" class="h-full border-gray-400 rounded text-center" accept="image/png" />
                                    <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                                        {{ form.progress.percentage }}%
                                    </progress>
                                </div>
                                <button class="mt-2 bg-blue-500 text-white rounded-2xl p-5 hover:bg-slate-50 hover:text-black duration-200" type="submit">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
