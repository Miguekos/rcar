
<style>
input:-webkit-autofill,
input:-webkit-autofill:hover,
input:-webkit-autofill:focus
textarea:-webkit-autofill,
textarea:-webkit-autofill:hover
textarea:-webkit-autofill:focus,
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
  <v-form id="ContactForm" @submit="sendForm">
    <v-container>
      <h2>Informacion Basica</h2>
      <v-layout row wrap>
        <v-flex xs12 sm6>
          <label for="">Nombre</label>
          <v-text-field
            autofocus
            name="nombre"
            solo
          ></v-text-field>
        </v-flex>

        <v-flex xs12 sm6>
          <label for="">Vigencia</label>
          <v-text-field
            name="vigencia"
            solo
          ></v-text-field>
        </v-flex>

        <v-flex xs12 sm6>
          <label for="">Dias Pagados</label>
          <v-text-field
            name="dias_pagados"
            solo
          ></v-text-field>
        </v-flex>

        <v-flex xs12 sm6>
          <label for="">Dias Libres</label>
          <v-text-field
            name="dias_libres"
            solo
          ></v-text-field>
        </v-flex>

          <input type="hidden" name="_token" :value="csrf">
      </v-layout>
        <v-btn type="submit" color="green" dark black>Guardar</v-btn>
        <v-btn @click="cancelar" color="red" dark black>Cancelar</v-btn>
    </v-container>
  </v-form>
    </div>
</template>

<script>

  export default {
    props: ['token'],
    data: () => ({
      date: new Date().toISOString().substr(0, 10),
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
          sendForm (e) {
              let form = document.getElementById('ContactForm');
              const formData = new FormData(form);
              let jsonObject = {};
              for (const [key, value]  of formData.entries()) {
                  jsonObject[key] = value;
              }
              console.log(jsonObject);
              axios.post('/v1.0/cliente',jsonObject)
                  .then(response => {
                      console.log(response)
                      window.location.href = '/cliente';
                  })
                  .catch(error => {
                      console.log(error)
                      alert("Surgio un error al guardar tu cliente");
                  })
          },
          cancelar () {
            window.location.href = '/cliente';
          },
      }

  }
</script>
