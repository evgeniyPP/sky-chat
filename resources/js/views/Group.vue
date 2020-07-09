<template>
    <section class="relative p-4">
        <div v-if="messages && messages.length" class="space-y-4">
            <div
                v-for="message of messages"
                :key="message.id"
                class="overflow-hidden bg-white rounded-lg shadow"
            >
                <div class="px-6 py-3">
                    {{ message.text }}
                </div>
                <div class="px-6 py-2 border-t border-gray-200">
                    Автор: {{ message.user }}
                </div>
            </div>
        </div>
        <p v-else class="text-center">Сообщений нет</p>
        <div class="absolute bottom-0 w-full mb-4">
            <div class="flex mt-1 rounded-md shadow-sm">
                <input
                    v-model="newMessage"
                    type="text"
                    class="block w-full px-4 transition duration-150 ease-in-out rounded-none form-input rounded-l-md sm:text-sm sm:leading-5"
                    placeholder="Написать сообщение"
                />
                <button
                    v-on:click="addMessage"
                    class="inline-flex items-center px-4 py-2 -ml-px text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out border border-gray-300 rounded-r-md bg-gray-50 hover:text-gray-500 hover:bg-white focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700"
                >
                    Отправить
                </button>
            </div>
        </div>
    </section>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            messages: [],
            newMessage: ""
        };
    },
    created() {
        this.fetchData();
    },
    methods: {
        fetchData() {
            axios.get("/api/groups/" + this.$route.params.id).then(res => {
                this.messages = res.data;
            });
        },
        addMessage() {
            axios
                .post("/api/message", {
                    text: this.newMessage,
                    group_id: this.$route.params.id
                })
                .then(() => {
                    this.newMessage = "";
                    this.fetchData();
                });
        }
    },
    watch: {
        $route() {
            this.fetchData();
        }
    }
};
</script>
