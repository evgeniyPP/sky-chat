<template>
    <section class="p-4 space-y-4">
        <div
            v-for="message of messages"
            :key="message.id"
            class="overflow-hidden bg-white rounded-lg shadow"
        >
            <div class="px-2 py-3 sm:p-4">
                {{ message.text }}
            </div>
            <div class="px-2 py-2 border-t border-gray-200 sm:px-3">
                Автор: {{ message.user }}
            </div>
        </div>
    </section>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            messages: []
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
        }
    },
    watch: {
        $route() {
            this.fetchData();
        }
    }
};
</script>
