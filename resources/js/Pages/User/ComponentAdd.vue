<template>
    <button @click="handleClick">Emit Event</button>
    <button @click="handleClickEventBus">EventBus</button>
</template>

<script setup lang="ts">
import { defineEmits } from 'vue';
import emitter from "../EventBus";

const emit = defineEmits(['customEvent', 'customEventBus'])

const handleClick = () => {
    emit("customEvent");
};

const handleClickEventBus = () => {
  emitter.emit('customEventBus', 'Data to pass');
};
</script>