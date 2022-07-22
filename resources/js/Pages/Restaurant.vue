<template>
  <div class="my-4">
    <h1 class="text-center mb-3">{{ restaurant.name }}</h1>

    <div class="p-5 bg-light container-fluid">
      <!-- <h1 class="display-3">Fluid jumbo heading</h1> -->

      <div class="row g-3">
        <div class="col-12 col-lg-8">
          <div class="text-center">
            <p class="lead">{{ restaurant.description }}</p>
            <img
              :src="restaurant.cover_image"
              :alt="restaurant.name"
              class="img-fluid rounded rounded-4"
            />
          </div>
        </div>

        <div class="col-12 col-lg-4">
          <div class="risto-info text-center">
            <h4 class="d-flex justify-content-center align-items-center mb-4">
              <span
                v-for="category in restaurant.categories"
                :key="category.id"
                class="
                  py-1
                  px-4
                  mx-1
                  rounded-pill
                  border-2 border border-primary
                "
              >
                {{ category.name }}
              </span>
            </h4>

            <p>Telefono: {{ restaurant.phone_number }}</p>
            <p>Indirizzo: {{ restaurant.address }}</p>
            <p>Costo di consegna: {{ restaurant.delivery_cost }} €</p>
            <p v-if="restaurant.opening_hours">
              Apertura: h {{ restaurant.opening_hours }}
            </p>
            <p v-if="restaurant.closing_hours">
              Apertura: h {{ restaurant.closing_hours }}
            </p>

            <p class="lead">
              <a class="btn btn-primary btn" href="#menu" role="button"
                >Vai al Menù</a
              >
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row g-3">
        <div class="col-12 col-lg-8">
          <h2 class="text-center mb-3" id="menu">Menù</h2>
          <!-- <div class="container-fluid"> -->
          <div class="row row-cols-2 row-cols-md-3 row-cols-xl-4 g-1">
            <div class="col" v-for="dish in restaurant.dishes" :key="dish.id">
              <div class="card h-100">
                <img :src="dish.cover_image" alt="" />
                <div class="card-body">
                  <h5>{{ dish.name }}</h5>

                  <p>Prezzo: {{ dish.price }} €</p>

                  <CartActions :dishElement="dish" v-if="dish.is_available" />
                </div>
                <div class="card-footer">
                  <button
                    type="button"
                    class="btn btn-info btn-sm"
                    data-bs-toggle="modal"
                    :data-bs-target="`#exampleModal-${dish.id}`"
                  >
                    Info Piatto
                  </button>

                  <!-- Modal -->
                  <div
                    class="modal fade"
                    :id="`exampleModal-${dish.id}`"
                    tabindex="-1"
                    aria-labelledby="exampleModalLabel"
                    aria-hidden="true"
                  >
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">
                            {{ dish.name }}
                          </h5>
                          <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                          ></button>
                        </div>
                        <div class="modal-body">
                          <img
                            :src="dish.cover_image"
                            :alt="dish.name"
                            class="img-fluid"
                          />
                          <p>Dettagli: {{ dish.description }}</p>
                          <p>Ingredienti: {{ dish.ingredients }}</p>
                          <p>Prezzo: {{ dish.price }} €</p>
                          <p>
                            <span v-if="dish.is_available" class="text-success"
                              >Disponibile</span
                            >
                            <span v-else class="text-danger"
                              >Non disponibile</span
                            >
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- </div> -->
        </div>
        <div class="col-12 col-lg-4">
          <h2 class="text-center mb-3" id="menu">Carrello</h2>

          <ul v-if="myCart.list_dishes.length > 0" class="mb-3">
            <li v-for="(dishElement, i) in myCart.list_dishes" :key="i">
              {{ dishElement.name }}: {{ dishElement.amount }} x
              {{ dishElement.price }}€ =
              {{ dishElement.amount * dishElement.price }} €
              <span class="btn btn-danger btn-sm" @click="removeItem(i)">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="16"
                  height="16"
                  fill="white"
                  class="bi bi-trash3-fill"
                  viewBox="0 0 16 16"
                >
                  <path
                    d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"
                  />
                </svg>
              </span>
            </li>
          </ul>

          <p v-else>Nessun elemento nel carrello</p>

          <p>Totale: {{ myCart.total_amount }} €</p>

          <button class="btn btn-secondary btn-sm" @click="myCart.resetCart()">
            Azzera carrello
          </button>
          <button class="btn btn-info btn-sm" @click="setCartCookie()">
            Vai al Checkout
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import state from "../state";
import CartActions from "../components/CartActions.vue";

export default {
  name: "Restaurant",

  components: {
    CartActions,
  },

  data() {
    return {
      restaurant: "",
      //number: 0,
      loading: true,
      myCart: state.cart,
      //dish_amounts: {},
    };
  },

  methods: {
    getRestaurant() {
      axios
        .get(`/api/restaurants/${this.$route.params.slug}`)
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

    /*     addDish(id) {
      let amount = document.querySelector(`dish-${id}`).value;


    } */
    removeItem(index) {
      this.myCart.list_dishes.splice(index, 1);

      this.myCart.makeTotal();
    },

    setCartCookie() {
      
    }

  },

  mounted() {
    this.getRestaurant();

    console.log(state.cart);
    console.log(this.myCart);

    //cancella

    //cancella
  },
};
</script>

<style>
</style>