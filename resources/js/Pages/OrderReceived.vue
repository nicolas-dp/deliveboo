<template>
  <div class="done container">
    <h1>Ordine ricevuto! saremo da te a breve</h1>
    <p>
        <router-link :to="{ name: 'home' }">Torna alla home</router-link>
    </p>
  </div>
</template>

<script>


export default {
  name: "OrderReceived",
};
</script>

<style lang="scss" scoped>
.done {
    margin-top: 7rem;
}
</style>