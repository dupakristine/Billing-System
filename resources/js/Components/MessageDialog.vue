<template>
    <div style="display: grid; place-content: center;">
        <div style="width: 1275px;">
        <div class="text-red-300 p-4 mx-8 mt-4 flex" v-if="messages.err" style="margin-bottom: -30px;">
            <div class="flex-1">
                {{ messages.err }}
            </div>

        </div>
        <div class="text-green-300 p-4 mx-8 mt-4" v-if="messages.info" style="margin-bottom: -30px;">
            {{ messages.info }}
        </div>
    </div>
    </div>

</template>

<script setup>

const props = defineProps({
    messages: Object
})

</script>
