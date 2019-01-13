<template>
<div>
  <form id="ContactForm" method="post" @submit.prevent="update()">
    <v-container>
      <h2>Informacion Basica</h2>
      <v-layout row wrap>

        <v-flex xs12 sm6>
          <v-layout align-center justify-center row fill-height>
          <v-flex sm3>
            <v-avatar size="70%">
              <v-img :src="clienteedit.image"></v-img>
            </v-avatar>
          </v-flex>
          <v-flex sm6>
            <label for="">Imagen del Cliente</label>
            <v-form id="subir" @submit.prevent="subir('photo')">
                <input type="hidden" name="MAX_FILE_SIZE" value="200000" />
                <v-text-field required="required" type="file" name="photo" @change="subir('photo')" solo="solo"></v-text-field>
            </V-form>
          </v-flex>
        </v-layout>
        </v-flex>

        <v-flex xs12="xs12" sm6="sm6">
            <label for="">Apellido Paterno</label>
            <v-text-field required="required" autofocus="autofocus" maxlength="20" v-model="clienteedit.apellidoPaterno"></v-text-field>
        </v-flex>

        <v-flex xs12="xs12" sm6="sm6">
            <label for="">Apellido Materno</label>
            <v-text-field required="required" v-model="clienteedit.apellidoMaterno" maxlength="20"></v-text-field>
        </v-flex>

        <v-flex xs12="xs12" sm6="sm6">
            <label for="">Nombres</label>
            <v-text-field @keyup="" type="text" name="name" title="Tu nombre" pattern="^[A-Za-zÑñÁáÉéÍíÓóÚúÜü\s]+$" required="required" maxlength="20" v-model="clienteedit.nombres"></v-text-field>
        </v-flex>

        <v-flex xs12="xs12" sm6="sm6">
            <label for="">DNI/C.E</label>
            <v-text-field minlength="8" maxlength="9" type="text" title="DNI" pattern="^[0-9]+$" required="required" v-model="clienteedit.dni"></v-text-field>
        </v-flex>

        <v-flex xs12="xs12" sm6="sm6" md4="md4">
            <label for="">Fecha de Nacimiento</label>
            <v-menu
                ref="menu"
                :close-on-content-click="false"
                v-model="menu"
                :nudge-right="40"
                lazy="lazy"
                transition="scale-transition"
                offset-y="offset-y"
                full-width="full-width"
                min-width="290px">
                <v-text-field required="required" slot="activator" v-model="date" prepend-icon="event" readonly="readonly"></v-text-field>
                <v-date-picker ref="picker" v-model="clienteedit.date" :max="new Date().toISOString().substr(0, 10)" min="1950-01-01" @change="save"></v-date-picker>
            </v-menu>
        </v-flex>
    </v-layout>
    <!-- <v-divider light></v-divider> -->
    <v-flex xs12="xs12" lg12="lg12" text-lg-left="text-lg-left">
        <h2>Informacion de Contacto</h2>
    </v-flex>

    <v-layout row="row" wrap="wrap">

        <v-flex xs12="xs12" sm6="sm6">
            <label for="">Correo</label>
            <v-text-field type="email" v-model="clienteedit.correo" title="Tu email" pattern="^[a-z0-9]+(\.[_a-z0-9]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,15})$" required="required"></v-text-field>
        </v-flex>

        <v-flex xs12="xs12" sm6="sm6">
            <label for="">Celular</label>
            <v-text-field type="tel" v-model="clienteedit.celular" minlength="9" maxlength="9" title="Solo numeros" pattern="^[0-9]+$" required="required"></v-text-field>
        </v-flex>

        <v-flex xs12="xs12" sm6="sm6">
            <label for="">Direccion</label>
            <v-text-field maxlength="20" required="required" v-model="clienteedit.direccion"></v-text-field>
        </v-flex>

        <v-flex xs12="xs12" sm6="sm6">
            <label for="">Ciudad</label>
            <v-text-field maxlength="20" required="required" v-model="clienteedit.ciudad"></v-text-field>
        </v-flex>
    </v-layout>
    <!-- <v-divider light></v-divider> -->
    <v-flex xs12="xs12" lg12="lg12" text-lg-left="text-lg-left">
        <h2>Informacion Bancaria</h2>
    </v-flex>

    <v-layout row="row" wrap="wrap">
        <v-flex xs12="xs12" sm6="sm6">
            <label for="">CCi</label>
            <v-text-field required="required" v-model="clienteedit.cci" minlength="19" maxlength="20" type="text"></v-text-field>
        </v-flex>

        <v-flex xs12="xs12" sm6="sm6">
            <label for="">Banco</label>
            <v-select :items="Banco" item-text="text" item-value="text" v-model="clienteedit.banco" label="Banco" solo></v-select>
        </v-flex>

        <v-flex xs12="xs12" sm6="sm6">
            <label for="">Nombre Titutar</label>
            <v-text-field required="required" maxlength="20" v-model="clienteedit.nombreTitularCuenta"></v-text-field>
        </v-flex>
    </v-layout>
    <!-- <v-divider light></v-divider> -->
    <v-flex xs12="xs12" lg12="lg12" text-lg-left="text-lg-left">
        <h2>Documentos</h2>
    </v-flex>

    <v-layout row="row" wrap="wrap">
        <v-flex xs12="xs12" sm6="sm6">
            <label for="">N° Brevete</label>
            <v-text-field minlength="11" maxlength="11" type="text" title="11 caracteres" required="required" v-model="clienteedit.numeroBrevete"></v-text-field>
        </v-flex>

        <v-flex xs12="xs12" sm6="sm6" md4="md4">
            <label for="">Fecha de Vencimiento Brevete</label>
            <v-menu
                ref="menu1"
                :close-on-content-click="false"
                v-model="menu1"
                :nudge-right="40"
                lazy="lazy"
                transition="scale-transition"
                offset-y="offset-y"
                full-width="full-width"
                min-width="290px">
                <v-text-field required="required" slot="activator" v-model="clienteedit.date1" prepend-icon="event" readonly="readonly"></v-text-field>
                <v-date-picker ref="picker1" v-model="clienteedit.date1" :max="new Date().toISOString().substr(0, 10)" min="1950-01-01" @change="save1"></v-date-picker>
            </v-menu>
        </v-flex>

        <v-flex xs12 sm6>
          <v-layout align-center justify-center row fill-height>
          <v-flex sm3>
            <v-avatar size="70%">
              <v-img :src="clienteedit.fotoDni"></v-img>
            </v-avatar>
          </v-flex>
          <v-flex sm6>
            <label for="">Foto Dni</label>
            <v-form id="subir" @submit.prevent="subir()">
                <input type="hidden" name="MAX_FILE_SIZE" value="200000" />
                <v-text-field required="required" type="file" name="photo" @change="subir('photo')" solo="solo"></v-text-field>
            </V-form>
          </v-flex>
        </v-layout>
        </v-flex>

        <v-flex xs12="xs12" sm6="sm6">
            <label for="">Clasificacion Cliente</label>
            <v-select :items="clasicliente" item-text="text" item-value="text" v-model="clienteedit.calificacionCliente" label="Clasificacion" solo></v-select>
        </v-flex>

        <v-flex xs12="xs12" sm6="sm6">
            <label for="">Comentarios</label>
            <v-textarea value="" hint="Comentarios" v-model="clienteedit.comentariosAdicionales"></v-textarea>
        </v-flex>

          <input type="hidden" name="_token" :value="csrf">
        </v-flex>
      </v-layout>
      <v-flex xs12="xs12" lg12="lg12">
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
      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
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
      clasicliente: [{
          text: 'Excelente'
        },
        {
          text: 'Medio'
        },
        {
          text: 'Mal'
        },
      ],
    }
  },
  created() {
    this.getClienteEdit();
  },
  watch: {
    menu(val) {
      val && this.$nextTick(() => (this.$refs.picker.activePicker = 'YEAR'))
    },
    menu1(val) {
      val && this.$nextTick(() => (this.$refs.picker1.activePicker = 'YEAR'))
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
        })
        .catch(error => {
          console.log(error)
          alert("Se genero error al guardar cliente, intentelo mas tarde");
          // alert("Surgio un error, verifique los campos e intente nuevamente..!!");
        })
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
