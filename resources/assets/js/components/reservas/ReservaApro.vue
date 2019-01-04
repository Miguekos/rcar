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

.v-card__text {
  padding: 2px;
  width: 100%;
}
</style>
<template id="prereserva">
<div class="">

  <v-dialog v-model="dialog4" persistent max-width="60%">
    <v-card>
      <!-- <v-card style="border-radius: 0px 10px 0px 10px"> -->
      <v-card-title class="headline">Registro de confirmacion de Pago</v-card-title>
      <v-card-text>
        <v-container fluid grid-list-xl>
          <v-layout align-center justify-space-between row fill-height>
            <v-flex class="" xs12 lg12>
              <v-card>
                <v-form>
                  <v-card>
                    <v-card-text px-0 py-0>
                      <v-container grid-list-xs,sm,md,lg,xl>
                        <v-layout wrap>
                          <table class="v-datatable v-table teme--light">
                            <tbody>
                              <tr>
                                <td>Pago Por Servicios</td>
                                <td class="text-xs-right">123</td>
                              </tr>
                              <tr>
                                <td>Garantia</td>
                                <td class="text-xs-right">123</td>
                              </tr>
                            </tbody>
                            <tfoot>
                              <tr>
                                <td><strong>Total por Abonar</strong></td>
                                <td class="text-xs-right"><b>268 $</b></td>
                              </tr>
                            </tfoot>
                          </table>
                        </v-layout>
                      </v-container>
                    </v-card-text>
                  </v-card>

                  <v-divider></v-divider>

                  <v-card-text>
                    <v-container fluid grid-list-xl>
                      <v-layout align-center justify-space-between row wrap>

                        <v-flex xs12 sm6 md3>
                          <v-select :items="Tipopago" item-text="text" item-value="text" v-model="Tipopagovalue" label="Tipo de Pago"></v-select>
                        </v-flex>

                        <v-flex xs12 sm6 md3>
                          <v-select :items="Banco" item-text="text" item-value="text" v-model="Bancovalue" label="Banco"></v-select>
                        </v-flex>

                        <v-flex xs12 sm6 md3>
                          <v-text-field label="Codigo de Deposito" v-model="codigodepago"></v-text-field>
                        </v-flex>

                        <v-flex xs12 sm6 md2>
                          <v-text-field label="Monto $" v-model="montodepositado"></v-text-field>
                        </v-flex>

                        <v-flex xs12 sm6 md1>
                          <v-icon title="Agregar Abono" @click="" color="success">add</v-icon>
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
                            <template slot="items" slot-scope="props">
                              <td>{{ props.item.name }}</td>
                              <td class="text-xs-right">{{ props.item.calories }}</td>
                              <td class="text-xs-right">{{ props.item.fat }}</td>
                              <td class="text-xs-right">{{ props.item.carbs }}</td>
                              <td class="text-xs-right">{{ props.item.protein }}</td>
                              <td class="text-xs-right">{{ props.item.iron }}</td>
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
        <v-btn color="green darken-1" round dark @click="update(), dialog4 = false">Guardar</v-btn>
        <v-btn color="red darken-1" round dark @click="dialog4 = false">Cancelar</v-btn>
      </v-card-actions>
    </v-card>
  </v-dialog>

  <v-container grid-list-md fluid text-xs-justify>
    <v-data-iterator :items="items" :rows-per-page-items="rowsPerPageItems" :pagination.sync="pagination" :search="search" content-tag="v-layout" row wrap hide-actions>
      <v-flex slot="item" slot-scope="props" xs12 sm6 md6 lg6>
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
                      <div class="title">{{ props.item.cliente }}</div>
                      <div class="text-xs-left"><strong>Monto a pagar:</strong> {{ props.item.totalF }}$</div>
                      <div class="text-xs-left"><strong>Dias Disponible:</strong> {{ props.item.diasdisponible }}</div>
                    </div>
                    <div>
                      <div class="text-xs-right"><strong>Auto:</strong> {{ props.item.autoSeleccionado }}</div>
                      <div class="text-xs-right"><strong>Fecha Inicio:</strong> {{ props.item.fechasInicio }}</div>
                      <div class="text-xs-right"><strong>Fecha Fin:</strong> {{ props.item.fechaFin }}</div>
                    </div>
                  </v-layout>
                </v-card-title>
              </v-flex>
            </v-layout>
            <!-- <v-divider dense light></v-divider> -->
            <v-card-actions>
              <strong>N° Reserva:&nbsp </strong> 00000{{ props.item.nreserva }}
              <v-spacer></v-spacer>
              <v-btn @click="activar(props.item)" small color="primary">Activar</v-btn>

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
    codigodepago: "",
    montodepositado: "",
    Tipopagovalue: "",
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
    dialog4: false,
    desserts: [],
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
    this.getDataAbono();
    this.getDataCliente();
  },
  computed: {

  },
  methods: {
    crear() {
      window.location.href = '/reserva/create';
    },
    activar(item) {
      console.log(item);
      this.dialog4 = true;
      this.idupdate = item.id;
    },
    getDataCliente() {
      console.log("en get data nuew");
      axios
        .get(`/v1.0/reservastotales`)
        .then(response => {
          this.items = response.data.reservaapr;
          console.log(response.data.reservaapr);
        })
        .catch(e => {
          this.errors.push(e);
        });
      // this.paginas();
      console.log("aqui");
    },
    getDataAbono() {
      console.log("Entro a consutar los abonos");
      axios
        .get(`/v1.0/abono`)
        .then(response => {
          this.desserts = response.data;
          console.log("Aqui abao repsuesta de abono");
          console.log(response);
        })
        .catch(e => {
          this.errors.push(e);
        });
      // this.paginas();
      // console.log("aqui");
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
