<template>
    <div>
        <HeaderComponent />
        <!-- /.header -->

        <div class="main py-4">
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

<style></style>
