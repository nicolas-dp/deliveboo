<template>
  <div class="chart-container">
    <div class="wrapper">
      <h1 class="text-center p-3">5 Years Order</h1>
      <canvas id="myChart" width="400" height="400"></canvas>
    </div>
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
          const labelx = [
            "1970 - 1975",
            "1976 - 1980",
            "1981 - 1985",
            "1986 - 1990",
            "1991 - 1995",
            "1996 - 2000",
            "2001 - 2005",
            "2006 - 2010",
            "2011 - 2015",
            "2016 - 2020",
            "2021 - Now",
          ];
          const labely = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
          this.xlabel.forEach((element, index) => {
            const year = parseInt(element.slice(0, 4));
            // console.log(this.ylabel)
            switch (true) {
              case year >= 1970 && year <= 1975:
                labely[0] += parseInt(this.ylabel[index]);
                break;
              case year >= 1976 && year <= 1980:
                labely[1] += parseInt(this.ylabel[index]);
                break;
              case year >= 1981 && year <= 1985:
                labely[2] += parseInt(this.ylabel[index]);
                break;
              case year >= 1986 && year <= 1990:
                labely[3] += parseInt(this.ylabel[index]);
                break;
              case year >= 1991 && year <= 1995:
                labely[4] += parseInt(this.ylabel[index]);
                break;
              case year >= 1996 && year <= 2000:
                labely[5] += parseInt(this.ylabel[index]);
                break;
              case year >= 2001 && year <= 2005:
                labely[6] += parseInt(this.ylabel[index]);
                break;
              case year >= 2006 && year <= 2010:
                labely[7] += parseInt(this.ylabel[index]);
                break;
              case year >= 2011 && year <= 2015:
                labely[8] += parseInt(this.ylabel[index]);
                break;
              case year >= 2016 && year <= 2020:
                labely[9] += parseInt(this.ylabel[index]);
                break;
              case year >= 2021 && year <= 2022:
                labely[10] += parseInt(this.ylabel[index]);
                break;
            }
          });

          console.log(labely);
          console.log(labelx);

          const ctx = document.getElementById("myChart");

          //console.log(ctx);

          const myChart = new Chart(ctx, {
            type: "bar",
            data: {
              labels: labelx,
              datasets: [
                {
                  label: "€ amount",
                  data: labely,
                  backgroundColor: this.randomColor(labelx.length),
                  borderColor: this.randomColor(labelx.length),
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
    randomColor(array_length) {
      let output = [];
      for (let i = 0; i < array_length; i++) {
        output.push(
          `rgba(${Math.floor(Math.random() * 256)}, ${Math.floor(
            Math.random() * 256
          )}, ${Math.floor(Math.random() * 256)}, 0.2)`
        );
      }
      return output;
    },
  },
  mounted() {
    this.getStatisticOrders();
    console.log("user", this.user);
  },
};

// const Chart = require("chart.js");
</script>

<style >
.chart-container {
  width: 100%;
  height: 100%;
  display: flex;
  justify-content: left;
  align-items: center;
}

.wrapper {
  width: 500px;
  height: 500px;
}
</style>