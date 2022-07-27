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
};
</script>

<style lang="scss" scoped>
.main{
    margin-top: 6rem;
    padding-bottom: 3rem;
    background-color: whitesmoke;
}
</style>
