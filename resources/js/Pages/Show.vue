<script setup>
defineProps({ user: Object })
</script>
<template>
  <main>
    <div> email {{ user.email }}</div>
  </main>
</template>