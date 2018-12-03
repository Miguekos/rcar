<template lang="html">
  <div class="">
    <v-data-iterator :items="items" :rows-per-page-items="rowsPerPageItems" :pagination.sync="pagination" :search="search"
      content-tag="v-layout" row wrap class="elevation-5" hide-actions>
      <v-flex slot="item" slot-scope="props" xs12 sm6 md4 lg6>
        <v-hover>
          <v-card
          slot-scope="{ hover }"
          :class="`elevation-${hover ? 12 : 1}`"
          class="mx-auto"
          >
          <v-layout align-center justify-center row fill-height>
            <v-flex xs1>
            </v-flex>
            <v-flex xs3>
              <v-avatar size="100%">
                <v-img :src="props.item.image"></v-img>
              </v-avatar>
            </v-flex>
            <v-flex xs8>
              <v-flex text-right>
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
                  <div class="text-xs-left">{{ props.item.vigencia }}</div>
                  <div>{{ props.item.dias_pagados }}</div>
                  <v-spacer></v-spacer>
                  <v-flex align-content-end>
                    <v-icon small class="mr-2" @click="dialog3 = true">
                      mail_outline
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
        </v-hover>
      </v-flex>
      <template slot="no-data">
        <v-alert :value="true" color="red" icon="warning">
          Lo siento no hay datos que cargar :(
        </v-alert>
      </template>
    </v-data-iterator>
  </div>
</template>

<script>
  import axios from 'axios';
  export default {
    props: ['user'],
    data: () => ({
      registros: "",
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
        paginas() {
            var paginas = Math.ceil(this.items / 8)
            console.log(paginas);
            console.log(this.items.length);
            this.registros = this.items.length;
            this.page = paginas;
        },
      crear() {
        window.location.href = '/promo/create';
      },
      getDataCliente() {
        console.log("en get data nuew");
        axios
          .get(`/v1.0/promos`)
          .then(response => {
            this.items = response.data;
            // this.total = response.data.clientec;
            // this.fecha = response.data.fecha;
            // this.clienten = response.data.clienten;
            // console.log(response.data.fecha);
          })
          .catch(e => {
            this.errors.push(e);
          });
          this.paginas();
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
        }else{
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
