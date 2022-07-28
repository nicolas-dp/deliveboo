<template>
  <div>
    <h1>Ciao Cari {{ user }}</h1>
    <canvas id="myChart" width="400" height="400"></canvas>
  </div>
</template>

<script>
import Chart from "chart.js";
// import Chart from 'chart.js/auto';

import Axios from "axios";
export default {
  name: "Graphics",
  props: {
    user: Number,
  },
  data() {
    return {
      orders: null,
      xlabel: [],
      ylabel: [],
    };
  },
  methods: {
    getStatisticOrders() {
      Axios.get(`/api/orders/statistics/${this.user}`)
        .then((response) => {
          this.orders = response.data;
          this.orders.forEach((element) => {
            this.xlabel.push(element.order_date);
            this.ylabel.push(element.total_price);
          });

          console.log(this.xlabel);

          const ctx = document.getElementById("myChart");

          //console.log(ctx);

          const myChart = new Chart(ctx, {
            type: "bar",
            data: {
              labels: this.xlabel,
              datasets: [
                {
                  label: "# of Votes",
                  data: this.ylabel,
                  backgroundColor: [
                    "rgba(255, 99, 132, 0.2)",
                    "rgba(54, 162, 235, 0.2)",
                    "rgba(255, 206, 86, 0.2)"
                  ],
                  borderColor: [
                    "rgba(255, 99, 132, 1)",
                    "rgba(54, 162, 235, 1)",
                    "rgba(255, 206, 86, 1)"
                  ],
                  borderWidth: 1,
                },
              ],
            },
            options: {
              scales: {
                y: {
                  beginAtZero: true,
                },
              },
            },
          });
        })
        .catch((e) => {
          console.error(e);
        });
    },
  },
  mounted() {
    this.getStatisticOrders();
    console.log("user", this.user);
  },
};

// const Chart = require("chart.js");
</script>