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
    <v-snackbar
      v-model="snackbar"
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
    <form id="ContactForm" method="post" @submit.prevent="sendForm()">
      <v-container grid-list-xl="grid-list-xl">
        <v-layout row="row" wrap="wrap">
          <v-flex lg8="lg8">
            <v-card class="cuerpoautocreate">
              <!-- <v-card hover> -->
              <v-flex class="titulosautocreate">
                <h3>Informacion Basica</h3>
              </v-flex>
              <v-layout row wrap py-4 px-4>
                <v-flex xs12 sm6 md3>
                  <label>Marca</label>
                  <v-autocomplete
                    :items="automarca"
                    item-text="name"
                    item-value="name"
                    v-model="marca"
                    name="marca"
                    required="required"
                    placeholder="Select..."
                  ></v-autocomplete>
                </v-flex>

                <v-flex xs12 sm6 md3>
                  <label>Placa</label>
                  <v-text-field
                    maxlength="6"
                    minlength="6"
                    v-model="placa"
                    required="required"
                    title="ABC123"
                  ></v-text-field>
                </v-flex>

                <v-flex xs12 sm6 md3>
                  <label>Modelo</label>
                  <v-autocomplete
                    :items="automodelo"
                    item-text="name"
                    item-value="name"
                    v-model="modelo"
                    required="required"
                    placeholder="Select..."
                  ></v-autocomplete>
                </v-flex>

                <v-flex xs12 sm6 md3>
                  <label>Color</label>
                  <v-autocomplete
                    @click:append-outer="dialog = true"
                    append-outer-icon="add"
                    :items="colores"
                    item-text="name"
                    item-value="name"
                    v-model="color"
                    placeholder="Select..."
                    required
                  ></v-autocomplete>
                </v-flex>

                <v-flex xs12 sm6 md3>
                  <label>Año</label>
                  <v-autocomplete
                    :items="autoanio"
                    item-text="name"
                    item-value="name"
                    v-model="anio"
                    required="required"
                  ></v-autocomplete>
                </v-flex>

                <v-flex xs12 sm6 md3>
                  <label>Combustible</label>
                  <v-autocomplete
                    :items="autocombustible"
                    item-text="name"
                    item-value="name"
                    v-model="combustible"
                    required="required"
                  ></v-autocomplete>
                </v-flex>

                <v-flex xs12 sm6 md3>
                  <label>Transmicion</label>
                  <v-autocomplete
                    required="required"
                    v-model="transmicion"
                    :items="autotransmicion"
                  ></v-autocomplete>
                </v-flex>

                <v-flex xs12 sm6 md3>
                  <label>Cilindrada</label>
                  <v-text-field maxlength="10" v-model="cilindrada" required="required"></v-text-field>
                </v-flex>

                <v-flex xs12 sm6 md3>
                  <label>Carroceria</label>
                  <v-autocomplete
                    :items="carrocerias"
                    item-text="name"
                    item-value="name"
                    v-model="carroceria"
                    required="required"
                  ></v-autocomplete>
                </v-flex>

                <v-flex xs12 sm6 md3>
                  <label>N° de Motor</label>
                  <v-text-field maxlength="10" v-model="numeromotor" required="required"></v-text-field>
                </v-flex>

                <v-flex xs12 sm6 md3>
                  <label>N° de Serie</label>
                  <v-text-field maxlength="10" v-model="numeroserie" required="required"></v-text-field>
                </v-flex>

                <v-flex xs12 sm6 md3>
                  <label>Kilometraje Inicial</label>
                  <v-text-field maxlength="10" v-model="km_inicial" required="required"></v-text-field>
                </v-flex>

                <v-flex xs12 sm6 md3>
                  <label>Airbag</label>
                  <v-switch
                    v-model="airbag"
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
                    v-model="silla_bebe"
                    :value="silla_bebe"
                    true-value="1"
                    false-value="0"
                    label="Silla Bebe"
                    color="success"
                    hide-details="hide-details"
                  ></v-switch>
                </v-flex>

                <v-flex xs12 sm6 md3>
                  <label>Galones</label>
                  <v-text-field maxlength="10" v-model="galones" required="required"></v-text-field>
                </v-flex>
              </v-layout>
              <!-- <v-flex text-lg-center lg12> <v-btn color="success">Guardar</v-btn> <v-btn color="error">Cancelar</v-btn> </v-flex> -->
            </v-card>
          </v-flex>

          <v-flex lg4="lg4">
            <template>
              <div style="border-radius: 10px 10px 10px 10px;" class>
                <div class>
                  <img height="250px" :src="files[0].url" @click="uploadImage(0)">
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
            <!-- </v-layout> -->
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
              <v-layout row wrap py-4 px-4>
                <v-flex xs12 sm6 md3>
                  <label>Pago Afiliado Mensual</label>
                  <v-text-field maxlength="10" v-model="pago_afi_men" required="required"></v-text-field>
                </v-flex>

                <v-flex xs12 sm6 md3>
                  <label>Garantia</label>
                  <v-text-field maxlength="10" v-model="garantia" required="required"></v-text-field>
                </v-flex>

                <v-flex xs12 sm6 md3>
                  <label>Tipo de Garantia</label>
                  <v-autocomplete
                    :items="autotipogarantia"
                    item-text="name"
                    item-value="name"
                    v-model="tipo_garantia"
                    required="required"
                  ></v-autocomplete>
                </v-flex>

                <v-flex xs12 sm6 md3>
                  <label>Precio por dia</label>
                  <v-text-field maxlength="10" v-model="precio_por_dia" required="required"></v-text-field>
                </v-flex>

                <v-flex lg3="lg3">
                  <v-menu
                    :close-on-content-click="false"
                    v-model="menu2"
                    :nudge-right="40"
                    lazy="lazy"
                    transition="scale-transition"
                    offset-y="offset-y"
                    full-width="full-width"
                    min-width="290px"
                  >
                    <v-text-field
                      slot="activator"
                      v-model="fechadepago"
                      label="Fecha de Pago"
                      prepend-icon="event"
                      readonly="readonly"
                    ></v-text-field>
                    <v-date-picker v-model="fechadepago" @input="menu2 = false"></v-date-picker>
                  </v-menu>
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
                    v-model="menu1"
                    :nudge-right="40"
                    lazy="lazy"
                    transition="scale-transition"
                    offset-y="offset-y"
                    full-width="full-width"
                    min-width="290px"
                  >
                    <v-text-field
                      slot="activator"
                      v-model="renovacion_soat"
                      label="Renovacion de SOAT"
                      prepend-icon="event"
                      readonly="readonly"
                    ></v-text-field>
                    <v-date-picker v-model="renovacion_soat" @input="menu1 = false"></v-date-picker>
                  </v-menu>
                </v-flex>

                <v-flex lg3="lg3">
                  <v-menu
                    :close-on-content-click="false"
                    v-model="menu3"
                    :nudge-right="40"
                    lazy="lazy"
                    transition="scale-transition"
                    offset-y="offset-y"
                    full-width="full-width"
                    min-width="290px"
                  >
                    <v-text-field
                      slot="activator"
                      v-model="gps"
                      label="GPS"
                      prepend-icon="event"
                      readonly="readonly"
                    ></v-text-field>
                    <v-date-picker v-model="gps" @input="menu3 = false"></v-date-picker>
                  </v-menu>
                </v-flex>

                <v-flex lg3="lg3">
                  <v-menu
                    :close-on-content-click="false"
                    v-model="menu4"
                    :nudge-right="40"
                    lazy="lazy"
                    transition="scale-transition"
                    offset-y="offset-y"
                    full-width="full-width"
                    min-width="290px"
                  >
                    <v-text-field
                      slot="activator"
                      v-model="inspec_tecnica"
                      label="Inspeccion Tecnica"
                      prepend-icon="event"
                      readonly="readonly"
                    ></v-text-field>
                    <v-date-picker v-model="inspec_tecnica" @input="menu4 = false"></v-date-picker>
                  </v-menu>
                </v-flex>

                <v-flex lg3="lg3">
                  <v-menu
                    :close-on-content-click="false"
                    v-model="menu5"
                    :nudge-right="40"
                    lazy="lazy"
                    transition="scale-transition"
                    offset-y="offset-y"
                    full-width="full-width"
                    min-width="290px"
                  >
                    <v-text-field
                      slot="activator"
                      v-model="poliza_de_seguro"
                      label="Poliza de seguros"
                      prepend-icon="event"
                      readonly="readonly"
                    ></v-text-field>
                    <v-date-picker v-model="poliza_de_seguro" @input="menu5 = false"></v-date-picker>
                  </v-menu>
                </v-flex>

                <v-flex lg3="lg3">
                  <label for>Contrato</label>
                  <v-btn
                    :color="colorboton[4].name"
                    class="white--text"
                    @click="loader = 'loading3', uploadImage(4)"
                  >
                    {{ namecontrato }}
                    <v-icon right dark>cloud_upload</v-icon>
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
                    {{ namecontrato }}
                    <v-icon right dark>cloud_upload</v-icon>
                  </v-btn>
                  <template>
                    <div style="border-radius: 10px 10px 10px 10px;" class>
                      <!-- <div class>
                        <img height="200px" :src="files[1].url" @click="uploadImage(1)">
                      </div>-->
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
                    {{ namecontrato }}
                    <v-icon right dark>cloud_upload</v-icon>
                  </v-btn>
                  <template>
                    <div style="border-radius: 10px 10px 10px 10px;" class>
                      <!-- <div class>
                        <img height="200px" :src="files[2].url" @click="uploadImage(2)">
                      </div>-->
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
                    {{ namecontrato }}
                    <v-icon right dark>cloud_upload</v-icon>
                  </v-btn>
                  <template>
                    <div style="border-radius: 10px 10px 10px 10px;" class>
                      <!-- <div class>
                        <img height="200px" :src="files[3].url" @click="uploadImage(3)">
                      </div>-->
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

            <v-textarea outline v-model="comentarios" label></v-textarea>
          </v-flex>
        </v-layout>
      </v-container>

      <v-flex text-lg-center="text-lg-center" lg12="lg12">
        <v-btn type="submit" color="success">Guardar</v-btn>
        <v-btn color="error">Cancelar</v-btn>
      </v-flex>
    </form>
    <!-- <pre>{{ $data }}</pre> -->
  </div>
</template>

<script>
import Color from "./color.json";
export default {
  data: () => ({
    nuevocolor: "",
    colorboton: [
      {
        name: "red"
      },
      {
        name: "red"
      },
      {
        name: "red"
      },
      {
        name: "red"
      },
      {
        name: "red"
      }
    ],
    namecontrato: "Subir",
    dialog: false,
    length: 1,
    idimage: 0,
    files: [
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
      },
      {
        id: 5,
        url: "/img/placeholder-image.png",
        fileUpload: "/img/placeholder-image.png"
      }
    ],
    colores: {},
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
    automarca: {},
    automodelo: {},
    autoanio: {},
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
    autooctanaje: [
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
    addColor() {
      console.log("Se agrego el color");
      const color = this.nuevocolor;
      if (color == " ") {
        alert("Campo color no puede estar vacio");
      } else {
        axios
          .post("/color", { name: color })
          .then(response => {
            this.getJsonFile();
            alert("Seguardo correcta,met");
            this.dialog = false;
          })
          .cash(err => {
            console.log(err);
          });
      }
    },
    getJsonFile() {
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
            (this.colorboton[idI].name = "green"),
              (this.namecontrato = "Listo");
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
    sendForm(e) {
      if (
        this.renovacion_soat == "" ||
        this.gps == "" ||
        this.inspec_tecnica == "" ||
        this.poliza_de_seguro == ""
      ) {
        this.alerta("las fehas no pueden estar vacias", "red");
        this.snackbar = true;
      } else {
        axios
          .post("/v1.0/auto", {
            marca: this.marca,
            modelo: this.modelo,
            placa: this.placa,
            color: this.color,
            anio: this.anio,
            combustible: this.combustible,
            transmicion: this.transmicion,
            cilindrada: this.cilindrada,
            km_inicial: this.km_inicial,
            airbag: this.airbag,
            silla_bebe: this.silla_bebe,
            galones: this.galones,
            luna_polar: this.luna_polar,
            octanaje: this.octanaje,
            pago_afi_men: this.pago_afi_men,
            precio_por_dia: this.precio_por_dia,
            garantia: this.garantia,
            tipo_garantia: this.tipo_garantia,
            contrato: this.files[4].fileUpload,
            renovacion_soat: this.renovacion_soat,
            lunas_polari: this.lunas_polari,
            gps: this.gps,
            inspec_tecnica: this.inspec_tecnica,
            poliza_de_seguro: this.poliza_de_seguro,
            imagen1: this.files[0].fileUpload,
            imagen2: this.files[1].fileUpload,
            imagen3: this.files[2].fileUpload,
            imagen4: this.files[3].fileUpload,
            comentarios: this.comentarios,
            fechainicioauto: new Date().toISOString().substr(0, 10),
            fechafinauto: new Date().toISOString().substr(0, 10),
            fechadepago: this.fechadepago,
            estado: this.estado,
            disponible: this.disponible,
            carroceria: this.carroceria,
            numeromotor: this.numeromotor,
            numeroserie: this.numeroserie
          })
          .then(response => {
            console.log(response);
            window.location.href = "/auto";
          })
          .catch(error => {
            console.log(error);
            this.alerta("Surgio un error al guardar tu auto", "red");
            this.snackbar = true;
            // alert("Surgio un error al guardar tu auto");
          });
      }
    },
    cancelar() {
      window.location.href = "/auto";
    }
  },
  mounted() {
    this.getanios();
    this.getmarcas();
    this.getmodelos();
    this.getJsonFile();
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
