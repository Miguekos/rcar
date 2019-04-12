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
      <v-container grid-list-xl="grid-list-xl">
        <v-layout row="row" wrap="wrap">
          <v-flex lg8="lg8">
            <v-card class="cuerpoautocreate">
              <v-flex class="titulosautocreate">
                <h3>Informacion Basica</h3>
              </v-flex>
              <v-layout row wrap py-4 px-4>
                <v-flex xs12 sm6 md3>
                  <label for>Apellido Paterno</label>
                  <v-text-field
                    required="required"
                    autofocus="autofocus"
                    maxlength="20"
                    v-model="jsonafiliados.apellidoPaterno"
                  ></v-text-field>
                </v-flex>

                <v-flex xs12 sm6 md3>
                  <label for>Apellido Materno</label>
                  <v-text-field required="required" v-model="jsonafiliados.apellidoMaterno" maxlength="20"></v-text-field>
                </v-flex>

                <v-flex xs12 sm6 md3>
                  <label for>Nombres</label>
                  <v-text-field
                    type="text"
                    name="name"
                    title="Tu nombre"
                    pattern="^[A-Za-zÑñÁáÉéÍíÓóÚúÜü\s]+$"
                    required="required"
                    maxlength="20"
                    v-model="jsonafiliados.nombres"
                  ></v-text-field>
                </v-flex>

                <v-flex xs12 sm6 md3>
                  <label for>DNI/C.E</label>
                  <v-text-field
                    minlength="8"
                    maxlength="9"
                    type="text"
                    title="DNI"
                    pattern="^[0-9]+$"
                    required="required"
                    v-model="jsonafiliados.dni"
                  ></v-text-field>
                </v-flex>

                <v-flex xs12 sm6 md3>
                  <label for>Fecha de Nacimiento</label>
                  <v-menu
                    ref="menu"
                    :close-on-content-click="false"
                    v-model="jsonafiliados.menu"
                    :nudge-right="40"
                    lazy="lazy"
                    transition="scale-transition"
                    offset-y="offset-y"
                    full-width="full-width"
                    min-width="290px"
                  >
                    <v-text-field
                      required="required"
                      slot="activator"
                      v-model="jsonafiliados.date"
                      prepend-icon="event"
                      readonly="readonly"
                    ></v-text-field>
                    <v-date-picker
                      required="required"
                      ref="picker"
                      v-model="jsonafiliados.date"
                      :max="new Date().toISOString().substr(0, 10)"
                      min="1950-01-01"
                      @change="save"
                    ></v-date-picker>
                  </v-menu>
                </v-flex>
              </v-layout>
            </v-card>
          </v-flex>

          <v-flex lg4="lg4">
            <div class="text-lg-center">
              <label for>Foto Perfil</label>
              <file-upload-component @fotoperfilafiliados="fotoperfil"/>
            </div>
          </v-flex>
        </v-layout>
      </v-container>

      <v-container grid-list-xl="grid-list-xl">
        <v-layout row="row" wrap="wrap">
          <v-flex lg12="lg12">
            <v-card class="cuerpoautocreate">
              <v-flex class="titulosautocreate">
                <h3>Informacion de Contacto</h3>
              </v-flex>
              <v-layout row wrap py-4 px-4>
                <v-flex xs12 sm6 md3>
                  <label for>Correo</label>
                  <v-text-field
                    type="email"
                    v-model="jsonafiliados.correo"
                    title="Tu email"
                    pattern="^[a-z0-9]+(\.[_a-z0-9]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,15})$"
                    required="required"
                  ></v-text-field>
                </v-flex>

                <v-flex xs12 sm6 md3>
                  <label for>Celular</label>
                  <v-text-field
                    type="tel"
                    v-model="jsonafiliados.celular"
                    minlength="9"
                    maxlength="9"
                    title="Solo numeros"
                    pattern="^[0-9]+$"
                    required="required"
                  ></v-text-field>
                </v-flex>

                <v-flex xs12 sm6 md3>
                  <label for>Direccion</label>
                  <v-text-field maxlength="40" required="required" v-model="jsonafiliados.direccion"></v-text-field>
                </v-flex>

                <v-flex xs12 sm6 md3>
                  <label for>Ciudad</label>
                  <v-text-field maxlength="20" required="required" v-model="jsonafiliados.ciudad"></v-text-field>
                </v-flex>
              </v-layout>
            </v-card>
          </v-flex>
        </v-layout>
      </v-container>

      <v-container grid-list-xl="grid-list-xl">
        <v-layout row="row" wrap="wrap">
          <v-flex lg12="lg12">
            <v-card class="cuerpoautocreate">
              <v-flex class="titulosautocreate">
                <h3>Informacion Bancaria</h3>
              </v-flex>
              <v-layout row wrap py-4 px-4>
                <v-flex xs12 sm6 md6>
                  <label for>CCi</label>
                  <v-text-field
                    required="required"
                    v-model="jsonafiliados.cci"
                    minlength="19"
                    maxlength="20"
                    type="text"
                  ></v-text-field>
                </v-flex>

                <v-flex xs12 sm6 md3>
                  <label for>Banco</label>
                  <v-select
                    :items="Banco"
                    item-text="text"
                    item-value="text"
                    v-model="jsonafiliados.banco"
                    label="Select.."
                  ></v-select>
                </v-flex>

                <v-flex xs12 sm6 md3>
                  <label for>Nombre Titutar</label>
                  <v-text-field required="required" maxlength="20" v-model="jsonafiliados.nombreTitularCuenta"></v-text-field>
                </v-flex>
              </v-layout>
            </v-card>
          </v-flex>
        </v-layout>
      </v-container>

      <v-container grid-list-xl="grid-list-xl">
        <v-layout row="row" wrap="wrap">
          <v-flex lg12="lg12">
            <v-card class="cuerpoautocreate">
              <v-flex class="titulosautocreate">
                <h3>Informacion de Contacto</h3>
              </v-flex>
              <v-layout row wrap py-4 px-4>
                <v-flex class="text-lg-center" xs12 sm6 md6>
                  <label for>Foto DNI</label>
                  <file-upload-component @fotoperfilafiliados="fotodni"/>
                </v-flex>

                <v-flex xs12 sm6 md6>
                  <label for>Comentarios</label>
                  <v-textarea value hint="Comentarios" v-model="jsonafiliados.comentariosAdicionales"></v-textarea>
                </v-flex>
              </v-layout>
            </v-card>
          </v-flex>
        </v-layout>
      </v-container>

      <v-flex class="text-lg-center" xs12="xs12" lg12="lg12">
        <v-btn type="submit" color="green" dark="dark" black="black">Guardar</v-btn>
        <v-btn @click="cancelar" color="red" dark="dark" black="black">Cancelar</v-btn>
      </v-flex>
    </form>
    <!-- <pre>{{ $data }}</pre> -->
  </div>
</template>

<script>
export default {
  props: ["token"],
  data: () => ({
    jsonafiliados: {},
    abrirarchivos: "Abrir",
    veraarchivo: "",
    colorboton: [
      {
        name: "red",
        abrir: "blue",
        nombreboton: "Subir"
      },
      {
        name: "red",
        abrir: "blue",
        nombreboton: "Subir"
      },
      {
        name: "red",
        abrir: "blue",
        nombreboton: "Subir"
      },
      {
        name: "red",
        abrir: "blue",
        nombreboton: "Subir"
      },
      {
        name: "red",
        abrir: "blue",
        nombreboton: "Subir"
      }
    ],
    dialog: false,
    dialog1: false,
    idimage: 0,
    length: 1,
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
    csrf: document
      .querySelector('meta[name="csrf-token"]')
      .getAttribute("content"),
    Banco: [
      {
        text: "BBVA"
      },
      {
        text: "Scotiabank"
      },
      {
        text: "BCP"
      },
      {
        text: "Interbank"
      },
      {
        text: "Efectivo"
      }
    ]
  }),
  watch: {
    menu(val) {
      val && this.$nextTick(() => (this.$refs.picker.activePicker = "YEAR"));
    },
    menu1(val) {
      val && this.$nextTick(() => (this.$refs.picker1.activePicker = "YEAR"));
    }
  },
  methods: {
      getafiliados () {
          axios
          .get(`/v1.0/afiliados/1`)
          .then(response => {
              console.log(response.data);
              this.jsonafiliados = response.data;
          })
          .catch(err => {
              console.log(err);
          })
      },
    fotoperfil(archivo) {
      this.image = archivo;
    },
    fotodni(archivo) {
      this.fotoDni = archivo;
    },
    validateData(e) {
      let input = e.target,
        expression;
      if (input.pattern) {
        let regex = new RegExp(input.pattern);
        expression = !regex.exec(input.value);
      } else {
        expression = !input.value;
      }
      if (expression) {
        this.message[input.name] = `Dato incorrecto, ${input.title}`;
      } else {
        this.message[input.name] = "";
      }
    },
    save(date) {
      this.$refs.menu.save(date);
    },
    save1(date) {
      this.$refs.menu1.save(date);
    },
    sendForm(e) {
      axios
        .post("/v1.0/afiliado", {
          apellidoPaterno: this.apellidoPaterno,
          apellidoMaterno: this.apellidoMaterno,
          nombres: this.nombres,
          dni: this.dni,
          image: this.image,
          fechaNacimiento: this.date,
          correo: this.correo,
          celular: this.celular,
          direccion: this.direccion,
          ciudad: this.ciudad,
          cci: this.cci,
          banco: this.banco,
          nombreTitularCuenta: this.nombreTitularCuenta,
          fotoDni: this.fotoDni,
          comentariosAdicionales: this.comentariosAdicionales,
          _token: this.csrf
        })
        .then(response => {
          console.log(response.data);
          window.location.href = "/afiliado";
        })
        .catch(error => {
          console.log(error);
          alert("Se genero error al guardar afiliado, intentelo mas tarde");
          // alert("Surgio un error, verifique los campos e intente nuevamente..!!");
        });
    },
    cancelar() {
      window.location.href = "/afiliado";
    }
  },
mounted () {
    this.getafiliados()
}
};
</script>