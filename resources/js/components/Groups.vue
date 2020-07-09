<template>
    <aside class="flex flex-col items-center border-r-2">
        <span class="inline-flex rounded-md shadow-sm">
            <button
                v-on:click="addGroup"
                type="button"
                class="inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50"
            >
                Добавить группу
            </button>
        </span>
        <ul class="mt-4 space-y-2">
            <li v-for="group of groups" :key="group.id">
                <router-link :to="'/group/' + group.id">{{
                    group.name
                }}</router-link>
            </li>
        </ul>
    </aside>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            groups: []
        };
    },
    created() {
        this.fetchData();
    },
    methods: {
        fetchData() {
            axios.get("/api/groups").then(res => {
                this.groups = res.data;
            });
        },
        addGroup() {
            const name = prompt("Введите имя группы");

            if (!name) {
                return;
            }

            axios
                .post("/api/new-group", {
                    name
                })
                .then(() => {
                    this.fetchData();
                });
        }
    }
};
</script>
