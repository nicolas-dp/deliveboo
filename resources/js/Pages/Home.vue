<template>
  <div class="home">
    <div class="jumbotron" v-if="categories">
      <div
        id="carouselExampleFade"
        class="carousel slide carousel-fade"
        data-bs-ride="carousel"
      >
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img
              src="https://d1e3z2jco40k3v.cloudfront.net/-/media/drog19/recipe-images/pizza-margherita-con-basilico_2000.jpg?rev=c0ef67e2f4684f9dbbcf1a54188cc5b0&vd=20200707T052020Z&extension=webp&hash=A8628D12F2C4815774B2D70DA6A46E4D"
              class="img_jumbo"
              alt="pizza"
            />
          </div>
          <div class="carousel-item">
            <img
              src="https://static.gamberorosso.it/2022/01/sushi-768x512.jpeg"
              class="img_jumbo"
              alt="sushi"
            />
          </div>

          <div class="carousel-item">
            <img
              src="https://www.viaggiaregratis.eu/wp-content/uploads/2020/11/Cucina-Messicana.webp"
              class="img_jumbo"
              alt="messicano"
            />
          </div>

          <div class="carousel-item">
            <img
              src="https://s3-eu-west-1.amazonaws.com/fratelliorsero/wp-content/uploads/2019/06/10105107/shutterstock_1304751289.jpg"
              class="img_jumbo"
              alt="indiano"
            />
          </div>

          <div class="carousel-item">
            <img
              src="https://www.chefspencil.com/wp-content/uploads/American-Foods.jpg"
              class="img_jumbo"
              alt="americano"
            />
          </div>

          <div class="carousel-item">
            <img
              src="https://luxofood.com/wp-content/uploads/2021/12/chinese-5233490_1280.jpg"
              class="img_jumbo"
              alt="cinese"
            />
          </div>

          <div class="carousel-item">
            <img
              src="https://mir-s3-cdn-cf.behance.net/project_modules/2800_opt_1/727bda84826873.5d6906eb29c0a.jpg"
              class="img_jumbo"
              alt="pesce"
            />
          </div>

          <div class="carousel-item">
            <img
              src="https://www.buttalapasta.it/wp-content/uploads/2016/01/pasta-spaghetti-alla-puttanesca.jpg"
              class="img_jumbo"
              alt="italiano"
            />
          </div>

          <div class="carousel-item">
            <img
              src="https://www.eatthis.com/wp-content/uploads/sites/4/2020/05/lamb-gyro.jpg?quality=82&strip=1"
              class="img_jumbo"
              alt="greco"
            />
          </div>

          <div class="carousel-item">
            <img
              src="https://static01.nyt.com/images/2020/07/10/well/10well-newsletter/10well-newsletter-superJumbo.jpg"
              class="img_jumbo"
              alt="dolce"
            />
          </div>

          <div class="carousel-item">
            <img
              src="https://staticfanpage.akamaized.net/wp-content/uploads/sites/21/2019/05/kebab-fatto-in-casa-1200x675.jpg"
              class="img_jumbo"
              alt="kebab"
            />
          </div>

          <div class="carousel-item">
            <img
              src="https://www.washingtonpost.com/wp-apps/imrs.php?src=https://arc-anglerfish-washpost-prod-washpost.s3.amazonaws.com/public/PZGK6PDBSYI6XILXO5S7FGUVEQ.jpg&w=1440"
              class="img_jumbo"
              alt="fritti"
            />
          </div>

          <div class="carousel-item">
            <img
              src="https://cdn.ilclubdellericette.it/wp-content/uploads/2022/05/ricetta-poke-bowl-al-tonno-e-mango-1280x720.jpg"
              class="img_jumbo"
              alt="poke"
            />
          </div>

          <div class="carousel-item">
            <img
              src="https://post.healthline.com/wp-content/uploads/2020/09/healthy-eating-ingredients-732x549-thumbnail.jpg"
              class="img_jumbo"
              alt="healthy"
            />
          </div>

          <div class="carousel-item">
            <img
              src="https://primochef.it/wp-content/uploads/2021/11/SH_panuozzo.jpg"
              class="img_jumbo"
              alt="panuozzo"
            />
          </div>

          <div class="carousel-item">
            <img
              src="https://s3-eu-west-1.amazonaws.com/fratelliorsero/wp-content/uploads/2019/06/10105107/shutterstock_1304751289.jpg"
              class="img_jumbo"
              alt="siriano"
            />
          </div>

          <div class="carousel-item">
            <img
              src="https://mcdn.elektronik-star.de/klarstein/landingpage/lp-vegan-week/KS_VEGAN_WEEK_shop_LP_header_desktop_1440_560.jpg"
              class="img_jumbo"
              alt="vegano"
            />
          </div>
        </div>
        <button
          class="carousel-control-prev"
          type="button"
          data-bs-target="#carouselExampleFade"
          data-bs-slide="prev"
        >
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button
          class="carousel-control-next"
          type="button"
          data-bs-target="#carouselExampleFade"
          data-bs-slide="next"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>

    <section class="category container">
      <vue-glide v-if="categories">
        <vue-glide-slide v-for="category in categories" :key="category.id">
          <div
            :class="'category_wrapper_' + category.id"
            v-on:click="toggleAction(category.id)"
          >
            <!-- <img
              class="img_category"
              :src="category.cover_image"
              :alt="category.name"
              :class="category.id - 1 !== category_active ? 'filter' : ''"
            /> -->
            <img
              class="img_category filter"
              :src="category.cover_image"
              :alt="category.name"
            />
            <!-- <h5
              class="text-center text-uppercase pt-2 pb-3 title_category"
              :class="category.id - 1 == category_active ? 'bg_orange' : ''"
            >
              {{ category.name }}
            </h5> -->

            <h5
              class="
                title_category
                text-center text-uppercase
                fw-bold
                pt-2
                pb-3
              "
            >
              {{ category.name }}
            </h5>
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

    <section
      class="restaurant container"
      data-aos="zoom-in"
      data-aos-duration="1000"
      v-if="restaurants"
    >
      <div
        class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-5"
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
                  v-if="restaurant.cover_image"
                  class="img_restaurant"
                  :src="
                    restaurant.cover_image.slice(0, 4) == 'http'
                      ? restaurant.cover_image
                      : 'storage/' + restaurant.cover_image
                  "
                  :alt="restaurant.name"
                />
                <img
                  v-else
                  src="https://www.clipartmax.com/png/middle/213-2131416_restaurant-lamb-clipart-placeholder-image-for-restaurant.png"
                  :alt="restaurant.name"
                  class="img-fluid"
                />
              </div>
              <div class="card_text p-2">
                <h4 class="orange">{{ restaurant.name }}</h4>
                <p>
                  <span class="orange">Indirizzo:</span>
                  {{ restaurant.address }}
                </p>
                <p>
                  <span class="orange">Chiude alle</span>
                  {{ restaurant.closing_hours.slice(0, 5) }}
                </p>
                <div class="badge_delivery badge bg_orange">
                  <p>
                    <span class="orange"><strong>Spedizione:</strong></span>
                    {{ restaurant.delivery_cost }}€
                  </p>
                </div>
              </div>
            </div>
          </router-link>
        </div>
      </div>
      <div
        class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-5"
        v-else
      >
        <div class="col" v-for="restaurant in restaurants" :key="restaurant.id">
          <router-link :to="'/restaurants/' + restaurant.slug">
            <div class="card">
              <div class="card_image">
                <img
                  v-if="restaurant.cover_image"
                  class=""
                  :src="
                    restaurant.cover_image.slice(0, 4) == 'http'
                      ? restaurant.cover_image
                      : 'storage/' + restaurant.cover_image
                  "
                  :alt="restaurant.name"
                />
                <img
                  v-else
                  src="https://www.clipartmax.com/png/middle/213-2131416_restaurant-lamb-clipart-placeholder-image-for-restaurant.png"
                  :alt="restaurant.name"
                  class=""
                />
              </div>
              <div class="card_text p-2">
                <h4 class="orange">{{ restaurant.name }}</h4>
                <p>
                  <span class="orange">Indirizzo:</span>
                  {{ restaurant.address }}
                </p>
                <p>
                  <span class="orange">Chiude alle</span>
                  {{ restaurant.closing_hours.slice(0, 5) }}
                </p>
                <div class="badge_delivery badge bg_orange">
                  <p>
                    <span class="orange"><strong>Spedizione:</strong></span>
                    {{ restaurant.delivery_cost }}€
                  </p>
                </div>
              </div>
            </div>
          </router-link>
        </div>
      </div>

      <div class="not_restaurant text-center" v-if="filtered_restaurants == 0">
        <h1 class="orange py-5">
          Non ci sono ristoranti con le categorie selezionate.
        </h1>
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
      filter_array: [],
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
          console.log(response.data);
          this.categories = response.data;
        })
        .catch((error) => {
          console.error(error);
        });

      console.log(this.categories);
    },
    getActiveCategory(index) {
      //console.log(index);
      this.category_active = index - 1;
      console.log(this.category_active);
    },

    getFilteredRestaurants(filtered_array) {
      let query = "";
      filtered_array.forEach((element) => {
        query = query + element + "/";
      });
      axios
        .get(`/api/restaurants/filterplus/${query}`, {})
        .then((response) => {
          //console.log(response);
          this.filtered_restaurants = response.data;
          console.log(response.data);
        })
        .catch((error) => {
          console.error(error);
        });
    },

    /* 
    metodo toggleAction che prende in input l'id della categoria
    1 controlla se la cat selezionata ha classe 'active' o no
    3 se non è presente aggiunge classe 'active' e pusha in un array 'filter_array' l'id della categoria e fa partire la funzione 'filter_plus'
    2 se è presente la rimuove, rimuove anche dall'array 'filter_array' l'id della categoria e fa partire la funzione 'filter_plus'
  */

    toggleAction(id) {
      let title_category = document.querySelector(
        `.category_wrapper_${id} > .title_category`
      );
      //console.log('titolo', title_category);
      let img_category = document.querySelector(
        `.category_wrapper_${id} > .img_category`
      );
      //console.log('immagine', img_category);

      if (
        title_category.classList.contains("bg_orange") &&
        !img_category.classList.contains("filter")
      ) {
        title_category.classList.remove("bg_orange");
        img_category.classList.add("filter");
        const index = this.filter_array.indexOf(id);
        //console.log('indice elemento da shiftare', index);
        //console.log('array filtrato prima di splice', this.filter_array);
        this.filter_array.splice(index, 1);
        console.log("array filtrato dopo splice", this.filter_array);
        if (this.filter_array.length > 0) {
          this.getFilteredRestaurants(this.filter_array);
        } else {
          this.filtered_restaurants = null;
        }
      } else if (this.filter_array.length < 3) {
        title_category.classList.add("bg_orange");
        img_category.classList.remove("filter");

        //console.log('array filtrato prima del push', this.filter_array);
        this.filter_array.push(id);
        //console.log('array filtrato dopo il push', this.filter_array);
        this.getFilteredRestaurants(this.filter_array);
      }
    },
  },

  mounted() {
    //console.log(this.prova_variabile);
    this.getAllRestaurants();
    this.getAllCategories();
  },
};
</script>

<style lang="scss">
.home {
  .jumbotron {
    z-index: 0;
    .img_jumbo {
      width: 100%;
      height: 500px;
      object-fit: cover;
      object-position: center;
    }
  }

  .category {
    z-index: 10;
    position: relative;
    bottom: 100px;
    background-color: rgba(255, 255, 255, 0.671);
    box-shadow: 0 0 10px grey;
    border-radius: 0.3rem;
    padding: 1rem;

    .title_category {
      transition: all 0.5s;
      border-bottom-left-radius: 0.5rem;
      border-bottom-right-radius: 0.5rem;
    }

    .bg_orange {
      background-color: #ff7f31;
      color: white;
    }

    .img_category {
      width: 100%;
      height: 200px;
      object-fit: cover;
      object-position: center;
      box-shadow: 0 0 10px lightgray;
      border-top-left-radius: 0.5rem;
      border-top-right-radius: 0.5rem;
    }

    button {
      transition: all 0.5s;
      &:hover {
        background-color: #ff7f31 !important;
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

    .filter {
      transition: all 1s;
      filter: brightness(0.5);
    }
  }

  .restaurant {
    position: relative;
    a {
      text-decoration: none;
      color: black;
    }
    p {
      margin: 0;
    }
    .card {
      position: relative;
      height: 100%;
      border-radius: 0.5rem;
      transition: all 0.7s;
      box-shadow: 0 0 8px grey;

      &:hover {
        transform: scale(1.05);
        box-shadow: 0px 11px 20px 2px grey;
      }

      .card_image {
        height: 160px;
        overflow: hidden;
        img {
          width: 100%;
          height: 100%;
          object-fit: cover;
          object-position: center;
        }
      }

      .badge_delivery {
        position: absolute;
        right: -15px;
        top: -10px;
        background-color: #ff7f31;
        padding: 0.5rem;
        /* box-shadow: 0 0 10px gray; */
        box-shadow: rgba(0, 0, 0, 0.12) 0px 1px 3px,
          rgba(0, 0, 0, 0.24) 0px 1px 2px;
        strong {
          font-size: 0.75rem;
          color: #43423e;
        }
      }
    }
  }

  .orange {
    color: #ff7f31;
  }

  @media screen and (max-width: 575px) {
    .img_category {
      height: 120px !important;
    }
    .img_jumbo {
      height: 300px !important;
    }
  }
}
</style>