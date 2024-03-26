<script setup lang="ts">
import { reactive, inject } from "vue";
import { router } from "@inertiajs/vue3";
import ComponentAdd from "./ComponentAdd.vue";
import emitter from "../EventBus";

const form = reactive({
    name: null,
    password: null,
    email: null,
});

const submit = () => {
    router.visit("/store-user", {
        method: "post",
        data: form,
        onSuccess: () => {
            console.log("Success");
        },
    });
};

const customEvent = () => {
    console.log(123);
};

emitter.on("customEventBus", (payload) => {
    console.log("Received event:", payload);
});
</script>
<template>
    <form @submit.prevent="submit">
        <label for="name">First name:</label>
        <input id="name" v-model="form.name" />

        <label for="email">Email:</label>
        <input id="email" v-model="form.email" />

        <label for="password">Password:</label>
        <input type="password" id="password" v-model="form.password" />
        <button type="submit">Submit</button>
    </form>
    <ComponentAdd @customEvent="customEvent" />
</template>
