<style>
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
  <div>
    
<v-dialog v-model="dialog3" persistent max-width="690">  
      <v-card>
        <v-card-title class="headline">Enviar Correo</v-card-title>
        <v-card-text>
          <v-textarea
          name="input-7-1"
          label="Escribe tu correo"
          value=""
          hint="Escribe aqui el correo"
        ></v-textarea>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="green darken-1" flat @click="dialog3 = false">Cancelar</v-btn>
          <v-btn color="green darken-1" flat @click="eliminar = 1">Enviar</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>


    <v-container grid-list-md fluid text-xs-justify>
      <v-dialog v-model="dialog1" max-width="700px">
        <v-card>
          <v-card-title>
            <span class="headline">Editar Cliente</span>
          </v-card-title>
          <template>
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-12">
                  <cliente-edit :cliente="editCliente" :user="user" :close="close" :carga="getDataCliente"></cliente-edit>
                </div>
              </div>
            </div>
          </template>
        </v-card>
      </v-dialog>
      <v-container fluid grid-list-md>
        <v-layout row wrap justify-center align-center>
          <v-flex d-flex xs12 sm6 md4 elevation-2>
            <!-- <v-card color=""> -->
            <v-card-title style="padding: 0px;" class="title">
              <v-avatar>
                <v-icon color="orange" size="150%">perm_identity</v-icon>
              </v-avatar>
              <v-layout>
                <v-flex xs8>
                  <v-card-text class="px-0">Total Clientes</v-card-text>
                </v-flex>
                <v-flex xs4>
                  <v-card-text class="px-0">{{ total }}</v-card-text>
                </v-flex>
              </v-layout>
            </v-card-title>
            <!-- <span class="caption"> Total Clientes </span>&nbsp;<span> {{ total }}</span> </v-card-title> -->
            <!-- <v-card-text></v-card-text> -->
            <!-- </v-card> -->
          </v-flex>
          <v-flex d-flex xs12 sm6 md4 elevation-2>
            <!-- <v-card color=""> -->
            <v-card-title style="padding: 0px;" class="title">
              <v-avatar row wrap>
                <v-icon color="blue" size="150%">person_add</v-icon>
              </v-avatar>
              <v-layout>
                <v-flex xs9>
                  <v-card-text class="px-0">Nuevos Clientes</v-card-text>
                </v-flex>
                <v-flex xs3>
                  <v-card-text class="px-0">{{ clienten }}</v-card-text>
                </v-flex>
              </v-layout>
            </v-card-title>
            <!-- </v-card> -->
          </v-flex>
          <v-flex d-flex xs12 sm6 md4 elevation-2>
            <!-- <v-card color=""> -->
            <v-card-title style="padding: 0px;" class="title">
              <v-avatar>
                <v-icon color="green" size="150%">call_missed_outgoing</v-icon>
              </v-avatar>
              <v-layout>
                <v-flex xs8>
                  <v-card-text class="px-0">Aumento</v-card-text>
                </v-flex>
                <v-flex xs4>
                  <v-card-text class="px-0">{{ fecha }}%</v-card-text>
                </v-flex>
              </v-layout>
            </v-card-title>
            <!-- </v-card> -->
          </v-flex>
        </v-layout>
      </v-container>

      <hr>
      <h2 class="text-center">Clientes</h2>
      <!-- <hr> -->

      <!-- <v-container grid-list-md text-xs-center> -->
      <v-layout row wrap>
        <v-flex xs4 text-sm-left>

        </v-flex>
        <v-spacer></v-spacer>
        <!-- <v-flex xs4> -->
        <!-- <v-card dark color="green">
                    <v-card-text class="px-4">Descargar</v-card-text>
                </v-card> -->
        <!-- </v-flex> -->
        <v-flex xs12>
          <v-text-field append-icon="search" label="Buscar" single-line hide-details v-model="search"></v-text-field>
          <hr>
        </v-flex>
      </v-layout>

      <v-data-iterator :items="items" :rows-per-page-items="rowsPerPageItems" :pagination.sync="pagination" :search="search"
        content-tag="v-layout" row wrap class="elevation-5" hide-actions>

        <v-flex slot="item" slot-scope="props" xs12 sm6 md4 lg6>
          <!-- <v-card
                slot-scope="{ hover }"
      :class="`elevation-${hover ? 12 : 2}`"
      class="mx-auto"
      width="344"> -->
          <v-card>
            <!-- <v-card color="cyan darken-2" class="white--text"> -->
            <v-layout align-center justify-center row fill-height>
              <v-flex xs1>
              </v-flex>
              <v-flex xs3>
                <v-avatar size="100%">
                  <v-img :src="props.item.image"></v-img>
                </v-avatar>
              </v-flex>
              <v-flex xs8>

                <v-flex text-lg-right>
                  <v-icon small class="mr-2" @click="editItem(props.item)">
                    edit
                  </v-icon>
                  <v-icon small @click="deleteItem(props.item)">
                    close
                  </v-icon>
                </v-flex>

                <v-card-title primary-title>

                  <div>
                    <div class="headline">{{ props.item.nombres }}</div>
                    <div>{{ props.item.direccion }}</div>
                    <div>{{ props.item.celular }}</div>
                    <v-spacer></v-spacer>
                    <v-flex align-content-end>
                      <v-icon small class="mr-2" @click="dialog3 = true">
                        mail_outline
                      </v-icon>
                      <v-icon small class="mr-2" @click="deleteItem(props.item)">
                        whatsapp
                      </v-icon>
                    </v-flex>
                  </div>
                </v-card-title>
              </v-flex>
            </v-layout>
            <!-- <v-divider dense light></v-divider> -->
            <v-card-actions>
              <!-- <v-btn flat >Listen now</v-btn> -->  
            </v-card-actions>
          </v-card>
        </v-flex>
        <template slot="no-data">
          <v-alert :value="true" color="red" icon="warning">
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
      // boton inicio
      // boton fin
      // pagination: {},
      page: "",
      eliminar: "",
      dialog3: false,
      pagination: {},
      reviews: 413,
      value: 4.5,
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
      var paginas = Math.ceil(19 / 8)
      this.page = paginas;
    },
    computed: {

    },
    methods: {
      crear() {
        window.location.href = '/cliente/create';
      },
      getDataCliente() {
        console.log("en get data nuew");
        axios
          .get(`/v1.0/clientes`)
          .then(response => {
            this.items = response.data.cliente;
            this.total = response.data.clientec;
            this.fecha = response.data.fecha;
            this.clienten = response.data.clienten;
            console.log(response.data.fecha);
          })
          .catch(e => {
            this.errors.push(e);
          });
      },
      editItem(item) {
        // this.editedIndex = this.desserts.indexOf(item)
        // this.editedItem = Object.assign({}, item)
        this.dialog1 = true
        this.idedit = item.id
        console.log(item.id);
        axios
          .get(`/v1.0/cliente/${item.id}`)
          .then(response => {
            this.editCliente = response.data;
            console.log(response.data);
          })
          .catch(e => {
            this.errors.push(e);
          });
      },
      deleteItem(item) {
        // const index = this.desserts.indexOf(item)
        console.log("Aqui abajo");
        console.log(item.id);
        this.dialog3 = true;
        var borrar = confirm('Esta seguro que desea borrar este Cliente?')
        if (!borrar) {
          alert("Se cancelo");
        }else{
        axios
          .delete(`/v1.0/cliente/${item.id}`, {
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
          this.getDataCliente();
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