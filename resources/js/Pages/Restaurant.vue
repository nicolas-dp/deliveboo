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
              <div
                class="col"
                v-for="dish in restaurant.dishes"
                :key="dish.id"
              >
                <div class="card">
                  <img :src="dish.cover_image" alt="" />
                  <div class="card-body">
                    <h5>{{ dish.name }}</h5>

                    <p>Prezzo: {{ dish.price }} €</p>
                  </div>
                </div>
              </div>
            </div>
          <!-- </div> -->
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Restaurant",

  data() {
    return {
      restaurant: "",
      loading: true,
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

  mounted() {
    this.getRestaurant();
  },
};
</script>

<style>
</style>