/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");

//import Chart from "chart.js/auto";


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);

Vue.component(
    "graphics",
    require("./components/Graphics.vue").default
);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: "#app",
    //components: { Chart },
    data() {
        return {
            rest_name: "",
            rest_name_check: 0,
            address: "",
            address_check: 0,
            phone: "",
            phone_check: 0,
            delivery_cost: "",
            delivery_cost_check: 0,
            piva: 0,
            piva_check: 0,
            dish_name: "",
            dish_name_check: 0,
            dish_price: "",
            dish_price_check: 0,
            opening_hours: "",
            closing_hours: "",
            check_hours: 0,
        };
    },
    methods: {
        countCharRestName() {
            if (this.rest_name.length >= 5) {
                this.rest_name_check = 1;
            } else if (
                this.rest_name.length >= 0 &&
                this.rest_name.length < 5
            ) {
                this.rest_name_check = 2;
            }
        },
        countCharAddress() {
            if (this.address.length >= 5) {
                this.address_check = 1;
            } else if (this.address.length < 5) {
                this.address_check = 2;
            }
        },
        countPhone() {
            if (this.phone.length == 10) {
                this.phone_check = 1;
            } else if (this.phone.length <= 9 || this.phone.length >= 11) {
                this.phone_check = 2;
            }
        },
        checkDeliveryCost() {
            let check = parseInt(this.delivery_cost);
            if (check > 0 && check < 20) {
                this.delivery_cost_check = 1;
            } else {
                this.delivery_cost_check = 2;
            }
        },
        countPIVA() {
            if (this.piva.length == 11) {
                this.piva_check = 1;
            } else if (this.piva.length <= 10 || this.piva.length >= 12) {
                this.piva_check = 2;
            }
        },
        countCharDishName() {
            if (this.dish_name.length >= 5) {
                this.dish_name_check = 1;
            } else if (
                this.dish_name.length > 0 &&
                this.dish_name.length < 50
            ) {
                this.dish_name_check = 2;
            }
        },
        checkDishPrice() {
            let check = parseInt(this.dish_price);
            if (check > 0) {
                this.dish_price_check = 1;
            } else {
                this.dish_price_check = 2;
            }
        },
        checkOpeningClosingHours() {
            if (this.opening_hours === this.closing_hours){
                this.check_hours = 2;
            } else {
                this.check_hours = 1;
            }
        }
    },
});

// dashboard sidebar
let sidebar = document.querySelector(".sidebar");
let closeBtn = document.querySelector("#btn");
//let searchBtn = document.querySelector(".bx-search");

closeBtn.addEventListener("click", () => {
    sidebar.classList.toggle("open");
    menuBtnChange(); //calling the function(optional)
});

/* searchBtn.addEventListener("click", () => {
    // Sidebar open when you click on the search iocn
    sidebar.classList.toggle("open");
    menuBtnChange(); //calling the function(optional)
}); */

// following are the code to change sidebar button(optional)
function menuBtnChange() {
    if (sidebar.classList.contains("open")) {
        closeBtn.classList.replace("bx-menu", "bx-menu-alt-right"); //replacing the iocns class
    } else {
        closeBtn.classList.replace("bx-menu-alt-right", "bx-menu"); //replacing the iocns class
    }
}




