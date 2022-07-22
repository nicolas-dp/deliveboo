<template>
  <div class="mb-4 single_restaurant">
    <div class="p-5 bg-light container-fluid show_restaurant">
      <h1 class="title_restaurant orange">{{ restaurant.name }}</h1>
      <!-- <h1 class="display-3">Fluid jumbo heading</h1> -->
      <div class="row g-3">
        <div class="col-12 col-lg-6">
          <img
            :src="restaurant.cover_image"
            :alt="restaurant.name"
            class="img-fluid rounded rounded-4"
          />
          <p class="restaurant_description lead pt-4">
            {{ restaurant.description }}
          </p>
        </div>

        <div class="col-12 col-lg-6 risto_info">
          <div
            class="
              text-center
              d-flex
              flex-column
              justify-content-center
              align-items-center
              mb-4
            "
          >
            <h4
              v-for="category in restaurant.categories"
              :key="category.id"
              class="py-1 px-4 mx-1 orange text-uppercase"
            >
              {{ category.name }}
            </h4>

            <p>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="20"
                height="20"
                fill="currentColor"
                class="bi bi-telephone-fill"
                viewBox="0 0 16 16"
              >
                <path
                  fill-rule="evenodd"
                  d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"
                />
              </svg>
              {{ restaurant.phone_number }}
            </p>
            <p>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="20"
                height="20"
                fill="currentColor"
                class="bi bi-house-fill"
                viewBox="0 0 16 16"
              >
                <path
                  fill-rule="evenodd"
                  d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"
                />
                <path
                  fill-rule="evenodd"
                  d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"
                />
              </svg>
              {{ restaurant.address }}
            </p>
            <p>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="20"
                height="20"
                fill="currentColor"
                class="bi bi-truck"
                viewBox="0 0 16 16"
              >
                <path
                  d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"
                />
              </svg>
              {{ restaurant.delivery_cost }} €
            </p>
            <p v-if="restaurant.opening_hours">
              Apertura: {{ restaurant.opening_hours }}
            </p>
            <p v-if="restaurant.closing_hours">
              Apertura: {{ restaurant.closing_hours }}
            </p>

            <p class="lead">
              <a class="btn bg_orange" href="#menu" role="button"
                >Vai al Menù</a
              >
            </p>
          </div>
        </div>
      </div>
    </div>
    <!-- /.show_restaurant -->

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

              <div class="cartActions">
                <div class="btn-group" role="group" aria-label="Basic example">
                  <button
                    type="button"
                    class="btn btn-primary btn-sm"
                    @click="subtractOne(dishElement, i)"
                  >
                    -
                  </button>
                  <span
                    class="
                      bg-light
                      px-2
                      border border-1
                      d-flex
                      align-items-center
                    "
                  >
                    <!-- :class="`dish-${dish.id}`" -->
                    {{ dishElement.amount }}
                  </span>
                  <button
                    type="button"
                    class="btn btn-primary btn-sm"
                    @click="addOne(dishElement)"
                  >
                    +
                  </button>
                </div>
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
              </div>
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

    addOne(obj) {
      //this.counter = this.counter + 1;
      obj.amount = obj.amount + 1;
      this.myCart.makeTotal();
    },

    subtractOne(obj, index) {
      //console.log(obj.amount);
      //console.log(obj.amount);

      if (obj.amount > 0) {
        obj.amount = obj.amount - 1;
        if (obj.amount == 0) {
          this.removeItem(index);
          this.myCart.makeTotal();
        } else {
          this.myCart.makeTotal();
        }
      }
    },

    removeItem(index) {
      this.myCart.list_dishes.splice(index, 1);

      this.myCart.makeTotal();
    },

    setCartCookie() {},
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

<style lang="scss" scoped>
.orange {
  color: #ff7f31;
}

svg{
  color: #ff7f31;
}

.single_restaurant {
  margin-top: 5rem;
  .show_restaurant {
    .title_restaurant {
      margin-bottom: 2rem;
    }
    .restaurant_description {
      text-align: justify;
    }
  }

  .risto_info{
    font-weight: bold;
  }

  .bg_orange{
    background-color: #ff7f31;
    color: white;
  }
}
</style>