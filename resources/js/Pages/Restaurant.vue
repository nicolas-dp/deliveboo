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
              <div class="card">
                <img :src="dish.cover_image" alt="" />
                <div class="card-body">
                  <h5>{{ dish.name }}</h5>

                  <p>Prezzo: {{ dish.price }} €</p>
                </div>
                <div class="card-footer">
                  <button
                    type="button"
                    class="btn btn-primary btn-sm"
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
                        <div v-if="dish.is_available" class="modal-footer">
                          <div
                            class="btn-group"
                            role="group"
                            aria-label="Basic example"
                          >
                            <button
                              type="button"
                              class="btn btn-primary"
                              @click="subtractOne(dish)"
                            >
                              -
                            </button>
                            <span
                              class="bg-light px-3 d-flex align-items-center"
                              :class="`dish-${dish.id}`"
                            >
                              {{ dish.amount_html }}
                            </span>
                            <button
                              type="button"
                              class="btn btn-primary"
                              @click="addOne(dish)"
                            >
                              +
                            </button>
                          </div>

                          <button
                            v-if="dish.is_available"
                            type="button"
                            class="btn btn-primary"
                            @click="addItemToCart(dish, dish.amount_html)"
                          >
                            Aggiungi al carrello
                          </button>
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
            <li v-for="dishElement in myCart.list_dishes" :key="dishElement.id">
              {{ dishElement.name }}: {{ dishElement.amount }} x
              {{ dishElement.price }}€ =
              {{ dishElement.amount * dishElement.price }} €
            </li>
          </ul>

          <p v-else>Nessun elemento nel carrello</p>

          <p>Totale: {{ myCart.total_amount }} €</p>

          <button class="btn btn-secondary" @click="myCart.resetCart()">
            Azzera carrello
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import state from "../state";

export default {
  name: "Restaurant",

  data() {
    return {
      restaurant: "",
      //number: 0,
      loading: true,
      myCart: state.cart,
      dish_amounts: {},
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

            this.restaurant.dishes.forEach((dish) => {
              dish["amount_html"] = 1;
            });
            //this.postResponse = response.data;
            //console.log(this.posts);
            this.loading = false;
          }
        })
        .catch((e) => {
          console.error(e);
        });
    },

    addOne(dish) {
      /*       console.log(document.querySelector(`.dish-${id}`).innerHTML);

      let amount = parseInt(document.querySelector(`.dish-${id}`).innerHTML);

      amount = amount + 1;

      document.querySelector(`.dish-${id}`).innerHTML = amount; */
      console.log(dish);

      dish.amount_html = dish.amount_html + 1;

      console.log(dish);

      dish.amount_html.$forceUpdate();
    },

    subtractOne(dish) {
      /*       let amount = parseInt(document.querySelector(`.dish-${id}`).innerHTML);

      if (amount > 0) {
        //console.log(document.querySelector(`.dish-${id}`).innerHTML);

        amount = amount - 1;

        document.querySelector(`.dish-${id}`).innerHTML = amount;
      } */
      if (dish.amount_html > 0) {
        dish.amount_html = dish.amount_html - 1;
      }
    },

    addItemToCart(dishObject, dishAmount) {
      //se esiste gìa nel carrello aggiunto altri elementi
      if (this.myCart.list_dishes.filter(dishQuery => dishQuery.name === dishObject.name).length > 0) {
        const objIndex = this.myCart.list_dishes.findIndex((obj => obj.id == dishObject.id));

        //console.log(`indice arraypiatti: ${objIndex}`);


        this.myCart.list_dishes[objIndex].amount = this.myCart.list_dishes[objIndex].amount + dishAmount;
      }
      //sennò lo creo
      else {
      let newDish = dishObject;

      newDish["amount"] = dishAmount;

      this.myCart.list_dishes.push(newDish);

      //console.log(this.myCart.list_dishes);

      this.myCart.makeTotal();

      console.log("totale carrello");
      console.log(this.myCart.total_amount);
      }
    },

    /*     addDish(id) {
      let amount = document.querySelector(`dish-${id}`).value;


    } */
  },

  mounted() {
    this.getRestaurant();

    //cancella

    //cancella
  },
};
</script>

<style>
</style>