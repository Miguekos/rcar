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

    <v-dialog v-model="dialog4" persistent="persistent" max-width="80%">
        <form method="post" @submit.prevent="update()">
            <v-card style="border-radius: 0px 10px 0px 10px">
                <v-flex text-xs-center="text-xs-center" class="texto-20 py-2">
                    Confirmacion
                </v-flex>
                <v-card-text>
                    <v-container fluid="fluid" grid-list-xl="grid-list-xl" class="py-0">
                        <v-layout row="row" wrap="wrap">
                            <v-flex xs12="xs12" sm6="sm6" md3="md3">
                                <v-autocomplete required="required" :items="Tipopago" item-text="text" item-value="text" v-model="tipopagovalue" label="Tipo de Pago"></v-autocomplete>
                            </v-flex>

                            <v-flex xs12="xs12" sm6="sm6" md3="md3">
                                <v-autocomplete required="required" :items="Banco" item-text="text" item-value="text" v-model="Bancovalue" label="Banco"></v-autocomplete>
                            </v-flex>

                            <v-flex xs12="xs12" sm6="sm6" md3="md3">
                                <v-text-field required="required" label="Codigo de Deposito" v-model="codigodepago"></v-text-field>
                            </v-flex>

                            <v-flex xs12="xs12" sm6="sm6" md3="md3">
                                <v-text-field required="required" label="Monto Depositado" v-model="montodepositado"></v-text-field>
                            </v-flex>

                            <!-- <v-flex xs12="xs12" sm6="sm6" md3="md3" class="pt-0 pb-3">
                              <label>Exonerar</label>
                                <v-switch v-model="enxonerar" true-value="1" false-value="0" color="success" hide-details="hide-details"></v-switch>
                            </v-flex> -->

                        </v-layout>
                    </v-container>
                </v-card-text>
                <v-card-actions>
                    <!-- <v-spacer></v-spacer> -->

                    <v-flex class="text-xs-right">
                        <v-btn color="green darken-1" round="round" dark="dark" type="submit">Guardar</v-btn>
                        <v-btn color="red darken-1" round="round" dark="dark" @click="dialog4 = false">Cancelar</v-btn>
                    </v-flex>
                </v-card-actions>
            </v-card>
        </form>
    </v-dialog>

    <v-dialog v-model="dialog5" persistent="persistent" max-width="80%">
        <v-card style="border-radius: 0px 10px 0px 10px">
          <v-flex text-xs-center="text-xs-center" class="texto-20 py-2">
              ¿Exonerar?
          </v-flex>
                <v-container fluid="fluid" grid-list-xl="grid-list-xl">
                    <v-layout  row="row" wrap="wrap">
                        ¿Exonerar pago?
                    </v-layout>
                </v-container>
            </v-card-text>
            <v-card-actions>
                <!-- <v-spacer></v-spacer> -->
                <v-flex class="text-xs-right">
                <v-btn color="green darken-1" round="round" dark="dark" @click="fexonerar(), dialog5 = false">Si</v-btn>
                <v-btn color="red darken-1" round="round" dark="dark" @click="dialog5 = false">Cancelar</v-btn>
              </v-flex>
            </v-card-actions>
        </v-card>
    </v-dialog>

    <v-container grid-list-md="grid-list-md" fluid="fluid" text-xs-justify="text-xs-justify">
        <v-data-iterator
            :items="items"
            :rows-per-page-items="rowsPerPageItems"
            :pagination.sync="pagination"
            :search="search"
            content-tag="v-layout"
            row="row"
            wrap="wrap"
            hide-actions="hide-actions">
            <v-flex slot="item" slot-scope="props" xs12="xs12" sm12="sm12" md6="md6" lg6="lg6">
                <v-card class="mx-auto">
                    <v-layout align-center="align-center" justify-center="justify-center" row="row" fill-height="fill-height">
                        <v-flex xs1="xs1"></v-flex>
                        <v-flex xs3="xs3">
                            <v-avatar size="70%">
                                <!-- <v-img :src="props.item.imagen1"></v-img> -->
                                <v-img src="loginnew/images/logo.png"></v-img>
                            </v-avatar>
                        </v-flex>
                        <v-flex xs8="xs8">
                            <v-flex text-xs-right="text-xs-right" text-lg-right="text-lg-right" text-sm-right="text-sm-right">
                                <v-icon small="small" class="mr-2" @click="editItem(props.item)">
                                    edit
                                </v-icon>
                                <v-icon small="small" @click="deleteItem(props.item)">
                                    close
                                </v-icon>
                            </v-flex>
                            <v-card-title primary-title="primary-title">
                                <v-layout row="row" wrap="wrap">
                                    <v-flex xs12="xs12" lg12="lg12">
                                        <!-- <v-card color=""> -->
                                        <v-card-text class="texto-18 px-0 py-0 text-xs-left text-lg-left text-sm-left">
                                            {{ props.item.cliente }}
                                        </v-card-text>
                                        <!-- </v-card> -->
                                    </v-flex>
                                    <v-flex xs12="xs12" lg6="lg6">
                                        <!-- <v-card color=""> -->
                                        <v-card-text class="px-0 py-0">
                                            <b>Total</b>:
                                            {{ props.item.totalF }}
                                            $
                                        </v-card-text>
                                        <!-- </v-card> -->
                                    </v-flex>
                                    <v-flex xs12="xs12" lg6="lg6">
                                        <!-- <v-card color=""> -->
                                        <v-card-text class="px-0 py-0">
                                            <b>Disp.</b>:
                                            {{ props.item.diasdisponible }}
                                        </v-card-text>
                                        <!-- </v-card> -->
                                    </v-flex>
                                    <v-flex xs12="xs12" lg6="lg6">
                                        <!-- <v-card color=""> -->
                                        <v-card-text class="px-0 py-0">
                                            <b>Auto</b>:
                                            {{ props.item.autoSeleccionado }}
                                        </v-card-text>
                                        <!-- </v-card> -->
                                    </v-flex>
                                    <v-flex xs12="xs12" lg6="lg6">
                                        <!-- <v-card color=""> -->
                                        <v-card-text class="px-0 py-0">
                                            <b>Entrega</b>:
                                            {{ props.item.fechasInicio }}
                                        </v-card-text>
                                        <!-- </v-card> -->
                                    </v-flex>
                                    <!-- <div> <h3>{{ props.item.marca }}</h3> </div> <div> <div class="text-xs-left">Placa: {{ props.item.placa }}</div> <div>Color: {{ props.item.color }}</div>
                                    <v-spacer></v-spacer> <v-flex align-content-end> <v-icon small class="mr-2" @click="dialog3 = true"> mail_outline </v-icon> </v-flex> </div> <div class="">
                                    <div>Año: {{ props.item.anio }}</div> <div>Precio: {{ props.item.precio_por_dia }}</div> </div> -->
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
                        <v-btn @click="confirmarExonerar(props.item)" small="small" color="success">Exonerar</v-btn>
                        <v-btn @click="confirmar(props.item)" small="small" color="primary">Confirmar</v-btn>
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
    exonerar: 0,
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
    dialog5: false,
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
    confirmarExonerar(item) {
      console.log(item);
      this.dialog5 = true;
      this.idupdate = item.id;
      // window.location.href = `/reserva/${item.id}/edit`;
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
      console.log("Funcion Pagar 50$");
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
            exonerar: this.exonerar,
          }
        })
        .then(function(response) {
          response.data
          console.log(response.data);
          window.location.href = '/reserva';
        })
        .catch(e => {
          alert('Error el intentar abonar los 50$');
        });
    },
    fexonerar(item) {
      console.log("Funcion Exonerar");
      axios({
          method: 'put',
          url: `/v1.0/reserva/${this.idupdate}`,
          data: {
            codigodepago: '',
            montodepositado: 0,
            tipodepago: '',
            banco: '',
            estado: 2,
            disponible: 0,
            enxonerar: this.enxonerar,
          }
        })
        .then(function(response) {
          response.data
          console.log(response.data);
          alert('Se activo exonerando el pago');
          window.location.href = '/reserva';
        })
        .catch(e => {
          alert('Error al intentar exonerar');
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
