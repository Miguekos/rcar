<style>
input:-webkit-autofill,
input:-webkit-autofill:hover,
input:-webkit-autofill:focus textarea:-webkit-autofill,
textarea:-webkit-autofill:hover textarea:-webkit-autofill:focus,
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
<!-- <v-container fluid grid-list-xl> -->
<div>
    <form id="ContactForm" method="post" @submit.prevent="sendForm()">
        <v-container>
            <v-flex xs12="xs12" lg12="lg12" text-lg-left="text-lg-left">
                <h2>Informacion Basica</h2>
            </v-flex>

            <v-layout row="row" wrap="wrap">
                <v-flex xs12="xs12" sm6="sm6">
                    <label for="">Apellido Paterno</label>
                    <v-text-field required="required" autofocus="autofocus" maxlength="20" v-model="apellidoPaterno" name="apellidoPaterno"></v-text-field>
                </v-flex>

                <v-flex xs12="xs12" sm6="sm6">
                    <label for="">Apellido Materno</label>
                    <v-text-field required="required" v-model="apellidoMaterno" name="apellidoMaterno" maxlength="20"></v-text-field>
                </v-flex>

                <v-flex xs12="xs12" sm6="sm6">
                    <label for="">Nombres</label>
                    <v-text-field @keyup="" type="text" title="Tu nombre" pattern="^[A-Za-zÑñÁáÉéÍíÓóÚúÜü\s]+$" required="required" maxlength="20" v-model="nombres" name="nombres"></v-text-field>
                </v-flex>

                <v-flex xs12="xs12" sm6="sm6">
                    <label for="">DNI/C.E</label>
                    <v-text-field minlength="8" maxlength="9" type="text" title="DNI" pattern="^[0-9]+$" required="required" v-model="dni" name="dni"></v-text-field>
                </v-flex>

                <v-flex xs12="xs12" sm6="sm6">
                  <v-flex xs3>
                    <v-avatar size="70%">
                      <!-- <v-img :src="props.item.image"></v-img> -->
                      <v-img src="loginnew/images/logo.png"></v-img>
                    </v-avatar>
                  </v-flex>
                    <label for="">Imagen del Cliente</label>
                    <v-form id="subir" @submit.prevent="subir('photo')">
                        <v-text-field required="required" type="file" name="image" @change="subir('photo')" solo="solo"></v-text-field>
                    </V-form>
                </v-flex>

                <v-flex xs12="xs12" sm6="sm6" md4="md4">
                    <label for="">Fecha de Nacimiento</label>
                    <v-menu
                        ref="menu"
                        :close-on-content-click="false"
                        v-model="menu" name="menu"
                        :nudge-right="40"
                        lazy="lazy"
                        transition="scale-transition"
                        offset-y="offset-y"
                        full-width="full-width"
                        min-width="290px">
                        <v-text-field required="required" slot="activator" v-model="date" prepend-icon="event" readonly="readonly"></v-text-field>
                        <v-date-picker ref="picker" v-model="date" name="fechaNacimiento" :max="new Date().toISOString().substr(0, 10)" min="1950-01-01" @change="save"></v-date-picker>
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
                    <v-text-field type="email" name="correo" title="Tu email" pattern="^[a-z0-9]+(\.[_a-z0-9]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,15})$" required="required"></v-text-field>
                </v-flex>

                <v-flex xs12="xs12" sm6="sm6">
                    <label for="">Celular</label>
                    <v-text-field type="tel" minlength="9" maxlength="9" title="Solo numeros" pattern="^[0-9]+$" required="required"></v-text-field>
                </v-flex>

                <v-flex xs12="xs12" sm6="sm6">
                    <label for="">Direccion</label>
                    <v-text-field maxlength="20" required="required" v-model="direccion" name="direccion"></v-text-field>
                </v-flex>

                <v-flex xs12="xs12" sm6="sm6">
                    <label for="">Ciudad</label>
                    <v-text-field maxlength="20" required="required" v-model="ciudad" name="ciudad"></v-text-field>
                </v-flex>
            </v-layout>
            <!-- <v-divider light></v-divider> -->
            <v-flex xs12="xs12" lg12="lg12" text-lg-left="text-lg-left">
                <h2>Informacion Bancaria</h2>
            </v-flex>

            <v-layout row="row" wrap="wrap">
                <v-flex xs12="xs12" sm6="sm6">
                    <label for="">CCi</label>
                    <v-text-field required="required" v-model="cci" name="cci" minlength="19" maxlength="20" type="number"></v-text-field>
                </v-flex>

                <v-flex xs12="xs12" sm6="sm6">
                    <label for="">Banco</label>
                    <v-select :items="Banco" item-text="text" item-value="text" v-model="banco" name="banco" label="Banco" solo></v-select>
                </v-flex>

                <v-flex xs12="xs12" sm6="sm6">
                    <label for="">Nombre Titutar</label>
                    <v-text-field required="required" maxlength="20" v-model="nombreTitularCuenta" name="nombreTitularCuenta"></v-text-field>
                </v-flex>
            </v-layout>
            <!-- <v-divider light></v-divider> -->
            <v-flex xs12="xs12" lg12="lg12" text-lg-left="text-lg-left">
                <h2>Documentos</h2>
            </v-flex>

            <v-layout row="row" wrap="wrap">
                <v-flex xs12="xs12" sm6="sm6">
                    <label for="">N° Brevete</label>
                    <v-text-field minlength="8" maxlength="9" type="text" pattern="^[0-9]+$" required="required" v-model="numeroBrevete" name="numeroBrevete"></v-text-field>
                </v-flex>

                <v-flex xs12="xs12" sm6="sm6" md4="md4">
                    <label for="">Fecha de Vencimiento Brevete</label>
                    <v-menu
                        ref="menu1"
                        :close-on-content-click="false"
                        v-model="menu1" name="menu1"
                        :nudge-right="40"
                        lazy="lazy"
                        transition="scale-transition"
                        offset-y="offset-y"
                        full-width="full-width"
                        min-width="290px">
                        <v-text-field required="required" slot="activator" v-model="date1" name="date1" prepend-icon="event" readonly="readonly"></v-text-field>
                        <v-date-picker ref="picker1" v-model="date1" name="fechaVencimientoBrevete" :max="new Date().toISOString().substr(0, 10)" min="1950-01-01" @change="save1"></v-date-picker>
                    </v-menu>
                </v-flex>

                <v-flex xs12="xs12" sm6="sm6">
                    <label for="">Foto Dni</label>
                    <v-form id="subir" @submit.prevent="subir()">
                        <v-text-field required="required" type="file" name="photo" @change="subir()" solo="solo"></v-text-field>
                    </V-form>
                </v-flex>

                <v-flex xs12="xs12" sm6="sm6">
                    <label for="">Clasificacion Cliente</label>
                    <v-select :items="clasicliente" item-text="text" item-value="text" v-model="calificacionCliente" name="calificacionCliente" label="Clasificacion" solo></v-select>
                </v-flex>

                <v-flex xs12="xs12" sm6="sm6">
                    <label for="">Comentarios</label>
                    <v-textarea value="" hint="Comentarios" v-model="comentariosAdicionales" name="comentariosAdicionales"></v-textarea>
                </v-flex>
            </v-layout>
            <v-flex xs12="xs12" lg12="lg12" text-lg-center="text-lg-center">
                <v-btn type="submit" color="green" dark="dark" black="black">Guardar</v-btn>
                <v-btn @click="cancelar" color="red" dark="dark" black="black">Cancelar</v-btn>
            </v-flex>

        </v-container>
    </form>
    <!-- <pre>{{ $data }}</pre> -->
</div>
<!-- </v-container> -->
</template>

<script>
export default {
  props: ['token'],
  data: () => ({
    apellidoPaterno: "",
    apellidoMaterno: "",
    nombres: "",
    dni: "",
    image: "",
    correo: "",
    celular: "",
    direccion: "",
    ciudad: "",
    cci: "",
    banco: "",
    nombreTitularCuenta: "",
    numeroBrevete: "",
    fotoDni: "",
    calificacionCliente: "",
    comentariosAdicionales: "",
    date: "",
    date1: "",
    menu: false,
    menu1: false,
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
  }),
  watch: {
    menu(val) {
      val && this.$nextTick(() => (this.$refs.picker.activePicker = 'YEAR'))
    },
    menu1(val) {
      val && this.$nextTick(() => (this.$refs.picker1.activePicker = 'YEAR'))
    }
  },
  methods: {
    validateData(e) {
      let input = e.target,
        expression
      if (input.pattern) {
        let regex = new RegExp(input.pattern)
        expression = !regex.exec(input.value)
      } else {
        expression = !input.value
      }

      if (expression) {
        this.message[input.name] = `Dato incorrecto, ${input.title}`
      } else {
        this.message[input.name] = ''
      }
    },
    subir(item) {
      let form = document.getElementById('subir');
      const formData = new FormData(form);
      console.log(item);
      if (item == 'photo') {
        axios.post('/foto', formData)
          .then(response => {
            console.log(response)
            this.image = `/images/${response.data}`;
          })
          .catch(error => {
            console.log(error)
            // alert("Surgio un error, verifique los campos e intente nuevamente..!!");
          })
      } else {
        axios.post('/foto', formData)
          .then(response => {
            console.log(response)
            this.fotoDni = `/images/${response.data}`;
          })
          .catch(error => {
            console.log(error)
            // alert("Surgio un error, verifique los campos e intente nuevamente..!!");
          })
      }
    },
    save(date) {
      this.$refs.menu.save(date)
    },
    save1(date) {
      this.$refs.menu1.save(date)
    },
    sendForm(e) {
      let form = document.getElementById('ContactForm');
      const formData = new FormData(form);
      axios.post('/v1.0/cliente', formData)
        .then(response => {
          console.log(response)
          // window.location.href = '/cliente';
        })
        .catch(error => {
          console.log(error)
          // alert("Surgio un error, verifique los campos e intente nuevamente..!!");
        })
    },
    cancelar() {
      window.location.href = '/cliente';
    },
  }

}
</script>
