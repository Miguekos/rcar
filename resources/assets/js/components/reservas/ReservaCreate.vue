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
  <form method="post" @submit.prevent="sendForm()">
    <v-layout align-start justify-space-between row wrap fill-height>
      <v-flex xs12 lg6 elevation-3>
        <v-card-text>
          <label>Fecha Inicio</label>
          <v-menu :close-on-content-click="false" v-model="menu1" :nudge-right="40" lazy transition="scale-transition" offset-y full-width min-width="290px">
            <v-text-field slot="activator" v-model="fecha1" prepend-icon="event" readonly></v-text-field>
            <v-date-picker v-model="fecha1" @input="menu1 = false"></v-date-picker>
          </v-menu>
          <label>Fecha Fin</label>
          <v-menu :close-on-content-click="false" v-model="menu2" :nudge-right="40" lazy transition="scale-transition" offset-y full-width min-width="290px">
            <v-text-field slot="activator" v-model="fecha2" prepend-icon="event" readonly></v-text-field>
            <v-date-picker v-model="fecha2" @input="menu2 = false"></v-date-picker>
          </v-menu>
          <label>Vehiculo</label>
          <v-autocomplete :items="auto" item-text="marca" item-value="id" @change="verAuto()" v-model="vehiculoId" placeholder="Select..." required solo></v-autocomplete>
          <label>Cliente</label>
          <v-autocomplete @click:append-outer="agregarCliente()" append-outer-icon="add" :items="cliente" item-text="nombres" item-value="id" @change="verCliente()" v-model="clienteId" placeholder="Select..." required solo></v-autocomplete>
          <label>Producto</label>
          <v-select :items="productosItem" item-text="name" item-value="value" v-model="productos" placeholder="Select..." solo></v-select>
          <label>Paquete</label>
          <v-autocomplete @click:append-outer="agregarPromo()" append-outer-icon="add" :items="promo" item-text="nombre" item-value="id" @change="verPromo()" v-model="promoId" placeholder="Select..." required solo></v-autocomplete>
          <label>Zona de Entrega</label>
          <v-select :items="zonaItem" item-text="name" item-value="value" v-model="zonas" placeholder="Select..." solo></v-select>
          <label>Direccion de Entrega</label>
          <v-text-field v-model="direccionEntrega"></v-text-field>
          <label>Seguro</label>
          <v-select :items="seguroItem" item-text="name" item-value="value" v-model="seguro" placeholder="Select..." solo></v-select>
          <v-layout align-center justify-space-between row fill-height>
            <v-flex xs12 sm3 lg3>
              <label>Puntos Disponibles</label>
              <v-text-field readonly v-model="clienteData.puntos" solo-inverted></v-text-field>
            </v-flex>
            <v-flex xs12 sm3 lg3>
              <label>Puntos a Canjear</label>
              <v-text-field v-model="puntosc" solo></v-text-field>
            </v-flex>
            <v-flex xs12 sm3 lg3>
              <label>Dias Disponibles</label>
              <v-text-field v-model="diasd" solo></v-text-field>
            </v-flex>
          </v-layout>
          <v-divider></v-divider>
          <v-card-title primary-title>
            Adicionales
          </v-card-title>
          <v-layout align-center justify-space-between row fill-height>
            <v-flex xs12 sm4>
              <v-switch v-model="sillabebeP" true-value="50" false-value="0" label="Silla Bebe" color="success" hide-details></v-switch>
            </v-flex>
            <v-flex xs12 sm4>
              <v-switch v-model="doblePiloto" true-value="50" false-value="0" label="Doble Piloto" color="success" hide-details></v-switch>
            </v-flex>
            <v-flex xs12 sm4>
              <v-switch v-model="tanqueLleno" true-value="50" false-value="0" label="Tanque LLeno" color="success" hide-details></v-switch>
            </v-flex>
          </v-layout>
        </v-card-text>
        </v-card>
      </v-flex>
      <v-flex xs12 lg5 elevation-3>
        <v-flex>
          <v-card>
            <v-img :src="vehiculoData.imagen1" aspect-ratio="2.75"></v-img>
            <v-toolbar-title class="text-lg-center">{{ vehiculoData.marca }}</v-toolbar-title>
            <!-- <h3 class="headline mb-0">{{ vehiculoData.marca }}</h3> -->
            <v-card-title>
              <v-layout align-center justify-space-between row fill-height>
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
            <v-layout row wrap justify-center>
              <v-daterange locale="ES-es" highlight-colors="green lighten-5" :options="dateRangeOptions" no-presets @input="onDateRangeChange"></v-daterange>
            </v-layout>
            <v-card-actions>
            </v-card-actions>
          </v-card>
        </v-flex>
        </v-card>
      </v-flex>
    </v-layout>

    <br>
    <br>
    <!-- <v-container lg12> -->
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
                <tr class="v-datatable__expand-row">
                  <td colspan="2" class="v-datatable__expand-col"></td>
                </tr>
              </tbody>
              <tfoot>
                <tr>
                  <td><strong>IGV 18%</strong></td>
                  <td class="text-xs-right"><b>{{ (suma * 0.18).toFixed(2) }} $</b></td>
                </tr>
                <tr>
                  <td><strong>Total a Depositar</strong></td>
                  <td class="text-xs-right"><b>{{ suma }} $</b></td>
                </tr>
              </tfoot>
            </table>
          </v-card-text>
        </v-card>
      </v-flex>
    </v-layout>
    <!-- </v-container> -->

    <v-container text-lg-center text-xs-center text-sm-center>
      <v-btn type="submit" color="success">Guardar</v-btn>
      <v-btn color="error">Cancelar</v-btn>
    </v-container>
  </form>
  <!-- <pre>{{ $data }}</pre> -->
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
  props: ['token','user'],
  data: () => ({
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
    fecha1: new Date().toISOString().substr(0, 10),
    fecha2: new Date().toISOString().substr(0, 10),
    menu1: false,
    menu2: false,
    puntosd: "",
    puntosc: "",
    diasd: "",
    puntocanjear: "",
    errors: [],
    vehiculoId: "",
    clienteId: "",
    vehiculoPrecio: 0,
    clientes: "",
    productos: 0,
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
      {
        name: "Alquiler por Kilometros",
        value: '200'
      },
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
      console.log(c);
      this.fechadiferencia = c;
      return c;
    },
    suma: function() {
      var totalv = parseFloat(this.preciov) * parseFloat(this.fechadiferencia);
      this.preciovihiculo = totalv;
      var total =
        parseFloat(this.productos) +
        parseFloat(this.sillabebeP) +
        parseFloat(this.doblePiloto) +
        parseFloat(this.tanqueLleno) +
        parseFloat(this.zonas) +
        parseFloat(this.seguro) + totalv;
      this.totalF = total.toFixed(2);
      return total.toFixed(2);
    },
  },
  created() {
    console.log(moment().format());
    this.getData();
    console.log(this.formulario);
  },
  methods: {
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
          this.errors.push(e);
        });
    },
    sendForm(e) {
      console.log("entro a guardar");
      axios.post('/v1.0/reserva', {
          nreserva: `0000${this.reservastotal}`,
          fechasInicio: this.fecha1,
          fechaFin: this.fecha2,
          vehiculo: this.vehiculoId,
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
          preciovihiculo: this.preciovihiculo,
          diaadicional: this.diaadicional,
          totalF: this.totalF,
          placa: this.placa,
          color: this.color,
          anio: this.anio,
          precio: this.precio,
          image: this.image,
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
      console.log("aqui esta");
      axios
        .get(`/v1.0/auto/${this.vehiculoId}`)
        .then(response => {
          this.vehiculoData = response.data[0];
          this.preciov = response.data[0].precio_por_dia;
          this.autoSeleccionado = response.data[0].marca;
          this.fechainicioauto = response.data[0].fechainicioauto;
          this.fechafinauto = response.data[0].fechafinauto;
          this.placa = response.data[0].placa;
          this.color = response.data[0].color;
          this.anio = response.data[0].anio;
          this.precio_por_dia = response.data[0].precio_por_dia;
          this.image = response.data[0].imagen1;
          console.log(response.data[0]);
          console.log(response.data[0].precio_por_dia);
        })
        .catch(e => {
          this.errors.push(e);
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
          this.errors.push(e);
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
          this.errors.push(e);
        });
    },
    agregarCliente () {
      window.location.href = '/cliente/create';
    },
    agregarPromo () {
      window.location.href = '/promo/create';
    }
  }
}
</script>
