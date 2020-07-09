<template>
    <aside class="flex flex-col items-center border-r-2">
        <span class="inline-flex rounded-md shadow-sm">
            <button
                type="button"
                class="inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50"
            >
                Добавить группу
            </button>
        </span>
        <ul class="mt-4 space-y-2">
            <li v-for="group of groups" :key="group.name">
                <a href="#">{{ group.name }}</a>
            </li>
        </ul>
    </aside>
</template>

<script>
export default {
    data() {
        return {
            groups: [
                {
                    name: "Группа 1"
                },
                {
                    name: "Чат город Москва"
                }
            ]
        };
    }
};
</script>
