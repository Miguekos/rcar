<template>

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
                <cliente-edit 
                :cliente="editCliente" 
                :user="user" 
                :close="close" 
                :carga="getDataCliente"
                ></cliente-edit>
              </div>
            </div>
          </div>
        </template>
      </v-card>
    </v-dialog>
    <v-layout justify-center align-center>
      <v-flex xs3>
        <v-card>
          <v-card-title>
            <v-avatar>
              <v-icon>perm_identity</v-icon>
            </v-avatar>
            <div>
              <span class="grey--text">500</span><br>
              <span>Total Clientes</span><br>
            </div>
          </v-card-title>
        </v-card>
      </v-flex>
      <v-flex xs3>
        <v-card>
          <v-card-title>
            <v-avatar>
              <v-icon>person_add</v-icon>
            </v-avatar>
            <div>
              <span class="grey--text">50</span><br>
              <span>Nuevos Clientes</span><br>
            </div>
          </v-card-title>
        </v-card>
      </v-flex>

      <v-flex xs3>
        <v-card>
          <v-card-title>
            <v-avatar>
              <v-icon>call_missed_outgoing</v-icon>
            </v-avatar>
            <div>
              <span class="grey--text">10%</span><br>
              <span>Aumento</span><br>
            </div>
          </v-card-title>
        </v-card>
      </v-flex>

      <v-flex xs1 @click="crear()">
        <v-btn color="green" dark fab>
          <v-icon>
            add
          </v-icon>
        </v-btn>
      </v-flex>
    </v-layout>

    <hr>


    <v-spacer></v-spacer>

    <v-flex xs12 sm5 md5 offset-xs0 offset-lg7>
      <v-text-field append-icon="search" label="Buscar" single-line hide-details v-model="search"></v-text-field>
    </v-flex>


    <v-container fluid grid-list-md>
      <v-data-iterator :items="items" :rows-per-page-items="rowsPerPageItems" :pagination.sync="pagination" :search="search" content-tag="v-layout" row wrap>
        <v-flex slot="item" slot-scope="props" xs12 sm6 md4 lg6>
          <v-card>
            <!-- <v-card color="cyan darken-2" class="white--text"> -->
            <v-card>
              <v-layout>
                <v-flex xs3>
                  <v-img :src="props.item.image" height="125px" contain></v-img>
                </v-flex>
                <v-flex xs9>
                  <v-card-title primary-title>
                    <div>

                      <div class="headline">{{ props.item.nombres }}</div>
                      <div>{{ props.item.dni }}</div>
                      <div>{{ props.item.direccion }}</div>
                      <v-spacer></v-spacer>
                      <v-flex align-content-end>
                        <v-icon small class="mr-2" @click="editItem(props.item)">
                          edit
                        </v-icon>
                        <v-icon small @click="deleteItem(props.item)">
                          delete
                        </v-icon>
                      </v-flex>
                    </div>
                  </v-card-title>
                </v-flex>
              </v-layout>
              <!-- <v-divider light></v-divider> -->
              <v-card-actions>
              </v-card-actions>
            </v-card>
          </v-card>
        </v-flex>
        <template slot="no-data">
          <v-alert :value="true" color="red" icon="warning">
            Lo siento no hay datos que cargar :(
          </v-alert>
        </template>
      </v-data-iterator>
    </v-container>

  </v-container>
</template>

<script>
  import axios from 'axios';
  export default {
    props: ['user'],
    data: () => ({
      search: "",
      editCliente: "",
      idedit: "",
      dialog: false,
      dialog1: false,
      rowsPerPageItems: [4, 8, 12],
      pagination: {
        rowsPerPage: 8
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
        crear (){
            window.location.href = '/cliente/create';
      },
      getDataCliente() {
          console.log("en get data nuew");
        axios
          .get(`/v1.0/clientes`)
          .then(response => {
            this.items = response.data.cliente;
            console.log(response.data.cliente);
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
        const index = this.desserts.indexOf(item)
        console.log("Aqui abajo");
        console.log(item.id);
        confirm('Esta seguro que desea borrar esta Cliente?') && this.desserts.splice(index, 1)
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