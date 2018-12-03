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
    <v-form id="ContactForm" @submit.prevent="sendForm">
      <v-container>
        <h2>Informacion Basica</h2>
        <v-layout row wrap>
          <v-flex xs12 sm6>
            <label for="">Apellido Paterno</label>
            <v-text-field autofocus name="apellidoPaterno" solo :rules="[rules.required]"></v-text-field>
          </v-flex>

          <v-flex xs12 sm6>
            <label for="">Apellido Materno</label>
            <v-text-field name="apellidoMaterno" solo :rules="[rules.required]"></v-text-field>
          </v-flex>

          <v-flex xs12 sm6>
            <label for="">Nombres</label>
            <v-text-field name="nombres" solo :rules="[rules.required]"></v-text-field>
          </v-flex>

          <v-flex xs12 sm6>
            <label for="">DNI</label>
            <v-text-field name="dni" solo :rules="[rules.required]"></v-text-field>
          </v-flex>

          <v-flex xs12 sm6>
            <label for="">Imagen</label>
            <v-text-field name="image" solo :rules="[rules.required]"></v-text-field>
          </v-flex>

          <v-flex xs12 sm6 md4>
            <label for="">Fecha</label>
            <v-menu :close-on-content-click="false" v-model="menu2" :nudge-right="40" lazy transition="scale-transition"
              offset-y full-width min-width="290px">
              <v-text-field slot="activator" name="fechaNacimiento" v-model="date" label="Fecha de Nacimiento"
                prepend-icon="event" readonly></v-text-field>
              <v-date-picker v-model="date" @input="menu2 = false"></v-date-picker>
            </v-menu>
          </v-flex>
        </v-layout>
        <v-divider light></v-divider>
        <h2>Informacion de Contacto</h2>
        <v-layout row wrap>

          <v-flex xs12 sm6>
            <label for="">Correo</label>
            <v-text-field name="correo" solo :rules="[rules.required]"></v-text-field>
          </v-flex>

          <v-flex xs12 sm6>
            <label for="">Celular</label>
            <v-text-field name="celular" solo :rules="[rules.required]"></v-text-field>
          </v-flex>

          <v-flex xs12 sm6>
            <label for="">Direccion</label>
            <v-text-field name="direccion" solo :rules="[rules.required]"></v-text-field>
          </v-flex>

          <v-flex xs12 sm6>
            <label for="">Ciudad</label>
            <v-text-field name="ciudad" solo :rules="[rules.required]"></v-text-field>
          </v-flex>
        </v-layout>
        <v-divider light></v-divider>
        <h2>Informacion Bancaria</h2>

        <v-layout row wrap>
          <v-flex xs12 sm6>
            <label for="">CCi</label>
            <v-text-field name="cci" solo :rules="[rules.required]" type="number"></v-text-field>
          </v-flex>

          <v-flex xs12 sm6>
            <label for="">Banco</label>
            <v-text-field name="banco" solo :rules="[rules.required]"></v-text-field>
          </v-flex>

          <v-flex xs12 sm6>
            <label for="">Nombre Titutar</label>
            <v-text-field name="nombreTitularCuenta" solo :rules="[rules.required]"></v-text-field>
          </v-flex>
        </v-layout>
        <v-divider light></v-divider>
        <h2>Documentos</h2>
        <v-layout row wrap>
          <v-flex xs12 sm6>
            <label for="">N° Brevete</label>
            <v-text-field name="numeroBrevete" solo :rules="[rules.required]"></v-text-field>
          </v-flex>

          <v-flex xs12 sm6 md4>
            <label for="">Fecha de Vencimiento Brevete</label>
            <v-menu :close-on-content-click="false" v-model="menu3" :nudge-right="40" lazy transition="scale-transition"
              offset-y full-width min-width="290px">
              <v-text-field slot="activator" name="fechaVencimientoBrevete" v-model="date" label="Fecha de Nacimiento"
                prepend-icon="event" readonly></v-text-field>
              <v-date-picker v-model="date" @input="menu3 = false"></v-date-picker>
            </v-menu>
          </v-flex>

          <v-flex xs12 sm6>
            <label for="">Foto Dni</label>
            <v-text-field name="fotoDni" solo :rules="[rules.required]"></v-text-field>
          </v-flex>

          <v-flex xs12 sm6>
            <label for="">Clasificacion Cliente</label>
            <v-text-field name="calificacionCliente" solo :rules="[rules.required]"></v-text-field>
          </v-flex>

          <v-flex xs12 sm6>
            <label for="">Comentarios</label>
            <v-textarea value="" hint="Comentarios" name="comentariosAdicionales"></v-textarea>

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
      menu3: false,
      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
      rules: {
        required: value => !!value || 'Obligatorio.',
      },
    }),
    methods: {
      sendForm(e) {
        let form = document.getElementById('ContactForm');
        const formData = new FormData(form);
        let jsonObject = {};
        for (const [key, value] of formData.entries()) {
          jsonObject[key] = value;
          if (value == null) {
            console.log("datos vacios");
          } else {
            console.log("paso normal");
          }
        }
        console.log(jsonObject);
        axios.post('/v1.0/cliente', jsonObject)
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
