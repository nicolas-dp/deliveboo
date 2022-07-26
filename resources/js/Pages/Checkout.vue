<template>
    <div class="checkout">
        <div v-if="true">
            <h1>Il tuo carrello</h1>

            <p>eccolo</p>
            <h1>Il tuo carrello</h1>

            <p>eccolo</p>
            <h1>Il tuo carrello</h1>

            <p>eccolo</p>
            <h1>Il tuo carrello</h1>

            <p>eccolo</p>
            <h1>Il tuo carrello</h1>

            <p>eccolo</p>
            <h1>Il tuo carrello</h1>

            <p>eccolo</p>
            <h1>Il tuo carrello</h1>

            <p>eccolo</p>
            <h1>Il tuo carrello</h1>

            <p>eccolo</p>
            <div class="text-2xl">
                Stai acquistando il prodotto con id: {{ $product }}
            </div>
            <PaymentComponent
                ref="paymentRef"
                :authorization="tokenApi"
                @loading="handleLoading"
                @onSuccess="paymentOnSuccess"
                @onError="paymentOnError"
            />

            
        </div>
        <div v-else></div>
    </div>
</template>

<script>
import PaymentComponent from "../components/PaymentComponent.vue";
import axios from "axios";

export default {
    components: { PaymentComponent },
    name: "Checkout",
    data() {
        return {
            tokenApi: "",
            errors: [],
        };
    },

    async created() {
        try {
            const response = await axios.get("/api/generate");
            this.tokenApi = response.data.token;
        } catch (e) {
            this.errors.push(e);
        }
    },
};
</script>

<style lang="scss" scoped>
.checkout {
    margin-top: 7rem;
}
</style>
