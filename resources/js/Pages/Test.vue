<template>
  <div>
    <p>Props User: {{ user }}</p>
    <p>Attrs Data ID: {{ attrs['data'] }}</p>
  </div>
</template>

<script setup>
import { useAttrs } from 'vue';

// Định nghĩa props
const props = defineProps({
  user: String
});

// Lấy tất cả các thuộc tính không xác định trong props
const attrs = useAttrs();
</script>