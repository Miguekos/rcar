<style media="screen">
table.v-table {
  border-radius: 2px;
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  max-width: 100%;
}

.v-text-field {
    padding-top: 0px;
    margin-top: 0px;
}

.v-card__title--primary {
    padding-top: 0px;
}

.v-card__title {
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
<template>
<div class="">
  <v-dialog v-model="dialog" persistent="persistent" max-width="60%">
    <!-- <form method="post" @submit.prevent="sendFormConfirmar()"> -->
      <v-card style="">
        <v-card-title style="padding-top: 24px; padding-left: 24px; text-align: center;" class="headline">Se envio correctamente elcorreo al cliente desea enviar otro?</v-card-title>
        <v-card-text>
          <v-container fluid="fluid" grid-list-xl="grid-list-xl">
            <v-layout row="row" wrap="wrap">
              <v-flex>
                <v-text-field
                solo
                    label="Correo"
                    hint="usuario@correo.com"
                    persistent-hint
                  ></v-text-field>
              </v-flex>
            </v-layout>
          </v-container>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <!-- <v-btn color="green darken-1" round="round" dark="dark" type="submit">Guardar</v-btn> -->
          <v-btn color="error" round="round" fat @click="dialog = false">Cancelar</v-btn>
          <v-btn round="round" fat @click="dialog = false">Enviar</v-btn>
          <v-btn color="green darken-1" round="round" dark="dark" @click="dialog = false, update()">Continuar</v-btn>
        </v-card-actions>
      </v-card>
    <!-- </form> -->
  </v-dialog>



    <v-container fill-height fluid grid-list-xl>
        <v-layout justify-center wrap>
            <v-flex style="padding-top: 0px;" xs12 md6>
                <v-card>
                  <!-- <v-card color="cyan darken-2" class="white--text"> -->
                    <v-layout>
                        <v-flex text-lg-center xs5>
                            <v-flex>
                                {{ clientesc.nombres }}
                            </v-flex>
                            <!-- <v-img src="https://cdn.vuetifyjs.com/images/cards/foster.jpg" height="125px" contain></v-img> -->
                            <v-img :src="clientesc.image" height="125px" contain></v-img>
                        </v-flex>
                        <v-flex xs7>
                            <v-card-title primary-title>
                                <table class="v-datatable v-table teme--light">
                                    <tbody>
                                        <tr>
                                            <td>
                                              <v-text-field
                                                readonly
                                                prepend-icon="place"
                                                :value="clientesc.direccion"
                                              ></v-text-field>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                              <v-text-field
                                                readonly
                                                prepend-icon="settings_phone"
                                                :value="clientesc.celular"
                                              ></v-text-field>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>
                                              <v-text-field
                                                readonly
                                                prepend-icon="mail_outline"
                                                :value="clientesc.correo"
                                              ></v-text-field>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                              <v-text-field
                                                readonly
                                                prepend-icon="favorite"
                                                :value="clientesc.puntos"
                                              ></v-text-field>
                                            </td>
                                        </tr>
                                        <!-- <tr> <td><strong>Total abonado</strong></td> <td class="text-xs-right"><b>{{ sumaAbonos }} $</b></td> </tr> -->
                                    </tfoot>
                                </table>
                            </v-card-title>
                        </v-flex>
                    </v-layout>
                    <v-divider light></v-divider>
                    <!-- <v-card-actions class="pa-3"> Rate this album <v-spacer></v-spacer> <v-icon>star_border</v-icon> <v-icon>star_border</v-icon> <v-icon>star_border</v-icon>
                    <v-icon>star_border</v-icon> <v-icon>star_border</v-icon> </v-card-actions> -->
                </v-card>
            </v-flex>

            <v-flex style="padding-top: 0px;" xs12 md6>
                <v-card>
                  <!-- <v-card color="purple" class="white--text"> -->
                    <v-layout row>
                      <v-flex xs7>
                            <v-card-title primary-title>
                                <table class="v-datatable v-table teme--light">
                                    <tbody>
                                        <tr>
                                            <td>
                                              <v-text-field
                                                suffix="Placa"
                                                readonly
                                                :value="autosc.placa"
                                              ></v-text-field>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                              <v-text-field
                                                suffix="Año"
                                                readonly
                                                :value="autosc.anio"
                                              ></v-text-field>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>
                                                <v-text-field
                                                  suffix="Color"
                                                  readonly
                                                  :value="autosc.color"
                                                ></v-text-field>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                              <v-text-field
                                                suffix="Precio"
                                                readonly
                                                :value="autosc.precio_por_dia"
                                              ></v-text-field>
                                            </td>
                                        </tr>
                                        <!-- <tr> <td><strong>Total abonado</strong></td> <td class="text-xs-right"><b>{{ sumaAbonos }} $</b></td> </tr> -->
                                    </tfoot>
                                </table>
                            </v-card-title>
                        </v-flex>
                      <v-flex text-lg-center xs5>
                          <v-flex>
                              {{ autosc.marca }}
                          </v-flex>
                          <!-- <v-img src="https://cdn.vuetifyjs.com/images/cards/foster.jpg" height="125px" contain></v-img> -->
                          <v-img :src="autosc.imagen1" height="125px" contain></v-img>
                      </v-flex>
                    </v-layout>
                    <v-divider light></v-divider>
                    <!-- <v-card-actions class="pa-3">
                        Rate this album
                        <v-spacer></v-spacer>
                        <v-icon>star_border</v-icon>
                        <v-icon>star_border</v-icon>
                        <v-icon>star_border</v-icon>
                        <v-icon>star_border</v-icon>
                        <v-icon>star_border</v-icon>
                    </v-card-actions> -->
                </v-card>
            </v-flex>
        </v-layout>

    </v-container>

    <v-container fill-height fluid grid-list-xl>
        <v-layout align-center justify-center>
            <v-flex>
                <v-card>
                    <v-card-text>
                        <v-toolbar-title>Precio Total</v-toolbar-title>
                        <table class="v-datatable v-table theme--light">
                          <thead>
                            <tr>
                              <th role="columnheader" scope="col" aria-label="Items: Not sorted." aria-sort="none" class="column text-xs-left">Items</th>
                              <th role="columnheader" scope="col" aria-label="Precio: Not sorted." aria-sort="none" class="column text-xs-right">Precio</th>
                            </tr>
                            <tr class="v-datatable__progress">
                              <th colspan="2" class="column"></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>Vehiculo</td>
                              <td class="text-xs-right">{{ reservaData.preciovihiculo }}</td>
                            </tr>
                            <tr>
                              <td>Paquete</td>
                              <td class="text-xs-right">{{ reservaData.producto }}</td>
                            </tr>
                            <tr class="v-datatable__expand-row">
                              <td colspan="2" class="v-datatable__expand-col"></td>
                            </tr>
                            <tr>
                              <td>Delivery</td>
                              <td class="text-xs-right">{{ reservaData.zonaDeEntrega }}</td>
                            </tr>
                            <tr class="v-datatable__expand-row">
                              <td colspan="2" class="v-datatable__expand-col"></td>
                            </tr>
                            <tr>
                              <td>Silla Bebe</td>
                              <td class="text-xs-right">{{ reservaData.sillaBebe }}</td>
                            </tr>
                            <tr class="v-datatable__expand-row">
                              <td colspan="2" class="v-datatable__expand-col"></td>
                            </tr>
                            <tr>
                              <td>Doble Piloto</td>
                              <td class="text-xs-right">{{ reservaData.doblePiloto }}</td>
                            </tr>
                            <tr class="v-datatable__expand-row">
                              <td colspan="2" class="v-datatable__expand-col"></td>
                            </tr>
                            <tr>
                              <td>Tanque LLeno</td>
                              <td class="text-xs-right">{{ reservaData.tanqueLleno }}</td>
                            </tr>
                            <tr class="v-datatable__expand-row">
                              <td colspan="2" class="v-datatable__expand-col"></td>
                            </tr>
                            <tr>
                              <td>Seguro</td>
                              <td class="text-xs-right">{{ reservaData.seguro }}</td>
                            </tr>
                            <tr class="v-datatable__expand-row">
                              <td colspan="2" class="v-datatable__expand-col"></td>
                            </tr>
                            <tr>
                              <td>Dia Adicional</td>
                              <td class="text-xs-right">{{ reservaData.diaadicional }}</td>
                            </tr>
                            <tr>
                              <td>Garantia</td>
                              <td class="text-xs-right">{{ reservaData.garantia }}</td>
                            </tr>
                            <tr class="v-datatable__expand-row">
                              <td colspan="2" class="v-datatable__expand-col"></td>
                            </tr>
                          </tbody>
                          <tfoot>
                            <tr>
                              <td><strong>IGV 18%</strong></td>
                              <td class="text-xs-right"><b>{{ (reservaData.totalF * 0.18) }} $</b></td>
                            </tr>
                            <tr>
                              <td><strong>Total a depositar</strong></td>
                              <td class="text-xs-right"><b>{{ reservaData.totalF }} $</b></td>
                            </tr>
                          </tfoot>
                        </table>
                    </v-card-text>
                </v-card>
            </v-flex>
        </v-layout>
    </v-container>
    <v-container text-lg-center text-xs-center text-sm-center>
      <v-btn @click="atras()" color="success">Regresar</v-btn>
      <v-btn @click="dialog = true" color="primary">Generar Contrato</v-btn>
    </v-container>
    <!-- <pre>{{ $data }}</pre> -->
</div>
</template>

<script>
export default {
  props: ['clientesc','autosc','reservasc'],
  data: () => ({
    clienteData: "",
    autoData: "",
    reservaData: "",
    dialog: false,
    dialog1: false,
  }),
  created() {
    console.log(this.clientesc);
    console.log(this.autosc);
    console.log(this.reservasc);
    console.log(this.reservasc[0].nreserva);
    this.reservaData = this.reservasc[0];
  },
  computed: {

  },
  methods: {
    update () {
        console.log("aqui id para ipdate");
            axios({
                method: 'put',
                url: `/v1.0/reserva/${this.reservaData.nreserva}`,
                data: {
                  estado: 4,
                }
            })
                .then(function (response) {
                    response.data
                    console.log(response.data);
                    window.location.href = '/reserva';
                });
            },
    disponible: function() {
      console.log("entro a al logout");
      axios
        .post(`/v1.0/disponible`, {
          fechaIni: this.date,
          fechaFin: this.date1,
          _token: this.csrf
        })
        .then(response => {
          if (response.data == "") {
            this.disponi = "";
            // alert("No se consigue data");
            this.dialog7 = false;
          } else {
            console.log("dasddssda");
            console.log(response.data);
            this.disponi = response.data;
            this.dialog7 = false;
          }
          // window.location.href = '/';
        })
        .catch(e => {
          console.log(e);
          this.dialog7 = false;

        });
    },

    enviarCorreo(){
      this.dialog = true;
    },
    subirContrato(){
      this.dialog1 = true;
    },

    link(link) {
      if (link != 'logout') {
        window.location.href = `${link}`;
      } else {
        this.logout();
      }
    },
    atras() {
      window.location.href = `/reserva`;
    },
  },
}
</script>
