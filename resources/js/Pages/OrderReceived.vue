<template>
  <div class="done container py-5">
    <h1 class="pt-5 orange text-center">
      Ordine ricevuto! saremo da te a breve
    </h1>
    <div class="text-center">
      <router-link class="link_home btn bg_orange" :to="{ name: 'home' }"
        >Torna alla home</router-link
      >
    </div>
  </div>
</template>

<script>
export default {
  name: "OrderReceived",
};
</script>

<style lang="scss" scoped>
.orange {
  color: #ff7f31;
}

.bg_orange {
  background-color: #ff7f31;
  color: white;
}
.link_home {
  text-decoration: none;
}
</style>