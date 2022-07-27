<template>
  <div class="checkout container">
    <div class="text-2xl">
      <PaymentComponent
        ref="paymentRef"
        :authorization="tokenApi"
        @loading="handleLoading"
        @onSuccess="paymentOnSuccess"
        @onError="paymentOnError"
      />
    </div>
    <div v-if="myCart.list_dishes.length > 0">
      <h1>Il tuo carrello</h1>

      <h3 v-if="restaurant">
        <strong>Ristorante:</strong> {{ restaurant.name }}
      </h3>

      <ul class="order">
        <li v-for="dish in myCart.list_dishes" :key="dish.id">
          <strong>{{ dish.name }}:</strong> {{ dish.amount }} x
          {{ dish.price }}€ =
          <strong>{{ dish.amount * dish.price }} €</strong>
        </li>
      </ul>

      <h3><strong>Totale: </strong>{{ myCart.total_amount }} €</h3>

      <vue-form method="post" action="/order-received">
        <!-- ID ristorante -->
        <div class="mb-3 d-none" v-if="restaurant">
          <label for="restaurant_id" class="form-label">Ristorante ID:</label>
          <input
            type="text"
            name="restaurant_id"
            id="restaurant_id"
            class="form-control"
            :value="restaurant.id"
            :placeholder="restaurant.id"
            aria-describedby="restaurantIdHelper"
            readonly
          />
          <small id="restaurantIdHelper" class="text-muted"
            >ID ristorante</small
          >
        </div>

        <!-- totale da pagare -->
        <div class="mb-3 d-none">
          <label for="total_price" class="form-label">Totale:</label>
          <input
            type="text"
            name="total_price"
            id="total_price"
            class="form-control"
            :value="myCart.total_amount"
            :placeholder="myCart.total_amount + '€'"
            aria-describedby="totalPriceHelper"
            readonly
          />
          <small id="totalPriceHelper" class="text-muted">il tuo totale</small>
        </div>

        <!-- nome cliente -->
        <div class="mb-3">
          <label for="customer_name" class="form-label">Nome e Cognome *</label>
          <input
            type="text"
            name="customer_name"
            id="customer_name"
            class="form-control"
            placeholder="es: Marco Rossi"
            aria-describedby="customerNameHelper"
            required
            minlength="3"
            maxlength="50"
          />
          <small id="customerNameHelper" class="text-muted"
            >Inserisci il tuo nome e cognome</small
          >
        </div>

        <!-- email cliente -->
        <div class="mb-3">
          <label for="customer_email" class="form-label">Email *</label>
          <input
            type="email"
            name="customer_email"
            id="customer_email"
            class="form-control"
            placeholder="es: marco@example.com"
            aria-describedby="customerEmailHelper"
            required
          />
          <small id="customerEmailHelper" class="text-muted"
            >Inserisci la tua mail</small
          >
        </div>

        <!-- indirizzo cliente -->
        <div class="mb-3">
          <label for="customer_address" class="form-label">Indirizzo *</label>
          <input
            type="text"
            name="customer_address"
            id="customer_address"
            class="form-control"
            placeholder="es: Via Roma, 15"
            aria-describedby="customerAddressHelper"
            required
            minlength="5"
            maxlength="150"
          />
          <small id="customerAddressHelper" class="text-muted"
            >Inserisci il tuo indirizzo</small
          >
        </div>

        <!-- telefono cliente -->
        <div class="mb-3">
          <label for="customer_phone" class="form-label">Numero di Telefono *</label>
          <input
            type="tel"
            name="customer_phone"
            id="customer_phone"
            class="form-control"
            aria-describedby="customerPhoneHelper"
            required
            pattern="[0-9]{10}"
          />
          <small id="customerPhoneHelper" class="text-muted"
            >Inserisci il tuo numero di telefono</small
          >
        </div>

        <!-- note -->
        <div class="mb-3">
          <label for="notes" class="form-label">Note</label>
          <textarea
            class="form-control"
            name="notes"
            id="notes"
            rows="3"
          ></textarea>
        </div>

        <button type="submit" class="btn bg_orange text-white">Paga ora</button>
      </vue-form>

      <!-- <span class="btn btn-lg btn-primary">Paga ora</span> -->
    </div>
    <div v-else>
      <p>Non hai aggiunto alcun prodotto al carrello</p>
    </div>
  </div>
</template>

<script>
import state from "../state";
import VueForm from "../components/VueForm.vue";
import PaymentComponent from "../components/PaymentComponent.vue";
import axios from "axios";

export default {
  name: "Checkout",
  components: {
    VueForm,
    PaymentComponent,
  },
  data() {
    return {
      restaurant_checkout: null,
      restaurant: null,
      loading: true,
      myCart: state.cart,
      tokenApi: "",
      errors: [],
    };
  },
  mounted() {
    /*     console.log(localStorage.getItem("restaurant_id"));
    if (localStorage.getItem("restaurant_id")) {
      this.restaurant_checkout = localStorage.getItem("restaurant_id");
    } */

    if (localStorage.getItem("restaurant_slug")) {
      this.restaurant_checkout = localStorage.getItem("restaurant_slug");

      console.log(this.restaurant_checkout);

      this.getRestaurant();
    }

    if (localStorage.getItem("list_cookie")) {
      this.myCart.list_dishes = JSON.parse(localStorage.getItem("list_cookie"));
      console.log(this.myCart.list_dishes);
      this.myCart.makeTotal();
    }

    //console.log(this.myCart.list_dishes);
    //console.log(this.myCart);
  },
  methods: {
    getRestaurant() {
      axios
        .get(`/api/restaurants/${this.restaurant_checkout}`)
        .then((response) => {
          //console.log(response.data);
          if (response.data.status_code == 404) {
            //this.loading = false;
            this.$router.push({ name: "not-found" });
          } else {
            this.restaurant = response.data;

            /*             this.restaurant.dishes.forEach((dish) => {
              dish["amount_html"] = 1;
            }); */
            //this.postResponse = response.data;
            //console.log(this.posts);
            this.loading = false;
          }
        })
        .catch((e) => {
          console.error(e);
        });
    },
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
  .order {
    li {
      list-style: none;
    }
  }

  .bg_orange {
    background-color: #ff7f31;
    color: white;
  }
}
</style>
