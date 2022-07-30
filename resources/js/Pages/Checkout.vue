<template>
  <div class="checkout container">
    <div v-if="myCart.list_dishes.length > 0">
      <h1 class="title_cart orange pt-3">Il tuo carrello</h1>

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

      <h3 class="mb-4"><strong>Totale: </strong>{{ myCart.total_amount }} €</h3>

      <vue-form method="post" action="/order-received" class="bg-white px-5 pb-4">
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
        <!-- List dishes -->
        <div class="mb-3 d-none" v-if="myCart.list_dishes">
          <label for="list_dishes" class="form-label">Lista piatti:</label>
          <input
            type="text"
            name="list_dishes"
            id="list_dishes"
            class="form-control"
            :value="list_parsed"
            aria-describedby="list_dishesHelper"
            readonly
          />
          
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
        <!-- div inserimento carta di credito -->
        <div class="mb-3">
          <div id="dropin-container"></div>
          <button id="submit-button" class="btn btn-lg btn_green">
            Verifica Carta di credito
          </button>
        </div>

        <!-- dati cliente -->
        <h2 class="data_title orange py-3">Inserisci i tuoi dati</h2>
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


        <!-- bottone di invio form -->
        <button
          id="my-submit-button"
          type="submit"
          class="btn btn-lg bg_orange disabled">
          Paga ora
        </button>

      </vue-form>
    </div>
    <div class="pt-5 pb-4" v-else>
      <h1 class="not_products orange text-center py-5">Non hai aggiunto alcun prodotto al carrello</h1>
    </div>
  </div>
</template>

<script>
import state from "../state";
import VueForm from "../components/VueForm.vue";
import axios from "axios";


export default {
  name: "Checkout",
  components: {
    VueForm,
  },
  data() {
    return {
      restaurant_checkout: null,
      restaurant: null,
      loading: true,
      myCart: state.cart,
      tokenApi: "",
      list_parsed: null,
   
    };
  },
  mounted() {
    this.getToken();

    if (localStorage.getItem("restaurant_slug")) {
      this.restaurant_checkout = localStorage.getItem("restaurant_slug");

      //console.log(this.restaurant_checkout);

      this.getRestaurant();
    }

    if (localStorage.getItem("list_cookie")) {
      this.myCart.list_dishes = JSON.parse(localStorage.getItem("list_cookie"));
      //console.log(this.myCart.list_dishes);
      this.myCart.makeTotal();
      this.list_parsed = localStorage.getItem("list_cookie");
      console.log("Console di nicolas:", this.list_parsed);
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

    //metodo per generare il token che servirà a far funzionare il pagamento con braintree
    getToken() {
      axios
        .get(`/api/generate`)
        .then((response) => {
          //console.log(response.data);
          if (response.data.status_code == 404) {
            //this.loading = false;
            this.$router.push({ name: "not-found" });
          } else {
            //console.log(response);
            this.tokenApi = response.data.token;

            //parte l'altra funzione
            this.dropInFunc();
          }
        })
        .catch((e) => {
          console.error(e);
        });

      //console.log('ecco il token', this.tokenApi);
    },

    //metodo che servirà per generare nella DOM la finestra nella quale 
    //vengono inseriti numero di carta e data di scadenza
    dropInFunc() {
      const braintreeBtn = document.querySelector("#submit-button");
      //var form = document.querySelector("#payment-form");
      const token = this.tokenApi;

      braintree.dropin.create(
        {
          authorization: token,
          selector: "#dropin-container",
        },
        function (err, dropinInstance) {
          if (err) {
            // Handle any errors that might've occurred when creating Drop-in
            console.error(err);
            return;
          }
          braintreeBtn.addEventListener("click", function (event) {
            //event.preventDefault();
            dropinInstance.requestPaymentMethod(function (err) {
              if (err) {
                // Handle errors in requesting payment method
                console.log("Errore, il pagamento non è riuscito", err);
                return;
              }
              //sblocco il pulsante del form 'paga ora'
              document
                .getElementById("my-submit-button")
                .classList.remove("disabled");
            });
          });
        }
      );
    },
  },

};
</script>

<style lang="scss" scoped>

.orange{
  color: #ff7f31;
}

.btn_green {
  outline: none;
  background-color: #64d18a;
  border-color: #64d18a;
  color: white;
  transition: all 200ms ease;
}

.btn_green:hover {
  background-color: #8bdda8;
  color: white;

  .order {
    li {
      list-style: none;
    }
  }
}
  .bg_orange {
    background-color: #ff7f31;
    color: white;
  }

  .not_products{
    margin-top: 3rem;
    background-color: rgba(245, 245, 245, 0.689);
    box-shadow: 0 0 8px grey;
  }
</style>
