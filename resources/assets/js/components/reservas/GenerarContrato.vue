<style media="screen">
table.v-table {
  border-radius: 2px;
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  max-width: 100%;
}
</style>
<template>
<div class="">
    <v-container fill-height fluid grid-list-xl>
        <v-layout justify-center wrap>
            <v-flex style="padding-top: 0px;" xs12 md6>
                <v-card>
                  <!-- <v-card color="cyan darken-2" class="white--text"> -->
                    <v-layout>
                        <v-flex text-lg-center xs5>
                            <v-flex>
                                Miguel Rodriguez
                            </v-flex>
                            <!-- <v-img src="https://cdn.vuetifyjs.com/images/cards/foster.jpg" height="125px" contain></v-img> -->
                            <v-img src="loginnew/images/logo.png" height="125px" contain></v-img>
                        </v-flex>
                        <v-flex xs7>
                            <v-card-title primary-title>
                                <table class="v-datatable v-table teme--light">
                                    <tbody>
                                        <tr>
                                            <td>Pago Por Servicios</td>
                                            <td class="text-xs-right">asd</td>
                                        </tr>
                                        <tr>
                                            <td>Garantia</td>
                                            <td class="text-xs-right">asd</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>
                                                <strong>Total a pagar</strong>
                                            </td>
                                            <td class="text-xs-right">
                                                <b>asd</b>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>Deuda total</strong>
                                            </td>
                                            <td class="text-xs-right">
                                                <b>asd</b>
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
                                          <td>Pago Por Servicios</td>
                                          <td class="text-xs-right">asd</td>
                                      </tr>
                                      <tr>
                                          <td>Garantia</td>
                                          <td class="text-xs-right">asd</td>
                                      </tr>
                                  </tbody>
                                  <tfoot>
                                      <tr>
                                          <td>
                                              <strong>Total a pagar</strong>
                                          </td>
                                          <td class="text-xs-right">
                                              <b>asd</b>
                                          </td>
                                      </tr>
                                      <tr>
                                          <td>
                                              <strong>Deuda total</strong>
                                          </td>
                                          <td class="text-xs-right">
                                              <b>asd</b>
                                          </td>
                                      </tr>
                                      <!-- <tr> <td><strong>Total abonado</strong></td> <td class="text-xs-right"><b>{{ sumaAbonos }} $</b></td> </tr> -->
                                  </tfoot>
                              </table>
                          </v-card-title>
                      </v-flex>
                      <v-flex text-lg-center xs5>
                          <v-flex>
                              Miguel Rodriguez
                          </v-flex>
                          <!-- <v-img src="https://cdn.vuetifyjs.com/images/cards/foster.jpg" height="125px" contain></v-img> -->
                          <v-img src="loginnew/images/logo.png" height="125px" contain></v-img>
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
                                    <td class="text-xs-right"></td>
                                </tr>
                                <tr>
                                    <td>Paquete</td>
                                    <td class="text-xs-right"></td>
                                </tr>
                                <tr class="v-datatable__expand-row">
                                    <td colspan="2" class="v-datatable__expand-col"></td>
                                </tr>
                                <tr>
                                    <td>Delivery</td>
                                    <td class="text-xs-right"></td>
                                </tr>
                                <tr class="v-datatable__expand-row">
                                    <td colspan="2" class="v-datatable__expand-col"></td>
                                </tr>
                                <tr>
                                    <td>Silla Bebe</td>
                                    <td class="text-xs-right"></td>
                                </tr>
                                <tr class="v-datatable__expand-row">
                                    <td colspan="2" class="v-datatable__expand-col"></td>
                                </tr>
                                <tr>
                                    <td>Doble Piloto</td>
                                    <td class="text-xs-right"></td>
                                </tr>
                                <tr class="v-datatable__expand-row">
                                    <td colspan="2" class="v-datatable__expand-col"></td>
                                </tr>
                                <tr>
                                    <td>Tanque LLeno</td>
                                    <td class="text-xs-right"></td>
                                </tr>
                                <tr class="v-datatable__expand-row">
                                    <td colspan="2" class="v-datatable__expand-col"></td>
                                </tr>
                                <tr>
                                    <td>Seguro</td>
                                    <td class="text-xs-right"></td>
                                </tr>
                                <tr class="v-datatable__expand-row">
                                    <td colspan="2" class="v-datatable__expand-col"></td>
                                </tr>
                                <tr>
                                    <td>Dia Adicional</td>
                                    <td class="text-xs-right"></td>
                                </tr>
                                <tr class="v-datatable__expand-row">
                                    <td colspan="2" class="v-datatable__expand-col"></td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>
                                        <strong>IGV 18%</strong>
                                    </td>
                                    <td class="text-xs-right">
                                        <b></b>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Total a Depositar</strong>
                                    </td>
                                    <td class="text-xs-right">
                                        <b>
                                            $</b>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </v-card-text>
                </v-card>
            </v-flex>
        </v-layout>
    </v-container>
</div>
</template>

<script>
export default {
  data: () => ({
    clienteData: "",
    autoData: "",
    reservaData: "",

  }),
  methods: {
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
    link(link) {
      if (link != 'logout') {
        window.location.href = `${link}`;
      } else {
        this.logout();
      }
    },
    atras() {
      window.location.href = `/${this.back}`;
    },
  },
}
</script>
