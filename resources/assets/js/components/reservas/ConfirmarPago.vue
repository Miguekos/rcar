<style id="confirmarpago">
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
<template id="confirmarpago">
<div class="">

  <v-dialog v-model="dialog4" persistent max-width="60%">
    <v-card style="border-radius: 0px 10px 0px 10px">
      <v-card-title class="headline">Registro de confirmacion de reserva</v-card-title>
      <v-card-text>
        <v-container fluid grid-list-xl>
          <v-layout row wrap>

            <v-flex xs12 sm6 md3>
              <v-select :items="Tipopago" item-text="text" item-value="text" v-model="Tipopagovalue" label="Tipo de Pago"></v-select>
            </v-flex>

            <v-flex xs12 sm6 md3>
              <v-select :items="Banco" item-text="text" item-value="text" v-model="Bancovalue" label="Banco"></v-select>
            </v-flex>

            <v-flex xs12 sm6 md3>
              <v-text-field label="Codigo de Deposito" v-model="codigodepago"></v-text-field>
            </v-flex>

            <v-flex xs12 sm6 md3>
              <v-text-field label="Monto Depositado" v-model="montodepositado"></v-text-field>
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

  <v-dialog v-model="dialog5" persistent max-width="40%">
    <v-card style="border-radius: 0px 10px 0px 10px">
      <v-card-title class="headline">Aprobar?</v-card-title>
      <v-card-text>
        <v-container fluid grid-list-xl>
          <v-layout row wrap>
            Esta seguro de pasar la aprobacion de la SBS?
          </v-layout>
        </v-container>
      </v-card-text>
      <v-card-actions>
        <v-spacer></v-spacer>
        <v-btn color="green darken-1" round dark @click="update1(), dialog5 = false">Si</v-btn>
        <v-btn color="red darken-1" round dark @click="dialog5 = false">Cancelar</v-btn>
      </v-card-actions>
    </v-card>
  </v-dialog>

  <v-dialog v-model="dialog6" persistent max-width="40%">
    <v-card style="border-radius: 0px 10px 0px 10px">
      <v-card-title class="headline">Rechazar?</v-card-title>
      <v-card-text>
        <v-container fluid grid-list-xl>
          <v-layout row wrap>
            No paso la evaluacion de la SBS?
          </v-layout>
        </v-container>
      </v-card-text>
      <v-card-actions>
        <v-spacer></v-spacer>
        <v-btn color="green darken-1" round dark @click="update2(), dialog6 = false">Si</v-btn>
        <v-btn color="red darken-1" round dark @click="dialog6 = false">Cancelar</v-btn>
      </v-card-actions>
    </v-card>
  </v-dialog>

  <v-container grid-list-md fluid text-xs-justify>
    <v-data-iterator :items="items" :rows-per-page-items="rowsPerPageItems" :pagination.sync="pagination" :search="search" content-tag="v-layout" row wrap hide-actions>
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
              <strong>Numero de Reserva:&nbsp </strong> 00000{{ props.item.nreserva }}
              <v-spacer></v-spacer>
              <v-btn @click="aprobo(props.item)" small color="primary">Aprobo</v-btn>
              <v-btn @click="noPaso(props.item)" small color="error">Rechazo</v-btn>

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
          this.items = response.data.pendientee;
          console.log(response.data.pendientee);
        })
        .catch(e => {
          this.errors.push(e);
        });
      // this.paginas();
      console.log("aqui");

    },
    noPaso(item) {
      console.log(item);
      this.dialog6 = true;
      this.idupdate = item.id;
      // window.location.href = `/reserva/${item.id}/edit`;
    },
    aprobo(item) {
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
