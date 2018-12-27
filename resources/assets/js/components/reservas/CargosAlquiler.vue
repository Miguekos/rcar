<style scoped="liquidacion">

</style>

<template lang="html">
<div class="liquidacion">
    <v-container grid-list-xs,sm,md,lg,xl="grid-list-xs,sm,md,lg,xl">
        <v-layout align-center="align-center" justify-center="justify-center">
            <v-flex>
                <v-card>
                    <v-card-text>
                        <v-toolbar-title>Cargo Por Alquilar</v-toolbar-title>
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
                                    <td class="text-xs-right">{{ reservaData.productos }}</td>
                                </tr>
                                <tr class="v-datatable__expand-row">
                                    <td colspan="2" class="v-datatable__expand-col"></td>
                                </tr>
                                <tr>
                                    <td>Delivery</td>
                                    <td class="text-xs-right">{{ reservaData.zonas }}</td>
                                </tr>
                                <tr class="v-datatable__expand-row">
                                    <td colspan="2" class="v-datatable__expand-col"></td>
                                </tr>
                                <tr>
                                    <td>Silla Bebe</td>
                                    <td class="text-xs-right">{{ reservaData.sillabebeP }}</td>
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
                                        <b>
                                          <!-- {{ (suma * 0.18).toFixed(2) }} -->
                                            $</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Total a Depositar</strong>
                                    </td>
                                    <td class="text-xs-right">
                                        <b>{{ reservaData.totalF }}
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

    <v-container grid-list-md="grid-list-md">
        <v-layout row="row" wrap="wrap">

            <v-flex lg6="lg6" xs12="xs12">
                <v-card>
                    <v-card-text>
                        <label>Zona delivery devolucion</label>
                        <v-autocomplete :items="zonaItem" item-text="name" solo="solo"></v-autocomplete>
                        <label>Kilometros Iniciales</label>
                        <v-text-field name="name" id="id" solo="solo"></v-text-field>
                        <label>Kilometros devolucion</label>
                        <v-text-field name="name" id="id" solo="solo"></v-text-field>
                    </v-card-text>
                </v-card>
            </v-flex>

            <v-flex lg6="lg6" xs12="xs12">
                <v-card>
                    <v-img :src="vehiculoData.imagen1" aspect-ratio="2.75"></v-img>
                    <v-toolbar-title class="text-lg-center">{{ vehiculoData.marca }}</v-toolbar-title>
                    <!-- <h3 class="headline mb-0">{{ vehiculoData.marca }}</h3> -->
                    <v-card-title>
                        <v-layout align-center="align-center" justify-space-between="justify-space-between" row="row" fill-height="fill-height">
                            <table class="v-datatable v-table">
                              <tbody style="height: 18px;">
                                <tr>
                                  <td style="height: 18px">Marca</td>
                                  <td style="height: 18px" class="text-xs-right">{{ vehiculoData.marca }}</td>
                                </tr>
                                <tr>
                                  <td style="height: 18px">Modelo:</td>
                                  <td style="height: 18px" class="text-xs-right">{{ vehiculoData.modelo }}</td>
                                </tr>
                                <tr class="v-datatable__expand-row">
                                  <td style="height: 18px" colspan="2" class="v-datatable__expand-col"></td>
                                </tr>
                                <tr>
                                  <td style="height: 18px">Color:</td>
                                  <td style="height: 18px" class="text-xs-right">{{ vehiculoData.color }}</td>
                                </tr>
                                <tr class="v-datatable__expand-row">
                                  <td colspan="2" class="v-datatable__expand-col"></td>
                                </tr>
                                <tr>
                                  <td style="height: 18px">Precio por dia:</td>
                                  <td style="height: 18px" class="text-xs-right">{{ vehiculoData.precio_por_dia }}$</td>
                                </tr>
                                <tr class="v-datatable__expand-row">
                                  <td colspan="2" class="v-datatable__expand-col"></td>
                                </tr>
                                <tr class="v-datatable__expand-row">
                                  <td colspan="2" class="v-datatable__expand-col"></td>
                                </tr>
                              </tbody>
                            </table>
                        </v-layout>
                    </v-card-title>
                    <v-card-actions></v-card-actions>
                </v-card>
            </v-flex>

        </v-layout>
    </v-container>

    <v-container grid-list-md="grid-list-md" text-xs-center="text-xs-center">
        <v-layout row="row" wrap="wrap">

            <v-flex>
                <v-card dark="dark" color="secondary">
                    <v-card-text class="px-0">
                        6
                    </v-card-text>
                </v-card>
            </v-flex>

            <v-flex>
                <v-card dark="dark" color="secondary">
                    <v-card-text class="px-0">
                        6
                    </v-card-text>
                </v-card>
            </v-flex>

        </v-layout>
    </v-container>
<pre>{{ $data }}</pre>
</div>
</template>

<script>
export default {
  data: () => ({
    preciovihiculo: "",
    suma: "",
    reservaData: {},
    vehiculoId: "",
    vehiculoData: {},
    zonaItem: [{
        name: "San Isidro",
        value: '100'
      },
      {
        name: "Surco",
        value: '200'
      },
      {
        name: "Miraflores",
        value: '300'
      },
      {
        name: "Callao",
        value: '400'
      },
      {
        name: "Cercado",
        value: '600'
      },
    ],
  }),
  created () {
    this.getDataR();
    this.vehiculoId = this.reservaData.vehiculo;
    this.getDataV();
  },
  methods: {
    getDataR() {
      console.log("ShowApiReserva");
      axios
        .get(`/v1.0/reserva/1`)
        .then(response => {
          console.log(response.data);
          this.reservaData = response.data;
        })
        .catch(e => {
          this.errors.push(e);
        });
    },
    getDataV() {
      console.log("ShowApiVehiculo");
      axios
        .get(`/v1.0/auto/1`)
        .then(response => {
          console.log(response.data[0]);
          this.vehiculoData = response.data[0];
        })
        .catch(e => {
          this.errors.push(e);
        });
    },
  }
}
</script>
