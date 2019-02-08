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
                                            <!-- {{ (reservaData.totalF * 0.18).toFixed(2) }} -->
                                            {{ (reservaData.totalF * 0.18) }}
                                            $</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Total Servicios</strong>
                                    </td>
                                    <td class="text-xs-right">
                                        <b>{{ reservaData.totalF }}$</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Garantia</strong>
                                    </td>
                                    <td class="text-xs-right">
                                        <b>{{ reservaData.garantia.toFixed(2) }}
                                            $</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Total depositado</strong>
                                    </td>
                                    <td class="text-xs-right">
                                        <b>{{ (parseFloat(reservaData.totalF) + parseFloat(reservaData.garantia).toFixed(2) }}
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
                        <v-autocomplete :items="zonaItem" item-text="name" v-model="zonadelivery" solo="solo"></v-autocomplete>
                        <label>Kilometros Iniciales</label>
                        <v-text-field readonly v-model="reservaData.kilometroinicial" solo="solo"></v-text-field>
                        <label>Kilometros devolucion</label>
                        <v-text-field type="number" v-model="kilometrodevolucion"></v-text-field>
                    </v-card-text>
                </v-card>
            </v-flex>

            <v-flex lg6="lg6" xs12="xs12">
                <v-card>

                    <!-- <h3 class="headline mb-0">{{ vehiculoData.marca }}</h3> -->
                    <v-card-text>
                        <v-img :src="vehiculoData.imagen1" aspect-ratio="2.75"></v-img>
                        <v-toolbar-title class="text-lg-center">{{ vehiculoData.marca }}</v-toolbar-title>
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
                                </tbody>
                            </table>
                        </v-layout>
                    </v-card-text>
                    <!-- <v-card-actions></v-card-actions> -->
                </v-card>
            </v-flex>

        </v-layout>
    </v-container>

    <v-container grid-list-md="grid-list-md">
        <v-layout row="row" wrap="wrap">

            <v-flex lg6="lg6">
                <v-card>
                    <v-card-text>
                        <v-layout row="" wrap="">
                            <v-flex xs12="xs12" sm6="sm6" md3="md6" lg6="lg6">
                                <label>Kilometros Extendidos</label>
                                <v-text-field v-model="kilometroexten" solo-inverted="solo-inverted"></v-text-field>
                            </v-flex>

                            <v-flex xs12="xs12" sm6="sm6" md3="md6" lg6="lg6">
                                <label>Penalidad KM</label>
                                <v-text-field readonly v-model="penalidadporkm" solo="solo"></v-text-field>
                            </v-flex>
                        </v-layout>

                        <label>Pago por daños</label>
                        <v-text-field  v-model="pagopord" color="error"></v-text-field>
                        <label>Lucro sesante</label>
                        <v-text-field v-model="lucrosesante" color="error"></v-text-field>
                        <label>Multa ($100)</label>
                        <v-text-field v-model="multa"></v-text-field>
                        <label>Otros cobros</label>
                        <v-text-field v-model="otroscobros"></v-text-field>
                    </v-card-text>
                </v-card>
            </v-flex>

            <v-flex lg6="lg6">
                <v-card>
                    <v-card-text>
                        <v-toolbar-title>Resumen</v-toolbar-title>
                        <table class="v-datatable v-table theme--light">
                            <thead>
                                <!-- <tr> <th role="columnheader" scope="col" aria-label="Items: Not sorted." aria-sort="none" class="column text-xs-left">Items</th> <th role="columnheader"
                                scope="col" aria-label="Precio: Not sorted." aria-sort="none" class="column text-xs-right">Precio</th> </tr> <tr class="v-datatable__progress"> <th colspan="2"
                                class="column"></th> </tr> -->
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Garantia disponible</td>
                                    <td class="text-xs-right">{{ reservaData.garantia }}</td>
                                </tr>
                                <tr>
                                    <td>Penalidad por KM</td>
                                    <td class="text-xs-right">{{ penalidadporkm }}</td>
                                </tr>
                                <tr class="v-datatable__expand-row">
                                    <td colspan="2" class="v-datatable__expand-col"></td>
                                </tr>
                                <tr>
                                    <td>Delivery</td>
                                    <td class="text-xs-right">{{ zonadelivery }}</td>
                                </tr>
                                <tr class="v-datatable__expand-row">
                                    <td colspan="2" class="v-datatable__expand-col"></td>
                                </tr>
                                <tr>
                                    <td>Pago por daños</td>
                                    <td class="text-xs-right">{{ pagopord }}</td>
                                </tr>
                                <tr class="v-datatable__expand-row">
                                    <td colspan="2" class="v-datatable__expand-col"></td>
                                </tr>
                                <tr>
                                    <td>Lucro sesante</td>
                                    <td class="text-xs-right">{{ lucrosesante }}</td>
                                </tr>
                                <tr class="v-datatable__expand-row">
                                    <td colspan="2" class="v-datatable__expand-col"></td>
                                </tr>
                                <tr>
                                    <td>Multa</td>
                                    <td class="text-xs-right">{{ multa }}</td>
                                </tr>
                                <tr>
                                    <td>Otros Cobros</td>
                                    <td class="text-xs-right">{{ otroscobros }}</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>
                                        <strong>Por devolver</strong>
                                    </td>
                                    <td class="text-xs-right">
                                        <b>
                                            {{ totaladevolver }}$</b>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </v-card-text>
                </v-card>
            </v-flex>

        </v-layout>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn @click="atras()" color="primary">Cancelar</v-btn>
          <v-btn @click="updateRegistrar()" color="success">Regsitrar devolucion</v-btn>
          <!-- <v-btn @click="updateLiquidar()" color="error">Liquidar</v-btn> -->
        </v-card-actions>
    </v-container>
    <v-text-field dark hidden v-model="sumaDevolver"></v-text-field>
    <v-text-field dark type="hidden" v-model="suma"></v-text-field>
    <!-- <pre>{{ $data }}</pre> -->

</div>
</template>

<script>
export default {
  props: ['clientesc', 'autosc', 'reservasc'],
  data: () => ({
    otroscobros: 0,
    totalLiquidacion: 0,
    totaladevolver: 0,
    kilometrodevolucion: 0,
    zonadelivery: 0,
    penalidadporkm: 0,
    pagopord: 0,
    lucrosesante: 0,
    multa: 0,
    preciovihiculo: "",
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
  created() {
    this.getDataR();
    this.vehiculoId = this.reservaData.vehiculo;
    this.getDataV();
  },
  watch: {

  },
  computed: {
    sumaDevolver: function() {
      let totalD =
        parseFloat(this.reservaData.garantia) -
        parseFloat(this.totalLiquidacion);
      // this.totalF = total.toFixed(2);
      if (totalD < 0) {
        alert("La cantidad a devolver no puede ser NEGATIVA, verifica los montos.");
        this.totaladevolver = 0;
      } else {
        this.totaladevolver = totalD;
        return totalD;
      }
      console.log("esta en la sumaDevolver");
    },
    suma: function() {
      let total =
        parseFloat(this.penalidadporkm) +
        parseFloat(this.zonadelivery) +
        parseFloat(this.pagopord) +
        parseFloat(this.lucrosesante) +
        parseFloat(this.otroscobros) +
        parseFloat(this.multa);
      // this.totalF = total.toFixed(2);
      this.totalLiquidacion = total;
      return total;
      console.log("esta en la suma");
    },
  },
  methods: {
    updateLiquidar() {
      console.log("aqui id para ipdate");
      axios({
          method: 'put',
          url: `/v1.0/reserva/${this.reservaData.nreserva}`,
          data: {
            codigodepago: this.codigodepago,
            montodepositado: this.montodepositado,
            Tipopagovalue: this.Tipopagovalue,
            Bancovalue: this.Bancovalue,
            estado: 0,
            liquidacion: 1,
          }
        })
        .then(function(response) {
          response.data
          console.log(response.data);
          window.location.href = '/reserva';
        });
    },
    updateRegistrar() {
      console.log("aqui id para ipdate");
      axios({
          method: 'put',
          url: `/v1.0/reserva/${this.reservaData.id}`,
          data: {
            totaladevolver: this.totaladevolver,
            kilometrodevolucion: this.kilometrodevolucion,
            zonadelivery: this.zonadelivery,
            penalidadporkm: this.penalidadporkm,
            pagopord: this.pagopord,
            lucrosesante: this.lucrosesante,
            multa: this.multa,
            otroscobros: this.otroscobros,
            estado: 5,
            disponible: 1,
            entrega: 1,
            liquidacion: 0,
            cobrosadi: this.totalLiquidacion,
          }
        })
        .then(function(response) {
          response.data
          console.log(response.data);
          window.location.href = '/reserva';
        })
        .catch(e => {
          console.log(e);
          alert("No se pudo registrar");
        });
    },
    getDataR() {
      console.log("ShowApiReserva");
      axios
        .get(`/v1.0/reserva/${this.reservasc[0].id}`)
        .then(response => {
          console.log(response.data);
          this.reservaData = response.data;
        })
        .catch(e => {

        });
    },
    getDataV() {
      console.log("ShowApiVehiculo");
      axios
        .get(`/v1.0/auto/${this.reservasc[0].vehiculo}`)
        .then(response => {
          console.log(response.data);
          this.vehiculoData = response.data;
        })
        .catch(e => {
          console.log(e);
        });
    },
    atras() {
      window.location.href = '/reserva';
    },
  }
}
</script>
