<template>
  <div class="chart-container">
    <img
      class="img_opacity"
      src="https://img.freepik.com/premium-vector/food-doodle-set_160308-239.jpg?w=2000"
      alt=""
    />
    <div class="wrapper pt-5">
      <div class="card pt-2 pb-4 px-4 rounded my_shadow">
        <h1 class="text-center p-3 my_yellow">Incassi per Anno</h1>
        <canvas id="myChart" width="500" height="400"></canvas>
      </div>
    </div>
    <div class="wrapper pt-5">
      <div class="card pt-2 pb-4 px-4 rounded my_shadow">
        <h1 class="text-center p-3 my_yellow">Incassi per Mese</h1>
        <canvas id="myChart_2" width="600" height="400"></canvas>
      </div>
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

          console.log(this.xlabel);

          //GRAFICO ANNI
          const labelx_years = ["2017", "2018", "2019", "2020", "2021", "2022"];
          const labely_years = [0, 0, 0, 0, 0, 0];
          this.xlabel.forEach((element, index) => {
            const year = parseInt(element.slice(0, 4));
            // console.log(this.ylabel)
            switch (true) {
              case year == 2017:
                labely_years[0] += parseInt(this.ylabel[index]);
                break;
              case year == 2018:
                labely_years[1] += parseInt(this.ylabel[index]);
                break;
              case year == 2019:
                labely_years[2] += parseInt(this.ylabel[index]);
                break;
              case year == 2020:
                labely_years[3] += parseInt(this.ylabel[index]);
                break;
              case year == 2021:
                labely_years[4] += parseInt(this.ylabel[index]);
                break;
              case year == 2022:
                labely_years[5] += parseInt(this.ylabel[index]);
                break;
            }
          });

          console.log(labely_years);
          console.log(labelx_years);

          const ctx = document.getElementById("myChart");

          //console.log(ctx);

          const myChart = new Chart(ctx, {
            type: "bar",
            data: {
              labels: labelx_years,
              datasets: [
                {
                  label: " amount €",
                  data: labely_years,
                  backgroundColor: this.randomColor(labelx_years.length),
                  borderColor: this.randomColor(labelx_years.length),
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
          //FINE GRAFICO ANNI

          //GRAFICO MESI
          const labelx_months = [
            "Gen",
            "Feb",
            "Mar",
            "Apr",
            "Mag",
            "Giu",
            "Lug",
            "Ago",
            "Set",
            "Ott",
            "Nov",
            "Dic",
          ];
          const labely_months = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
          this.xlabel.forEach((element, index) => {
            const month = parseInt(element.slice(5, 7));
            //console.log(element.slice(5, 7));
            switch (true) {
              case month == 1:
                labely_months[0] += parseInt(this.ylabel[index]);
                break;
              case month == 2:
                labely_months[1] += parseInt(this.ylabel[index]);
                break;
              case month == 3:
                labely_months[2] += parseInt(this.ylabel[index]);
                break;
              case month == 4:
                labely_months[3] += parseInt(this.ylabel[index]);
                break;
              case month == 5:
                labely_months[4] += parseInt(this.ylabel[index]);
                break;
              case month == 6:
                labely_months[5] += parseInt(this.ylabel[index]);
                break;
              case month == 7:
                labely_months[6] += parseInt(this.ylabel[index]);
                break;
              case month == 8:
                labely_months[7] += parseInt(this.ylabel[index]);
                break;
              case month == 9:
                labely_months[8] += parseInt(this.ylabel[index]);
                break;
              case month == 10:
                labely_months[9] += parseInt(this.ylabel[index]);
                break;
              case month == 11:
                labely_months[10] += parseInt(this.ylabel[index]);
                break;
              case month == 12:
                labely_months[11] += parseInt(this.ylabel[index]);
                break;
            }
          });

          console.log(labely_months);
          console.log(labelx_months);

          const ctx_2 = document.getElementById("myChart_2");

          //console.log(ctx);

          const myChart_2 = new Chart(ctx_2, {
            type: "bar",
            data: {
              labels: labelx_months,
              datasets: [
                {
                  label: "€ amount",
                  data: labely_months,
                  backgroundColor: this.randomColor(labelx_months.length),
                  borderColor: this.randomColor(labelx_months.length),
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
          //FINE GRAFICO MESI
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
          )}, ${Math.floor(Math.random() * 256)}, 0.5)`
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
  justify-content: space-around;
  row-gap: 0.5rem;
  flex-wrap: wrap;
  align-items: center;
}
.my_yellow {
  color: #ffc312;
}
/* .wrapper {
  max-width: 600px;
  max-height: 600px;
} */

.bg-admin,
.img_opacity {
  height: 100%;
  width: 100%;
  z-index: -5;
  object-fit: cover;
  position: absolute;
  top: 0;
  left: 0;
  opacity: 0.65;
}

.img_opacity {
  opacity: 0.45 !important;
}

.my_shadow {
  box-shadow: rgb(17 17 26 / 10%) 0px 0px 16px;
}
#myChart_2 {
  width: 600px;
  height: 400px;
}
#myChart {
  width: 500px;
  height: 400px;
}

@media (max-width: 320px) {
  #myChart_2 {
    width: 80%;
    height: 400px;
  }
  #myChart {
    width: 80%;
    height: 400px;
  }
}

@media (max-width: 425px) {
  #myChart_2 {
    width: 80% ;
    height: 400px ;
  }
  #myChart {
    width: 80% ;
    height: 400px ;
  }
}

@media (max-width: 576px) {
  #myChart_2 {
    width: 100%;
    height: 400px;
  }
  #myChart {
    width: 100%;
    height: 400px;
  }
}
</style>