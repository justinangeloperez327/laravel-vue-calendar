<template>
  <div class="container-fluid">
    <navbar></navbar>
    <div class="row">
      <div class="col">
        <calendar></calendar>
      </div>
    </div>
  </div>
</template>

<script>
import Calendar from './components/Calendar';
import Navbar from './components/Navbar.vue';
export default {
  components: {
    Navbar,
    Calendar,
  }
  
}

</script>

<style>

</style>
