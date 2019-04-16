<style>
input:-webkit-autofill,
input:-webkit-autofill:hover,
input:-webkit-autofill:focus textarea:-webkit-autofill,
textarea:-webkit-autofill:hover textarea:-webkit-autofill:focus,
select:-webkit-autofill,
select:-webkit-autofill:hover,
select:-webkit-autofill:focus {
  /*border: 1px solid #d2d2d2;*/
  -webkit-text-fill-color: 1px #fafafa;
  -webkit-box-shadow: 0 0 0px 1000px #fafafa inset;
  transition: background-color 5000s ease-in-out 0s;
  /* -webkit-text-fill-color: 1px #606060;
  -webkit-box-shadow: 0 0 0px 1000px #d2d2d2 inset;
  transition: background-color 5000s ease-in-out 0s; */
}
</style>

<template>
  <div>
    <v-layout row justify-center>
      <v-dialog class="px-3 py-3" v-model="dialog" max-width="290">
        <v-card>
          <v-card-title class>Agregar Color</v-card-title>
          <v-text-field class="px-3 py-3" name="name" label="Nuevo Color" v-model="nuevocolor"></v-text-field>
          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn color="red darken-1" flat="flat" @click="dialog = false">Cancelar</v-btn>
            <v-btn color="green darken-1" flat="flat" @click="addColor()">Guardar</v-btn>
          </v-card-actions>
        </v-card>
      </v-dialog>
    </v-layout>

    <v-layout row justify-center>
      <v-dialog class="px-3 py-3" v-model="dialog1" max-width="300">
        <v-card class="text-lg-center">
          <v-card-title class>Archivo</v-card-title>
          <img height="250px" :src="veraarchivo">
          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn color="red darken-1" flat="flat" @click="dialog1 = false">Salir</v-btn>
            <!-- <v-btn color="green darken-1" flat="flat" @click="addColor()">Guardar</v-btn> -->
          </v-card-actions>
        </v-card>
      </v-dialog>
    </v-layout>

    <v-snackbar
      v-model="autoedit.snackbar"
      :bottom="y === 'bottom'"
      :left="x === 'left'"
      :multi-line="mode === 'multi-line'"
      :right="x === 'right'"
      :timeout="timeout"
      :top="y === 'top'"
      :vertical="mode === 'vertical'"
      :color="colorsnackbar"
    >
      {{ texto }}
      <v-btn color="white" flat="flat" @click="snackbar = false">Close</v-btn>
    </v-snackbar>
    <form id="ContactForm" method="post" @submit.prevent="update()">
      <v-container grid-list-xl="grid-list-xl">
        <v-layout row="row" wrap="wrap">
          <v-flex lg8="lg8">
            <v-card class="cuerpoautocreate">
              <!-- <v-card hover> -->
              <v-flex class="titulosautocreate">
                <h3>Informacion Basica</h3>
              </v-flex>

              <!-- </v-card> -->
              <!-- <v-layout align-center="align-center" justify="justify" row="row" wrap="wrap" fill-height="fill-height"> -->
              <v-layout row wrap py-4 px-4>
                <v-flex xs12 sm6 md3>
                  <label>Marca</label>
                  <v-autocomplete
                    :items="automarca"
                    item-text="name"
                    item-value="name"
                    v-model="autoedit.marca"
                    name="marca"
                    required="required"
                  ></v-autocomplete>
                </v-flex>

                <v-flex xs12 sm6 md3>
                  <label>Placa</label>
                  <v-text-field
                    maxlength="6"
                    minlength="6"
                    v-model="autoedit.placa"
                    required="required"
                    title="ABC123"
                  ></v-text-field>
                </v-flex>

                <v-flex xs12 sm6 md3>
                  <label>Modelo</label>
                  <!-- <v-autocomplete
                    :items="automodelo"
                    item-text="name"
                    item-value="name"
                    v-model="autoedit.modelo"
                    required="required"
                  ></v-autocomplete> -->
                  <v-text-field maxlength="10" v-model="autoedit.modelo" required="required"></v-text-field>
                </v-flex>

                <v-flex xs12 sm6 md3>
                  <label>Color</label>
                  <v-autocomplete
                    @click:append-outer="dialog = true"
                    append-outer-icon="add"
                    :items="colores"
                    item-text="name"
                    item-value="name"
                    v-model="autoedit.color"
                    placeholder="Select..."
                    required="required"
                  ></v-autocomplete>
                </v-flex>

                <v-flex xs12 sm6 md3>
                  <label>Año</label>
                  <v-autocomplete
                    :items="autoanio"
                    item-text="name"
                    item-value="name"
                    v-model="autoedit.anio"
                    required="required"
                  ></v-autocomplete>
                </v-flex>

                <v-flex xs12 sm6 md3>
                  <label>Combustible</label>
                  <v-autocomplete
                    :items="autocombustible"
                    item-text="name"
                    item-value="name"
                    v-model="autoedit.combustible"
                    required="required"
                  ></v-autocomplete>
                </v-flex>

                <v-flex xs12 sm6 md3>
                  <label>Transmicion</label>
                  <v-autocomplete
                    required="required"
                    v-model="autoedit.transmicion"
                    :items="autotransmicion"
                  ></v-autocomplete>
                </v-flex>

                <!-- <v-flex xs12 sm6 md3>
                  <label>Cilindrada</label>
                  <v-text-field maxlength="10" v-model="autoedit.cilindrada" required="required"></v-text-field>
                </v-flex> -->

                <v-flex xs12 sm6 md3>
                  <label>Carroceria</label>
                  <v-autocomplete
                    :items="carrocerias"
                    item-text="name"
                    item-value="name"
                    v-model="autoedit.carroceria"
                    required="required"
                  ></v-autocomplete>
                </v-flex>

                <v-flex xs12 sm6 md3>
                  <label>N° de Motor</label>
                  <v-text-field maxlength="10" v-model="autoedit.numeromotor" required="required"></v-text-field>
                </v-flex>

                <v-flex xs12 sm6 md3>
                  <label>N° de Serie</label>
                  <v-text-field maxlength="10" v-model="autoedit.numeroserie" required="required"></v-text-field>
                </v-flex>

                <v-flex xs12 sm6 md3>
                  <label>Kilometraje Inicial</label>
                  <v-text-field maxlength="10" v-model="autoedit.km_inicial" required="required"></v-text-field>
                </v-flex>

                <v-flex xs12 sm6 md3>
                  <label>Airbag</label>
                  <v-switch
                    v-model="autoedit.airbag"
                    true-value="1"
                    false-value="0"
                    label="Airbag"
                    color="success"
                    hide-details="hide-details"
                  ></v-switch>
                </v-flex>

                <v-flex xs12 sm6 md3>
                  <label>Silla de bebe</label>
                  <v-switch
                    v-model="autoedit.silla_bebe"
                    :value="silla_bebe"
                    true-value="1"
                    false-value="0"
                    label="Silla Bebe"
                    color="success"
                    hide-details="hide-details"
                  ></v-switch>
                </v-flex>

                <!-- <v-flex xs12 sm6 md3>
                  <label>Galones</label>
                  <v-text-field maxlength="10" v-model="autoedit.galones" required="required"></v-text-field>
                </v-flex> -->
              </v-layout>
            </v-card>
          </v-flex>

          <v-flex lg4="lg4">
            <template>
              <div style="border-radius: 10px 10px 10px 10px;" class>
                <div class>
                  <img height="200px" :src="files[0].url" @click="uploadImage(0)">
                </div>
              </div>
            </template>
            <input
              type="file"
              multiple
              accpet
              ref="uploadFileReference"
              @change="uploadFileReference"
            >
          </v-flex>
        </v-layout>
      </v-container>

      <v-container grid-list-xl="grid-list-xl">
        <v-layout row="row" wrap="wrap">
          <v-flex lg12="lg12">
            <v-card class="cuerpoautocreate">
              <!-- <v-card hover="hover"> -->
              <v-flex class="titulosautocreate">
                <h3>Informacion Financiera</h3>
              </v-flex>
              <!-- </v-card> -->
              <!-- <v-layout align-center="align-center" justify="justify" row="row" wrap="wrap" fill-height="fill-height"> -->
              <v-layout row wrap py-4 px-4>
                <v-flex xs12 sm6 md3>
                  <label>Pago Afiliado Mensual</label>
                  <v-text-field maxlength="10" v-model="autoedit.pago_afi_men" required="required"></v-text-field>
                </v-flex>

                <v-flex xs12 sm6 md3>
                  <label>Garantia</label>
                  <v-text-field maxlength="10" v-model="autoedit.garantia" required="required"></v-text-field>
                </v-flex>

                <v-flex xs12 sm6 md3>
                  <label>Tipo de Garantia</label>
                  <v-autocomplete
                    :items="autotipogarantia"
                    item-text="name"
                    item-value="name"
                    v-model="autoedit.tipo_garantia"
                    required="required"
                  ></v-autocomplete>
                </v-flex>

                <v-flex xs12 sm6 md3>
                  <label>Precio por dia</label>
                  <v-text-field
                    maxlength="10"
                    v-model="autoedit.precio_por_dia"
                    required="required"
                  ></v-text-field>
                </v-flex>

                <v-flex lg3="lg3">
                  <label>Fecha de Pago</label>
                  <v-menu
                    :close-on-content-click="false"
                    v-model="autoedit.menu2"
                    :nudge-right="40"
                    lazy="lazy"
                    transition="scale-transition"
                    offset-y="offset-y"
                    full-width="full-width"
                    min-width="290px"
                  >
                    <v-text-field
                      slot="activator"
                      v-model="autoedit.fechadepago"
                      prepend-icon="event"
                      readonly="readonly"
                    ></v-text-field>
                    <v-date-picker v-model="autoedit.fechadepago" @input="menu2 = false"></v-date-picker>
                  </v-menu>
                </v-flex>
                <v-flex xs12 sm6 md3>
                  <label>Asignar Afiliado</label>
                  <v-autocomplete
                    :items="afiliados"
                    item-text="nombres"
                    item-value="id"
                    v-model="afiliadoid"
                  ></v-autocomplete>
                </v-flex>
              </v-layout>
              <!-- <v-flex text-lg-center lg12> <v-btn color="success">Guardar</v-btn> <v-btn color="error">Cancelar</v-btn> </v-flex> -->
            </v-card>
          </v-flex>
        </v-layout>
      </v-container>

      <v-container grid-list-xl="grid-list-xl" text-xs-center="text-xs-center">
        <v-layout row="row" wrap="wrap">
          <v-flex lg12="lg12">
            <v-card class="cuerpoautocreate">
              <v-flex class="titulosautocreate">
                <h3>Registros de documentos</h3>
              </v-flex>

              <v-layout row wrap py-4 px-4>
                <v-flex lg3="lg3">
                  <v-menu
                    :close-on-content-click="false"
                    v-model="autoedit.menu1"
                    :nudge-right="40"
                    lazy="lazy"
                    transition="scale-transition"
                    offset-y="offset-y"
                    full-width="full-width"
                    min-width="290px"
                  >
                    <v-text-field
                      slot="activator"
                      v-model="autoedit.renovacion_soat"
                      label="Renovacion de SOAT"
                      prepend-icon="event"
                      readonly="readonly"
                    ></v-text-field>
                    <v-date-picker v-model="autoedit.renovacion_soat" @input="menu1 = false"></v-date-picker>
                  </v-menu>
                </v-flex>

                <v-flex lg3="lg3">
                  <v-menu
                    :close-on-content-click="false"
                    v-model="autoedit.menu3"
                    :nudge-right="40"
                    lazy="lazy"
                    transition="scale-transition"
                    offset-y="offset-y"
                    full-width="full-width"
                    min-width="290px"
                  >
                    <v-text-field
                      slot="activator"
                      v-model="autoedit.gps"
                      label="GPS"
                      prepend-icon="event"
                      readonly="readonly"
                    ></v-text-field>
                    <v-date-picker v-model="autoedit.gps" @input="menu3 = false"></v-date-picker>
                  </v-menu>
                </v-flex>

                <v-flex lg3="lg3">
                  <v-menu
                    :close-on-content-click="false"
                    v-model="autoedit.menu4"
                    :nudge-right="40"
                    lazy="lazy"
                    transition="scale-transition"
                    offset-y="offset-y"
                    full-width="full-width"
                    min-width="290px"
                  >
                    <v-text-field
                      slot="activator"
                      v-model="autoedit.inspec_tecnica"
                      label="Inspeccion Tecnica"
                      prepend-icon="event"
                      readonly="readonly"
                    ></v-text-field>
                    <v-date-picker v-model="autoedit.inspec_tecnica" @input="menu4 = false"></v-date-picker>
                  </v-menu>
                </v-flex>

                <v-flex lg3="lg3">
                  <v-menu
                    :close-on-content-click="false"
                    v-model="autoedit.menu5"
                    :nudge-right="40"
                    lazy="lazy"
                    transition="scale-transition"
                    offset-y="offset-y"
                    full-width="full-width"
                    min-width="290px"
                  >
                    <v-text-field
                      slot="activator"
                      v-model="autoedit.poliza_de_seguro"
                      label="Poliza de seguros"
                      prepend-icon="event"
                      readonly="readonly"
                    ></v-text-field>
                    <v-date-picker v-model="autoedit.poliza_de_seguro" @input="menu5 = false"></v-date-picker>
                  </v-menu>
                </v-flex>

                <v-flex lg4="lg4">
                  <label for>Contrato</label>
                  <v-btn
                    :color="colorboton[4].name"
                    class="white--text"
                    @click="loader = 'loading3', uploadImage(4)"
                  >
                    {{ colorboton[4].nombreboton }}
                    <v-icon right dark>cloud_upload</v-icon>
                  </v-btn>
                  <v-btn
                    :color="colorboton[4].abrir"
                    class="white--text"
                    @click="loader = 'loading3', descargar(4)"
                  >
                    {{ abrirarchivos }}
                    <!-- <v-icon right dark>cloud_upload</v-icon> -->
                  </v-btn>
                  <template>
                    <div style="border-radius: 10px 10px 10px 10px;" class></div>
                  </template>
                  <input
                    type="file"
                    multiple
                    accpet
                    ref="uploadFileReference"
                    @change="uploadFileReference"
                  >
                </v-flex>
              </v-layout>
              <!-- <v-flex text-lg-center lg12> <v-btn color="success">Guardar</v-btn> <v-btn color="error">Cancelar</v-btn> </v-flex> -->
            </v-card>
          </v-flex>
        </v-layout>
      </v-container>

      <v-container grid-list-xl="grid-list-xl" text-xs-center="text-xs-center">
        <v-layout row="row" wrap="wrap">
          <v-flex lg12="lg12">
            <v-card class="cuerpoautocreate">
              <v-flex class="titulosautocreate">
                <h3>Imagenes</h3>
              </v-flex>

              <v-layout
                align-center="align-center"
                justify="justify"
                row="row"
                wrap="wrap"
                fill-height="fill-height"
                py-2
                px-2
              >
                <v-flex lg4="lg4">
                  <label for>Tarjeta</label>
                  <v-btn
                    :color="colorboton[1].name"
                    class="white--text"
                    @click="loader = 'loading3', uploadImage(1)"
                  >
                    {{ colorboton[1].nombreboton }}
                    <v-icon right dark>cloud_upload</v-icon>
                  </v-btn>
                  <v-btn
                    :color="colorboton[1].abrir"
                    class="white--text"
                    @click="loader = 'loading3', verImagen(1)"
                  >
                    {{ abrirarchivos }}
                    <!-- <v-icon right dark>cloud_upload</v-icon> -->
                  </v-btn>
                  <template>
                    <div style="border-radius: 10px 10px 10px 10px;" class>
                      <!-- <div class>
                        <img height="200px" :src="files[1].url" @click="uploadImage(1)">
                      </div> -->
                    </div>
                  </template>
                  <input
                    type="file"
                    multiple
                    accpet
                    ref="uploadFileReference"
                    @change="uploadFileReference"
                  >
                </v-flex>

                <v-flex lg4="lg4">
                  <label for>SOAT</label>
                  <v-btn
                    :color="colorboton[2].name"
                    class="white--text"
                    @click="loader = 'loading3', uploadImage(2)"
                  >
                    {{ colorboton[2].nombreboton }}
                    <v-icon right dark>cloud_upload</v-icon>
                  </v-btn>
                  <v-btn
                    :color="colorboton[4].abrir"
                    class="white--text"
                    @click="loader = 'loading3', verImagen(2)"
                  >
                    {{ abrirarchivos }}
                    <!-- <v-icon right dark>cloud_upload</v-icon> -->
                  </v-btn>
                  <template>
                    <div style="border-radius: 10px 10px 10px 10px;" class>
                      <!-- <div class>
                        <img height="200px" :src="files[2].url" @click="uploadImage(2)">
                      </div> -->
                    </div>
                  </template>
                  <input
                    type="file"
                    multiple
                    accpet
                    ref="uploadFileReference"
                    @change="uploadFileReference"
                  >
                </v-flex>

                <v-flex lg4="lg4">
                  <label for>Lunas</label>
                  <v-btn
                    :color="colorboton[3].name"
                    class="white--text"
                    @click="loader = 'loading3', uploadImage(3)"
                  >
                    {{ colorboton[3].nombreboton }}
                    <v-icon right dark>cloud_upload</v-icon>
                  </v-btn>
                  <v-btn
                    :color="colorboton[4].abrir"
                    class="white--text"
                    @click="loader = 'loading3', verImagen(3)"
                  >
                    {{ abrirarchivos }}
                    <!-- <v-icon right dark>cloud_upload</v-icon> -->
                  </v-btn>
                  <template>
                    <div style="border-radius: 10px 10px 10px 10px;" class>
                      <!-- <div class>
                        <img height="200px" :src="files[3].url" @click="uploadImage(3)">
                      </div> -->
                    </div>
                  </template>
                  <input
                    type="file"
                    multiple
                    accpet
                    ref="uploadFileReference"
                    @change="uploadFileReference"
                  >
                </v-flex>
              </v-layout>
            </v-card>
          </v-flex>
        </v-layout>
      </v-container>

      <br>

      <v-container grid-list-xl="grid-list-xl" text-xs-center="text-xs-center">
        <v-layout
          align-center="align-center"
          justify-center="justify-center"
          row="row"
          wrap="wrap"
          fill-height="fill-height"
        >
          <v-flex text-lg-left="text-lg-left" lg12="lg12">
            <label>Comentarios adicionales</label>

            <v-textarea outline v-model="autoedit.comentarios" label></v-textarea>
          </v-flex>
        </v-layout>
      </v-container>

      <v-flex text-lg-center="text-lg-center" lg12="lg12">
        <v-btn type="submit" color="success">Guardar</v-btn>
        <v-btn color="error">Cancelar</v-btn>
      </v-flex>
    </form>
    <pre>{{ $data }}</pre>
  </div>
</template>

<script>
export default {
  props: ["info"],
  data: () => ({
    afiliados: {},
    afiliadoid: "",
    nuevocolor: "",
    dialog1: false,
    veraarchivo: "",
    abrirarchivos: "Abrir",
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
    length: 1,
    idimage: 0,
    files: [
      {
        id: 0,
        url: "/img/placeholder-image.png",
        fileUpload: "/img/placeholder-image.png"
      },
      {
        id: 1,
        url: "/img/placeholder-image.png",
        fileUpload: "/img/placeholder-image.png"
      },
      {
        id: 2,
        url: "/img/placeholder-image.png",
        fileUpload: "/img/placeholder-image.png"
      },
      {
        id: 3,
        url: "/img/placeholder-image.png",
        fileUpload: "/img/placeholder-image.png"
      },
      {
        id: 4,
        url: "/img/placeholder-image.png",
        fileUpload: "/img/placeholder-image.png"
      }
    ],
    image: {},
    snackbar: false,
    colorsnackbar: "",
    y: "top",
    x: "right",
    mode: "",
    timeout: 6000,
    texto: "",
    auto1: "/img/img_212915.png",
    renovacion_soat: new Date().toISOString().substr(0, 10),
    fechadepago: new Date().toISOString().substr(0, 10),
    gps: new Date().toISOString().substr(0, 10),
    inspec_tecnica: new Date().toISOString().substr(0, 10),
    poliza_de_seguro: new Date().toISOString().substr(0, 10),
    menu1: false,
    menu2: false,
    menu3: false,
    menu4: false,
    menu5: false,
    airbag: 0,
    silla_bebe: 0,
    autoedit: {},
    automarca: {},
    automodelo: {},
    autoanio: {},
    colores: {},
    carrocerias: [
      {
        name: "Sedan"
      },
      {
        name: "Coupe"
      },
      {
        name: "Suv"
      },
      {
        name: "Camioneta"
      }
    ],
    autotipogarantia: [
      {
        name: "Garantia A"
      },
      {
        name: "Garantia B"
      },
      {
        name: "Garantia C"
      }
    ],
    autocombustible: [
      {
        name: "95"
      },
      {
        name: "90"
      }
    ],
    autotransmicion: [
      {
        text: "Manual"
      },
      {
        text: "Automatica"
      }
    ],
    marca: "",
    modelo: "",
    placa: "",
    color: "",
    anio: "",
    combustible: "",
    transmicion: "",
    cilindrada: "",
    km_inicial: "",
    airbag: "",
    silla_bebe: "",
    galones: "",
    luna_polar: "",
    octanaje: "",
    pago_afi_men: "",
    precio_por_dia: "",
    garantia: "",
    tipo_garantia: "",
    contrato: "",
    renovacion_soat: "",
    lunas_polari: "",
    gps: "",
    inspec_tecnica: "",
    poliza_de_seguro: "",
    imagen1: "/img/img_212915.png",
    imagen2: false,
    imagen3: false,
    imagen4: false,
    comentarios: "",
    fechainicioauto: "",
    fechafinauto: "",
    fechadepago: "",
    carroceria: "",
    numeromotor: "",
    numeroserie: "",
    estado: 0,
    disponible: 1,
    csrf: document
      .querySelector('meta[name="csrf-token"]')
      .getAttribute("content")
  }),
  methods: {
    getAfiliados (){
      console.log("aasdadasdasdasdasdasdas");
      console.log(this.afiliadoid);
      console.log(this.autoedit.afiliado_id);
      this.afiliadoid = this.autoedit.afiliado_id;
      axios
      .get(`/v1.0/afiliados`)
      .then(response => {
        console.log(response.data.afiliados);
        this.afiliados = response.data.afiliados;
      })
      .catch(err => {
        console.log(err);
      })
    },
    descargar (archivo) {
      var pdf_descargar = this.files[archivo].fileUpload;
      var pdf_lista = pdf_descargar.slice(8);
      window.open(`/download/${pdf_lista}`, '_blank');     
    },
    verImagen(imagen) {
      this.dialog1 = true
      this.veraarchivo = this.files[imagen].fileUpload
    },
    addColor() {
      console.log("Se agrego el color");
      const color = this.nuevocolor;
      if (color == " ") {
        alert("Campo color no puede estar vacio");
      } else {
        axios
          .post("/color", { name: color })
          .then(response => {
            this.getColor();
            this.dialog = false;
          })
          .cash(err => {
            console.log(err);
          });
      }
    },
    getColor() {
      // this.colores = require(`./color.json`);
      axios
        .get("/color")
        .then(response => {
          this.colores = response.data;
        })
        .catch(error => {
          console.log(error);
        });
    },
    getAutoEdit() {
      console.log("AUI DEbw venir");
      axios({   
        method: "get",
        url: `/v1.0/auto/${this.info}`
      }).then(response => {
        console.log(response.data);
        this.autoedit = response.data;
        this.files[0].url = response.data.imagen1;
        this.files[1].url = response.data.imagen2;
        this.files[2].url = response.data.imagen3;
        this.files[3].url = response.data.imagen4;
        this.files[4].url = response.data.contrato;
        this.files[0].fileUpload = response.data.imagen1;
        this.files[1].fileUpload = response.data.imagen2;
        this.files[2].fileUpload = response.data.imagen3;
        this.files[3].fileUpload = response.data.imagen4;
        this.files[4].fileUpload = response.data.contrato;
      });
    },
    getanios() {
      axios
        .get("/anios")
        .then(response => {
          console.log(response.data);
          this.autoanio = response.data;
        })
        .catch(error => {
          console.log(error);
        });
    },
    getmarcas() {
      axios
        .get("/marcas")
        .then(response => {
          console.log(response.data);
          this.automarca = response.data;
        })
        .catch(error => {
          console.log(error);
        });
    },
    getmodelos() {
      axios
        .get("/modelos")
        .then(response => {
          console.log(response.data);
          this.automodelo = response.data;
        })
        .catch(error => {
          console.log(error);
        });
    },
    uploadImage(idx) {
      this.$refs.uploadFileReference.click();
      this.idimage = idx;
    },
    uploadFileReference(e) {
      let files = e.target.files || e.dataTransfer.files;
      this.length = files.length;
      this.showImage(files);
    },
    showImage(files) {
      const test = Array.from(files).forEach((file, idx) => {
        console.log(idx);
        const fileReader = new FileReader();
        const getResult = new Promise(resolve => {
          fileReader.onload = e => {
            const idI = this.idimage;
            this.files[idI].url = e.target.result;
            this.subirimagen(e.target.result);
            this.alerta("Archivo cargado correctamente.!", "green");
            this.snackbar = true;
            this.colorboton[idI].name = "green",
            this.colorboton[idI].nombreboton = "Listo";
          };
        });

        fileReader.readAsDataURL(file);
        return getResult.then(file => {
          return file;
        });
      });
    },
    subirimagen(image) {
      axios
        .post("/upload", { base64: image })
        .then(response => {
          console.log(response);
          const idI = this.idimage;
          this.files[idI].fileUpload = `/images/${response.data}`;
        })
        .catch(error => {
          console.log(error);
        });
    },
    alerta(msj, color) {
      this.colorsnackbar = color;
      this.texto = msj;
    },
    update() {
      this.autoedit.afiliado_id = this.afiliadoid
      this.autoedit.imagen1 = this.files[0].fileUpload;
      this.autoedit.imagen2 = this.files[1].fileUpload;
      this.autoedit.imagen3 = this.files[2].fileUpload;
      this.autoedit.imagen4 = this.files[3].fileUpload;
      this.autoedit.contrato = this.files[4].fileUpload;
      axios({
        method: "put",
        url: `/v1.0/auto/${this.autoedit.id}`,
        data: this.autoedit
      })
        .then(function(response) {
          // response.data
          console.log(response.data);
          window.location.href = "/auto";
        })
        .catch(error => {
          console.log(error);
          alert("Se genero error al guardar auto, intentelo mas tarde");
          // alert("Surgio un error, verifique los campos e intente nuevamente..!!");
        });
    },
    cancelar() {
      window.location.href = "/auto";
    }
  },
  mounted() {
    this.getanios();
    this.getmarcas();
    this.getmodelos();
    this.getColor();
  },
  created () {
    this.getAutoEdit();
    this.getAfiliados();
  },
  watch: {
    date(val) {
      this.dateFormatted = this.formatDate(this.date);
    }
  }
};
</script>


<style scoped>
input[type="file"] {
  display: none;
}
.img-wrapper {
  display: flex;
  flex: 1 0 100%;
  flex-direction: row;
  align-items: center;
}
.img-container {
  width: 10rem;
  height: 15rem;
}
img {
  max-width: 100%;
}
</style>
