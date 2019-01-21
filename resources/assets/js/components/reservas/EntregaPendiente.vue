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

    <v-dialog v-model="dialog1" persistent="persistent" max-width="85%">
        <form method="post" @submit.prevent="entregarVehiculo()">
            <v-card style="">
                <v-card-title style="padding-top: 24px; padding-left: 24px; text-align: center;" class="headline">Registro de entrega del Vehiculo</v-card-title>
                <v-card-text>
                    <v-container fluid="fluid" grid-list-xl="grid-list-xl">
                        <v-layout row="row" wrap="wrap">

                            <v-flex xs12="xs12" md4="md4">
                                <label>Kilometros de entrega</label>
                                <v-text-field required="required" v-model="kilometroinicial"></v-text-field>
                            </v-flex>

                            <v-flex xs12="xs12" md4="md4">
                                <v-form id="subir" @submit.prevent="subir('photo')">
                                    <label>Subir contrato</label>
                                    <input type="hidden" name="MAX_FILE_SIZE" value="200000"/>
                                    <v-text-field required="required" type="file" name="photo" @change="subir('photo')"></v-text-field>
                                </V-form>
                            </v-flex>

                            <v-flex xs12="xs12" md4="md4">
                                <label>Comentarios</label>
                                <v-textarea v-model="Comentarios" auto-grow="auto-grow" rows="1"></v-textarea>
                            </v-flex>

                        </v-layout>
                    </v-container>
                </v-card-text>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color="error" round="round" dark="dark" @click="dialog1 = false">Cancelar</v-btn>
                    <v-btn color="primary" round="round" dark="dark" type="submit">Confirmar</v-btn>
                </v-card-actions>
            </v-card>
        </form>
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
            <v-flex slot="item" slot-scope="props" xs12="xs12" sm6="sm6" md4="md4" lg6="lg6">
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
                        <strong>N°:&nbsp
                        </strong>
                        00000{{ props.item.nreserva }}
                        <v-spacer></v-spacer>
                        <v-btn @click="entregarV(props.item)" small="small" color="primary">Entregar</v-btn>
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
    kilometroinicial: "",
    subircontrato: "",
    comentariocontrato: "",
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
    dialog1: false,
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
    csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
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
    subir(item) {
      let form = document.getElementById('subir');
      const formData = new FormData(form);
      console.log(item);
      axios.post('/foto', formData)
        .then(response => {
          console.log(response)
          // this.image = `/contratos/${response.data}`;
        })
        .catch(error => {
          console.log(error)
          // alert("Surgio un error, verifique los campos e intente nuevamente..!!");
        })
    },
    entregarVehiculo() {
      console.log("aqui id para ipdate");
      this.dialog1 = false;
      axios({
          method: 'put',
          url: `/v1.0/reserva/${this.idupdate}`,
          data: {
            estado: 5,
            kilometroinicial: this.kilometroinicial,
            subircontrato: this.subircontrato,
            comentariocontrato: this.comentariocontrato,
            _token: this.csrf
          }
        })
        .then(function(response) {
          response.data
          console.log(response.data);
          window.location.href = '/reserva';
        });
    },
    entregarV(item) {
      this.dialog1 = true;
      this.idupdate = item.id;
    },
    crear() {
      window.location.href = '/reserva/create';
    },
    getDataCliente() {
      console.log("en get data nuew");
      axios
        .get(`/v1.0/reservastotales`)
        .then(response => {
          this.items = response.data.pendiented;
          console.log(response.data.pendiented);
        })
        .catch(e => {
          this.errors.push(e);
        });
      // this.paginas();
      console.log("aqui");

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
            estado: 5,
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
