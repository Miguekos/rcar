<style scope>
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

/* html {
    font-size: 12px;
    overflow-x: hidden;
    text-rendering: optimizeLegibility;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
  } */

.custom-ripple {
  user-select: none
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
<template>
<div id="cartas">
  <v-dialog v-model="dialog3" persistent max-width="690">
    <v-card>
      <v-card-title class="headline">Enviar Correo</v-card-title>
      <v-card-text>
        <v-textarea name="input-7-1" label="Escribe tu correo" value="" hint="Escribe aqui el correo"></v-textarea>
      </v-card-text>
      <v-card-actions>
        <v-spacer></v-spacer>
        <v-btn color="green darken-1" flat @click="dialog3 = false">Cancelar</v-btn>
        <v-btn color="green darken-1" flat @click="eliminar = 1">Enviar</v-btn>
      </v-card-actions>
    </v-card>
  </v-dialog>

  <v-container grid-list-md fluid text-xs-justify>
    <v-container class="px-0 py-0" grid-list-xs>
      <v-layout align-center justify-space-around row wrap fill-height>
        <v-flex lg4 class="nuevo">
          <v-card light ripple class="nuevo elevation-1">
            <v-card-title primary-title>
              <v-avatar>
                <v-icon color="green" size="250%">perm_identity</v-icon>
              </v-avatar>
              <span>Auto Total</span>
              <v-spacer></v-spacer>
              <div class="text-lg-justify">
                <div class="headline">{{ autostotal }}</div>
              </div>
            </v-card-title>
          </v-card>
        </v-flex>
        <v-flex lg4 class="nuevo">
          <v-card light ripple class="nuevo elevation-1">
            <v-card-title primary-title>
              <v-avatar>
                <v-icon color="green" size="250%">person_add</v-icon>
              </v-avatar>
              <span>Autos Nuevos</span>
              <v-spacer></v-spacer>
              <div class="text-lg-justify">
                <div class="headline">{{ aumento }}</div>
              </div>
            </v-card-title>
          </v-card>
        </v-flex>
        <v-flex lg4 class="nuevo">
          <v-card light ripple class="nuevo elevation-1">
            <v-card-title primary-title>
              <v-avatar>
                <v-icon color="green" size="250%">call_missed_outgoing</v-icon>
              </v-avatar>
              <span>Aumento</span>
              <v-spacer></v-spacer>
              <div class="text-lg-justify">
                <div class="headline">{{ autosnuevo }}%</div>
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

    <v-data-iterator :items="items" :rows-per-page-items="rowsPerPageItems" :pagination.sync="pagination" :search="search" content-tag="v-layout" row wrap hide-actions>
      <v-flex slot="item" slot-scope="props" xs12 sm12 md12 lg6>
        <v-card class="mx-auto" hover tile>
          <v-layout align-center justify-center row fill-height>
            <v-flex xs1>
            </v-flex>
            <v-flex xs3>
              <v-avatar size="100%">
                <v-img :src="props.item.imagen1"></v-img>
                <!-- <v-img src="loginnew/images/logo.png"></v-img> -->
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
                <v-layout row wrap>
                  <v-flex xs12>
                    <!-- <v-card color=""> -->
                      <v-card-text class="texto-18 px-0 py-0">
                        {{ props.item.marca }}
                      </v-card-text>
                    <!-- </v-card> -->
                  </v-flex>
                  <v-flex xs6>
                    <!-- <v-card color=""> -->
                      <v-card-text class="px-0 py-0">
                        Placa: {{ props.item.placa }}
                      </v-card-text>
                    <!-- </v-card> -->
                  </v-flex>
                  <v-flex xs6>
                    <!-- <v-card color=""> -->
                      <v-card-text class="px-0 py-0">
                        Color: {{ props.item.color }}
                      </v-card-text>
                    <!-- </v-card> -->
                  </v-flex>
                  <v-flex xs6>
                    <!-- <v-card color=""> -->
                      <v-card-text class="px-0 py-0">
                        Año: {{ props.item.anio }}
                      </v-card-text>
                    <!-- </v-card> -->
                  </v-flex>
                  <v-flex xs6>
                    <!-- <v-card color=""> -->
                      <v-card-text class="px-0 py-0">
                        Precio: {{ props.item.precio_por_dia }} $
                      </v-card-text>
                    <!-- </v-card> -->
                  </v-flex>
                  <!-- <div>
                    <h3>{{ props.item.marca }}</h3>
                  </div>
                  <div>
                    <div class="text-xs-left">Placa: {{ props.item.placa }}</div>
                    <div>Color: {{ props.item.color }}</div>
                    <v-spacer></v-spacer>
                    <v-flex align-content-end>
                      <v-icon small class="mr-2" @click="dialog3 = true">
                        mail_outline
                      </v-icon>
                    </v-flex>
                  </div>
                  <div class="">
                    <div>Año: {{ props.item.anio }}</div>
                    <div>Precio: {{ props.item.precio_por_dia }}</div>
                  </div> -->
                </v-layout>

              </v-card-title>
            </v-flex>
          </v-layout>
        </v-card>
        <hr>
        <v-divider></v-divider>

      </v-flex>
      <template slot="no-data">
        <v-alert :value="true" color="white" icon="warning" style="color: black">
          Lo siento no hay datos que cargar :(
        </v-alert>
      </template>

    </v-data-iterator>
    <div class="text-xs-center pt-2">
      <v-pagination v-model="pagination.page" :length="page"></v-pagination>
    </div>
  </v-container>

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
    color: 0,
    colors: [
      'red',
      'pink',
      'purple',
      'deep-purple',
      'indigo',
      'blue',
      'light-blue',
      'cyan',
      'teal',
      'green',
      'light-green',
      'lime',
      'yellow',
      'amber',
      'orange',
      'deep-orange',
      'brown',
      'blue-grey',
      'grey'
    ],
    // boton inicio
    // boton fin
    // pagination: {},
    title: "Autos",
    page: null,
    reviews: 413,
    value: 4.5,
    eliminar: "",
    dialog3: false,
    // pagination: {},
    slider: 56,
    tile: false,
    search: "",
    autostotal: "",
    autosnuevo: "",
    aumento: "",
    editCliente: "",
    idedit: "",
    dialog: false,
    dialog1: false,
    rowsPerPageItems: [8, 12],
    pagination: {},
    items: [],
    editedIndex: -1,
    editedItem: {},
    defaultItem: {

    },
  }),
  created() {
    this.getData();
  },
  computed: {

  },
  methods: {
    crear() {
      window.location.href = '/auto/create';
    },
    getData() {
      console.log("en get data nuew");
      axios
        .get(`/v1.0/autos`)
        .then(response => {
          this.items = response.data.autos;
          this.autostotal = response.data.autostotal;
          this.autosnuevo = response.data.autosnuevo;
          this.aumento = response.data.aumento;
          // console.log(response.data.fecha);
          var paginas = Math.ceil(response.data.autostotal / 8);
          this.page = paginas;
        })
        .catch(e => {
          this.errors.push(e);
        });
    },
    editItem(item) {
      window.location.href = `/auto/${item.id}/edit`;
    },
    deleteItem(item) {
      console.log("Aqui abajo");
      console.log(item.id);
      var borrar = confirm('Esta seguro que desea borrar este Cliente?')
      if (!borrar) {
        alert("Se cancelo");
      } else {
        axios
          .delete(`/v1.0/cliente/${item.id}`, {
            _token: this.csrf
          })
          .then(response => {
            console.log("Borrado correctamente");
          })
          .catch(e => {});
        this.getData();
      }
    },
    close() {
      this.dialog1 = false
      this.dialog = false
      console.log("entro seguo que si");
    },
  },
}
</script>
