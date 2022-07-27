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
    <div v-else>
      <p>Non hai aggiunto alcun prodotto al carrello</p>
    </div>
  </div>
</template>

<script>
import state from "../state";
import VueForm from "../components/VueForm.vue";
//import PaymentComponent from "../components/PaymentComponent.vue";
import axios from "axios";

/* const button = document.querySelector("#submit-button");

braintree.dropin.create(
  {
    authorization: "sandbox_g42y39zw_348pk9cgf3bgyw2b",
    selector: "#dropin-container",
  },
  function (err, instance) {
    button.addEventListener("click", function () {
      instance.requestPaymentMethod(function (err, payload) {
        // Submit payload.nonce to your server
      });
    });
  }
); */

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

      /* CODICE NICOLAS */
      /*       tokenApi: "",
      errors: [], */
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
    }

    //console.log(this.myCart.list_dishes);
    //console.log(this.myCart);

    /*     braintree.dropin.create(
      {
        authorization: "sandbox_g42y39zw_348pk9cgf3bgyw2b",
        //authorization:
          //"eyJ2ZXJzaW9uIjoyLCJhdXRob3JpemF0aW9uRmluZ2VycHJpbnQiOiJleUowZVhBaU9pSktWMVFpTENKaGJHY2lPaUpGVXpJMU5pSXNJbXRwWkNJNklqSXdNVGd3TkRJMk1UWXRjMkZ1WkdKdmVDSXNJbWx6Y3lJNkltaDBkSEJ6T2k4dllYQnBMbk5oYm1SaWIzZ3VZbkpoYVc1MGNtVmxaMkYwWlhkaGVTNWpiMjBpZlEuZXlKbGVIQWlPakUyTlRrd01ETXpOVFlzSW1wMGFTSTZJbU5qWW1FeU56RXlMV1JpTW1FdE5EazRaaTFpTnpZMExUVXhOak5pT1dWaE9ERTNaU0lzSW5OMVlpSTZJalkwWjIxeFpIbG9hR1ptTmpodU1tMGlMQ0pwYzNNaU9pSm9kSFJ3Y3pvdkwyRndhUzV6WVc1a1ltOTRMbUp5WVdsdWRISmxaV2RoZEdWM1lYa3VZMjl0SWl3aWJXVnlZMmhoYm5RaU9uc2ljSFZpYkdsalgybGtJam9pTmpSbmJYRmtlV2hvWm1ZMk9HNHliU0lzSW5abGNtbG1lVjlqWVhKa1gySjVYMlJsWm1GMWJIUWlPbVpoYkhObGZTd2ljbWxuYUhSeklqcGJJbTFoYm1GblpWOTJZWFZzZENKZExDSnpZMjl3WlNJNld5SkNjbUZwYm5SeVpXVTZWbUYxYkhRaVhTd2liM0IwYVc5dWN5STZlMzE5LmJQdXZuQWNaM3JubDJxZzY0T0lTRnc3d3lERUpaajVqNmNDYzZ5NlhEMmNZY2ZBODRUZ1U2SmZ4UnpCRkpXREdwMnctRl9EdFF0Q21oQUtsdHIya0h3IiwiY29uZmlnVXJsIjoiaHR0cHM6Ly9hcGkuc2FuZGJveC5icmFpbnRyZWVnYXRld2F5LmNvbTo0NDMvbWVyY2hhbnRzLzY0Z21xZHloaGZmNjhuMm0vY2xpZW50X2FwaS92MS9jb25maWd1cmF0aW9uIiwiZ3JhcGhRTCI6eyJ1cmwiOiJodHRwczovL3BheW1lbnRzLnNhbmRib3guYnJhaW50cmVlLWFwaS5jb20vZ3JhcGhxbCIsImRhdGUiOiIyMDE4LTA1LTA4IiwiZmVhdHVyZXMiOlsidG9rZW5pemVfY3JlZGl0X2NhcmRzIl19LCJjbGllbnRBcGlVcmwiOiJodHRwczovL2FwaS5zYW5kYm94LmJyYWludHJlZWdhdGV3YXkuY29tOjQ0My9tZXJjaGFudHMvNjRnbXFkeWhoZmY2OG4ybS9jbGllbnRfYXBpIiwiZW52aXJvbm1lbnQiOiJzYW5kYm94IiwibWVyY2hhbnRJZCI6IjY0Z21xZHloaGZmNjhuMm0iLCJhc3NldHNVcmwiOiJodHRwczovL2Fzc2V0cy5icmFpbnRyZWVnYXRld2F5LmNvbSIsImF1dGhVcmwiOiJodHRwczovL2F1dGgudmVubW8uc2FuZGJveC5icmFpbnRyZWVnYXRld2F5LmNvbSIsInZlbm1vIjoib2ZmIiwiY2hhbGxlbmdlcyI6W10sInRocmVlRFNlY3VyZUVuYWJsZWQiOnRydWUsImFuYWx5dGljcyI6eyJ1cmwiOiJodHRwczovL29yaWdpbi1hbmFseXRpY3Mtc2FuZC5zYW5kYm94LmJyYWludHJlZS1hcGkuY29tLzY0Z21xZHloaGZmNjhuMm0ifSwicGF5cGFsRW5hYmxlZCI6dHJ1ZSwicGF5cGFsIjp7ImJpbGxpbmdBZ3JlZW1lbnRzRW5hYmxlZCI6dHJ1ZSwiZW52aXJvbm1lbnROb05ldHdvcmsiOnRydWUsInVudmV0dGVkTWVyY2hhbnQiOmZhbHNlLCJhbGxvd0h0dHAiOnRydWUsImRpc3BsYXlOYW1lIjoiVGVhbSA1IERlbGl2ZUJvb2wiLCJjbGllbnRJZCI6bnVsbCwicHJpdmFjeVVybCI6Imh0dHA6Ly9leGFtcGxlLmNvbS9wcCIsInVzZXJBZ3JlZW1lbnRVcmwiOiJodHRwOi8vZXhhbXBsZS5jb20vdG9zIiwiYmFzZVVybCI6Imh0dHBzOi8vYXNzZXRzLmJyYWludHJlZWdhdGV3YXkuY29tIiwiYXNzZXRzVXJsIjoiaHR0cHM6Ly9jaGVja291dC5wYXlwYWwuY29tIiwiZGlyZWN0QmFzZVVybCI6bnVsbCwiZW52aXJvbm1lbnQiOiJvZmZsaW5lIiwiYnJhaW50cmVlQ2xpZW50SWQiOiJtYXN0ZXJjbGllbnQzIiwibWVyY2hhbnRBY2NvdW50SWQiOiJ0ZWFtNWRlbGl2ZWJvb2wiLCJjdXJyZW5jeUlzb0NvZGUiOiJFVVIifX0=",
        selector: "#dropin-container",
      },
      function (err, instance) {
        this.button.addEventListener("click", function () {
          instance.requestPaymentMethod(function (err, payload) {
            // Submit payload.nonce to your server
          });
        });
      }
    ); */
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
              // Send payload.nonce to your server
              /*               document.querySelector("#nonce").value = payload.nonce;
              document.querySelector("#guest_user_email").value =
                document.getElementById("guest_email").value;
              console.log(document.querySelector("#guest_user_email").value);
              form.submit(); */

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
</style>
