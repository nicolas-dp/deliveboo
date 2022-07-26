<template>
    <!-- authorization è il token della nostra generate -->
    <v-braintree
        :authorization="authorization"  
        locate="it_IT"
        @success="onSuccess"
        @error="onError"
    ></v-braintree>
</template>

<script>
export default {
    name: "PaymentComponent",
    props: {
        authorization: {
            required: true,
            type: String
        }
    },
    methods: {
        onSuccess(payload) {
            let nonce = payload.nonce;
            // Do something great with the nonce...
        },
        onError(error) {
            let message = error.message;
            // Whoops, an error has occured while trying to get the nonce
        },
    },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss">
</style>
