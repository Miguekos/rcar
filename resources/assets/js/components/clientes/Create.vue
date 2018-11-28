<template>
    <v-app>
  <v-form>
    <v-container>
      <v-toolbar-title>Informacion Basica</v-toolbar-title>
      <v-layout row wrap>
        <v-flex xs12 sm6>
          <v-text-field
            v-model="apellidoPaterno"
            label="Apellido Parterno"
          ></v-text-field>
        </v-flex>

        <v-flex xs12 sm6>
          <v-text-field
            v-model="apellidoMaterno"
            label="Apellido Materno"
          ></v-text-field>
        </v-flex>

        <v-flex xs12 sm6>
          <v-text-field
            v-model="nombres"
            label="Nombres"
          ></v-text-field>
        </v-flex>

        <v-flex xs12 sm6>
          <v-text-field
            v-model="dni"
            label="Dni"
          ></v-text-field>
        </v-flex>

        <v-flex xs12 sm6>
          <v-text-field
            v-model="image"
            label="image"
          ></v-text-field>
        </v-flex>

        <v-flex xs12 sm6>
          <v-text-field
            v-model="fechaNacimiento"
            label="Fecha de Nacimiento"
          ></v-text-field>
        </v-flex>
      </v-layout>
<v-divider light></v-divider>
<v-toolbar-title>Informacion de Contacto</v-toolbar-title>
<v-layout row wrap>

        <v-flex xs12 sm6>
          <v-text-field
            v-model="correo"
            label="correo"
          ></v-text-field>
        </v-flex>

        <v-flex xs12 sm6>
          <v-text-field
            v-model="celular"
            label="celular"
          ></v-text-field>
        </v-flex>

        <v-flex xs12 sm6>
          <v-text-field
            v-model="direccion"
            label="direccion"
          ></v-text-field>
        </v-flex>

        <v-flex xs12 sm6>
          <v-text-field
            v-model="ciudad"
            label="ciudad"
          ></v-text-field>
        </v-flex>
</v-layout>
        <v-divider light></v-divider>
<v-toolbar-title>Informacion Bancaria</v-toolbar-title>
<v-layout row wrap>
        <v-flex xs12 sm6>
          <v-text-field
            v-model="cci"
            label="cci"
          ></v-text-field>
        </v-flex>

        <v-flex xs12 sm6>
          <v-text-field
            v-model="banco"
            label="banco"
          ></v-text-field>
        </v-flex>

        <v-flex xs12 sm6>
          <v-text-field
            v-model="nombreTitularCuenta"
            label="nombreTitularCuenta"
          ></v-text-field>
        </v-flex>
</v-layout>
        <v-divider light></v-divider>
<v-toolbar-title>Documentos</v-toolbar-title>
<v-layout row wrap>
        <v-flex xs12 sm6>
          <v-text-field
            v-model="numeroBrevete"
            label="numeroBrevete"
          ></v-text-field>
        </v-flex>

        <v-flex xs12 sm6>
          <v-text-field
            v-model="fechaVencimientoBrevete"
            label="fechaVencimientoBrevete"
          ></v-text-field>
        </v-flex>

        <v-flex xs12 sm6>
          <v-text-field
            v-model="fotoDni"
            label="fotoDni"
          ></v-text-field>
        </v-flex>

        <v-flex xs12 sm6>
          <v-text-field
            v-model="calificacionCliente"
            label="calificacionCliente"
          ></v-text-field>
        </v-flex>

        <v-flex xs12 sm6>
          <v-text-field
            v-model="comentariosAdicionales"
            label="comentariosAdicionales"
          ></v-text-field>
        </v-flex>
      </v-layout>
        <v-btn type="submit" color="green" dark black block>Guardar</v-btn>
    </v-container>
  </v-form>
    </v-app>
</template>

<script>
  export default {
    data: () => ({
      first: 'John',
      last: 'Doe',
        apellidoPaterno
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
              axios.post('/cliente',jsonObject)
                  .then(response => {
                      console.log(response)
                      window.location.href = '/cliente';
                  })
                  .catch(error => {
                      console.log(error)
                      alert("Surgio un error al guardar tu cliente");
                  })
              this.close();
              this.carga();
          },
      }

  }
</script>