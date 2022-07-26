// 0. If using a module system (e.g. via vue-cli), import Vue and VueRouter
// and then call `Vue.use(VueRouter)`.
import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);
// 1. Define route components.
// These can be imported from other files
import Home from "./Pages/Home";
import About from "./Pages/About";
import Restaurant from "./Pages/Restaurant";
import Checkout from "./Pages/Checkout";
import OrderReceived from "./Pages/OrderReceived";
import NotFound from "./Pages/NotFound";

// 2. Define some routes
// Each route should map to a component. The "component" can
// either be an actual component constructor created via
// `Vue.extend()`, or just a component options object.
// We'll talk about nested routes later.
const routes = [
    {
        path: "/",
        name: "home",
        component: Home,
    },
    {
        path: "/about",
        name: "about",
        component: About,
    },

    {
        path: "/restaurants/:slug", // o id (in questo caso nella rotta di web.php abbiamo usato lo slug)
        name: "restaurant",
        component: Restaurant,
    },    
    {
        path: "/checkout",
        name: "checkout",
        component: Checkout,
    },
    {
        path: "/order-received",
        name: "order-received",
        component: OrderReceived,
    },
    {
        path: "/*",
        name: "not-found",
        component: NotFound,
    },
];

// 3. Create the router instance and pass the `routes` option
// You can pass in additional options here, but let's
// keep it simple for now.
const router = new VueRouter({
    mode: "history",
    routes, // short for `routes: routes`
});

// 4. Create and mount the root instance.
// Make sure to inject the router with the router option to make the
// whole app router-aware.
export default router;
