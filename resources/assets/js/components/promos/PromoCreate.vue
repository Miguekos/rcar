<style>
input:-webkit-autofill,
input:-webkit-autofill:hover,
input:-webkit-autofill:focus textarea:-webkit-autofill,
textarea:-webkit-autofill:hover textarea:-webkit-autofill:focus,
select:-webkit-autofill,
select:-webkit-autofill:hover,
select:-webkit-autofill:focus {
  /*border: 1px solid #d2d2d2;*/
  -webkit-text-fill-color: 1px #fafafa;
  -webkit-box-shadow: 0 0 0px 1000px #fafafa inset;
  transition: background-color 5000s ease-in-out 0s;
  /* -webkit-text-fill-color: 1px #606060;
  -webkit-box-shadow: 0 0 0px 1000px #d2d2d2 inset;
  transition: background-color 5000s ease-in-out 0s; */
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
          ></v-text-field>
        </v-flex>

        <!-- <v-flex xs12 sm6>
          <label for="">Vigencia</label>
          <v-text-field
            name="vigencia"
          ></v-text-field>
        </v-flex> -->

        <v-flex xs12 sm6 md4>
          <label for="">Vigencia</label>
      <v-menu
        :close-on-content-click="false"
        v-model="menu2"
        :nudge-right="40"
        lazy
        transition="scale-transition"
        offset-y
        full-width
        min-width="290px"
      >
        <v-text-field
          name="vigencia"
          slot="activator"
          v-model="date"
          prepend-icon="event"
          readonly
        ></v-text-field>
        <v-date-picker v-model="date" @input="menu2 = false"></v-date-picker>
      </v-menu>
    </v-flex>

        <v-flex xs12 sm6>
          <label for="">Dias Pagados</label>
          <v-text-field
            name="dias_pagados"
          ></v-text-field>
        </v-flex>

        <v-flex xs12 sm6>
          <label for="">Dias Libres</label>
          <v-text-field
            name="dias_libres"
          ></v-text-field>
        </v-flex>

          <input type="hidden" name="_token" :value="csrf">
      </v-layout>
      <v-flex xs12 lg12 text-lg-center>
        <v-btn type="submit" color="green" dark black>Guardar</v-btn>
        <v-btn @click="cancelar" color="red" dark black>Cancelar</v-btn>
      </v-flex>
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
              axios.post('/v1.0/promo',jsonObject)
                  .then(response => {
                      console.log(response);
                      window.location.href = '/promo';
                  })
                  .catch(error => {
                      alert("Surgio un error al guardar tu cliente");
                      console.log(error)
                  })
          },
          cancelar () {
            window.location.href = '/promo';
          },
      }

  }
</script>
