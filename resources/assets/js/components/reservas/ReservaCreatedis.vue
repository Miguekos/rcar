  <style scope>
input:-webkit-autofill,
input:-webkit-autofill:hover,
input:-webkit-autofill:focus textarea:-webkit-autofill,
textarea:-webkit-autofill:hover textarea:-webkit-autofill:focus,
select:-webkit-autofill,
select:-webkit-autofill:hover,
select:-webkit-autofill:focus {
  /*border: 1px solid #d2d2d2;*/
  -webkit-text-fill-color: 1px #606060;
  -webkit-box-shadow: 0 0 0px 1000px #d2d2d2 inset;
  transition: background-color 5000s ease-in-out 0s;
}

.date-range__pickers[data-v-a39c29f4] {
  display: -webkit-box;
  display: -ms-flexbox;
  display: block;
}

.font {
  font-family: Roboto, sans-serif;
}

/* table.v-table tbody td,
table.v-table tbody th {
  height: 18px;
} */
</style>

<template>
<div>
    <v-dialog v-model="dialog5" persistent="persistent" max-width="90%">
        <!-- <form method="post" @submit.prevent="sendFormPopup()"> -->
        <v-card style="border-radius: 0px 10px 0px 10px">
            <!-- <v-card-title class="headline">Registro de confirmacion de reserva</v-card-title> -->
            <!-- <v-card-text> -->
            <v-container fluid="fluid" grid-list-xl="grid-list-xl">
                <v-layout row="row" wrap="wrap">

                    <!-- <cliente-create2></cliente-create2> -->
                    <cliente-create2></cliente-create2>


                </v-layout>
            </v-container>
            <!-- </v-card-text> -->
            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="green darken-1" round="round" dark="dark" @click="sendForm()">Guardar</v-btn>
                <v-btn color="red darken-1" round="round" dark="dark" @click="dialog5 = false">Cancelar</v-btn>
            </v-card-actions>
        </v-card>
        <!-- </form> -->
    </v-dialog>

    <v-dialog v-model="dialog4" persistent="persistent" max-width="60%">
        <form method="post" @submit.prevent="sendFormConfirmar()">
            <v-card style="border-radius: 0px 10px 0px 10px">
                <v-card-title class="headline">Registro de confirmacion de reserva</v-card-title>
                <v-card-text>
                    <v-container fluid="fluid" grid-list-xl="grid-list-xl">
                        <v-layout row="row" wrap="wrap">
                            <v-flex xs12="xs12" sm6="sm6" md3="md3">
                                <v-autocomplete required="required" :items="Tipopago" item-text="text" item-value="text" v-model="Tipopagovalue" label="Tipo de Pago"></v-autocomplete>
                            </v-flex>

                            <v-flex xs12="xs12" sm6="sm6" md3="md3">
                                <v-autocomplete required="required" :items="Banco" item-text="text" item-value="text" v-model="Bancovalue" label="Banco"></v-autocomplete>
                            </v-flex>

                            <v-flex xs12="xs12" sm6="sm6" md3="md3">
                                <v-text-field required="required" type="number" label="Codigo de Deposito" v-model="codigodepago"></v-text-field>
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
    <form method="post" @submit.prevent="sendForm()">
        <v-layout align-start="align-start" justify-space-between="justify-space-between" row="row" wrap="wrap" fill-height="fill-height">
            <v-flex xs12="xs12" lg6="lg6" elevation-3="elevation-3">
                <v-card-text>
                    <label>Fecha Inicio</label>
                    <v-menu
                        :close-on-content-click="false"
                        v-model="menu1"
                        :nudge-right="40"
                        lazy="lazy"
                        transition="scale-transition"
                        offset-y="offset-y"
                        full-width="full-width"
                        min-width="290px">
                        <v-text-field slot="activator" v-model="fecha1" prepend-icon="event" readonly="readonly"></v-text-field>
                        <v-date-picker v-model="fecha1" @input="menu1 = false"></v-date-picker>
                    </v-menu>
                    <label>Fecha Fin</label>
                    <v-menu
                        :close-on-content-click="false"
                        v-model="menu2"
                        :nudge-right="40"
                        lazy="lazy"
                        transition="scale-transition"
                        offset-y="offset-y"
                        full-width="full-width"
                        min-width="290px">
                        <v-text-field slot="activator" v-model="fecha2" prepend-icon="event" readonly="readonly"></v-text-field>
                        <v-date-picker v-model="fecha2" @input="menu2 = false"></v-date-picker>
                    </v-menu>
                    <label>Vehiculo</label>
                    <v-autocomplete
                        :items="auto"
                        item-text="marca"
                        item-value="id"
                        @change="verAuto()"
                        v-model="vehiculoId"
                        placeholder="Select..."
                        required="required"
                        solo="solo"></v-autocomplete>
                    <label>Cliente</label>
                    <v-autocomplete
                        @click:append-outer="dialog5 = true"
                        append-outer-icon="add"
                        :items="cliente"
                        item-text="nombres"
                        item-value="id"
                        @change="verCliente()"
                        v-model="clienteId"
                        placeholder="Select..."
                        required="required"
                        solo="solo"></v-autocomplete>
                    <label>Producto</label>
                    <!-- item-value="{ name: items.name, value: product.value }" -->
                    <v-autocomplete :items="productosItem" item-text="name" item-value="value" v-model="productos" placeholder="Select..." required="required"
                    solo="solo"></v-autocomplete>
                    <!-- <v-autocomplete :items="productosItem" item-text="name" item-value="{ id: productosItem.name, text: productosItem.value }" v-model="productos"
                    placeholder="Select..." required="required" solo="solo"></v-autocomplete> -->
                    <!-- <select v-model="productos"> <option v-for="option in productosItem" v-bind:value="option.value"> {{ option.text }} </option> </select> -->
                    <label>Paquete</label>
                    <v-autocomplete
                        :items="promo"
                        item-text="nombre"
                        item-value="id"
                        @change="verPromo()"
                        v-model="promoId"
                        placeholder="Select..."
                        required="required"
                        solo="solo"></v-autocomplete>
                    <label>Zona de Entrega</label>
                    <v-autocomplete :items="zonaItem" item-text="name" item-value="value" v-model="zonas" required="required" placeholder="Select..." solo="solo"></v-autocomplete>
                    <label>Direccion de Entrega</label>
                    <v-text-field required="required" v-model="direccionEntrega"></v-text-field>
                    <label>Seguro</label>
                    <v-autocomplete :items="seguroItem" item-text="name" item-value="value" v-model="seguro" required="required" placeholder="Select..." solo="solo"></v-autocomplete>
                    <v-layout align-center="align-center" justify-space-between="justify-space-between" row="row" fill-height="fill-height">
                        <v-flex xs12="xs12" sm3="sm3" lg3="lg3">
                            <label>Puntos Disponibles</label>
                            <v-text-field readonly="readonly" v-model="clienteData.puntos"></v-text-field>
                        </v-flex>
                        <v-flex xs12="xs12" sm3="sm3" lg3="lg3">
                            <label>Puntos a Canjear</label>
                            <v-text-field type="number" @keyup="calcularPuntos()" v-model="puntosc"></v-text-field>
                        </v-flex>
                        <v-flex xs12="xs12" sm3="sm3" lg3="lg3">
                            <label>Dias Disponibles</label>
                            <v-text-field readonly="readonly" v-model="diasd">{{ calcularPuntos }}</v-text-field>
                        </v-flex>
                    </v-layout>
                    <v-divider></v-divider>
                    <v-card-title primary-title="primary-title">
                        Adicionales
                    </v-card-title>
                    <v-layout align-center="align-center" justify-space-between="justify-space-between" row="row" fill-height="fill-height">
                        <v-flex xs12="xs12" sm4="sm4">
                            <v-switch v-model="sillabebeP" true-value="50" false-value="0" label="Silla Bebe" color="success" hide-details="hide-details"></v-switch>
                        </v-flex>
                        <v-flex xs12="xs12" sm4="sm4">
                            <v-switch v-model="doblePiloto" true-value="50" false-value="0" label="Doble Piloto" color="success" hide-details="hide-details"></v-switch>
                        </v-flex>
                        <v-flex xs12="xs12" sm4="sm4">
                            <v-switch v-model="tanqueLleno" true-value="50" false-value="0" label="Tanque LLeno" color="success" hide-details="hide-details"></v-switch>
                        </v-flex>
                    </v-layout>
                </v-card-text>
            </v-card>
        </v-flex>
        <v-flex xs12="xs12" lg5="lg5" elevation-3="elevation-3">
            <v-flex>
                <v-card>
                    <v-img :src="vehiculoData.imagen1" aspect-ratio="2.75"></v-img>
                    <v-toolbar-title class="text-lg-center">{{ vehiculoData.marca }}</v-toolbar-title>
                    <!-- <h3 class="headline mb-0">{{ vehiculoData.marca }}</h3> -->
                    <v-card-title>
                        <v-layout align-center="align-center" justify-space-between="justify-space-between" row="row" fill-height="fill-height">
                            <table class="v-datatable v-table theme--light">
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
                                    <tr>
                                        <td style="height: 18px">Dias alquilado:</td>
                                        <td style="height: 18px" class="text-xs-right">{{ fechadiff }}</td>
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
                    <v-layout row="row" wrap="wrap" justify-center="justify-center">
                        <v-daterange locale="ES-es" highlight-colors="green lighten-5" :options="dateRangeOptions" no-presets="no-presets" @input="onDateRangeChange"></v-daterange>
                    </v-layout>
                    <v-card-actions></v-card-actions>
                </v-card>
            </v-flex>
        </v-card>
    </v-flex>
</v-layout>

<br>
    <br>
        <!-- <v-container lg12> -->
        <v-layout align-center="align-center" justify-center="justify-center">

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
                                    <td class="text-xs-right">{{ preciovihiculo }}</td>
                                </tr>
                                <tr>
                                    <td>Paquete</td>
                                    <td class="text-xs-right">{{ productos }}</td>
                                </tr>
                                <tr class="v-datatable__expand-row">
                                    <td colspan="2" class="v-datatable__expand-col"></td>
                                </tr>
                                <tr>
                                    <td>Delivery</td>
                                    <td class="text-xs-right">{{ zonas }}</td>
                                </tr>
                                <tr class="v-datatable__expand-row">
                                    <td colspan="2" class="v-datatable__expand-col"></td>
                                </tr>
                                <tr>
                                    <td>Silla Bebe</td>
                                    <td class="text-xs-right">{{ sillabebeP }}</td>
                                </tr>
                                <tr class="v-datatable__expand-row">
                                    <td colspan="2" class="v-datatable__expand-col"></td>
                                </tr>
                                <tr>
                                    <td>Doble Piloto</td>
                                    <td class="text-xs-right">{{ doblePiloto }}</td>
                                </tr>
                                <tr class="v-datatable__expand-row">
                                    <td colspan="2" class="v-datatable__expand-col"></td>
                                </tr>
                                <tr>
                                    <td>Tanque LLeno</td>
                                    <td class="text-xs-right">{{ tanqueLleno }}</td>
                                </tr>
                                <tr class="v-datatable__expand-row">
                                    <td colspan="2" class="v-datatable__expand-col"></td>
                                </tr>
                                <tr>
                                    <td>Seguro</td>
                                    <td class="text-xs-right">{{ seguro }}</td>
                                </tr>
                                <tr class="v-datatable__expand-row">
                                    <td colspan="2" class="v-datatable__expand-col"></td>
                                </tr>
                                <tr>
                                    <td>Dia Adicional</td>
                                    <td class="text-xs-right">{{ diaadicional }}</td>
                                </tr>
                                <tr>
                                    <td>Garantia</td>
                                    <td class="text-xs-right">{{ vehiculoData.garantia }}</td>
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
                                        <b>{{ (suma * 0.18).toFixed(2) }}
                                            $</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Total a Depositar</strong>
                                    </td>
                                    <td class="text-xs-right">
                                        <b>{{ suma }}
                                            $</b>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </v-card-text>
                </v-card>
            </v-flex>
        </v-layout>
        <!-- </v-container> -->

        <v-container text-lg-center="text-lg-center" text-xs-center="text-xs-center" text-sm-center="text-sm-center">
            <v-btn @click="confirmar()" color="primary">confirmar</v-btn>
            <v-btn type="submit" color="success">Guardar</v-btn>
            <v-btn color="error">Cancelar</v-btn>
        </v-container>
    </form>
    <!-- <pre>{{ $data }}</pre> -->

    <v-text-field value="calcularPuntos" type="hidden"></v-text-field>
</div>
</template>

<script>
import DateRange from 'vuetify-daterange-picker';

// import {format, compareAsc} from 'date-fns/esm';
// import 'vuetify-daterange-picker/dist/vuetify-daterange-picker.css';
// $(function() {
//   $('input[name="daterange"]').daterangepicker({
//     opens: 'left'
//   }, function(start, end, label) {
//     console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
//   });
// });

export default {
  props: ['token', 'vehiculodis', 'user', 'fechai', 'fechaf'],
  data: () => ({
    productos: 0,
    codigodepago: "",
    montodepositado: "50",
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
    garantia: 0,
    fechainicioauto: "",
    fechafinauto: "",
    reservastotal: "",
    preciovihiculo: 0,
    preciov: 0,
    fechadiferencia: "",
    zonas: 0,
    direccionEntrega: "",
    sillabebeP: 0,
    doblePiloto: 0,
    tanqueLleno: 0,
    seguro: 0,
    diaadicional: 0,
    totalF: 0,
    afacturar: null,
    // fecha1: new Date().toISOString().substr(0, 10),
    // fecha2: new Date().toISOString().substr(0, 10),
    fecha1: "",
    fecha2: "",
    menu1: false,
    menu2: false,
    puntosd: "",
    puntosc: 0,
    diasd: 0,
    puntocanjear: "",
    errors: [],
    vehiculoId: "",
    clienteId: "",
    vehiculoPrecio: 0,
    clientes: "",
    paquetes: 0,
    placa: "",
    color: "",
    anio: "",
    precio: "",
    image: "",
    clienteData: {},
    vehiculoData: {},
    promo: [],
    cliente: [],
    auto: [],
    promocion: "",
    promoId: "",
    promoData: {},
    picker: new Date().toISOString().substr(0, 10),
    landscape: false,
    reactive: false,
    range: [],
    productosItem: [{
        name: "Alquiler por Dia",
        value: '100'
      },
      // {
      //   name: "Alquiler por Kilometros",
      //   value: '200'
      // },
    ],
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
    seguroItem: [{
        name: "Seguro tipo A",
        value: '100'
      },
      {
        name: "Seguro tipo B",
        value: '200'
      },
      {
        name: "Seguro tipo C",
        value: '300'
      },
    ],
    dateRangeOptions: {
      startDate: this.fechainicioauto,
      endDate: this.fechafinauto,
      format: 'YYYY/MM/DD',
    },
    csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
  }),
  components: {
    DateRange: DateRange
  },
  computed: {
    fechadiff: function() {
      var a = moment(this.fecha1);
      var b = moment(this.fecha2);
      var c = b.diff(a, 'days');
      if (c == 0) {
        var f = parseFloat(c) + parseFloat(1);
        this.fechadiferencia = f;
        return f;
      } else {
        this.fechadiferencia = c;
        return c;
      }

    },
    suma: function() {
      if (this.puntosc == 0) {
        var totalv = (parseFloat(this.preciov) * parseFloat(this.fechadiferencia));
      } else {
        var totalv = parseFloat(this.preciov) * (parseFloat(this.fechadiferencia) - parseFloat(this.diasd));
      }
      // var totalv = (parseFloat(this.preciov) * parseFloat(this.fechadiferencia));
      this.preciovihiculo = totalv;
      var total =
        parseFloat(this.productos) +
        parseFloat(this.sillabebeP) +
        parseFloat(this.doblePiloto) +
        parseFloat(this.tanqueLleno) +
        parseFloat(this.zonas) +
        parseFloat(this.vehiculoData.garantia) +
        parseFloat(this.seguro) + totalv;
      this.totalF = total.toFixed(2);
      return total.toFixed(2);
    },
  },
  created() {
    console.log(moment().format());
    this.getData();
    this.vehiculoId = this.vehiculodis;
    this.fecha1 = this.fechai;
    this.fecha2 = this.fechaf;
    console.log(this.fechai);
    console.log(this.fechaf);
    console.log("Abajo Vehiculo Dis");
    console.log(this.vehiculodis);
    console.log(this.formulario);
    this.verAuto();
  },
  methods: {
    calcularPuntos: function() {
      var puntosTotales = Number(this.clienteData.puntos) / Number(this.puntosc);
      var asd = parseFloat(puntosTotales);
      var puntosT = puntosTotales.toString();
      this.diasd = puntosT.slice(0, 1);
      // console.log(asd);
      return asd;
    },
    confirmar() {
      console.log();
      this.dialog4 = true;
      // this.idupdate = item.id;
      console.log("SE PRECOINO BOTON CONFIRMAR");
      // window.location.href = `/reserva/${item.id}/edit`;
    },
    onDateRangeChange(range) {
      this.range = range;
    },
    getData() {
      console.log("OpteniandoDatosDeeserva");
      axios
        .get(`/v1.0/reservas`)
        .then(response => {
          this.promo = response.data.promo;
          this.cliente = response.data.cliente;
          this.auto = response.data.auto;
          this.reservastotal = response.data.reserva + 1;
          console.log(response.data);
        })
        .catch(e => {

        });
    },
    sendForm(e) {
      console.log("entro a guardar");
      axios.post('/v1.0/reserva', {
          nreserva: `0000${this.reservastotal}`,
          fechasInicio: this.fecha1,
          fechaFin: this.fecha2,
          vehiculo: this.vehiculoId,
          clienteId: this.clienteData.id,
          cliente: this.clienteData.nombres,
          producto: this.productos,
          promo: this.paquetes,
          zonaDeEntrega: this.zonas,
          direccionEntrega: this.direccionEntrega,
          seguro: this.seguro,
          puntosDisponible: this.puntosd,
          PuntosCanjear: this.puntosc,
          diaAdicionales: this.diasd,
          sillaBebe: this.sillabebeP,
          doblePiloto: this.doblePiloto,
          tanqueLleno: this.tanqueLleno,
          autoSeleccionado: this.autoSeleccionado,
          estado: 1,
          disponible: 1,
          preciovihiculo: this.preciovihiculo,
          diaadicional: this.diaadicional,
          totalF: this.totalF,
          placa: this.placa,
          color: this.color,
          anio: this.anio,
          precio: this.precio,
          image: this.image,
          garantia: this.vehiculoData.garantia,
        })
        .then(response => {
          console.log("SI PASO");
          console.log(response)
          window.location.href = '/reserva';
        })
        .catch(error => {
          console.log(error)
          alert("Surgio un error al guardar tu cliente");
        })
    },
    sendFormConfirmar(e) {
      console.log("entro a guardar");
      axios.post('/v1.0/reserva', {
          nreserva: `0000${this.reservastotal}`,
          fechasInicio: this.fecha1,
          fechaFin: this.fecha2,
          vehiculo: this.vehiculoId,
          clienteId: this.clienteData.id,
          cliente: this.clienteData.nombres,
          producto: this.productos,
          promo: this.paquetes,
          zonaDeEntrega: this.zonas,
          direccionEntrega: this.direccionEntrega,
          seguro: this.seguro,
          puntosDisponible: this.puntosd,
          PuntosCanjear: this.puntosc,
          diaAdicionales: this.diasd,
          sillaBebe: this.sillabebeP,
          doblePiloto: this.doblePiloto,
          tanqueLleno: this.tanqueLleno,
          autoSeleccionado: this.autoSeleccionado,
          estado: 2,
          disponible: 0,
          preciovihiculo: this.preciovihiculo,
          diaadicional: this.diaadicional,
          totalF: this.totalF,
          placa: this.placa,
          color: this.color,
          anio: this.anio,
          precio: this.precio,
          image: this.image,
          garantia: this.vehiculoData.garantia,
          codigodepago: this.codigodepago,
          montodepositado: this.montodepositado,
          tipodepago: this.Tipopagovalue,
          banco: this.Bancovalue,
        })
        .then(response => {
          console.log("SI PASO");
          console.log(response)
          window.location.href = '/reserva';
        })
        .catch(error => {
          console.log(error)
          alert("Surgio un error al guardar tu cliente");
        })
    },
    cancelar() {
      window.location.href = '/reserva';
    },
    verAuto() {
      console.log("Cargando vehiculo seleccionado");
      axios
        .get(`/v1.0/auto/${this.vehiculoId}`)
        // .get(`/v1.0/auto/3`)
        .then(response => {
          console.log(response.data);
          this.vehiculoData = response.data;
          this.preciov = response.data.precio_por_dia;
          this.autoSeleccionado = response.data.marca;
          this.fechainicioauto = response.data.fechainicioauto;
          this.fechafinauto = response.data.fechafinauto;
          this.placa = response.data.placa;
          this.color = response.data.color;
          this.anio = response.data.anio;
          this.precio_por_dia = response.data.precio_por_dia;
          this.image = response.data.imagen1;
          this.garantia = response.data.garantia;
          console.log(response.data);
          console.log(response.data.precio_por_dia);
        })
        .catch(e => {
          alert('No se pudo cargar el auto seleecionado');
        });
    },
    verCliente() {
      console.log("aqui esta");
      axios
        .get(`/v1.0/cliente/${this.clienteId}`)
        .then(response => {
          this.clienteData = response.data;
          console.log(response.data);
        })
        .catch(e => {
          console.log(e);
        });
    },
    verPromo() {
      console.log("aqui esta");
      axios
        .get(`/v1.0/promo/${this.promoId}`)
        .then(response => {
          this.promoData = response.data;
          console.log(response.data);
        })
        .catch(e => {
          console.log(e);
        });
    },
    agregarCliente() {
      window.location.href = '/cliente/create';
    },
    agregarPromo() {
      window.location.href = '/promo/create';
    }
  }
}
</script>
