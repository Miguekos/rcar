<style id="prereserva">
.v-btn--small {
  font-size: 10px;
  height: 18px;
  padding: 0 8px;
}

.v-card__title--primary {
  padding: 0px 0px 0px 0px;
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
</style>
<template id="prereserva">
<div class="">

  <v-dialog v-model="dialog4" persistent="persistent" max-width="60%">
    <form method="post" @submit.prevent="update()">
      <v-card style="border-radius: 0px 10px 0px 10px">
        <v-card-title class="headline">Registro de confirmacion de reserva</v-card-title>
        <v-card-text>
          <v-container fluid="fluid" grid-list-xl="grid-list-xl">
            <v-layout row="row" wrap="wrap">
              <v-flex xs12="xs12" sm6="sm6" md3="md3">
                <v-select required="required" :items="Tipopago" item-text="text" item-value="text" v-model="tipopagovalue" label="Tipo de Pago"></v-select>
              </v-flex>

              <v-flex xs12="xs12" sm6="sm6" md3="md3">
                <v-select required="required" :items="Banco" item-text="text" item-value="text" v-model="Bancovalue" label="Banco"></v-select>
              </v-flex>

              <v-flex xs12="xs12" sm6="sm6" md3="md3">
                <v-text-field required="required" label="Codigo de Deposito" v-model="codigodepago"></v-text-field>
              </v-flex>

              <v-flex xs12="xs12" sm6="sm6" md3="md3">
                <v-text-field required="required" label="Monto Depositado" v-model="montodepositado"></v-text-field>
              </v-flex>
            </v-layout>
          </v-container>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="green darken-1" round="round" dark="dark" type="submit">Guardar</v-btn>
          <v-btn color="red darken-1" round="round" dark="dark" @click="dialog4 = false">Cancelar</v-btn>
        </v-card-actions>
      </v-card>
    </form>
  </v-dialog>

  <v-container grid-list-md="grid-list-md" fluid="fluid" text-xs-justify="text-xs-justify">
    <v-data-iterator :items="items" :rows-per-page-items="rowsPerPageItems" :pagination.sync="pagination" :search="search" content-tag="v-layout" row="row" wrap="wrap" hide-actions="hide-actions">
      <v-flex slot="item" slot-scope="props" xs12="xs12" sm12="sm12" md6="md6" lg6="lg6">
          <v-card class="mx-auto">
            <v-layout align-center justify-center row fill-height>
              <v-flex xs1>
              </v-flex>
              <v-flex xs3>
                <v-avatar size="70%">
                  <!-- <v-img :src="props.item.imagen1"></v-img> -->
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
                  <v-layout row wrap>
                    <v-flex xs12 lg12>
                      <!-- <v-card color=""> -->
                        <v-card-text class="texto-18 px-0 py-0 text-xs-left text-lg-left text-sm-left">
                          {{ props.item.cliente }}
                        </v-card-text>
                      <!-- </v-card> -->
                    </v-flex>
                    <v-flex xs12 lg6>
                      <!-- <v-card color=""> -->
                        <v-card-text class="px-0 py-0">
                          <b>Total</b>: {{ props.item.totalF }} $
                        </v-card-text>
                      <!-- </v-card> -->
                    </v-flex>
                    <v-flex xs12 lg6>
                      <!-- <v-card color=""> -->
                        <v-card-text class="px-0 py-0">
                          <b>Disp.</b>: {{ props.item.diasdisponible }}
                        </v-card-text>
                      <!-- </v-card> -->
                    </v-flex>
                    <v-flex xs12 lg6>
                      <!-- <v-card color=""> -->
                        <v-card-text class="px-0 py-0">
                          <b>Auto</b>: {{ props.item.autoSeleccionado }}
                        </v-card-text>
                      <!-- </v-card> -->
                    </v-flex>
                    <v-flex xs12 lg6>
                      <!-- <v-card color=""> -->
                        <v-card-text class="px-0 py-0">
                          <b>Entrega</b>: {{ props.item.fechasInicio }}
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


            <!-- <v-divider dense light></v-divider> -->
            <v-card-actions>
              <strong>N°:&nbsp
              </strong>
              00000{{ props.item.nreserva }}
              <v-spacer></v-spacer>
              <v-btn @click="confirmar(props.item)" small="small" color="primary">confirmar</v-btn>

              <!-- <v-btn small color="error">cancelar</v-btn> -->
            </v-card-actions>
          </v-card>
      </v-flex>
      <template slot="no-data">
        <v-alert :value="true" color="white" icon="warning" style="color: black;">
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
    codigodepago: "",
    montodepositado: "50",
    tipopagovalue: "",
    Bancovalue: "",
    Tipopago: [{
        text: 'D. Bancario'
      },
      {
        text: 'T. Credito'
      },
      {
        text: 'T. Debito'
      },
      {
        text: 'Efectivo'
      },
    ],
    Banco: [{
        text: 'BBVA'
      },
      {
        text: 'Scotiabank'
      },
      {
        text: 'BCP'
      },
      {
        text: 'Interbank'
      },
      {
        text: 'Efectivo'
      },
    ],
    dialog4: false,
    idupdate: "",
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
        .get(`/v1.0/reservastotales`)
        .then(response => {
          this.items = response.data.preReserva;
          console.log(response.data.preReserva);
        })
        .catch(e => {
          this.errors.push(e);
        });
      // this.paginas();
      console.log("aqui");

    },
    confirmar(item) {
      console.log(item);
      this.dialog4 = true;
      this.idupdate = item.id;
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
    update() {
      console.log("aqui id para ipdate");
      axios({
          method: 'put',
          url: `/v1.0/reserva/${this.idupdate}`,
          data: {
            codigodepago: this.codigodepago,
            montodepositado: this.montodepositado,
            tipodepago: this.tipopagovalue,
            banco: this.Bancovalue,
            estado: 2,
            disponible: 0,
          }
        })
        .then(function(response) {
          response.data
          console.log(response.data);
          window.location.href = '/reserva';
        });
    },
    close() {
      this.dialog1 = false
      this.dialog = false
      console.log("entro seguo que si");
    },
  },

}
</script>
