<template>
<Head title="Admin" />

<AuthenticatedLayout>
    <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">All Requests (3)</h2>
    </template>

        <!-- <div v-if="props.message.info" class="py-5 rounded-lg text-green-600 text-center text-3xl">
            {{ props.message.info }}
        </div>
        <div v-if="props.message.error" class="py-5 rounded-lg text-red-600 text-center text-3xl">
            {{ props.message.error }}
        </div> -->

    <div class="py-12 text-white" style="display: grid; place-content: center;">
        <div class="flex items-center flex-wrap" style="width: 1210px;">
            <!-- <MailCard :subject="form.subject" :message="form.message"  /> -->
            <div class="p-4 rounded-lg w-1/4 bg-slate-700 p-10 m-10" style="width: 500px;">
                <b>Name:</b> Kristine Dupa  <br> <br>
                <b>ID Number:</b> 11816 <br> <br>
                <b>Book Requested:</b> hesintoher <br> <br>
                <b>Course:</b> BSIT <br> <br>
                <b>Email:</b> dupakristine96@gmail.com &nbsp; <button class="bg-green-600 p-2 rounded-xl" @click="copyEmail()">Copy Email</button> <br> <br>
            </div>

            <div class="p-4 rounded-lg w-1/4 bg-slate-700 p-10 m-10" style="width: 500px;">
                <b>Name:</b> denice Aparicio <br> <br>
                <b>ID Number:</b> 18187 <br> <br>
                <b>Book Requested:</b> wreck <br> <br>
                <b>Course:</b> BSIT <br> <br>
                <b>Email:</b> denicejaneaparicio1402@gmail.com &nbsp; <button class="bg-green-600 p-2 rounded-xl" @click="copyEmail1()">Copy Email</button> <br> <br>
            </div>


            <div class="p-4 rounded-lg w-1/4 bg-slate-700 p-10 m-10" style="width: 500px;">
                <b>Name:</b> joy Lauros<br> <br>
                <b>ID Number:</b> 1237 <br> <br>
                <b>Book Requested:</b> Resort<br> <br>
                <b>Course:</b> BSIT <br> <br>
                <b>Email:</b> secretkim@gmail.com &nbsp; <button class="bg-green-600 p-2 rounded-xl" @click="copyEmail2()">Copy Email</button> <br> <br>
            </div>



        </div>
    </div>
</AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';

const copyEmail = () =>{
    var tempInput = document.createElement('input');
    var email = 'dupakristine96@gmail.com';
    tempInput.value = email;
    document.body.appendChild(tempInput);
    tempInput.select();
    document.execCommand('copy');
    document.body.removeChild(tempInput);
    alert('Email copied to clipboard: ' + email);
}

const copyEmail1 = () =>{
    var tempInput = document.createElement('input');
    var email = 'denicejaneaparicio1402@gmail.com';
    tempInput.value = email;
    document.body.appendChild(tempInput);
    tempInput.select();
    document.execCommand('copy');
    document.body.removeChild(tempInput);
    alert('Email copied to clipboard: ' + email);
}


const copyEmail2 = () =>{
    var tempInput = document.createElement('input');
    var email = 'secretkim@gmail.com';
    tempInput.value = email;
    document.body.appendChild(tempInput);
    tempInput.select();
    document.execCommand('copy');
    document.body.removeChild(tempInput);
    alert('Email copied to clipboard: ' + email);
}




</script>
