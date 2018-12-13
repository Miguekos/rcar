
<style>
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
</style>

<template>
<div>

  <v-container grid-list-xl text-xs-center>
    <v-layout row wrap>
      <v-flex lg12>
        <v-card hover dark color="grey darken-1">
          <v-card-text>
            <h2>Informacion Basica</h2>
          </v-card-text>
        </v-card>

        <v-layout align-center justify row wrap fill-height>

          <v-flex text-lg-left text-xs-left lg4>
            <label>Marca</label>
            <v-text-field solo required></v-text-field>
            <label>Placa</label>
            <v-text-field solo required></v-text-field>
          </v-flex>
          <v-flex text-lg-left text-xs-left lg4>
            <label>Modelo</label>
            <v-text-field solo required></v-text-field>
            <label>Color</label>
            <v-text-field solo required></v-text-field>
          </v-flex>

          <v-flex text-lg-center lg4>
            <v-avatar tile="tile" size="70%" color="grey lighten-4">
              <img src="/img/img_212915.png" alt="avatar">
            </v-avatar>
          </v-flex>

          <v-flex text-lg-left text-xs-left lg4>
            <label>Año</label>
            <v-text-field solo required></v-text-field>
          </v-flex>

          <v-flex text-lg-left text-xs-left lg4>
            <label>Combustible</label>
            <v-text-field solo required></v-text-field>
          </v-flex>

          <v-flex text-lg-left text-xs-left lg4>
            <label>Transmicion</label>
            <v-text-field solo required></v-text-field>
          </v-flex>

          <v-flex text-lg-left text-xs-left lg4>
            <label>Cilindrada</label>
            <v-text-field solo required></v-text-field>
          </v-flex>

          <v-flex text-lg-left text-xs-left lg4>
            <label>Kilometraje Inicial</label>
            <v-text-field solo required></v-text-field>
          </v-flex>

          <v-flex text-lg-left text-xs-left lg4>
            <label>Airbag</label>
            <v-text-field solo required></v-text-field>
          </v-flex>

          <v-flex text-lg-left text-xs-left lg4>
            <label>Galones</label>
            <v-text-field solo required></v-text-field>
          </v-flex>

          <v-flex text-lg-left text-xs-left lg4>
            <label>Octanaje</label>
            <v-text-field solo required></v-text-field>
          </v-flex>
        </v-layout>

<!-- <v-flex text-lg-center lg12>
  <v-btn color="success">Guardar</v-btn>
  <v-btn color="error">Cancelar</v-btn>
</v-flex> -->

      </v-flex>
    </v-layout>
  </v-container>

  <v-container grid-list-xl text-xs-center>
    <v-layout row wrap>
      <v-flex lg12>
        <v-card hover dark color="grey darken-1">
          <v-card-text>
            <h2>Informacion Financiera</h2>
          </v-card-text>
        </v-card>

        <v-layout align-center justify row wrap fill-height>

          <v-flex text-lg-left text-xs-left lg6>
            <label>Pago Afiliado Mensual</label>
            <v-text-field solo required></v-text-field>
            <label>Tipo de Garantia</label>
            <v-text-field solo required></v-text-field>
          </v-flex>
          <v-flex text-lg-left text-xs-left lg6>
            <label>Precio por dia</label>
            <v-text-field solo required></v-text-field>
            <label>Contrato</label>
            <v-text-field solo required></v-text-field>
          </v-flex>

        </v-layout>

  <!-- <v-flex text-lg-center lg12>
  <v-btn color="success">Guardar</v-btn>
  <v-btn color="error">Cancelar</v-btn>
  </v-flex> -->

      </v-flex>
    </v-layout>
  </v-container>


  <v-container grid-list-xl text-xs-center>
    <v-layout row wrap>
      <v-flex lg12>
        <v-card hover dark color="grey darken-1">
          <v-card-text>
            <h2>Registros de documentos</h2>
          </v-card-text>
        </v-card>

        <v-layout align-center justify row wrap fill-height>

          <v-flex text-lg-center lg3>
            Renovcion de SOAT

            <v-menu
          ref="menu1"
          :close-on-content-click="false"
          v-model="menu1"
          :nudge-right="40"
          lazy
          transition="scale-transition"
          offset-y
          full-width
          max-width="290px"
          min-width="290px"
        >
          <v-text-field
            slot="activator"
            v-model="dateFormatted"
            label="Date"
            hint="MM/DD/YYYY format"
            persistent-hint
            prepend-icon="event"
            @blur="date = parseDate(dateFormatted)"
          ></v-text-field>

          </v-flex>

          <v-flex text-lg-center lg3>
          Lunas Polariza
          </v-flex>

          <v-flex text-lg-center lg3>
          GPS
          </v-flex>

          <v-flex text-lg-center lg3>
            Inspeccion Tecnica
          </v-flex>

          <v-flex text-lg-center lg3>
            Poliza de goades
          </v-flex>

        </v-layout>

  <!-- <v-flex text-lg-center lg12>
  <v-btn color="success">Guardar</v-btn>
  <v-btn color="error">Cancelar</v-btn>
  </v-flex> -->

      </v-flex>
    </v-layout>
  </v-container>

  <v-container grid-list-xl text-xs-center>
    <v-layout row wrap>
      <v-flex lg12>
        <v-card hover dark color="grey darken-1">
          <v-card-text>
            <h2>Registros de documentos</h2>
          </v-card-text>
        </v-card>

        <v-layout align-center justify row wrap fill-height>

          <v-flex text-lg-center lg4>
            <v-avatar tile="tile" size="70%" color="grey lighten-4">
              <img src="/img/img_212915.png" alt="avatar">
            </v-avatar>
          </v-flex>
          <v-flex text-lg-center lg4>
            <v-avatar tile="tile" size="70%" color="grey lighten-4">
              <img src="/img/img_212915.png" alt="avatar">
            </v-avatar>
          </v-flex>
          <v-flex text-lg-center lg4>
            <v-avatar tile="tile" size="70%" color="grey lighten-4">
              <img src="/img/img_212915.png" alt="avatar">
            </v-avatar>
          </v-flex>

        </v-layout>

<v-flex text-lg-center lg12>

  <v-btn color="success">Guardar</v-btn>
  <v-btn color="error">Cancelar</v-btn>
  </v-flex> -->

      </v-flex>
    </v-layout>
  </v-container>


</div>
</template>

<script>
export default {
  props: ['token'],
  data: () => ({
    date: new Date().toISOString().substr(0, 10),
    menu2: false,
    date: new Date().toISOString().substr(0, 10),
    dateFormatted: vm.formatDate(new Date().toISOString().substr(0, 10)),
    menu1: false,
    menu2: false,
    // apellidoPaterno: '',
    // apellidoMaterno: '',
    // nombres: '',
    // dni: '',
    // image: '',
    // fechaNacimiento: '',
    // correo: '',
    // celular: '',
    // direccion: '',
    // ciudad: '',
    // cci: '',
    // banco: '',
    // nombreTitularCuenta: '',
    // numeroBrevete: '',
    // fechaVencimientoBrevete: '',
    // fotoDni: '',
    // calificacionCliente: '',
    // comentariosAdicionales: '',
    csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
  }),
  methods: {
    sendForm(e) {
      let form = document.getElementById('ContactForm');
      const formData = new FormData(form);
      let jsonObject = {};
      for (const [key, value] of formData.entries()) {
        jsonObject[key] = value;
      }
      console.log(jsonObject);
      axios.post('/v1.0/cliente', jsonObject)
        .then(response => {
          console.log(response)
          window.location.href = '/cliente';
        })
        .catch(error => {
          console.log(error)
          alert("Surgio un error al guardar tu cliente");
        })
    },
    cancelar() {
      window.location.href = '/cliente';
    },
  },
  computed: {
      computedDateFormatted () {
        return this.formatDate(this.date)
      }
    },

    watch: {
      date (val) {
        this.dateFormatted = this.formatDate(this.date)
      }
    },
  }
</script>
