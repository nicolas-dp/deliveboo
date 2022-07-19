<template>
<div>

  <div class="header">
    <nav class="nav justify-content-center">
      <router-link class="nav-link" :to="{name: 'home'}">Home</router-link>
      <router-link class="nav-link" :to="{name: 'about'}">About</router-link>
      <router-link class="nav-link" :to="{name: 'restaurants'}">Restaurants</router-link>
      <!-- <router-link class="nav-link" :to="{name: 'restaurant'}">Restaurant</router-link> -->
    </nav>
  </div>
  <!-- /.header -->

  <div class="main">
    <router-view></router-view>
  </div>
  <!-- /.main -->

  <div class="footer">
    footer
  </div>
  <!-- /.footer -->
</div>
</template>

<script>
// import WorkInProgress from "../components/WorkInProgress.vue";

export default {
  name: "App",
  components: "",
};
</script>

<style>
</style>