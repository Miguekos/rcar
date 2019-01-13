<template>
<div>
  <form id="ContactForm" method="post" @submit.prevent="update()">
    <v-container>
      <h2>Informacion Basica</h2>
      <v-layout row wrap>
        <v-flex xs12 sm6>
          <label for="">Apellido Paterno</label>
          <v-text-field required autofocus v-model="clienteedit.apellidoPaterno" solo></v-text-field>
        </v-flex>

        <v-flex xs12 sm6>
          <label for="">Apellido Materno</label>
          <v-text-field required v-model="clienteedit.apellidoMaterno" solo></v-text-field>
        </v-flex>

        <v-flex xs12 sm6>
          <label for="">Nombres</label>
          <v-text-field required v-model="clienteedit.nombres" solo></v-text-field>
        </v-flex>

        <v-flex xs12 sm6>
          <label for="">DNI</label>
          <v-text-field required v-model="clienteedit.dni" solo></v-text-field>
        </v-flex>

        <v-flex xs12 sm6>
          <label for="">Imagen</label>
          <v-text-field required v-model="clienteedit.image" solo></v-text-field>
        </v-flex>

        <v-flex xs12 sm6 md4>
          <label for="">Fecha</label>
          <v-menu :close-on-content-click="false" v-model="menu2" :nudge-right="40" lazy transition="scale-transition" offset-y full-width min-width="290px">
            <v-text-field required slot="activator" v-model="clienteedit.fechaNacimiento" label="Fecha de Nacimiento" prepend-icon="event" readonly></v-text-field>
            <v-date-picker v-model="date" @input="menu2 = false"></v-date-picker>
          </v-menu>
        </v-flex>
      </v-layout>
      <!-- <v-divider light></v-divider> -->
      <h2>Informacion de Contacto</h2>
      <v-layout row wrap>

        <v-flex xs12 sm6>
          <label for="">Correo</label>
          <v-text-field required v-model="clienteedit.correo" solo></v-text-field>
        </v-flex>

        <v-flex xs12 sm6>
          <label for="">Celular</label>
          <v-text-field required v-model="clienteedit.celular" solo></v-text-field>
        </v-flex>

        <v-flex xs12 sm6>
          <label for="">Direccion</label>
          <v-text-field required v-model="clienteedit.direccion" solo></v-text-field>
        </v-flex>

        <v-flex xs12 sm6>
          <label for="">Ciudad</label>
          <v-text-field required v-model="clienteedit.ciudad" solo></v-text-field>
        </v-flex>
      </v-layout>
      <!-- <v-divider light></v-divider> -->
      <h2>Informacion Bancaria</h2>

      <v-layout row wrap>
        <v-flex xs12 sm6>
          <label for="">CCi</label>
          <v-text-field required v-model="clienteedit.cci" solo type="number"></v-text-field>
        </v-flex>

        <v-flex xs12 sm6>
          <label for="">Banco</label>
          <v-text-field required v-model="clienteedit.banco" solo></v-text-field>
        </v-flex>

        <v-flex xs12 sm6>
          <label for="">Nombre Titutar</label>
          <v-text-field required v-model="clienteedit.nombreTitularCuenta" solo></v-text-field>
        </v-flex>
      </v-layout>
      <!-- <v-divider light></v-divider> -->
      <h2>Documentos</h2>
      <v-layout row wrap>
        <v-flex xs12 sm6>
          <label for="">N° Brevete</label>
          <v-text-field required v-model="clienteedit.numeroBrevete" solo></v-text-field>
        </v-flex>

        <v-flex xs12 sm6 md4>
          <label for="">Fecha de Vencimiento Brevete</label>
          <v-menu :close-on-content-click="false" v-model="menu3" :nudge-right="40" lazy transition="scale-transition" offset-y full-width min-width="290px">
            <v-text-field required slot="activator" v-model="clienteedit.fechaVencimientoBrevete" label="Fecha de Nacimiento" prepend-icon="event" readonly></v-text-field>
            <v-date-picker v-model="date" @input="menu3 = false"></v-date-picker>
          </v-menu>
        </v-flex>

        <v-flex xs12 sm6>
          <label for="">Foto Dni</label>
          <v-text-field required v-model="clienteedit.fotoDni" solo></v-text-field>
        </v-flex>

        <v-flex xs12 sm6>
          <label for="">Clasificacion Cliente</label>
          <v-text-field required v-model="clienteedit.calificacionCliente" solo></v-text-field>
        </v-flex>

        <v-flex xs12 sm6>
          <label for="">Comentarios</label>
          <v-textarea hint="Comentarios" v-model="clienteedit.comentariosAdicionales"></v-textarea>

          <input type="hidden" name="_token" :value="csrf">
        </v-flex>
      </v-layout>
      <v-btn type="submit" color="green" dark black>Guardar</v-btn>
      <v-btn @click="cancelar" color="red" dark black>Cancelar</v-btn>
    </v-container>
  </form>
  <!-- <pre>{{ $data }}</pre> -->
</div>
</template>

<script>
export default {
  props: ['info'],
  data() {
    return {
      clienteedit: [],
      date: new Date().toISOString().substr(0, 10),
      menu2: false,
      menu3: false,
      loader: null,
      agregado: "",
      agregado_id: "",
      abono_id: "",
      loading: false,
      loading2: false,
      loading3: false,
      loading4: false,
      formType: true,
      //                serverResponse: false,
      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
      rules: {
        required: value => !!value || 'Obligatorio.',
      },
    }
  },
  created() {
    this.getClienteEdit();
  },
  watch: {
    loader() {
      const l = this.loader
      this[l] = !this[l]

      setTimeout(() => (this[l] = false), 3000)

      this.loader = null
    }
  },
  methods: {
    update() {
      console.log("aqui id para ipdate");
      axios({
          method: 'put',
          url: `/v1.0/cliente/${this.clienteedit.id}`,
          data: this.clienteedit,
        })
        .then(function(response) {
          // response.data
          console.log(response.data);
          window.location.href = '/cliente';
        });
    },
    getClienteEdit() {
      axios({
          method: 'get',
          url: `/v1.0/cliente/${this.info}`,
        })
        .then(response => {
          console.log(response.data);
          this.clienteedit = response.data;
        })

    },
    preciono: function() {
      console.log("preciono el boton")
    },
    cancelar() {
      window.location.href = '/cliente';
    },
  }
}
</script>


<style>
.custom-loader {
  animation: loader 1s infinite;
  display: flex;
}

@-moz-keyframes loader {
  from {
    transform: rotate(0);
  }

  to {
    transform: rotate(360deg);
  }
}

@-webkit-keyframes loader {
  from {
    transform: rotate(0);
  }

  to {
    transform: rotate(360deg);
  }
}

@-o-keyframes loader {
  from {
    transform: rotate(0);
  }

  to {
    transform: rotate(360deg);
  }
}

@keyframes loader {
  from {
    transform: rotate(0);
  }

  to {
    transform: rotate(360deg);
  }
}
</style>
