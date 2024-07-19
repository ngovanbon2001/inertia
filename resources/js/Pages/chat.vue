<template>
  <div>
    <div id="notification">Message:</div>
  </div>
</template>

<script setup>
import { onMounted } from 'vue';
import Echo from 'laravel-echo';
// import io from 'socket.io-client';

// window.io = io;
window.Echo = new Echo({
  broadcaster: 'socket.io',
  host: 'http://127.0.0.1:6001', // Đảm bảo port này đúng
  transports: ['websocket', 'polling'], // Chỉ định các loại transport
});

onMounted(() => {
  window.Echo.channel('laravel_database_users')
    .listen('.my-event', (data) => {
      console.log(data);
      let i = document.createElement('div');
      i.className = 'alert alert-success';
      i.innerHTML = `${data.data.message}`;
      document.getElementById('notification').appendChild(i);
    });
});
</script>

<style scoped>
.alert {
  padding: 10px;
  margin-bottom: 10px;
  border-radius: 4px;
  color: #fff;
}
.alert-success {
  background-color: #28a745;
}
</style>
