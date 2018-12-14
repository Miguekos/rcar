
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
        <v-card hover>
          <v-card-text class="titulos">
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
        <v-card hover>
          <v-card-text class="titulos">
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
        <v-card hover>
          <v-card-text class="titulos">
            <h2>Registros de documentos</h2>
          </v-card-text>
        </v-card>

        <v-layout align-center justify-center row wrap fill-height>

          <v-flex text-lg-center lg3>

            <v-menu ref="menu" :close-on-content-click="false" v-model="menu" :nudge-right="40" :return-value.sync="date" lazy transition="scale-transition" offset-y full-width min-width="290px">
              <v-text-field slot="activator" v-model="date" label="Renovcion de SOAT" prepend-icon="event" readonly></v-text-field>
              <v-date-picker v-model="date" no-title scrollable>
                <v-spacer></v-spacer>
                <v-btn flat color="primary" @click="menu = false">Cancel</v-btn>
                <v-btn flat color="primary" @click="$refs.menu.save(date)">OK</v-btn>
              </v-date-picker>
            </v-menu>


          </v-flex>

          <v-flex text-lg-center lg3>
            <v-menu ref="menu" :close-on-content-click="false" v-model="menu" :nudge-right="40" :return-value.sync="date" lazy transition="scale-transition" offset-y full-width min-width="290px">
              <v-text-field slot="activator" v-model="date" label="Lunas Polariza" prepend-icon="event" readonly></v-text-field>
              <v-date-picker v-model="date" no-title scrollable>
                <v-spacer></v-spacer>
                <v-btn flat color="primary" @click="menu = false">Cancel</v-btn>
                <v-btn flat color="primary" @click="$refs.menu.save(date)">OK</v-btn>
              </v-date-picker>
            </v-menu>
          </v-flex>

          <v-flex text-lg-center lg3>
            <v-menu ref="menu" :close-on-content-click="false" v-model="menu" :nudge-right="40" :return-value.sync="date" lazy transition="scale-transition" offset-y full-width min-width="290px">
              <v-text-field slot="activator" v-model="date" label="GPS" prepend-icon="event" readonly></v-text-field>
              <v-date-picker v-model="date" no-title scrollable>
                <v-spacer></v-spacer>
                <v-btn flat color="primary" @click="menu = false">Cancel</v-btn>
                <v-btn flat color="primary" @click="$refs.menu.save(date)">OK</v-btn>
              </v-date-picker>
            </v-menu>
          </v-flex>

          <v-flex text-lg-center lg4>
            <v-menu ref="menu" :close-on-content-click="false" v-model="menu" :nudge-right="40" :return-value.sync="date" lazy transition="scale-transition" offset-y full-width min-width="290px">
              <v-text-field slot="activator" v-model="date" label="Inspeccion Tecnica" prepend-icon="event" readonly></v-text-field>
              <v-date-picker v-model="date" no-title scrollable>
                <v-spacer></v-spacer>
                <v-btn flat color="primary" @click="menu = false">Cancel</v-btn>
                <v-btn flat color="primary" @click="$refs.menu.save(date)">OK</v-btn>
              </v-date-picker>
            </v-menu>
          </v-flex>

          <v-flex text-lg-center lg4>
            <v-menu ref="menu" :close-on-content-click="false" v-model="menu" :nudge-right="40" :return-value.sync="date" lazy transition="scale-transition" offset-y full-width min-width="290px">
              <v-text-field slot="activator" v-model="date" label="Poliza de goades" prepend-icon="event" readonly></v-text-field>
              <v-date-picker v-model="date" no-title scrollable>
                <v-spacer></v-spacer>
                <v-btn flat color="primary" @click="menu = false">Cancel</v-btn>
                <v-btn flat color="primary" @click="$refs.menu.save(date)">OK</v-btn>
              </v-date-picker>
            </v-menu>
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
        <v-card hover>
          <v-card-text class="titulos">
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

      </v-flex>
    </v-layout>
  </v-container>

<br>

<v-container grid-list-xl text-xs-center>

    <v-layout align-center justify-center row wrap fill-height>
<v-flex text-lg-left lg12>

<label >Comentarios adicionales</label>
      <v-text-field
        label=""
        name="name"
          solo

        textarea
      ></v-text-field>


</v-flex>
    </v-layout>

</v-container>


<v-flex text-lg-center lg12>

  <v-btn color="success">Guardar</v-btn>
  <v-btn color="error">Cancelar</v-btn>
</v-flex>


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
    computedDateFormatted() {
      return this.formatDate(this.date)
    }
  },

  watch: {
    date(val) {
      this.dateFormatted = this.formatDate(this.date)
    }
  },
}
</script>
