<template>
  <div class="actions text-center">
    <div class="btn-group" role="group" aria-label="Basic example">
      <button
        type="button"
        class="btn btn-secondary text-white"
        @click="subtractOne()"
      >
        -
      </button>
      <span class="counter bg-light px-3 d-flex align-items-center">
        <!-- :class="`dish-${dish.id}`" -->
        {{ counter }}
      </span>
      <button
        type="button"
        class="btn btn-secondary text-white"
        @click="addOne()"
      >
        +
      </button>
    </div>

    <button
      type="button"
      class="add_cart btn bg_orange ms-3"
      @click="addItemToCart(dishElement, counter)"
    >
      <svg
        xmlns="http://www.w3.org/2000/svg"
        width="25"
        height="25"
        fill="white"
        class="bi bi-cart-fill"
        viewBox="0 0 16 16"
      >
        <path
          d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"
        />
      </svg>
    </button>
  </div>
</template>

<script>
import state from "../state";

export default {
  name: "CartActions",

  props: {
    dishElement: Object,
    restaurantPageId: Number,
    restaurantSlug: String,
  },

  data() {
    return {
      counter: 1,
    };
  },

  methods: {
    //metodo per aggiungere una unità al contatore
    addOne() {
      this.counter = this.counter + 1;
    },

    //metodo per rimuovere una unità dal contatore
    subtractOne() {
      if (this.counter > 1) {
        this.counter = this.counter - 1;
      }
    },

    //metodo per immagazzinare nel local storage le informazioni da passare alla pagina di checkout
    setRestaurantCookie() {
      //rimuovo cookie esistente
      localStorage.removeItem("restaurant_id");
      localStorage.removeItem("restaurant_slug");

      //creo il 'cookie'
      localStorage.setItem("restaurant_id", this.restaurantPageId);
      localStorage.setItem("restaurant_slug", this.restaurantSlug);
    },


    //CODICE PER INSERIRE PIATTO/I NEL CARRELLO
    addItem(dishObject, dishAmount) {
      //se esiste gìa nel carrello aggiunto altri elementi
      if (
        state.cart.list_dishes.filter(
          (dishQuery) => dishQuery.name === dishObject.name
        ).length > 0
      ) {
        const objIndex = state.cart.list_dishes.findIndex(
          (obj) => obj.id == dishObject.id
        );

        //console.log(`indice arraypiatti: ${objIndex}`);

        state.cart.list_dishes[objIndex].amount =
          state.cart.list_dishes[objIndex].amount + dishAmount;

        state.cart.makeTotal();
      }
      //sennò lo creo
      else {
        let newDish = dishObject;

        newDish["amount"] = dishAmount;

        state.cart.list_dishes.push(newDish);

        //console.log(state.cart.list_dishes);

        state.cart.makeTotal();

        console.log("totale carrello");
        console.log(state.cart.total_amount);
      }
      //FINE CODICE PER INSERIRE PIATTO/I NEL CARRELLO

      this.$emit("setCookie");
    },

    //funzione aggiunta per evitare di aggiungere piatti al carrello 
    //quando il carrello contiene elementi di altri ristoranti
    //-> in tal caso comparirà un alert che ti chiede se vuoi azzerare il carrello
    addItemToCart(dishObject, dishAmount) {
      //mi deve eseguire il codice se il ristorante id passato per props
      //è uguale a quello nel local storage
      if (state.cart.list_dishes.length == 0) {
        //CODICE PER INSERIRE PIATTO/I NEL CARRELLO
        this.addItem(dishObject, dishAmount);

        this.setRestaurantCookie();
      } else if (
        state.cart.list_dishes.length > 0 &&
        this.restaurantPageId == localStorage.getItem("restaurant_id")
      ) {
        //CODICE PER INSERIRE PIATTO/I NEL CARRELLO
        this.addItem(dishObject, dishAmount);

        this.setRestaurantCookie();
      } else {
        //se non coincidono gli ID faccio comparire una modale per
        //chiedere all'utente se vuole azzerare il carrello e farne uno nuovo

        //prova sweettalert

        swal({
          title: "Vuoi creare un nuovo carrello?",
          text: "Puoi ordinare da un solo ristorante, vuoi rimuovere i piatti presenti nel carrello?",
          icon: "warning",
          //buttons: true,
          buttons: ["Annulla", "Azzera carrello"],
          dangerMode: true,
        }).then((willDelete) => {
          state.cart.resetCart();

          //CODICE PER INSERIRE PIATTO/I NEL CARRELLO
          this.addItem(dishObject, dishAmount);

          //this.$emit('setCookie');

          this.setRestaurantCookie();
        });
      }

      this.counter = 1;
    },
  },
};
</script>

<style lang="scss" scoped>
.bg_orange {
  background-color: #ff7f31;
  color: white;
}

.counter {
  font-size: 0.8rem;
}
</style>