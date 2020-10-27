<template>
  <nav v-if="user.id === 1" class="navbar navbar-expand-sm navbar-dark bg-danger mb-2">
    <div class="container">
      <a href="" class="navbar-brand">Admin Stop Charge</a>
    </div>
  </nav>
  <nav v-else class="navbar navbar-expand-sm navbar-dark bg-info mb-2">
    <div class="container">
      <a href="" class="navbar-brand">Stop Charge</a>
    </div>
  </nav>
</template>

<script>
export default {
  props: [
    'user',
  ]
}
</script>