<style id="prereserva">
.v-btn--small {
  font-size: 10px;
  height: 18px;
  padding: 0 8px;
}

.v-card__title--primary {
  padding: 0px 13px 0px 0px;
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

  <v-dialog v-model="dialog4" persistent max-width="80%">
    <v-card>
      <!-- <v-card style="border-radius: 0px 10px 0px 10px"> -->
      <v-card-title class="">LIQUIDACION - Reserva N° 0000{{ jsonitem.nreserva }}</v-card-title>
      <v-card-text>
        <v-container fluid grid-list-xl>
          <v-layout align-center justify-space-between row fill-height>
            <v-flex class="" xs12 lg12>
              <v-card>
                <v-form>
                    <v-card-text px-0 py-0>
                      <v-container grid-list-xs,sm,md,lg,xl>
                        <v-layout wrap>
                          <table class="v-datatable v-table teme--light">
                            <tbody>
                              <tr>
                                <td class="px-0">Garantia</td>
                                <td class="px-0 text-xs-right"> {{ jsonitem.garantia }} $</td>
                                <!-- <td class="text-xs-right">{{ reserva.garantia }} $</td> -->
                              </tr>
                            </tbody>
                            <tfoot>
                              <tr>
                                <td class="px-0"><strong>Cobros adicionales</strong></td>
                                <!-- <td class="text-xs-right"><b>{{ reserva.totalF }} $</b></td> -->
                                <td class="px-0 text-xs-right"><b> {{ jsonitem.cobrosadi }} $</b></td>
                              </tr>
                              <tr>
                                <td class="px-0"><strong>Deuda total</strong></td>
                                <!-- <td class="text-xs-right"><b>{{ reserva.totalF - sumaAbonos }} $</b></td> -->
                                <td class="px-0 text-xs-right"><b> {{ jsonitem.totaladevolver - sumaAbonos }} $</b></td>
                              </tr>
                              <!-- <tr>
                                <td><strong>Total abonado</strong></td>
                                <td class="text-xs-right"><b>{{ sumaAbonos }} $</b></td>
                              </tr> -->
                            </tfoot>
                          </table>
                        </v-layout>
                      </v-container>
                    </v-card-text>

                  <v-divider></v-divider>

                  <v-card-text>
                      <v-container fluid="fluid" grid-list-xl="grid-list-xl">
                          <v-layout align-center="align-center" justify-space-between="justify-space-between" row="row" wrap="wrap">
                              <v-flex xs12="xs12" sm6="sm6" md3="md3">
                                  <v-autocomplete :items="Tipopago" item-text="text" item-value="text" v-model="Tipopagovalue" label="Tipo de Pago"></v-autocomplete>
                              </v-flex>

                              <v-flex xs12="xs12" sm6="sm6" md3="md3">
                                  <v-autocomplete :items="Banco" item-text="text" item-value="text" v-model="Bancovalue" label="Banco"></v-autocomplete>
                              </v-flex>

                              <v-flex xs12="xs12" sm6="sm6" md3="md3">
                                  <v-text-field label="Codigo de Deposito" v-model="codigodepago"></v-text-field>
                              </v-flex>

                              <v-flex xs12="xs12" sm6="sm6" md2="md2">
                                  <v-text-field required="required" label="Monto $" v-model="montodepositado"></v-text-field>
                              </v-flex>

                              <v-flex xs12="xs12" sm6="sm6" md1="md1">
                                  <v-btn fab="fab" dark="dark" small="small" color="primary">
                                      <v-icon title="Agregar Abono" @click="createAbono()" dark="dark">add</v-icon>
                                  </v-btn>
                                  <!-- <v-icon title="Agregar Abono" @click="createAbono()" color="success">add</v-icon> -->
                              </v-flex>
                          </v-layout>
                      </v-container>
                  </v-card-text>

                  <v-divider></v-divider>

                  <v-card-text>
                    <v-container fluid grid-list-xl>
                      <v-layout align-center justify-space-between row wrap>
                        <v-flex lg12>

                          <v-data-table :items="desserts" class="elevation-1" hide-actions hide-headers>
                          <!-- <v-data-table :items="desserts" class="elevation-1" hide-actions hide-headers> -->
                            <template slot="items" slot-scope="props">
                              <td class="text-xs-left">{{ props.item.banco }}</td>
                              <td class="text-xs-right pl-5">{{ props.item.montodepositado }}./s</td>
                              <td class="text-xs-right">{{ props.item.codigodepago }}</td>
                              <td class="px-2">{{ props.item.tipodepago }}</td>
                              <td @click="deleteItem(props.item)" class="text-xs-right"> <v-btn fab dark small color="red"> <v-icon>delete</v-icon> </v-btn> </td>
                            </template>
                          </v-data-table>
                        </v-flex>
                      </v-layout>
                    </v-container>
                  </v-card-text>
                </v-form>
              </v-card>
            </v-flex>
          </v-layout>
        </v-container>
      </v-card-text>
      <v-card-actions>
        <v-spacer></v-spacer>
        <v-btn color="primary" round dark @click="liquidarFinal()">Liquidar</v-btn>
        <v-btn color="green darken-1" round dark @click="dialog4 = false">Guardar</v-btn>
        <!-- <v-btn color="red darken-1" round dark @click="dialog4 = false">Cancelar</v-btn> -->
      </v-card-actions>
    </v-card>
  </v-dialog>

  <v-container grid-list-md fluid text-xs-justify>
    <v-data-iterator :items="items" :rows-per-page-items="rowsPerPageItems" :pagination.sync="pagination" :search="search" content-tag="v-layout" row wrap hide-actions>
      <v-flex slot="item" slot-scope="props" xs12 sm6 md4 lg6>
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
                                    <b>Direc.</b>:
                                    {{ props.item.direccionEntrega }}
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
                        </v-layout>
                    </v-card-title>
                </v-flex>
            </v-layout>
            <!-- <v-divider dense light></v-divider> -->
            <v-card-actions>
              <strong>N°:&nbsp </strong> 00000{{ props.item.nreserva }}
              <v-spacer></v-spacer>
              <v-btn @click="liquidar(props.item)" small color="primary">Liquidar</v-btn>
              <v-btn @click="devolver(props.item)" small color="success">Devolucion</v-btn>

              <!-- <v-btn  small color="error">cancelar</v-btn> -->
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
    jsonitem: [],
    garantia: 0,
    cobrosadi: 0,
    codigodepago: "",
    montodepositado: "",
    Tipopagovalue: "",
    Bancovalue: "",
    numeroReserva: "",
    totalAbonado: "",
    desserts: [],
    numeroReserva: 0,
    reservaselec: {},
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
    dialog6: false,
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
    liquidarFinal () {
      if ((this.jsonitem.totaladevolver - this.sumaAbonos) == 0) {
        alert("Puede Liquidar");
        this.update3();
      } else {
        alert("Aun no puede liquidar tienes deudas");
      }
    },
    liquidar(item) {
      console.log(item);
      this.dialog4 = true;
      this.idupdate = item.id;
      this.jsonitem = item;
      this.numeroReserva = item.nreserva;
      this.totalAbonado = item.totalAbonado;
      this.getDataAbono();
      axios
        .get(`/v1.0/reserva/${item.id}`)
        .then(response => {
          this.reserva = response.data;
          console.log("log reserva.....");
          console.log(response.data);
        })
        .catch(e => {
          this.errors.push(e);
        });
    },
    createAbono() {
      if (this.montodepositado == 0 || this.codigodepago == 0) {
        alert("no se puede crear abono");
      } else {
        var asd = parseFloat(this.jsonitem.totaladevolver) - parseFloat(this.sumaAbonos);
        console.log("###################################################");
        console.log(asd);
        if (asd < this.montodepositado) {
          alert("No puedes tener deuda negativa verifique el monto depositado")
        } else {

          console.log("Creando abono");
          axios
            .post(`/v1.0/abono`, {
              nreserva: this.reserva.nreserva,
              autoId: this.reserva.vehiculo,
              autoMarca: this.reserva.autoSeleccionado,
              clienteId: this.reserva.clienteId,
              clienteNombres: this.reserva.cliente,
              tipodepago: this.Tipopagovalue,
              banco: this.Bancovalue,
              codigodepago: this.codigodepago,
              montodepositado: this.montodepositado,
              montorestante: (this.jsonitem.totaladevolver - this.sumaAbonos) - this.montodepositado,
              montototal: this.reserva.totalF,
              abonoprereserva: 0,
              abonoliquidacion: 1,
            })
            .then(response => {
              console.log("Aqui abao repsuesta de abono");
              console.log(response);
            })
            .catch(e => {
              this.errors.push(e);
            });
          this.getDataAbono();
          this.Tipopagovalue = "",
            this.Bancovalue = "",
            this.codigodepago = "",
            this.montodepositado = ""
        }
      }
    },
    getDataAbono() {
      console.log("Entro en getAbono");
      axios
        .get(`/v1.0/abono/${this.numeroReserva}`)
        .then(response => {
          this.desserts = response.data.abonoli;
          this.sumaAbonos = response.data.sumaAbonosli;
          console.log(response);
        })
        .catch(e => {
          this.errors.push(e);
        });
      console.log("Salio en getAbono");
    },
    rechazo () {

    },
    crear() {
      window.location.href = '/reserva/create';
    },
    getDataCliente() {
      console.log("en get data nuew");
      axios
        .get(`/v1.0/reservastotales`)
        .then(response => {
          this.items = response.data.liquidacio;
          console.log(response.data.liquidacio);
        })
        .catch(e => {
          this.errors.push(e);
        });
      // this.paginas();
      console.log("aqui");

    },

    devolver(item) {
      if (item.entrega == 1) {
        alert("Ya se entrego el auto y se encuentra disponible, favor ir a liquidar.");
      } else {
        alert("Todavia no se realiza la entrega");
        window.location.href = `/cargoalquiler/${item.clienteId}/${item.vehiculo}/${item.nreserva}`;
      }
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
        var borrar = confirm('Esta seguro que desea borrar este Cliente?')
        if (!borrar) {
          alert("Se cancelo");
        } else {
          axios
            .delete(`/v1.0/abono/${item.id}`, {
              _token: this.csrf
            })
            .then(response => {
              console.log("Borrado correctamente");
            })
            .catch(e => {
            });
          this.getDataAbono();
        }
      },
    rechazo () {
      console.log("aqui id para ipdate");
          axios({
              method: 'put',
              url: `/v1.0/reserva/${this.idupdate}`,
              data: {
                estado: 0
                ,
              }
          })
              .then(function (response) {
                  response.data
                  console.log(response.data);
                  window.location.href = '/reserva';
              });
          },
    update () {
        console.log("aqui id para ipdate");
            axios({
                method: 'put',
                url: `/v1.0/reserva/${this.idupdate}`,
                data: {
                  codigodepago: this.codigodepago,
                  montodepositado: this.montodepositado,
                  Tipopagovalue: this.Tipopagovalue,
                  Bancovalue: this.Bancovalue,
                  estado: 2,
                }
            })
                .then(function (response) {
                    response.data
                    console.log(response.data);
                    window.location.href = '/reserva';
                });
            },
            update1 () {
                console.log("aqui id para ipdate");
                    axios({
                        method: 'put',
                        url: `/v1.0/reserva/${this.idupdate}`,
                        data: {
                          estado: 3
                          ,
                        }
                    })
                        .then(function (response) {
                            response.data
                            console.log(response.data);
                            window.location.href = '/reserva';
                        });
                    },
                    update2 () {
                        console.log("aqui id para ipdate");
                            axios({
                                method: 'put',
                                url: `/v1.0/reserva/${this.idupdate}`,
                                data: {
                                  estado: 0,
                                }
                            })
                                .then(function (response) {
                                    response.data
                                    console.log(response.data);
                                    window.location.href = '/reserva';
                                });
                            },
                            update3 () {
                                console.log("aqui id para ipdate");
                                    axios({
                                        method: 'put',
                                        url: `/v1.0/reserva/${this.idupdate}`,
                                        data: {
                                          estado: 0,
                                          liquidacion: 1,
                                        }
                                    })
                                        .then(function (response) {
                                            response.data
                                            console.log(response.data);
                                            window.location.href = '/reserva';
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
