<style scoped="promos">

.nuevo {
  padding: 10px 10px 0px 10px;
  /* background:linear-gradient(30deg, crimson,sienna, royalblue, indianred, purple); */
  border-radius: 10px 10px 10px 10px;
}

.v-btn--small {
  font-size: 10px;
  height: 18px;
  padding: 0 8px;
}

.v-card__title--primary {
  padding-top: 0px;
}

.v-card__tit le {
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
  padding: 0px;
}

.app-fab--absolute {
  position: fixed;
  /*z-index: 3;*/
  width: 50px;
  height: 50px;
  border-radius: 100%;
  background: green;
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
<template id="promos">
<div>

  <v-container grid-list-md fluid text-xs-justify>
    <v-container class="py-0" grid-list-xs>
      <v-layout align-center justify-space-around row wrap fill-height>
        <v-flex lg4 class="nuevo">
          <v-card light hover ripple class="nuevo elevation-1">
            <v-card-title primary-title>
              <v-avatar>
                <v-icon color="orange" size="250%">perm_identity</v-icon>
              </v-avatar>
              <span>Cliente Total</span>
              <v-spacer></v-spacer>
              <div class="text-lg-justify">
                <div class="headline">{{ total }}</div>
              </div>
            </v-card-title>
          </v-card>
        </v-flex>
        <v-flex lg4 class="nuevo">
          <v-card light hover ripple class="nuevo elevation-1">
            <v-card-title primary-title>
              <v-avatar>
                <v-icon color="blue" size="250%">person_add</v-icon>
              </v-avatar>
              <span>Clientes Nuevos</span>
              <v-spacer></v-spacer>
              <div class="text-lg-justify">
                <div class="headline">{{ clienten }}</div>
              </div>
            </v-card-title>
          </v-card>
        </v-flex>
        <v-flex lg4 class="nuevo">
          <v-card light hover ripple class="nuevo elevation-1">
            <v-card-title primary-title>
              <v-avatar>
                <v-icon color="green" size="250%">call_missed_outgoing</v-icon>
              </v-avatar>
              <span>Aumento</span>
              <v-spacer></v-spacer>
              <div class="text-lg-justify">
                <div class="headline">{{ fecha }}%</div>
              </div>
            </v-card-title>
          </v-card>
        </v-flex>
      </v-layout>
    </v-container>

    <!-- <br> -->
    <v-layout class="py-0" row wrap>

      <v-flex xs3>
        <v-card-text class="titulos-text px-0">{{ title }}</v-card-text>
      </v-flex>

      <v-flex xs3>
        <v-card-text style="font-size: 22px; text-align: right;" class="">
          <v-card class="pr-2">
            <!-- Descarga<v-icon>cloud_download</v-icon> -->
          </v-card>
        </v-card-text>
      </v-flex>

      <v-flex xs2>
      </v-flex>

      <v-flex xs4>
        <v-text-field append-icon="search" label="Buscar" single-line hide-details v-model="search"></v-text-field>
      </v-flex>
    </v-layout>

    <v-data-iterator :disable-page-reset="true" :items="items" :rows-per-page-items="rowsPerPageItems" :pagination.sync="pagination" :search="search" content-tag="v-layout" row wrap hide-actions>
      <v-flex slot="item" slot-scope="props" xs12 sm6 md4 lg6>
        <v-hover>
          <v-card slot-scope="{ hover }" :class="`elevation-${hover ? 12 : 1}`" class="mx-auto">
            <v-layout align-center justify-center row fill-height>
              <v-flex xs1>
              </v-flex>
              <v-flex xs3>
                <v-avatar size="70%">
                  <v-img src="loginnew/images/logo.png"></v-img>
                </v-avatar>
              </v-flex>
              <v-flex xs8>
                <v-flex text-xs-right text-lg-right text-sm-right>
                  <v-icon small class="mr-2" @click="editItem(props.item)">
                    edit
                  </v-icon>
                  <v-icon small @click="deleteItem(props.item)">
                    close
                  </v-icon>
                </v-flex>
                <v-card-title primary-title>
                  <div>
                    <div class="headline">{{ props.item.nombre }}</div>
                    <div class="text-xs-left"><strong>Fecha Inicio: </strong>{{ props.item.vigencia }}</div>
                    <div><strong>Dias pagados: </strong>{{ props.item.dias_pagados }}</div>
                    <v-spacer></v-spacer>
                  </div>
                </v-card-title>
              </v-flex>
            </v-layout>
            <!-- <v-divider dense light></v-divider> -->
            <v-card-actions>
              <!-- <v-btn flat >Listen now</v-btn> -->
            </v-card-actions>
          </v-card>
        </v-hover>
      </v-flex>
      <template slot="no-data">
        <v-alert :value="true" color="white" icon="warning" style="color: black;">
          Lo siento no hay datos que cargar :(
        </v-alert>
      </template>

    </v-data-iterator>
    <div class="text-xs-center pt-2">
      <v-pagination v-model="pagination.page" :length="page"></v-pagination>
    </div>
  </v-container>

  <button id="hvr-pulse" @click="crear()" class="mdc-fab app-fab--absolute" aria-label="Agregar">
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
    total: "",
    totaln: "",
    totalp: "",
    // boton inicio
    // boton fin
    // pagination: {},
    title: "Promos",
    registros: "",
    page: null,
    reviews: 413,
    value: 4.5,
    eliminar: "",
    dialog3: false,
    pagination: {},
    slider: 56,
    tile: false,
    search: "",
    total: "",
    fecha: "",
    clienten: "",
    editCliente: "",
    idedit: "",
    dialog: false,
    dialog1: false,
    rowsPerPageItems: [8, 12],
    pagination: {
      // rowsPerPage: 8
    },
    items: [],
    editedIndex: -1,
    editedItem: {

    },
    defaultItem: {

    },
  }),
  created() {
    this.getDataCliente();

  },
  computed: {

  },
  methods: {
    crear() {
      window.location.href = '/promo/create';
    },
    getDataCliente() {
      console.log("en get data nuew");
      axios
        .get(`/v1.0/promos`)
        .then(response => {
          console.log(response.data);
          this.items = response.data.promo;
          this.total = response.data.total;
          this.totaln = response.data.totaln;
          this.totalp = response.data.totalp;
        })
        .catch(e => {
          this.errors.push(e);
        });
      console.log("aqui");
    },
    editItem(item) {
      window.location.href = `/promo/${item.id}/edit`;
      // this.editedIndex = this.desserts.indexOf(item)
      // this.editedItem = Object.assign({}, item)
      // this.dialog1 = true
      // this.idedit = item.id
      // console.log(item.id);
      // axios
      // .get(`/v1.0/cliente/${item.id}`)
      // .then(response => {
      // this.editCliente = response.data;
      // console.log(response.data);
      // })
      // .catch(e => {
      // this.errors.push(e);
      // });
    },
    deleteItem(item) {
      // const index = this.desserts.indexOf(item)
      console.log("Aqui abajo");
      console.log(item.id);
      var borrar = confirm('Esta seguro que desea borrar est promo?')
      if (!borrar) {
        alert("Se cancelo");
      } else {
        axios
          .delete(`/v1.0/promo/${item.id}`, {
            _token: this.csrf
          })
          .then(response => {
            //                    window.location.href = '/';
            // JSON responses are automatically parsed.
            //                        this.user = response.data;
            //                        console.log(response.data);
            console.log("Borrado correctamente");
          })
          .catch(e => {
            //                        this.errors.push(e);
          });
        // this.getDataCliente();
      }
    },
    close() {
      this.dialog1 = false
      this.dialog = false
      console.log("entro seguo que si");

      // setTimeout(() => {
      // this.editedItem = Object.assign({}, this.defaultItem)
      // this.editedIndex = -1
      // }, 300)
    },
  },

}
</script>
