<template>
<div style="width: 1216px; cursor: pointer;" @click="open(client)">
    <div class="flex">
        <div class="cursor-pointer rounded-xl" >
            <img :src="client.picUrl" alt="Product photo" class="rounded-xl w-[350px] h-[315px] border flex justify-center items-center bg-gray-300 text-center">
        </div>
        <div class="ml-3 flex bg-blue-800 hover:bg-blue-900 duration-100 rounded-xl shadow-lg justify-between" style="width: 1000px;">
            <div class="rounded-xl p-3 " style="font-size: 15px;">
            <div> <b>Name:</b> {{ client.name }}</div>
            <div> <b>Email:</b> {{ client.email }}</div>
            <div> <b>Address:</b> {{ client.address }}</div>
            <div> <b>Phone Number:</b> {{ client.phone }}</div>
            <div> <b>Balance:</b> {{ client.balance }}</div>
            <div> <b>Credit Limit:</b> {{ client.credit_limit }}</div>
            <div> <b>Subscription Plan:</b> {{ client.subscription_plan }}</div>
            <div> <b>Subscription Expiry Date:</b> {{ client.subscription_expiry_date }}</div>
            <div class="p-5 rounded-xl flex">
                    <label :for="'enabled' + '-' + client.id" class="switch">
                        <input type="checkbox" :id="'enabled' + '-' + client.id" :checked="client.enabled" @change.prevent="toggleEnabled(client)">
                        <span class="slider round"></span>
                    </label> <br>
                    <h1 style="font-size: 20px; margin-left: 15px;">
                        <b>{{ client.enabled ? 'Done' : 'Pending' }}</b>
                    </h1>
                </div>
            </div>
            <div class="p-3 flex-none mt-4 float-end mr-2">

                <textarea style="cursor: pointer; width: 530px; size-adjust: unset;" disabled class="text-white ml-3 rounded-xl shadow-xl bg-blue-700 border-0" name="" id="" cols="30" rows="10">Notes: {{ client.notes }}</textarea>

            </div>
        </div>
    </div>
</div>
</template>
<style scoped>
    .switch {
    position: relative;
    display: inline-block;
    width: 100px;
    height: 34px;
    }

    /* Hide default HTML checkbox */
    .switch input {
    opacity: 0;
    width: 0;
    height: 0;
    }

    /* The slider */
    .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #6a6a6a;
    -webkit-transition: .4s;
    transition: .4s;
    }

    .slider:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 5px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
    }

    input:checked + .slider {
    background-color: #20c747;
    }

    input:focus + .slider {
    box-shadow: 0 0 1px #1ac233;
    }

    input:checked + .slider:before {
    -webkit-transform: translateX(26spx);
    -ms-transform: translateX(26px);
    transform: translateX(64px);
    }


    /* Rounded sliders */
    .slider.round {
    border-radius: 34px;
    }

    .slider.round:before {
    border-radius: 50%;
    }
</style>

<script setup>
import { router } from '@inertiajs/vue3';


const props = defineProps({
    client: Object
})

function open(client) {
    router.visit('/clients/' + client.id)
}


function toggleEnabled(client) {
    router.visit('/clients/toggle/' + client.id,{
        method: 'post',
        preserveScroll: true
    })
}

</script>
