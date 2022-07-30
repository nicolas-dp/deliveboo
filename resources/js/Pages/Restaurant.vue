<template>
  <div class="mb-4 single_restaurant">
    <div class="show_restaurant rounded mb-5 bg-light container">
      <h1 class="title_restaurant orange">{{ restaurant.name }}</h1>

      <div class="row g-3">
        <div class="risto_img_desc col-12 col-lg-9">
          <img
            :src="restaurant.cover_image"
            :alt="restaurant.name"
            class="img-fluid rounded rounded-4"
          />
          <p class="restaurant_description lead pt-4">
            {{ restaurant.description }}
          </p>
        </div>
        <!-- /.risto_img_desc -->
        <div class="risto_info col-12 col-lg-3">
          <div
            class="
              text-center
              d-flex
              flex-column
              justify-content-center
              align-items-center
              mb-4
              info
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
              Apertura: {{ restaurant.opening_hours.slice(0, 5) }}
            </p>
            <p v-if="restaurant.closing_hours">
              Chiusura: {{ restaurant.closing_hours.slice(0, 5) }}
            </p>

            <p class="lead">
              <a class="btn bg_orange" href="#menu" role="button"
                >Vai al Menù</a
              >
            </p>
          </div>
        </div>
        <!-- /.risto_info -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.show_restaurant -->

    <div class="dishes_list_cart container">
      <div class="row g-4">
        <div class="dishes col-12 col-lg-9">
          <h2 id="menu" class="mb-5 orange">Menù</h2>
          <!-- <div class="container-fluid"> -->
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
            <div class="col" v-for="dish in restaurant.dishes" :key="dish.id">
              <div class="card h-100">
                <div class="img_wrapper">
                  <img :src="dish.cover_image" alt="" class="img-fluid" />
                </div>
                <div class="card_text p-3">
                  <h5 class="orange">{{ dish.name }}</h5>

                  <p><span class="orange">Prezzo: </span> {{ dish.price }} €</p>

                  <CartActions
                    :dishElement="dish"
                    :restaurantPageId="restaurant.id"
                    :restaurantSlug="restaurant.slug"
                    v-if="dish.is_available"
                    @setCookie="setCartCookie()"
                  />
                </div>
                <div class="dish_info m-3 text-center">
                  <button
                    type="button"
                    class="btn bg_orange"
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
                          <h5 class="modal-title orange" id="exampleModalLabel">
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
                            class="img-fluid pb-4 rounded"
                          />
                          <div class="details">
                          <p class="text-start"><strong class="orange ">Dettagli:</strong> {{ dish.description }}</p>
                          <p class="text-start"><strong class="orange ">Ingredienti:</strong> {{ dish.ingredients }}</p>
                          <p><strong class="orange text-center">Prezzo:</strong> {{ dish.price }} €</p>
                          </div>
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
        <!-- /.dishes -->
        <div class="cart col-12 col-lg-3">
          <div class="cart_content p-4">
            <h2 class="text-center mb-2 orange" id="menu">Carrello</h2>

            <ul v-if="myCart.list_dishes.length > 0" class="mb-3">
              <li
                v-for="(dishElement, i) in myCart.list_dishes"
                :key="i"
                class="mb-1"
              >
                {{ dishElement.name }}: {{ dishElement.amount }} x
                {{ dishElement.price }}€ =
                {{ dishElement.amount * dishElement.price }} €

                <div class="cartActions">
                  <div
                    class="btn-group"
                    role="group"
                    aria-label="Basic example"
                  >
                    <button
                      type="button"
                      class="btn btn-secondary text-white btn-sm"
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
                      class="btn btn-secondary text-white btn-sm"
                      @click="addOne(dishElement)"
                    >
                      +
                    </button>
                  </div>

                  <button
                    type="button"
                    class="btn btn-sm btn-danger"
                    @click="removeItem(i)"
                  >
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
                  </button>
                </div>
              </li>
            </ul>

            <p v-else>Nessun elemento nel carrello</p>

            <p>
              Totale: <strong>{{ myCart.total_amount }} €</strong>
            </p>

            <div class="cart_buttons" v-if="myCart.list_dishes.length > 0">
              <!-- modale -->
              <!-- Button trigger modal -->
              <button
                type="button"
                class="reset_cart btn btn-secondary btn-sm"
                data-bs-toggle="modal"
                data-bs-target="#deleteCart"
              >
                Azzera Carrello
              </button>

              <!-- Modal -->
              <div
                class="modal fade"
                id="deleteCart"
                data-bs-backdrop="static"
                data-bs-keyboard="false"
                tabindex="-1"
                aria-labelledby="deleteCartLabel"
                aria-hidden="true"
              >
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="deleteCartLabel">
                        Elimina Carrello
                      </h5>
                      <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                      ></button>
                    </div>
                    <div class="modal-body">
                      Vuoi eliminare tutti gli elementi dal carrello?
                    </div>
                    <div class="modal-footer">
                      <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal"
                      >
                        Annulla
                      </button>
                      <button
                        type="button"
                        class="btn btn-danger text-white"
                        data-bs-dismiss="modal"
                        @click="
                          myCart.resetCart();
                          setCartCookie();
                        "
                      >
                        Elimina
                      </button>
                    </div>
                  </div>
                </div>
              </div>

              <router-link
                class="btn bg_orange btn-sm"
                :to="{ name: 'checkout' }"
                @click="setCartCookie()"
              >
                Vai al Checkout
              </router-link>
            </div>
            <!--           <button
            class="btn btn-info btn-sm"
            @click="setCartCookie()"
            v-if="myCart.list_dishes.length > 0"
          >
            Vai al Checkout
          </button> -->
          </div>
        </div>
        <!-- /.cart -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.dishes_list_cart -->
  </div>
  <!-- /.single_restaurant -->
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

      restaurantCookieToken: null,
      //dish_amounts: {},
      //firstItemAdded: true,
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

            this.getPreviousCart();
          }
        })
        .catch((e) => {
          console.error(e);
        });
    },

    //metodo per modificare il numero di elementi nel carrello (+1)
    addOne(obj) {
      //this.counter = this.counter + 1;
      obj.amount = obj.amount + 1;
      this.myCart.makeTotal();

      this.setCartCookie();
    },

    //metodo per modificare il numero di elementi nel carrello (-1)
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

      this.setCartCookie();
    },

    //metodo per rimuovere piatto/i dal carrello
    removeItem(index) {
      this.myCart.list_dishes.splice(index, 1);

      this.myCart.makeTotal();

      this.setCartCookie();
    },

    //metodo per controllare se nel local storage ci sono elementi salvati da carrelli precedenti
    getPreviousCart() {
      //controlla al mounted se esiste il cooki dishlist e se l'id cookie del
      //ristorante è uguale a quello salvato nel local storage
      if (localStorage.getItem("list_cookie")) {
        console.log('c"è una lista piatti esistente');
        console.log(localStorage.getItem("list_cookie"));
        //se c'è
        try {
          //alert("c'è il cookie eheh")

          //aggiorno la lista piatti in state.cart
          this.myCart.list_dishes = JSON.parse(
            localStorage.getItem("list_cookie")
          );
          this.myCart.makeTotal();
        } catch (e) {
          //sennò lancia errore
          localStorage.removeItem("list_cookie");
        }
      } else {
        console.log("non esistono piatti aggiunti nel local storage");

        //console.log(localStorage.getItem("list_cookie"));

        //localStorage.removeItem("list_cookie");
        //console.log(localStorage.getItem("restaurant_id"));
      }
    },

    //metodo per passare informazione al local storage
    setCartCookie() {
      //rimuovo cookie esistente
      localStorage.removeItem("list_cookie");

      //trasformo in stringa l'array da passare
      const parsed = JSON.stringify(this.myCart.list_dishes);

      //creo il 'cookie'
      localStorage.setItem("list_cookie", parsed);
    },

    setRestaurantCookie() {
      //rimuovo cookie esistente
      localStorage.removeItem("restaurant_id");

      //creo il 'cookie'
      localStorage.setItem("restaurant_id", this.restaurant.id);
    },
  },

  mounted() {
    //this.restaurantCookieToken = localStorage.getItem("restaurant_id");

    this.getRestaurant();

    /*     if (!this.loading) {
      console.log('sto scrivendo');
      localStorage.setItem("restaurant_id", this.restaurant.id);
      console.log(localStorage.getItem("list_cookie"));
    } */

    //console.log(state.cart);
    //console.log(this.myCart);
  },
};
</script>

<style lang="scss" scoped>
.orange {
  color: #ff7f31;
}

svg {
  color: #ff7f31;
}

.single_restaurant {
  padding-top: 5rem;
  .show_restaurant {
    padding: 2rem;
    box-shadow: rgba(17, 17, 26, 0.1) 0px 0px 16px;
    .title_restaurant {
      margin-bottom: 2rem;
    }
    .restaurant_description {
      text-align: justify;
    }
  }

  .risto_info {
    font-weight: bold;
    display: flex;
    flex-direction: column;
    align-items: center;
    .info {
      background-color: white;
      box-shadow: rgba(17, 17, 26, 0.1) 0px 0px 16px;
      padding: 1rem;
      border-radius: 0.5rem;
    }
  }

  .bg_orange {
    background-color: #ff7f31;
    color: white;
  }

  .card {
    height: 100%;
    border-radius: 0.5rem;
    box-shadow: rgba(0, 0, 0, 0.07) 0px 1px 1px, rgba(0, 0, 0, 0.07) 0px 2px 2px, rgba(0, 0, 0, 0.07) 0px 4px 4px, rgba(0, 0, 0, 0.07) 0px 8px 8px, rgba(0, 0, 0, 0.07) 0px 16px 16px;
    transition: all 0.7s;

    .img_wrapper {
      height: 160px;
      overflow: hidden;
      img {
        width: 100%;
        max-height: 100%;
        object-fit: cover;
        object-position: center;
      }
    }
  }

  .cart {
    padding-top: 5rem;
    display: flex;
    flex-direction: column;
    align-items: center;
    .cart_content {
      background-color: white;
      box-shadow: rgba(17, 17, 26, 0.1) 0px 0px 16px;
      border-radius: 0.5rem;
      ul {
        padding: 0;
        li {
          list-style: none;
        }
      }
    }
  }
  @media screen and (max-width: 768px) {
    .cart_content {
      text-align: center;
      width: 100%;
    }
    .info {
      text-align: center;
      width: 100%;
    }
  }
}
</style>