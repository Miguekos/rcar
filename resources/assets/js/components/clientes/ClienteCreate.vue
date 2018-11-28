
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
          <label for="">Apellido Paterno</label>
          <v-text-field
            autofocus
            name="apellidoPaterno"
            solo          
          ></v-text-field>
        </v-flex>

        <v-flex xs12 sm6>
          <label for="">Apellido Materno</label>
          <v-text-field
            name="apellidoMaterno"
            solo
          ></v-text-field>
        </v-flex>

        <v-flex xs12 sm6>
          <v-text-field
            name="nombres"
            label="Nombres"
            solo
          ></v-text-field>
        </v-flex>

        <v-flex xs12 sm6>
          <v-text-field
            name="dni"
            label="Dni"
            solo
          ></v-text-field>
        </v-flex>

        <v-flex xs12 sm6>
          <v-text-field
            name="image"
            label="image"
            solo
          ></v-text-field>
        </v-flex>

        <v-flex xs12 sm6 md4>
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
          name="fechaNacimiento"
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
            name="fechaNacimiento"
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
          <v-text-field
            name="correo"
            label="correo"
            solo
          ></v-text-field>
        </v-flex>

        <v-flex xs12 sm6>
          <v-text-field
            name="celular"
            label="celular"
            solo
          ></v-text-field>
        </v-flex>

        <v-flex xs12 sm6>
          <v-text-field
            name="direccion"
            label="direccion"
            solo
          ></v-text-field>
        </v-flex>

        <v-flex xs12 sm6>
          <v-text-field
            name="ciudad"
            label="ciudad"
            solo
          ></v-text-field>
        </v-flex>
</v-layout>
        <v-divider light></v-divider>
<h2>Informacion Bancaria</h2>

<v-layout row wrap>
        <v-flex xs12 sm6>
          {{ token }}
          <v-text-field
            name="cci"
            label="cci"
            solo
          ></v-text-field>
        </v-flex>

        <v-flex xs12 sm6>
          <v-text-field
            name="banco"
            label="banco"
            solo
          ></v-text-field>
        </v-flex>

        <v-flex xs12 sm6>
          <v-text-field
            name="nombreTitularCuenta"
            label="nombreTitularCuenta"
            solo
          ></v-text-field>
        </v-flex>
</v-layout>
        <v-divider light></v-divider>
<h2>Documentos</h2>
<v-layout row wrap>
        <v-flex xs12 sm6>
          <v-text-field
            name="numeroBrevete"
            label="numeroBrevete"
            solo
          ></v-text-field>
        </v-flex>

        <v-flex xs12 sm6>
          <v-text-field
            name="fechaVencimientoBrevete"
            label="fechaVencimientoBrevete"
            solo
          ></v-text-field>
        </v-flex>

        <v-flex xs12 sm6>
          <v-text-field
            name="fotoDni"
            label="fotoDni"
            solo
          ></v-text-field>
        </v-flex>

        <v-flex xs12 sm6>
          <v-text-field
            name="calificacionCliente"
            label="calificacionCliente"
            solo
          ></v-text-field>
        </v-flex>

        <v-flex xs12 sm6>
          <v-text-field
            name="comentariosAdicionales"
            label="comentariosAdicionales"
            solo
          ></v-text-field>
          <input type="hidden" name="_token" :value="csrf">
        </v-flex>
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