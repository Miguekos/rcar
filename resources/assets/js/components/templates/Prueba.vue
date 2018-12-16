<template>
  <div>
  <v-form method="post" @submit.prevent="disponible()">
  <v-container grid-list-lg>
    <v-layout align-center justify-center fill-height>
      <v-flex xs12 sm4 md4>
        <label>Fecha Inicio</label>
        <v-menu ref="menu" :close-on-content-click="false" v-model="menu" :nudge-right="40" :return-value.sync="date" lazy transition="scale-transition" offset-y full-width min-width="290px">
          <v-text-field solo slot="activator" v-model="date" prepend-icon="event" readonly></v-text-field>
          <v-date-picker v-model="date" no-title scrollable>
            <v-spacer></v-spacer>
            <v-btn flat color="primary" @click="menu = false">Cancel</v-btn>
            <v-btn flat color="primary" @click="$refs.menu.save(date)">OK</v-btn>
          </v-date-picker>
        </v-menu>
      </v-flex>

      <v-flex xs12 sm4 md4>
        <label>Fecha Fin</label>
        <v-menu ref="menu1" :close-on-content-click="false" v-model="menu1" :nudge-right="40" :return-value.sync="date1" lazy transition="scale-transition" offset-y full-width min-width="290px">
          <v-text-field solo slot="activator" v-model="date1" prepend-icon="event" readonly></v-text-field>
          <v-date-picker v-model="date1" no-title scrollable>
            <v-spacer></v-spacer>
            <v-btn flat color="primary" @click="menu1 = false">Cancel</v-btn>
            <v-btn flat color="primary" @click="$refs.menu1.save(date1)">OK</v-btn>
          </v-date-picker>
        </v-menu>
      </v-flex>
    </v-layout>
  </v-container>
  <v-container grid-list-xs,sm,md,lg,xl>
    <v-flex text-lg-center lg12>
      <v-btn type="submit" color="primary">Buscar</v-btn>
    </v-flex>
  </v-container>

  <v-container grid-list-lg>
    <v-layout row wrap>
      <comp-disponibilidad
      :dispo="disponi"
      >
      </comp-disponibilidad>
    </v-layout>
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
      console.log("entro a al logout");
      axios
        .post(`/v1.0/disponible`, {
          fechaIni: this.date,
          fechaFin: this.date1,
          _token: this.csrf
        })
        .then(response => {
          console.log(response);
          this.disponi = response.data;
          // window.location.href = '/';
        })
        .catch(e => {
          console.log(e);
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
}
</script>
