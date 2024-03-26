<script setup>
import { Link } from '@inertiajs/vue3'
</script>
<template>
  <main>
    <header>
      <Link href="/">Home</Link>
      <Link href="/show" replace>Show</Link>
      <Link href="/contact">Contact</Link>
    </header>
    <article>
      <slot />
    </article>
  </main>
</template>