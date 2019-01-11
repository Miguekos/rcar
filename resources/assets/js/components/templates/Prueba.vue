<template>
<div>
  <v-dialog v-model="dialog7" hide-overlay persistent width="300">
    <v-card color="darken-1" dark>
      <v-card-text>
        Buscando...
        <v-progress-linear indeterminate color="white" class="mb-0"></v-progress-linear>
      </v-card-text>
    </v-card>
  </v-dialog>
  <v-form method="post" @submit.prevent="disponible()">
    <v-container grid-list-lg>
      <v-layout align-center justify-center fill-height>
        <v-flex xs12 sm4 md4>
          <label>Fecha Inicio</label>
          <v-menu :close-on-content-click="false" v-model="menu" :nudge-right="40" lazy transition="scale-transition" offset-y full-width min-width="290px">
            <v-text-field slot="activator" v-model="date" solo prepend-icon="event" readonly></v-text-field>
            <v-date-picker locale="Es-es" v-model="date" @input="menu = false"></v-date-picker>
          </v-menu>
        </v-flex>

        <v-flex xs12 sm4 md4>
          <label>Fecha Fin</label>
          <v-menu :close-on-content-click="false" v-model="menu1" :nudge-right="40" lazy transition="scale-transition" offset-y full-width min-width="290px">
            <v-text-field slot="activator" v-model="date1" solo prepend-icon="event" readonly></v-text-field>
            <v-date-picker locale="Es-es" v-model="date1" @input="menu1 = false"></v-date-picker>
          </v-menu>
        </v-flex>
      </v-layout>
    </v-container>
    <v-container class="pa-0" grid-list-xs,sm,md,lg,xl>
      <v-flex class="pa-0" text-lg-center text-xs-center lg12>
        <v-btn :disabled="dialog7"
      :loading="dialog7"
      class="white--text"
      @click="dialog7 = true" type="submit" color="success">Buscar</v-btn>
      </v-flex>
    </v-container>

    <v-container grid-list-lg>
      <!-- <v-layout row wrap> -->
      <comp-disponibilidad
      :dispo="disponi"
      :fechaI="date"
      :fechaF="date1"
      >
      </comp-disponibilidad>
      <!-- </v-layout> -->
    </v-container>

  </v-form>
  <!-- <pre>{{ $data }}</pre> -->
</div>
</template>

<script>
export default {
  props: ['user', 'titulo'],
  data: () => ({
    date: new Date().toISOString().substr(0, 10),
    date1: new Date().toISOString().substr(0, 10),
    menu: false,
    menu1: false,
    modal: false,
    modal1: false,
    drawer: null,
    dialog7: false,
    disponi: "",
    back: "",
    csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
  }),
  created() {
    var cadena = new String(this.titulo);
    cadena = cadena.toLowerCase();
    this.back = cadena;
  },
  methods: {
    disponible: function() {
      console.log("Disponibilidad");
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
  watch: {
      // dialog7 (val) {
      //   if (!val) return
      //
      //   setTimeout(() => (this.dialog7 = false), 4000)
      // }
    }
}
</script>
