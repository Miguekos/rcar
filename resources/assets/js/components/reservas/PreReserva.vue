<template lang="html">
<div class="">
  <!-- <v-dialog v-model="dialog4" persistent max-width="290">
      <v-btn slot="activator" color="primary" dark>Open Dialog</v-btn>
      <v-card>
        <v-card-title class="headline">Use Google's location service?</v-card-title>
        <v-card-text>Let Google help apps determine location. This means sending anonymous location data to Google, even when no apps are running.</v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="green darken-1" flat @click="dialog4 = false">Disagree</v-btn>
          <v-btn color="green darken-1" flat @click="dialog4 = false">Agree</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog> -->
    <v-container grid-list-md fluid text-xs-justify>
        <v-data-iterator
            :items="items"
            :rows-per-page-items="rowsPerPageItems"
            :pagination.sync="pagination"
            :search="search"
            content-tag="v-layout"
            row
            wrap
            hide-actions>
            <v-flex slot="item" slot-scope="props" xs12 sm6 md4 lg6>
                <v-hover>
                    <v-card slot-scope="{ hover }" :class="`elevation-${hover ? 12 : 1}`" class="mx-auto">
                        <v-layout align-center justify-center row fill-height>
                            <v-flex xs1></v-flex>
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
                                <v-layout align-center justify-space-around row fill-height>

                                    <div>
                                        <div class="headline">{{ props.item.cliente }}</div>
                                        <div class="text-xs-left"><strong>Monto a pagar:</strong> {{ props.item.totalF }}$</div>
                                        <div class="text-xs-left"><strong>Dias Disponible:</strong> {{ props.item.diasdisponible }}</div>
                                    </div>
                                    <div>
                                        <div class="text-xs-right"><strong>Cliente:</strong> {{ props.item.cliente }}</div>
                                        <div class="text-xs-right"><strong>Auto:</strong> {{ props.item.autoSeleccionado }}</div>
                                        <div class="text-xs-right"><strong>Fecha Fin:</strong> {{ props.item.fechaFin }}</div>
                                    </div>
                                </v-layout>
                                </v-card-title>
                            </v-flex>
                        </v-layout>
                        <!-- <v-divider dense light></v-divider> -->
                        <v-card-actions>
                          <strong>Numero de Reserva:&nbsp </strong> 00000{{ props.item.nreserva }}
                            <v-spacer></v-spacer>
                            <v-btn @click="confirmar(props.item)" small color="primary">confirmar</v-btn>

                            <!-- <v-btn  small color="error">cancelar</v-btn> -->
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
        <div class="text-xs-center pt-2">
            <v-pagination v-model="pagination.page" :length="pagination.page"></v-pagination>
        </div>
    </v-container>
    <!-- <pre>{{ $data }}</pre> -->
</div>
</template>

<script>
import axios from 'axios';
export default {
  props: ['user'],
  data: () => ({
    dialog4: false,
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
    crear() {
      window.location.href = '/reserva/create';
    },
    getDataCliente() {
      console.log("en get data nuew");
      axios
        .get(`/v1.0/reservas`)
        .then(response => {
          this.items = response.data.reserva;
          console.log(response.data.reserva);
          // this.total = response.data.clientec;
          // this.fecha = response.data.fecha;
          // this.clienten = response.data.clienten;
          // console.log(response.data.fecha);
        })
        .catch(e => {
          this.errors.push(e);
        });
      // this.paginas();
      console.log("aqui");

    },
    confirmar(item) {
      console.log(item);
      // window.location.href = `/reserva/${item.id}/edit`;
    },
    editItem(item) {
      window.location.href = `/reserva/${item.id}/edit`;
    },
    deleteItem(item) {
      console.log("Aqui abajo");
      console.log(item.id);
      var borrar = confirm('Esta seguro que desea borrar est reserva?')
      if (!borrar) {
        alert("Se cancelo");
      } else {
        axios
          .delete(`/v1.0/reserva/${item.id}`, {
            _token: this.csrf
          })
          .then(response => {
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
