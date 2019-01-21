
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
  <form id="ContactForm" method="post" @submit.prevent="update()">
    <v-container>
      <h2>Informacion Basica</h2>
      <v-layout row wrap>
        <v-flex xs12 sm6>
          <label for="">Nombre</label>
          <v-text-field
            autofocus
            v-model="promoedit.nombre"
          ></v-text-field>
        </v-flex>
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
          v-model="promoedit.vigencia"
          slot="activator"
          prepend-icon="event"
          readonly
        ></v-text-field>
        <v-date-picker v-model="date" @input="menu2 = false"></v-date-picker>
      </v-menu>
    </v-flex>

        <v-flex xs12 sm6>
          <label for="">Dias Pagados</label>
          <v-text-field
            v-model="promoedit.dias_pagados"
          ></v-text-field>
        </v-flex>

        <v-flex xs12 sm6>
          <label for="">Dias Libres</label>
          <v-text-field
            v-model="promoedit.dias_libres"
          ></v-text-field>
        </v-flex>

          <input type="hidden" name="_token" :value="csrf">
      </v-layout>
      <v-flex xs12 lg12 text-lg-center>
        <v-btn type="submit" color="green" dark black>Guardar</v-btn>
        <v-btn @click="cancelar" color="red" dark black>Cancelar</v-btn>
      </v-flex>
    </v-container>
  </form>
  <!-- <pre>{{ $data }}</pre> -->
    </div>
</template>

<script>

  export default {
    props: ['info'],
    data: () => ({
      promoedit: [],
      date: new Date().toISOString().substr(0, 10),
      menu2: false,
      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
    }),
    created () {
      this.getClienteEdit();
    },
      methods: {
        update () {
            console.log("aqui id para ipdate");
                axios({
                    method: 'put',
                    url: `/v1.0/promo/${this.promoedit.id}`,
                    data: this.promoedit,
                })
                    .then(function (response) {
                        // response.data
                        console.log(response.data);
                        window.location.href = '/promo';
                    });
                },
        getClienteEdit () {
          axios({
              method: 'get',
              url: `/v1.0/promo/${this.info}`,
          })
          .then(response => {
            console.log(response.data);
            this.promoedit = response.data;
          })

          },
          cancelar () {
            window.location.href = '/promo';
          },
      }

  }
</script>
