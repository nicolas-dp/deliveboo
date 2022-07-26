
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require('vue');

import router from './router';
import App from './views/App.vue';
// libreria swiper
import VueGlide from "vue-glide-js";
import "vue-glide-js/dist/vue-glide.css";

Vue.use(VueGlide);
// libreria animazione allo scrool
import AOS from "aos";
import "aos/dist/aos.css";
AOS.init();



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

/* const app = new Vue({
    el: "#root",
    render: (h) => h(App),
    router,
}); */

const app = new Vue({
    el: "#app",
    data() {
        return {
            password: "",
            password_confirm: "",
            password_check: 0,
        };
    },
    methods: {
        checkPassword() {
            if (this.password == this.password_confirm && this.password.length >= 8) {
                this.password_check = 1;
            } else {
                this.password_check = 2;
            }
        },
        checkLoginPassword() {
            if (this.password.length >= 8) {
                this.password_check = 1;
            } else {
                this.password_check = 2;
            }
        }
    },
});
