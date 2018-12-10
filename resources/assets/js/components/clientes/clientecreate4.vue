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
  <!-- <v-form id="ContactForm" @submit.prevent="sendForm"> -->
    <v-card ref="form">
    <v-container>
      <h2>Informacion Basica</h2>
      <v-layout row wrap>
        <v-flex xs12 sm6>
          <label for="">Apellido Paterno</label>
          <v-text-field
            autofocus
            v-model="apellidoPaterno"
            :rules="[() => !!apellidoPaterno || 'This field is required']"
            solo
            required
          ></v-text-field>
        </v-flex>

        <v-flex xs12 sm6>
          <label for="">Apellido Materno</label>
          <v-text-field
            v-model="apellidoMaterno"
            solo
          ></v-text-field>
        </v-flex>

        <v-flex xs12 sm6>
          <label for="">Nombres</label>
          <v-text-field
            v-model="nombres"
            solo
          ></v-text-field>
        </v-flex>

        <v-flex xs12 sm6>
          <label for="">DNI</label>
          <v-text-field
            v-model="dni"
            solo
          ></v-text-field>
        </v-flex>

        <v-flex xs12 sm6>
          <label for="">Imagen</label>
          <v-text-field
            v-model="image"
            solo
              type="file"

          ></v-text-field>
        </v-flex>

        <v-flex xs12 sm6 md4>
          <label for="">Fecha</label>
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
          slot="activator"
          v-model="date"
          label="Fecha de Nacimiento"
          prepend-icon="event"
          readonly
        ></v-text-field>
        <v-date-picker v-model="date" @input="menu2 = false"></v-date-picker>
      </v-menu>
    </v-flex>
    <!-- <v-spacer></v-spacer> -->

        <!-- <v-flex xs12 sm6>
          <v-text-field
          date-with-time
            v-model="fechaNacimiento"
            label="Fecha de Nacimiento"
            solo
          ></v-text-field>
        </v-flex> -->
      </v-layout>
<v-divider light></v-divider>
<!-- <v-toolbar-title>Informacion de Contacto</v-toolbar-title> -->
<h2>Informacion de Contacto</h2>
<v-layout row wrap>
        <v-flex xs12 sm6>
          <label for="">Correo</label>
          <v-text-field
            v-model="correo"
            solo
          ></v-text-field>
        </v-flex>

        <v-flex xs12 sm6>
          <label for="">Celular</label>
          <v-text-field
            v-model="celular"
            solo
          ></v-text-field>
        </v-flex>

        <v-flex xs12 sm6>
          <label for="">Direccion</label>
          <v-text-field
            v-model="direccion"
            solo
          ></v-text-field>
        </v-flex>

        <v-flex xs12 sm6>
          <label for="">Ciudad</label>
          <v-text-field
            v-model="ciudad"
            solo
          ></v-text-field>
        </v-flex>
</v-layout>
        <v-divider light></v-divider>
<h2>Informacion Bancaria</h2>

<v-layout row wrap>
        <v-flex xs12 sm6>
          <label for="">CCi</label>
          <v-text-field
            v-model="cci"
            solo
          ></v-text-field>
        </v-flex>

        <v-flex xs12 sm6>
          <label for="">Banco</label>
          <v-text-field
            v-model="banco"
            solo
          ></v-text-field>
        </v-flex>

        <v-flex xs12 sm6>
          <label for="">Nombre Titutar</label>
          <v-text-field
            v-model="nombreTitularCuenta"
            solo
          ></v-text-field>
        </v-flex>
</v-layout>
        <v-divider light></v-divider>
<h2>Documentos</h2>
<v-layout row wrap>
        <v-flex xs12 sm6>
          <label for="">N° Brevete</label>
          <v-text-field
            v-model="numeroBrevete"
            solo
          ></v-text-field>
        </v-flex>

        <v-flex xs12 sm6>
          <label for="">Fecha de Vencimiento Brevete</label>
          <v-text-field
            v-model="fechaVencimientoBrevete"
            solo
          ></v-text-field>
        </v-flex>

        <v-flex xs12 sm6>
          <label for="">Foto Dni</label>
          <v-text-field
            v-model="fotoDni"
            solo
              type="file"

          ></v-text-field>
        </v-flex>

        <v-flex xs12 sm6>
          <label for="">Clasificacion Cliente</label>
          <v-text-field
            v-model="calificacionCliente"
            solo
          ></v-text-field>
        </v-flex>

        <v-flex xs12 sm6>
          <label for="">Comentarios</label>
          <v-textarea
          value=""
          hint="Comentarios"
          v-model="comentariosAdicionales"
        ></v-textarea>

          <input type="hidden" name="_token" :value="csrf">
        </v-flex>
      </v-layout>
        <v-btn color="green" @click="submit" dark black>Guardar</v-btn>
        <v-btn @click="cancelar" color="red" dark black>Cancelar</v-btn>
    </v-container>
  </v-card>
  <!-- <pre>{{ $data }}</pre> -->
    </div>
</template>

<script>

  export default {
    props: ['token'],
    data: () => ({
      errorMessages: '',
      apellidoPaterno: null,
      apellidoMaterno: null,
      nombres: null,
      dni: null,
      image: null,
      menu2: null,
      fechaNacimiento: null,
      date: null,
      date: null,
      fechaNacimiento: null,
      correo: null,
      celular: null,
      direccion: null,
      ciudad: null,
      cci: null,
      banco: null,
      nombreTitularCuenta: null,
      numeroBrevete: null,
      fechaVencimientoBrevete: null,
      fotoDni: null,
      calificacionCliente: null,
      comentariosAdicionales: null,
      formHasErrors: false,
      // fin de la validacion
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
          submit () {
        console.log("asd");
        this.formHasErrors = false

        Object.keys(this.form).forEach(f => {
          if (!this.form[f]) this.formHasErrors = true

          // this.$refs[f].validate(true)
        })
      },
      },
      computed: {
        form () {
          return {
            apellidoPaterno: this.apellidoPaterno,
            apellidoMaterno: this.apellidoMaterno,
            nombres: this.nombres,
            dni: this.dni,
            image: this.image,
            menu2: this.menu2,
            fechaNacimiento: this.fechaNacimiento,
            date: this.date,
            date: this.date,
            fechaNacimiento: this.fechaNacimiento,
            correo: this.correo,
            celular: this.celular,
            direccion: this.direccion,
            ciudad: this.ciudad,
            cci: this.cci,
            banco: this.banco,
            nombreTitularCuenta: this.nombreTitularCuenta,
            numeroBrevete: this.numeroBrevete,
            fechaVencimientoBrevete: this.fechaVencimientoBrevete,
            fotoDni: this.fotoDni,
            calificacionCliente: this.calificacionCliente,
            comentariosAdicionales: this.comentariosAdicionales,
          }
      }
      },
      watch: {
      name () {
        this.errorMessages = ''
      }
    },


  }
</script>
