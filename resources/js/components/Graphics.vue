<template>
  <div>
    <h1>Ciao Stronzi {{ user }}</h1>
    <canvas class="my_canvas" id="myChart" width="400" height="400"></canvas>
  </div>
</template>

<script>
// import { Chart } from "chart.js";
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
const ctx = document.getElementById("myChart");
const myChart = new Chart(ctx, {
  type: "bar",
  data: {
    labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
    datasets: [
      {
        label: "# of Votes",
        data: [12, 19, 3, 5, 2, 3],
        backgroundColor: [
          "rgba(255, 99, 132, 0.2)",
          "rgba(54, 162, 235, 0.2)",
          "rgba(255, 206, 86, 0.2)",
          "rgba(75, 192, 192, 0.2)",
          "rgba(153, 102, 255, 0.2)",
          "rgba(255, 159, 64, 0.2)",
        ],
        borderColor: [
          "rgba(255, 99, 132, 1)",
          "rgba(54, 162, 235, 1)",
          "rgba(255, 206, 86, 1)",
          "rgba(75, 192, 192, 1)",
          "rgba(153, 102, 255, 1)",
          "rgba(255, 159, 64, 1)",
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
</script>