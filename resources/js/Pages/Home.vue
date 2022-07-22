<template>
  <div class="home">
    <div class="jumbotron" v-if="categories">
      <img
      v-if="category_active"
        class="img_jumbo"
        :src="categories[category_active].cover_image"
        alt=""
      />
      <img
      v-else
        class="img_jumbo"
        :src="categories[0].cover_image"
        alt=""
      />
    </div>
    <section class="category container">
      <vue-glide v-if="categories">
        <vue-glide-slide v-for="category in categories" :key="category.id">
          <h5 class="text-center text-uppercase">{{ category.name }}</h5>
          <div
            v-on:click="
              getActiveCategory(category.id);
              getFilteredRestaurants();
            "
          >
            <img
              class="img_category"
              :src="category.cover_image"
              :alt="category.name"
              :class="category.id - 1 !== category_active ? 'filter' : ''"
            />
           <!--  category.id = 1   category_active = 0 -->
          </div>
        </vue-glide-slide>
        <template slot="control">
          <button class="bg-transparent border-0 sx" data-glide-dir="<">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="20"
              height="20"
              fill="currentColor"
              class="bi bi-arrow-left"
              viewBox="0 0 16 16"
            >
              <path
                fill-rule="evenodd"
                d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"
              />
            </svg>
          </button>
          <button class="bg-transparent border-0 dx" data-glide-dir=">">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="20"
              height="20"
              fill="currentColor"
              class="bi bi-arrow-right"
              viewBox="0 0 16 16"
            >
              <path
                fill-rule="evenodd"
                d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"
              />
            </svg>
          </button>
        </template>
      </vue-glide>
    </section>

    <section class="restaurant container" data-aos="zoom-in" data-aos-duration="1500">
      <div
        class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-3"
        v-if="filtered_restaurants"
      >

        <div
          class="col"
          v-for="restaurant in filtered_restaurants"
          :key="restaurant.id"
        >
          <router-link :to="'/restaurants/' + restaurant.slug">
            <div class="card">
              <div class="card_image">
                <img
                  class="img-fluid img_restaurant"
                  :src="
                    restaurant.cover_image.slice(0, 4) == 'http'
                      ? restaurant.cover_image
                      : 'storage/' + restaurant.cover_image
                  "
                  :alt="restaurant.name"
                />
              </div>
              <div class="card_text">
                <strong>{{ restaurant.name }}</strong>
              </div>
            </div>
          </router-link>
        </div>
      </div>
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-3" v-else>
        <div class="col" v-for="restaurant in restaurants" :key="restaurant.id">
          <router-link :to="'/restaurants/' + restaurant.slug">
          
            <div class="card">
              <div class="card_image">
                <img
                  class="img-fluid"
                  :src="
                    restaurant.cover_image.slice(0, 4) == 'http'
                      ? restaurant.cover_image
                      : 'storage/' + restaurant.cover_image
                  "
                  :alt="restaurant.name"
                />
              </div>
              <div class="card_text">
                <strong>{{ restaurant.name }}</strong>
              </div>
            </div>
          </router-link>
        </div>
      </div>
    </section>
    <!-- /.restaurant -->
  </div>
  <!-- /.home -->
</template>

<script>
import { Glide, GlideSlide } from "vue-glide-js";
export default {
  name: "Home",
  components: {
    [Glide.name]: Glide,
    [GlideSlide.name]: GlideSlide,
  },
  data() {
    return {
      restaurants: null,
      categories: null,
      filtered_restaurants: null,
      category_active: null,
    };
  },
  methods: {
    getAllRestaurants() {
      axios
        .get("/api/restaurants", {})
        .then((response) => {
          //console.log(response);
          this.restaurants = response.data;
        })
        .catch((error) => {
          console.error(error);
        });
    },
    getAllCategories() {
      axios
        .get("/api/categories", {})
        .then((response) => {
          //console.log(response);
          this.categories = response.data;
        })
        .catch((error) => {
          console.error(error);
        });
    },
    getActiveCategory(index) {
      //console.log(index);
      this.category_active = index - 1;
      console.log(this.category_active);

    },

        getFilteredRestaurants() {
      axios
        .get(`/api/restaurants/filter/${this.categories[this.category_active].name}`, {})
        .then((response) => {
          //console.log(response);
          this.filtered_restaurants = response.data;
        })
        .catch((error) => {
          console.error(error);
        });
  },

  },
  mounted() {
    console.log("mounted");
    this.getAllRestaurants();
    this.getAllCategories();
  },
};
</script>

<style lang="scss">

.jumbotron {
  .img_jumbo {
    width: 100%;
    height: 500px;
    object-fit: cover;
    object-position: center;
  }
}

.category {
  position: relative;
  bottom: 150px;
  background-color: rgba(255, 255, 255, 0.671);
  box-shadow: 0 0 10px grey;
  border-radius: 0.3rem;

  padding: 1rem;
  .img_category {
    width: 100%;
    height: 200px;
    object-fit: cover;
    object-position: center;
    box-shadow: 0 0 10px lightgray;
    border-radius: 0.3rem;
  }

  button {
    transition: all 1s;
    &:hover {
      background-color: orangered !important;
      border-radius: 0.5rem;
      color: white;
    }
  }

  .glide {
    text-align: center;
  }

  .glide__slide {
    width: 5% !important;
  }

  .filter{
    filter: brightness(0.5);
  }

}
  .animate__animated.animate__fadeIn {
  --animate-duration: 2s;
}
</style>