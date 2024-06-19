<template>
    <Form @submit="submit" :validation-schema="schema">
        <div style="display: flex; flex-direction: column; width: 20%">
            {{ errors }}
            <Field name="form.name" v-slot="{ field }">
                <label for="name">First name:</label>
                <input name="form.name" v-bind="field" v-model="form.name" />
                <ErrorMessage name="form.name" />
                <div v-if="errors.name">{{ errors.name }}</div>
            </Field>

            <Field name="form.email" v-slot="{ field }">
                <label for="email">Email:</label>
                <input name="form.email" v-bind="field" v-model="form.email" />
                <ErrorMessage name="form.email" />
                <div v-if="errors.email">{{ errors.email }}</div>
            </Field>

            <Field name="form.password" v-slot="{ field }">
                <label for="password">Password:</label>
                <input
                    type="password"
                    name="form.password"
                    v-bind="field"
                    v-model="form.password"
                />
                <ErrorMessage name="form.password" />
                <div v-if="errors.password">{{ errors.password }}</div>
            </Field>
        </div>
        <Test :user="user" :data="data"/>

        <div style="margin-top: 20px">
            <button type="submit">Submit</button>
            <ComponentAdd @customEvent="customEvent" />
        </div>
    </Form>
</template>
<script setup lang="ts">
import { ref, reactive, inject } from "vue";
import { router } from "@inertiajs/vue3";
import ComponentAdd from "./ComponentAdd.vue";
import { Form, Field, ErrorMessage } from "vee-validate";
import Test from "../Test.vue";
import * as yup from "yup";
import emitter from "../EventBus";

defineProps({ errors: Object });

const form = reactive({
    name: null,
    password: null,
    email: null,
});

const data = {
    name: "John Doe",
    age: 30,
};

const schema = yup.object({
    form: yup.object({
        name: yup.string().required().label("Name"),
        email: yup.string().required().email().label("Email"),
        password: yup.string().required().min(8).label("Password"),
    }),
});

const submit = () => {
    router.visit("/store-user", {
        method: "post",
        data: form,
        preserveState: true,
        onSuccess: () => {
            console.log("Success");
        },
        onError: (err) => {
            console.log(err);
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
