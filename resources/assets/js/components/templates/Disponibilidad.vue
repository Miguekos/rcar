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

  <v-container px-0 py-0 grid-list-md fluid text-xs-justify>
    <!-- <v-container grid-list-xs>
      <v-layout align-center justify-space-around row wrap fill-height>
        <v-flex lg3 class="nuevo">
          <v-card light hover ripple class="nuevo">
            <v-card-title primary-title>
              DESARGAR PDF
              <v-spacer></v-spacer>
              <v-icon color="success">cloud_download</v-icon>
            </v-card-title>
          </v-card>
        </v-flex>
        <v-flex lg3 class="nuevo">
          <v-card light elevation-2 hover ripple class="nuevo">
            <v-card-title primary-title>
              DESARGAR EXCEL
              <v-spacer></v-spacer>
              <v-icon color="success">cloud_download</v-icon>
            </v-card-title>
          </v-card>
        </v-flex>
        <v-flex lg3 class="nuevo">
          <v-card light hover ripple class="nuevo">
            <v-card-title primary-title>
              EXPORTAR CATALOGOS
              <v-spacer></v-spacer>
              <v-icon color="success">cloud_download</v-icon>
            </v-card-title>
          </v-card>
        </v-flex>
      </v-layout>
    </v-container> -->

    <!-- <hr> -->

    <v-layout class="py-0" row wrap>

      <v-flex xs3>
        <v-card-text class="titulos-text px-0">Disponibilidad</v-card-text>
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

    <v-data-iterator :items="dispo" :rows-per-page-items="rowsPerPageItems" :pagination.sync="pagination" :search="search" content-tag="v-layout" row wrap hide-actions>

      <v-flex slot="item" slot-scope="props" xs12 sm6 md6 lg6>
        <v-card @click="reservarAuto(props.item)" ripple hover>
          <v-layout align-center justify-center row fill-height>
            <v-flex xs1></v-flex>
            <v-flex xs3>
              <v-avatar size="70%">
                <v-img src="loginnew/images/logo.png"></v-img>
              </v-avatar>
            </v-flex>
            <v-flex xs8>
              <v-flex text-xs-right text-lg-right text-sm-right>

              </v-flex>
              <v-card-title primary-title>
                <v-layout align-center justify-space-around row fill-height>
                  <div>
                    <div class="titulos-card">{{ props.item.marca }}</div>
                    <div class="text-xs-left"><strong>Placa:</strong> {{ props.item.placa }}$</div>
                    <div class="text-xs-left"><strong>Color:</strong> {{ props.item.color }}</div>
                  </div>
                  <div>
                    <div class="text-xs-right"><strong>Año:</strong> {{ props.item.anio }}</div>
                    <div class="text-xs-right"><strong>Precio:</strong> {{ props.item.precio_por_dia }} $</div>
                  </div>
                </v-layout>
              </v-card-title>
            </v-flex>
          </v-layout>
          <!-- <v-divider dense light></v-divider> -->
          <v-card-actions>

          </v-card-actions>
        </v-card>
      </v-flex>
      </v-layout>
      </v-card>
      <hr>
      <v-divider></v-divider>

      </v-flex>
      <template slot="no-data">
        <v-alert :value="true" color="white" style="color: black;" icon="warning">
          Lo siento no hay datos que cargar :(
        </v-alert>
      </template>

    </v-data-iterator>
    <div class="text-xs-center pt-2">
      <v-pagination v-model="pagination.page" :length="pagination.page"></v-pagination>
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
  props: ['user', 'dispo', 'fechaI', 'fechaF'],
  data: () => ({
    color: 0,
    colors: [
      'blue-grey',
      'grey'
    ],
    // boton inicio
    // boton fin
    // pagination: {},
    fechaI: "",
    fechaF: "",
    title: "Clientes",
    page: "",
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
    pagination: {},
    items: {},
    editedIndex: -1,
    editedItem: {},
    defaultItem: {},
  }),
  created() {
    // this.fechaI = this.dispo.fechaFin;
    // this.fechaF = this.dispo.fechaFin;
    // this.getDataCliente();
    // this.items = this.dispo.data;
  },
  computed: {

  },
  methods: {
    crear() {
      window.location.href = '/cliente/create';
    },
    reservarAuto(item) {
      window.location.href = `/reserva/createdis/${item.id}/${this.fechaI}/${this.fechaF}`;
      console.log(item);
      // alert(item);
    },
    deleteItem(item) {
      // const index = this.desserts.indexOf(item)
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
        this.getDataCliente();
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
