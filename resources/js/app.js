import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import App from "./components/App";
import Home from "./components/Home";
import Group from "./components/Group";

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home
        },
        {
            path: "/group/:id",
            name: "group",
            component: Group
        }
    ]
});

const app = new Vue({
    el: "#app",
    components: { App },
    router
});
