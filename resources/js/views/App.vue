<template>
  <div>
    <HeaderComponent />
    <!-- /.header -->

    <div class="main">
      <router-view></router-view>
    </div>
    <!-- /.main -->

    <FooterComponent />
    <!-- /.footer -->
  </div>
</template>

<script>
import HeaderComponent from "../components/HeaderComponent.vue";
import FooterComponent from "../components/FooterComponent.vue";

export default {
  name: "App",
  components: {
    HeaderComponent,
    FooterComponent,
  },
  mounted(){
    $(document).ready(function () {
      $(window).scrollTop(0);
    });
  },
};
</script>

<style lang="scss" scoped>
.main {
/*   background-image: url("https://img.freepik.com/premium-vector/food-doodle-set_160308-239.jpg?w=2000"); */
  background-image:  -webkit-linear-gradient(top left, rgba(255, 255, 255, 0.90),   rgba(255, 255, 255, 0.90)), url("https://img.freepik.com/premium-vector/food-doodle-set_160308-239.jpg?w=2000"); 
  background-position: center;
  margin-top: 4.8rem;
  padding-bottom: 3rem;
  background-color: whitesmoke;
  .img_opacity{
    opacity: 0.4;
    filter: blur(0.3);
  }
}
</style>
