<style>
  .app-fab--absolute {
    position: fixed;
    /*z-index: 3;*/
    width: 50px;
    height: 50px;
    border-radius: 100%;
    background: orange;
    right: 0;
    bottom: 0;
    /*position: absolute;*/
    margin-right: 13px;
    margin-bottom: 13px;
    border: none;
    outline: none;
    color: #FFF;
    font-size: 32px;
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
    transition: .3s;
  }

  @media(min-width: 1024px) {
    .app-fab--absolute {
      bottom: 2.5rem;
      right: 2.5rem;
      /*z-index: 3;*/
    }
  }

  button:hover {
    /*background: grey;
    color: white;
    color: #3a7999;
    box-shadow: inset 0 0 0 3px #F44336;*/
  }

  @-webkit-keyframes hvr-pulse {
    25% {
      -webkit-transform: scale(1.1);
      transform: scale(1.1);
    }

    75% {
      -webkit-transform: scale(0.9);
      transform: scale(0.9);
    }
  }

  @keyframes hvr-pulse {
    25% {
      -webkit-transform: scale(1.1);
      transform: scale(1.1);
    }

    75% {
      -webkit-transform: scale(0.9);
      transform: scale(0.9);
    }
  }

  .hvr-pulse {
    display: inline-block;
    vertical-align: middle;
    -webkit-transform: perspective(1px) translateZ(0);
    transform: perspective(1px) translateZ(0);
    box-shadow: 0 0 1px rgba(0, 0, 0, 0);
  }

  .hvr-pulse:hover,
  .hvr-pulse:focus,
  .hvr-pulse:active {
    -webkit-animation-name: hvr-pulse;
    animation-name: hvr-pulse;
    -webkit-animation-duration: 1s;
    animation-duration: 1s;
    -webkit-animation-timing-function: linear;
    animation-timing-function: linear;
    -webkit-animation-iteration-count: infinite;
    animation-iteration-count: infinite;
  }

</style>
<template>
  <div>
    <template>
      <!-- <v-tabs
        centered
        color="green"
        dark
        icons-and-text
      > -->
      <v-tabs
        centered
      >
        <v-tabs-slider color="green"></v-tabs-slider>

        <v-tab href="#tab-1">
          Pre-Reserva &nbsp;
          <h2>00</h2>

        </v-tab>

        <v-tab href="#tab-2">
          Evaluacion Pendiente &nbsp;
          <h2>00</h2>

        </v-tab>

        <v-tab href="#tab-3">
          Reserva Aprobada &nbsp;
          <h2>00</h2>

        </v-tab>

        <v-tab href="#tab-4">
          Pendiente de Entrega &nbsp;
          <h2>00</h2>

        </v-tab>

        <v-tab href="#tab-5">
          Liquidacion &nbsp;
          <h2>00</h2>

        </v-tab>

        <v-tab-item
          id="tab-1"
        >
          <v-card flat>
            <v-card-text>
              <pre-reserva></pre-reserva>
            </v-card-text>
          </v-card>
        </v-tab-item>

        <v-tab-item
          id="tab-2"
        >
          <v-card flat>
            <v-card-text>
              <pre-reserva></pre-reserva>
            </v-card-text>
          </v-card>
        </v-tab-item>
        <v-tab-item
          id="tab-3"
        >
          <v-card flat>
            <v-card-text>
              <pre-reserva></pre-reserva>
            </v-card-text>
          </v-card>
        </v-tab-item>

        <v-tab-item
          id="tab-4"
        >
          <v-card flat>
            <v-card-text>
              <pre-reserva></pre-reserva>
            </v-card-text>
          </v-card>
        </v-tab-item>

        <v-tab-item
          id="tab-5"
        >
          <v-card flat>
            <v-card-text>
              <pre-reserva></pre-reserva>
            </v-card-text>
          </v-card>
        </v-tab-item>
      </v-tabs>
    </template>
    <button v-ripple id="hvr-pulse" @click="crear()" class="mdc-fab app-fab--absolute" aria-label="Agregar">
      <span class="mdc-fab__icon material-icons">add</span>
    </button>
    <!-- <pre>{{ $data }}</pre> -->
  </div>
</template>

<script>
  import axios from 'axios';
  export default {
    props: ['user'],
    data: () => ({
      // boton inicio
      // boton fin
      // pagination: {},

    }),
    created() {

    },
    computed: {

    },
    methods: {
      crear (){
        window.location.href = '/reserva/create';
      }
    },

  }
</script>
