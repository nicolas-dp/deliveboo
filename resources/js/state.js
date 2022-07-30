//importo Vue
import Vue from 'vue';
import VueBraintree from 'vue-braintree';
Vue.use(VueBraintree);
//inserisco qui le variabili che voglio 
//raggiungere dai componenti non parenti
const state = Vue.observable({

    cart: {

        list_dishes: [
            //Gli elementi del carrello dovranno contenere
            //id piatto
            //nome piatto
            //quantità piatto
            //prezzo singolo piatto
            //prezzo singolo per quantità
        ],

        //il totale sarà la somma dei parziali totali
        total_amount: 0.00,

        //metodo per sommare i prezzi dei piatti in list_dishes
        makeTotal: function() {
            if (this.list_dishes.length > 0) {

                let sum = 0;
                //fa la somma
                this.list_dishes.forEach(dish => {
                    const partial = dish.amount * dish.price;

                    sum = sum + partial;
                });

                this.total_amount = sum;

            } else {
                console.log('Somma totale carrelo non riuscita: non posso sommare 0 elementi');
                this.total_amount = 0.00;
            }
        },

        //metodo per resettare il carrello
        resetCart: function() {

            console.log('sto per cancellare tutto, attualmente hai');
            console.log(this.list_dishes);

            this.list_dishes = [];

            this.total_amount = 0.00;

            console.log('lista piatti dopo azzeramento');
            console.log(this.list_dishes);

        },


    }

})

//esporto
export default state