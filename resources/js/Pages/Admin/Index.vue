<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
// import MailCard from '@/Components/MailCard.vue';

const form = useForm({
    subject: '',
    message: ''
})

const submit = () => {
    form.post('/admin/send-mail')

    form.subject = ''
    form.message = ''
}

const props = defineProps({
    message: Object
})


var wordList = ["Attention Library Patrons!", "Alert: Book Return Reminder", "Important Notice: Book Returns", "Urgent Book Return Request", "Reminder: Return Your Books"];

const generateWord = () => {
  // Get a random word from the wordList
  const randomIndex = Math.floor(Math.random() * wordList.length);
  const generatedWord = wordList[randomIndex];

  // Assign the generated word to the input field
  form.subject = generatedWord;
};
// console.log(props.message)
</script>

<template>


<AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl bg-blue-800 p-2 rounded-xl text-center text-gray-100 leading-tight mb-10" style="font-size: 30px;">Send Message To All Customers</h2>
                <form @submit.prevent="submit">
                    <div class="overflow-hidden shadow-sm sm:rounded-lg text-white" style="font-size: 40px;">
                        <div>
                            <div class="">
                                <label for="subject" class="text-4xl"><b>Subject:</b> &nbsp;&nbsp;</label>
                                <input v-model="form.subject" type="text" id="subject"  class="border-0 text-white" style="background-color: transparent; border-bottom: 2px solid white; width: 395px;"> <br>
                                <label for="message" class="text-4xl"><b>Message:</b> </label>
                                <textarea style="background-color: transparent; " v-model="form.message" type="text" id="message" class="px-2 py-1 h-[120px] w-full rounded-md text-white"></textarea>
                                <button style="font-size: 20px;" type="submit" class="text-white px-4 py-1.5 rounded-md bg-blue-500">Send Message</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
