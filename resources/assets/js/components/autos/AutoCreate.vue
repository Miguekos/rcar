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
    <v-snackbar
        v-model="snackbar"
        :bottom="y === 'bottom'"
        :left="x === 'left'"
        :multi-line="mode === 'multi-line'"
        :right="x === 'right'"
        :timeout="timeout"
        :top="y === 'top'"
        :vertical="mode === 'vertical'"
        :color="colorsnackbar">
        {{ texto }}
        <v-btn color="white" flat="flat" @click="snackbar = false">
            Close
        </v-btn>
    </v-snackbar>
    <form id="ContactForm" method="post" @submit.prevent="sendForm()">
        <v-container grid-list-xl="grid-list-xl" text-xs-center="text-xs-center">
            <v-layout row="row" wrap="wrap">
                <v-flex lg12="lg12">
                    <!-- <v-card hover> -->
                    <v-card-text class="text-lg-left">
                        <h3 class="">Informacion Basica</h3>
                    </v-card-text>
                    <!-- </v-card> -->

                    <v-layout align-center="align-center" justify="justify" row="row" wrap="wrap" fill-height="fill-height">

                        <v-flex text-lg-left="text-lg-left" text-xs-left="text-xs-left" lg4="lg4">
                            <label>Marca</label>
                            <v-autocomplete :items="automarca" item-text="text" item-value="text" v-model="marca" name="marca" required="required"></v-autocomplete>
                            <label>Placa</label>
                            <v-text-field maxlength="7" v-model="placa" required="required" pattern="^[A-Z]{3}-[1-9]{3}$" title="ABC-123"></v-text-field>

                        </v-flex>
                        <v-flex text-lg-left="text-lg-left" text-xs-left="text-xs-left" lg4="lg4">
                            <label>Modelo</label>
                            <v-autocomplete :items="automodelo" item-text="text" item-value="text" v-model="modelo" required="required"></v-autocomplete>
                            <label>Color</label>
                            <v-text-field maxlength="10" v-model="color" required="required"></v-text-field>
                        </v-flex>

                        <v-flex text-lg-center="text-lg-center" lg4="lg4">
                            <v-form id="subir" @submit.prevent="subir('photo')">
                            <!-- <v-form id="subir"> -->
                                <input type="hidden" name="MAX_FILE_SIZE" value="2000000"/>
                                <v-text-field required="required" type="file" name="photo" @change="subir('auto1')"></v-text-field>
                                <v-avatar tile="tile" size="70%" color="grey lighten-4">
                                    <img :src="imagen1" alt="avatar"></v-avatar>
                                </V-form>

                                <!-- <image-uploader
                                  :debug="1"
                                  :maxWidth="512"
                                  :quality="0.7"
                                  :autoRotate=true
                                  outputFormat="verbose"
                                  :preview=false
                                  :className="['fileinput', { 'fileinput--loaded' : hasImage }]"
                                  capture="environment"
                                  accept="video/*,image/*"
                                  doNotResize="['gif', 'svg']"
                                  @input="setImage"
                                ></image-uploader> -->

                                  <!-- <image-uploader
                                    :debug="1"
                                    :maxWidth="512"
                                    :quality="0.7"
                                    :autoRotate=true
                                    outputFormat="verbose"
                                    :preview=false
                                    :className="['fileinput', { 'fileinput--loaded' : hasImage }]"
                                    capture="environment"
                                    accept="video/*,image/*"
                                    doNotResize="['gif', 'svg']"
                                    @input="setImage"
                                    @onUpload="startImageResize"
                                    @onComplete="endImageResize"
                                  ></image-uploader> -->
                            </v-flex>

                            <v-flex text-lg-left="text-lg-left" text-xs-left="text-xs-left" lg4="lg4">
                                <label>Año</label>
                                <v-autocomplete :items="autoanio" item-text="text" item-value="text" v-model="anio" required="required"></v-autocomplete>
                            </v-flex>

                            <v-flex text-lg-left="text-lg-left" text-xs-left="text-xs-left" lg4="lg4">
                                <label>Combustible</label>
                                <v-text-field maxlength="10" v-model="combustible" required="required"></v-text-field>
                            </v-flex>

                            <v-flex text-lg-left="text-lg-left" text-xs-left="text-xs-left" lg4="lg4">
                                <label>Transmicion</label>
                                <v-autocomplete required="required" v-model="transmicion" :items="autotransmicion"></v-autocomplete>
                            </v-flex>

                            <v-flex text-lg-left="text-lg-left" text-xs-left="text-xs-left" lg4="lg4">
                                <label>Cilindrada</label>
                                <v-text-field maxlength="10" v-model="cilindrada" required="required"></v-text-field>
                            </v-flex>

                            <v-flex text-lg-left="text-lg-left" text-xs-left="text-xs-left" lg4="lg4">
                                <label>Kilometraje Inicial</label>
                                <v-text-field maxlength="10" v-model="km_inicial" required="required"></v-text-field>
                            </v-flex>

                            <v-flex text-lg-left="text-lg-left" text-xs-left="text-xs-left" lg4="lg4">
                                <label>Octanaje</label>
                                <v-text-field maxlength="10" v-model="octanaje" required="required"></v-text-field>
                            </v-flex>

                            <v-flex text-lg-left="text-lg-left" text-xs-left="text-xs-left" lg4="lg4">
                                <label>Airbag</label>
                                <v-switch v-model="airbag" true-value="1" false-value="0" label="Airbag" color="success" hide-details="hide-details"></v-switch>
                            </v-flex>

                            <v-flex text-lg-left="text-lg-left" text-xs-left="text-xs-left" lg4="lg4">
                                <label>Silla de bebe</label>
                                <v-switch v-model="silla_bebe" :value="silla_bebe" true-value="1" false-value="0" label="Silla Bebe" color="success" hide-details="hide-details"></v-switch>
                            </v-flex>

                            <v-flex text-lg-left="text-lg-left" text-xs-left="text-xs-left" lg4="lg4">
                                <label>Galones</label>
                                <v-text-field maxlength="10" v-model="galones" required="required"></v-text-field>
                            </v-flex>

                        </v-layout>

                        <!-- <v-flex text-lg-center lg12> <v-btn color="success">Guardar</v-btn> <v-btn color="error">Cancelar</v-btn> </v-flex> -->

                    </v-flex>
                </v-layout>
            </v-container>

            <v-container grid-list-xl="grid-list-xl" text-xs-center="text-xs-center">
                <v-layout row="row" wrap="wrap">
                    <v-flex lg12="lg12">
                        <!-- <v-card hover="hover"> -->
                        <v-card-text class="text-lg-left">
                            <h3>Informacion Financiera</h3>
                        </v-card-text>
                        <!-- </v-card> -->

                        <v-layout align-center="align-center" justify="justify" row="row" wrap="wrap" fill-height="fill-height">

                            <v-flex text-lg-left="text-lg-left" text-xs-left="text-xs-left" lg6="lg6">
                                <label>Pago Afiliado Mensual</label>
                                <v-text-field maxlength="10" v-model="pago_afi_men" required="required"></v-text-field>
                                <label>Tipo de Garantia</label>
                                <v-text-field maxlength="10" v-model="tipo_garantia" required="required"></v-text-field>
                            </v-flex>
                            <v-flex text-lg-left="text-lg-left" text-xs-left="text-xs-left" lg6="lg6">
                                <label>Precio por dia</label>
                                <v-text-field maxlength="10" v-model="precio_por_dia" required="required"></v-text-field>
                                <label>Contrato</label>
                                <v-text-field maxlength="20" v-model="contrato" required="required"></v-text-field>
                            </v-flex>

                        </v-layout>

                        <!-- <v-flex text-lg-center lg12> <v-btn color="success">Guardar</v-btn> <v-btn color="error">Cancelar</v-btn> </v-flex> -->

                    </v-flex>
                </v-layout>
            </v-container>

            <v-container grid-list-xl="grid-list-xl" text-xs-center="text-xs-center">
                <v-layout row="row" wrap="wrap">
                    <v-flex lg12="lg12">

                        <v-card-text class="text-lg-left">
                            <h3>Registros de documentos</h3>
                        </v-card-text>

                        <v-layout row="row" wrap="wrap" fill-height="fill-height">

                            <v-flex text-lg-center="text-lg-center" lg3="lg3">

                                <v-menu
                                    :close-on-content-click="false"
                                    v-model="menu1"
                                    :nudge-right="40"
                                    lazy="lazy"
                                    transition="scale-transition"
                                    offset-y="offset-y"
                                    full-width="full-width"
                                    min-width="290px">
                                    <v-text-field slot="activator" v-model="renovacion_soat" label="Renovacion de SOAT" prepend-icon="event" readonly="readonly"></v-text-field>
                                    <v-date-picker v-model="renovacion_soat" @input="menu1 = false"></v-date-picker>
                                </v-menu>

                                <!-- <v-menu ref="menu1" :close-on-content-click="false" v-model="menu1" :nudge-right="40" :return-value.sync="fsoat" lazy="lazy" transition="scale-transition"
                                offset-y="offset-y" full-width="full-width" min-width="290px"> <v-text-field name="renovacion_soat" slot="activator" v-model="fsoat" label="Renovacion de SOAT"
                                prepend-icon="event" readonly="readonly"></v-text-field> <v-date-picker v-model="fsoat" no-title="no-title" scrollable="scrollable"> <v-spacer></v-spacer>
                                <v-btn flat="flat" color="primary" @click="menu1 = false">Cancel</v-btn> <v-btn flat="flat" color="primary" @click="$refs.menu.save(fsoat)">OK</v-btn>
                                </v-date-picker> </v-menu> -->

                            </v-flex>

                            <v-flex text-lg-center="text-lg-center" lg3="lg3">
                                <v-menu
                                    :close-on-content-click="false"
                                    v-model="menu2"
                                    :nudge-right="40"
                                    lazy="lazy"
                                    transition="scale-transition"
                                    offset-y="offset-y"
                                    full-width="full-width"
                                    min-width="290px">
                                    <v-text-field slot="activator" v-model="lunas_polari" label="Lunas Polariza" prepend-icon="event" readonly="readonly"></v-text-field>
                                    <v-date-picker v-model="lunas_polari" @input="menu2 = false"></v-date-picker>
                                </v-menu>

                            </v-flex>

                            <v-flex text-lg-center="text-lg-center" lg3="lg3">

                                <v-menu
                                    :close-on-content-click="false"
                                    v-model="menu3"
                                    :nudge-right="40"
                                    lazy="lazy"
                                    transition="scale-transition"
                                    offset-y="offset-y"
                                    full-width="full-width"
                                    min-width="290px">
                                    <v-text-field slot="activator" v-model="gps" label="GPS" prepend-icon="event" readonly="readonly"></v-text-field>
                                    <v-date-picker v-model="gps" @input="menu3 = false"></v-date-picker>
                                </v-menu>
                            </v-flex>

                            <v-flex text-lg-center="text-lg-center" lg4="lg4">
                                <v-menu
                                    :close-on-content-click="false"
                                    v-model="menu4"
                                    :nudge-right="40"
                                    lazy="lazy"
                                    transition="scale-transition"
                                    offset-y="offset-y"
                                    full-width="full-width"
                                    min-width="290px">
                                    <v-text-field slot="activator" v-model="inspec_tecnica" label="Inspeccion Tecnica" prepend-icon="event" readonly="readonly"></v-text-field>
                                    <v-date-picker v-model="inspec_tecnica" @input="menu4 = false"></v-date-picker>
                                </v-menu>

                            </v-flex>

                            <v-flex text-lg-center="text-lg-center" lg4="lg4">
                                <v-menu
                                    :close-on-content-click="false"
                                    v-model="menu5"
                                    :nudge-right="40"
                                    lazy="lazy"
                                    transition="scale-transition"
                                    offset-y="offset-y"
                                    full-width="full-width"
                                    min-width="290px">
                                    <v-text-field slot="activator" v-model="poliza_de_seguro" label="Poliza de seguros" prepend-icon="event" readonly="readonly"></v-text-field>
                                    <v-date-picker v-model="poliza_de_seguro" @input="menu5 = false"></v-date-picker>
                                </v-menu>

                            </v-flex>
                        </v-layout>
                        <!-- <v-flex text-lg-center lg12> <v-btn color="success">Guardar</v-btn> <v-btn color="error">Cancelar</v-btn> </v-flex> -->
                    </v-flex>
                </v-layout>
            </v-container>

            <v-container grid-list-xl="grid-list-xl" text-xs-center="text-xs-center">
                <v-layout row="row" wrap="wrap">
                    <v-flex lg12="lg12">
                        <v-card hover="hover">
                            <v-card-text class="text-lg-left">
                                <h3>Registros de documentos</h3>
                            </v-card-text>
                        </v-card>

                        <v-layout align-center="align-center" justify="justify" row="row" wrap="wrap" fill-height="fill-height">

                            <v-flex text-lg-center="text-lg-center" lg4="lg4">
                                <v-avatar tile="tile" size="70%" color="grey lighten-4">
                                    <img src="/img/img_212915.png" alt="avatar"></v-avatar>
                                </v-flex>
                                <v-flex text-lg-center="text-lg-center" lg4="lg4">
                                    <v-avatar tile="tile" size="70%" color="grey lighten-4">
                                        <img src="/img/img_212915.png" alt="avatar"></v-avatar>
                                    </v-flex>
                                    <v-flex text-lg-center="text-lg-center" lg4="lg4">
                                        <v-avatar tile="tile" size="70%" color="grey lighten-4">
                                            <img src="/img/img_212915.png" alt="avatar"></v-avatar>
                                        </v-flex>
                                    </v-layout>
                                </v-flex>
                            </v-layout>
                        </v-container>

                        <br>

                            <v-container grid-list-xl="grid-list-xl" text-xs-center="text-xs-center">

                                <v-layout align-center="align-center" justify-center="justify-center" row="row" wrap="wrap" fill-height="fill-height">
                                    <v-flex text-lg-left="text-lg-left" lg12="lg12">
                                        <label>Comentarios adicionales</label>
                                        <v-text-field v-model="comentarios" label="" textarea="textarea"></v-text-field>

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
  props: ['token'],
  data: () => ({
    image: {},
    snackbar: false,
    colorsnackbar: '',
    y: 'top',
    x: 'right',
    mode: '',
    timeout: 6000,
    texto: '',
    auto1: "/img/img_212915.png",
    renovacion_soat: new Date().toISOString().substr(0, 10),
    lunas_polari: new Date().toISOString().substr(0, 10),
    gps: new Date().toISOString().substr(0, 10),
    inspec_tecnica: new Date().toISOString().substr(0, 10),
    poliza_de_seguro: new Date().toISOString().substr(0, 10),
    menu1: false,
    menu2: false,
    menu3: false,
    menu4: false,
    menu5: false,
    automarca: "",
    airbag: 0,
    silla_bebe: 0,
    automarca: [{
        text: 'Toyota'
      },
      {
        text: 'Chevrolet'
      },
      {
        text: 'Ford'
      },
      {
        text: 'Nissan'
      },
      {
        text: 'KIA'
      },
    ],
    automodelo: [{
        text: 'modelo1'
      },
      {
        text: 'modelo2'
      },
      {
        text: 'modelo3'
      },
      {
        text: 'modelo4'
      },
      {
        text: 'modelo5'
      },
    ],
    autoanio: [{
        text: '2019'
      },
      {
        text: '2018'
      },
      {
        text: '2017'
      },
      {
        text: '2016'
      },
      {
        text: '2015'
      },
    ],
    autotransmicion: [{
        text: 'Manual'
      },
      {
        text: 'Automatica'
      },
    ],
    marca: '',
    modelo: '',
    placa: '',
    color: '',
    anio: '',
    combustible: '',
    transmicion: '',
    cilindrada: '',
    km_inicial: '',
    airbag: '',
    silla_bebe: '',
    galones: '',
    luna_polar: '',
    octanaje: '',
    pago_afi_men: '',
    precio_por_dia: '',
    garantia: '',
    tipo_garantia: '',
    contrato: '',
    renovacion_soat: '',
    lunas_polari: '',
    gps: '',
    inspec_tecnica: '',
    poliza_de_seguro: '',
    imagen1: '/img/img_212915.png',
    imagen2: '',
    imagen3: '',
    comentarios: '',
    fechainicioauto: '',
    fechafinauto: '',
    estado: '',
    disponible: '',
    csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
  }),
  methods: {
    setImage: function (file) {
      this.hasImage = true;
      this.image = file;
      this.subir(file);
    },
    subir(item) {
      let form = document.getElementById('subir');
      const formData = new FormData(form);
      console.log(formData);
      axios.post('/foto', formData)
        .then(response => {
          console.log(response)
          this.image = `/images/${response.data}`;
          this.imagen1 = `/images/${response.data}`;
        })
        .catch(error => {
          console.log(error)
          // alert("Surgio un error, verifique los campos e intente nuevamente..!!");
        })
    },
    alerta(msj, color) {
      this.colorsnackbar = color;
      this.texto = msj;
    },
    sendForm(e) {
      if (
        this.renovacion_soat == '' ||
        this.lunas_polari == '' ||
        this.gps == '' ||
        this.inspec_tecnica == '' ||
        this.poliza_de_seguro == ''
      ) {
        this.alerta('las fehas no pueden estar vacias', 'red');
        this.snackbar = true;
      } else {
        axios.post('/v1.0/auto', {
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
            contrato: this.contrato,
            renovacion_soat: this.renovacion_soat,
            lunas_polari: this.lunas_polari,
            gps: this.gps,
            inspec_tecnica: this.inspec_tecnica,
            poliza_de_seguro: this.poliza_de_seguro,
            imagen1: this.imagen1,
            imagen2: this.imagen2,
            imagen3: this.imagen3,
            comentarios: this.comentarios,
            fechainicioauto: new Date().toISOString().substr(0, 10),
            fechafinauto: new Date().toISOString().substr(0, 10),
            estado: this.estado,
            disponible: this.disponible,
          })
          .then(response => {
            console.log(response)
            window.location.href = '/auto';
          })
          .catch(error => {
            console.log(error)
            this.alerta('Surgio un error al guardar tu auto', 'red');
            this.snackbar = true;
            // alert("Surgio un error al guardar tu auto");
          })
      }
    },
    cancelar() {
      window.location.href = '/auto';
    },
  },
  computed: {
    computedDateFormatted() {
      return this.formatDate(this.date)
    }
  },

  watch: {
    date(val) {
      this.dateFormatted = this.formatDate(this.date)
    }
  },
}
</script>
