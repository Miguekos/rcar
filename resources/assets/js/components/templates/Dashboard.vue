<template lang="html">
<div class="">
    <v-container grid-list-md="grid-list-md" text-xs-center="text-xs-center">
        <v-layout row="row" wrap="wrap">

            <v-flex xs12="xs12" lg6="lg6">
                <v-card color="">
                    <v-card-title class="pb-1">
                        Control de gasots por dia
                    </v-card-title>
                    <v-card-text class="pt-0">
                        <canvas id="doughnut-chart" width="20%" height="20%"></canvas>
                        <!-- <canvas id="doughnut-chart"></canvas> -->
                    </v-card-text>

                </v-card>
            </v-flex>

            <v-flex xs12="xs12" lg6="lg6">
                <v-card color="">
                    <v-card-title class="pb-1">
                        Modelos mas alquilados
                    </v-card-title>
                    <v-card-text class="pt-0">
                        <canvas id="bar-chart" width="20%" height="20%"></canvas>
                        <!-- <canvas id="bar-chart"></canvas> -->
                    </v-card-text>
                </v-card>
            </v-flex>

            <v-flex xs12="xs12" lg12="lg12">
                <v-card>
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-chart">
                                <div class="card-header ">
                                    <div class="row">
                                        <div class="col-sm-6 text-left">
                                            <h5 class="card-category">Ultimo Mes</h5>
                                            <h2 class="card-title">Gastos de operacion</h2>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
                                                <label class="btn btn-sm btn-primary btn-simple active" id="0">
                                                    <input type="radio" name="options" checked="checked">
                                                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Diario</span>
                                                        <span class="d-block d-sm-none">
                                                            <i class="tim-icons icon-single-02"></i>
                                                        </span>
                                                    </label>
                                                    <label class="btn btn-sm btn-primary btn-simple" id="1">
                                                        <input type="radio" class="d-none d-sm-none" name="options">
                                                            <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Semanal</span>
                                                            <span class="d-block d-sm-none">
                                                                <i class="tim-icons icon-gift-2"></i>
                                                            </span>
                                                        </label>
                                                        <label class="btn btn-sm btn-primary btn-simple" id="2">
                                                            <input type="radio" class="d-none" name="options">
                                                                <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Mensual</span>
                                                                <span class="d-block d-sm-none">
                                                                    <i class="tim-icons icon-tap-02"></i>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="chart-area">
                                                    <canvas id="chartBig1"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </v-card>
                        </v-flex>

                    </v-layout>
                </v-container>
            </div>
</template>

<script>
window.onload = function() {
  // Dona
  new Chart(document.getElementById("doughnut-chart"), {
    type: 'doughnut',
    data: {
      labels: ["Repuestos", "Taller", "Seguro", "Papeletas"],
      datasets: [{
        label: "Population (millions)",
        backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#c45850"],
        data: [1250, 2035, 1100, 1800]
      }]
    },
    options: {
      legend: {
        display: true
      },
      title: {
        display: false,
        text: 'Control de gastos por dia'
      }
    }
  });

  // Bar chart
  new Chart(document.getElementById("bar-chart"), {
    type: 'bar',
    data: {
      labels: ["Repuestos", "Taller", "Seguro", "Papeletas", "Repuestos", "Taller", "Seguro", "Papeletas"],
      datasets: [{
        label: "Mas Alquilados",
        // backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850"],
        backgroundColor: [],
        data: [2478, 5267, 734, 784, 433, 2478, 5267, 734, 784, 433]
      }]
    },
    options: {
      legend: {
        labels: {
          // This more specific font property overrides the global property
          fontColor: 'black'
        },
        display: true
      },
      title: {
        display: false,
        text: 'Modelos mas Alquilados'
      },
      events: ['click'],
      responsive: true,
    }
  });
  // big charts
  gradientChartOptionsConfigurationWithTooltipPurple = {
    maintainAspectRatio: false,
    legend: {
      labels: {
        // This more specific font property overrides the global property
        fontColor: 'black'
      },
      display: false
    },
    tooltips: {
      backgroundColor: '#f5f5f5',
      titleFontColor: '#333',
      bodyFontColor: '#666',
      bodySpacing: 4,
      xPadding: 12,
      mode: "nearest",
      intersect: 0,
      position: "nearest"
    },
    responsive: true,
    scales: {
      yAxes: [{
        barPercentage: 1.6,
        gridLines: {
          drawBorder: false,
          color: 'rgba(29,140,248,0.0)',
          zeroLineColor: "transparent",
        },
        ticks: {
          suggestedMin: 60,
          suggestedMax: 125,
          padding: 20,
          fontColor: "#9a9a9a"
        }
      }],
      xAxes: [{
        barPercentage: 1.6,
        gridLines: {
          drawBorder: false,
          color: 'rgba(225,78,202,0.1)',
          zeroLineColor: "transparent",
        },
        ticks: {
          padding: 20,
          fontColor: "#9a9a9a"
        }
      }]
    }
  };
  var chart_labels = ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'];
  var chart_data = [100, 70, 90, 70, 85, 60, 75, 60, 90, 80, 110, 100];
  var ctx = document.getElementById("chartBig1").getContext('2d');

  var gradientStroke = ctx.createLinearGradient(0, 230, 0, 50);

  gradientStroke.addColorStop(1, 'rgba(72,72,176,0.1)');
  gradientStroke.addColorStop(0.4, 'rgba(72,72,176,0.0)');
  gradientStroke.addColorStop(0, 'rgba(119,52,169,0)'); //purple colors
  // gradientStroke.addColorStop(1, 'rgba(72,72,176,0.1)');
  // gradientStroke.addColorStop(0.4, 'rgba(72,72,176,0.0)');
  // gradientStroke.addColorStop(0, 'rgba(119,52,169,0)'); //purple colors
  // gradientStroke.addColorStop(0, 'rgba(29,204,94,1)'); //purple colors
  var config = {
    type: 'line',
    data: {
      labels: chart_labels,
      datasets: [{
        label: "My First dataset",
        fill: true,
        backgroundColor: gradientStroke,
        borderColor: '#17962f',
        borderWidth: 2,
        borderDash: [],
        borderDashOffset: 0.0,
        pointBackgroundColor: '#17962f',
        pointBorderColor: 'rgba(255,255,255,0)',
        pointHoverBackgroundColor: '#17962f',
        pointBorderWidth: 20,
        pointHoverRadius: 4,
        pointHoverBorderWidth: 15,
        pointRadius: 4,
        data: chart_data,
      }]
    },
    options: gradientChartOptionsConfigurationWithTooltipPurple
  };
  var myChartData = new Chart(ctx, config);
  $("#0").click(function() {
    var data = myChartData.config.data;
    data.datasets[0].data = chart_data;
    data.labels = chart_labels;
    myChartData.update();
  });
  $("#1").click(function() {
    var chart_data = [80, 120, 105, 110, 95, 105, 90, 100, 80, 95, 70, 120];
    var data = myChartData.config.data;
    data.datasets[0].data = chart_data;
    data.labels = chart_labels;
    myChartData.update();
  });

  $("#2").click(function() {
    var chart_data = [60, 80, 65, 130, 80, 105, 90, 130, 70, 115, 60, 130];
    var data = myChartData.config.data;
    data.datasets[0].data = chart_data;
    data.labels = chart_labels;
    myChartData.update();
  });

}
</script>

<style lang="css" scoped>
</style>
