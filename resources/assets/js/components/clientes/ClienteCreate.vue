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
  -webkit-text-fill-color: 1px white;
  -webkit-box-shadow: 0 0 0px 1000px white inset;
  transition: background-color 5000s ease-in-out 0s;
}
html {
    font-size: 14px;
}
</style>

<template>
  <div>
    <v-form id="ContactForm" @submit.prevent="sendForm">
      <v-container>
        <h2>Informacion Basica</h2>
        <v-layout row wrap>
          <v-flex xs12 sm6>
            <label for="">Apellido Paterno</label>
            <v-text-field autofocus v-model="apellidoPaterno" solo></v-text-field>
          </v-flex>

          <v-flex xs12 sm6>
            <label for="">Apellido Materno</label>
            <v-text-field v-model="apellidoMaterno" solo></v-text-field>
          </v-flex>

          <v-flex xs12 sm6>
            <label for="">Nombres</label>
            <v-text-field v-model="nombres" solo></v-text-field>
          </v-flex>

          <v-flex xs12 sm6>
            <label for="">DNI</label>
            <v-text-field v-model="dni" solo></v-text-field>
          </v-flex>

          <v-flex xs12 sm6>
            <label for="">Imagen del Cliente</label>
            <v-form id="subir" @submit.prevent="subir('photo')">
                <v-text-field type="file" name="photo" @change="subir('photo')" solo></v-text-field>
            </V-form>
          </v-flex>

          <v-flex xs12 sm6 md4>
            <label for="">Fecha de Nacimiento</label>
            <v-menu
              ref="menu"
              :close-on-content-click="false"
              v-model="menu"
              :nudge-right="40"
              lazy
              transition="scale-transition"
              offset-y
              full-width
              min-width="290px"
            >
              <v-text-field
                slot="activator"
                v-model="date"

                prepend-icon="event"
                readonly
              ></v-text-field>
              <v-date-picker
                ref="picker"
                v-model="date"
                :max="new Date().toISOString().substr(0, 10)"
                min="1950-01-01"
                @change="save"
              ></v-date-picker>
            </v-menu>
          </v-flex>
        </v-layout>
        <v-divider light></v-divider>
        <h2>Informacion de Contacto</h2>
        <v-layout row wrap>

          <v-flex xs12 sm6>
            <label for="">Correo</label>
            <v-text-field v-model="correo" solo></v-text-field>
          </v-flex>

          <v-flex xs12 sm6>
            <label for="">Celular</label>
            <v-text-field v-model="celular" solo></v-text-field>
          </v-flex>

          <v-flex xs12 sm6>
            <label for="">Direccion</label>
            <v-text-field v-model="direccion" solo></v-text-field>
          </v-flex>

          <v-flex xs12 sm6>
            <label for="">Ciudad</label>
            <v-text-field v-model="ciudad" solo></v-text-field>
          </v-flex>
        </v-layout>
        <v-divider light></v-divider>
        <h2>Informacion Bancaria</h2>

        <v-layout row wrap>
          <v-flex xs12 sm6>
            <label for="">CCi</label>
            <v-text-field v-model="cci" solo type="number"></v-text-field>
          </v-flex>

          <v-flex xs12 sm6>
            <label for="">Banco</label>
            <v-text-field v-model="banco" solo></v-text-field>
          </v-flex>

          <v-flex xs12 sm6>
            <label for="">Nombre Titutar</label>
            <v-text-field v-model="nombreTitularCuenta" solo></v-text-field>
          </v-flex>
        </v-layout>
        <v-divider light></v-divider>
        <h2>Documentos</h2>
        <v-layout row wrap>
          <v-flex xs12 sm6>
            <label for="">N° Brevete</label>
            <v-text-field v-model="numeroBrevete" solo></v-text-field>
          </v-flex>

          <v-flex xs12 sm6 md4>
            <label for="">Fecha de Vencimiento Brevete</label>
            <v-menu
              ref="menu1"
              :close-on-content-click="false"
              v-model="menu1"
              :nudge-right="40"
              lazy
              transition="scale-transition"
              offset-y
              full-width
              min-width="290px"
            >
              <v-text-field
                slot="activator"
                v-model="date1"

                prepend-icon="event"
                readonly
              ></v-text-field>
              <v-date-picker
                ref="picker1"
                v-model="date1"
                :max="new Date().toISOString().substr(0, 10)"
                min="1950-01-01"
                @change="save1"
              ></v-date-picker>
            </v-menu>
          </v-flex>

          <v-flex xs12 sm6>
            <label for="">Foto Dni</label>
            <v-form id="subir" @submit.prevent="subir()">
                <v-text-field type="file" name="photo" @change="subir()" solo></v-text-field>
            </V-form>
          </v-flex>

          <v-flex xs12 sm6>
            <label for="">Clasificacion Cliente</label>
            <v-text-field v-model="calificacionCliente" solo></v-text-field>
          </v-flex>

          <v-flex xs12 sm6>
            <label for="">Comentarios</label>
            <v-textarea value="" hint="Comentarios" v-model="comentariosAdicionales"></v-textarea>
          </v-flex>
        </v-layout>
        <v-btn type="submit" color="green" dark black>Guardar</v-btn>
        <v-btn @click="cancelar" color="red" dark black>Cancelar</v-btn>
      </v-container>
    </v-form>
    <pre>{{ $data }}</pre>
  </div>
</template>

<script>
  export default {
    props: ['token'],
    data: () => ({
      apellidoPaterno: "",
      apellidoMaterno: "",
      nombres: "",
      dni: "",
      photo: "",
      menu: "",
      date: "",
      date: "",
      correo: "",
      celular: "",
      direccion: "",
      ciudad: "",
      cci: "",
      banco: "",
      nombreTitularCuenta: "",
      numeroBrevete: "",
      menu1: "",
      date1: "",
      date1: "",
      fotoDni: "",
      calificacionCliente: "",
      comentariosAdicionales: "",
      date: null,
      date1: null,
      menu: false,
      menu1: false,
      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
      rules: {
        required: value => !!value || 'Obligatorio.',
      },
    }),
    watch: {
      menu (val) {
        val && this.$nextTick(() => (this.$refs.picker.activePicker = 'YEAR'))
      },
      menu1 (val) {
        val && this.$nextTick(() => (this.$refs.picker1.activePicker = 'YEAR'))
      }
    },
    methods: {
      subir (item) {
        let form = document.getElementById('subir');
        const formData = new FormData(form);
        console.log(item);
        if (item == 'photo') {
          axios.post('/foto', formData)
            .then(response => {
              console.log(response)
              this.photo = `/images/${response.data}`;
            })
            .catch(error => {
              console.log(error)
              alert("Surgio un error, verifique los campos e intente nuevamente..!!");
            })
        }else{
          axios.post('/foto', formData)
            .then(response => {
              console.log(response)
              this.fotoDni = `/images/${response.data}`;
            })
            .catch(error => {
              console.log(error)
              alert("Surgio un error, verifique los campos e intente nuevamente..!!");
            })
        }
        },
      save (date) {
        this.$refs.menu.save(date)
      },
      save1 (date) {
        this.$refs.menu1.save(date)
      },
      sendForm(e) {
        axios.post('/v1.0/cliente',
          {
            apellidoPaterno: this.apellidoPaterno,
            apellidoMaterno: this.apellidoMaterno,
            nombres: this.nombres,
            dni: this.dni,
            photo: this.photo,
            menu: this.menu,
            date: this.date,
            date: this.date,
            correo: this.correo,
            celular: this.celular,
            direccion: this.direccion,
            ciudad: this.ciudad,
            cci: this.cci,
            banco: this.banco,
            nombreTitularCuenta: this.nombreTitularCuenta,
            numeroBrevete: this.numeroBrevete,
            menu1: this.menu1,
            date1: this.date1,
            date1: this.date1,
            fotoDni: this.fotoDni,
            calificacionCliente: this.calificacionCliente,
            comentariosAdicionales: this.comentariosAdicionales,
            _token: this.csrf,
          }
        )
          .then(response => {
            console.log(response)
            window.location.href = '/cliente';
          })
          .catch(error => {
            console.log(error)
            alert("Surgio un error, verifique los campos e intente nuevamente..!!");
          })
      },
      cancelar() {
        window.location.href = '/cliente';
      },
    }

  }

</script>
