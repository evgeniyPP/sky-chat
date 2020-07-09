<template>
    <!-- <p>
            <router-link :to="{ name: 'home' }">Home</router-link> |
            <router-link :to="{ name: 'hello' }">Hello World!</router-link>
        </p> -->
    <div class="container min-h-screen pt-4 root">
        <Groups />
        <router-view></router-view>
    </div>
</template>

<script>
import Groups from "../components/Groups.vue";

export default {
    components: {
        Groups
    }
};
</script>

<style>
.root {
    display: grid;
    grid-template-columns: 250px 1fr;
    grid-template-rows: 1fr;
}
</style>
