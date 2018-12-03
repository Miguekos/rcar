
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

    <v-layout align-center justify-space-around row wrap fill-height>
        <v-flex xs12 sm10 md8 lg6 elevation-5>
            <v-card-text>
                <label>Fecha Inicio</label>
                <v-menu :close-on-content-click="false" v-model="menu1" :nudge-right="40" lazy transition="scale-transition" offset-y full-width min-width="290px">
                    <v-text-field slot="activator" name="fechaVencimientoBrevete" v-model="date" prepend-icon="event" readonly></v-text-field>
                    <v-date-picker v-model="date" @input="menu1 = false"></v-date-picker>
                </v-menu>
                <label>Fecha Fin</label>
                <v-menu :close-on-content-click="false" v-model="menu2" :nudge-right="40" lazy transition="scale-transition" offset-y full-width min-width="290px">
                    <v-text-field slot="activator" name="fechaVencimientoBrevete" v-model="date" prepend-icon="event" readonly></v-text-field>
                    <v-date-picker v-model="date" @input="menu2 = false"></v-date-picker>
                </v-menu>
                <label>Vehiculo</label>
                <v-autocomplete :items="auto" item-text="marca" item-value="id" v-model="vehiculo" placeholder="Select..." required solo></v-autocomplete>
                <label>Cliente</label>
                <v-autocomplete :items="cliente" item-text="nombres" item-value="nombres" v-model="cliente" placeholder="Select..." required solo></v-autocomplete>
                <label>Producto</label>
                <v-autocomplete :items="auto" item-text="marca" item-value="id" v-model="producto" placeholder="Select..." required solo></v-autocomplete>
                <label>Paquete</label>
                <v-autocomplete :items="cliente" item-text="nombres" item-value="id" v-model="promo" placeholder="Select..." required solo></v-autocomplete>
                <label>Zona de entrega</label>
                <v-autocomplete :items="cliente" item-text="nombres" item-value="id" v-model="zonaDeEntrega" placeholder="Select..." required solo></v-autocomplete>
            </v-card-text>
            <!-- <v-divider class="mt-5"></v-divider> <v-card-actions> <v-btn flat>Cancel</v-btn> <v-spacer></v-spacer> <v-slide-x-reverse-transition> <v-tooltip
            v-if="formHasErrors" left> <v-btn slot="activator" icon class="my-0" @click="resetForm"> <v-icon>refresh</v-icon> </v-btn> <span>Refresh form</span>
            </v-tooltip> </v-slide-x-reverse-transition> <v-btn color="primary" flat @click="submit">Submit</v-btn> </v-card-actions> -->
        </v-card>
    </v-flex>

    <v-flex xs12 sm10 md8 lg4 elevation-5>

        <v-card-text>
            <v-flex>
                <v-card>
                    <v-img src="/img/default.jpg" aspect-ratio="2.75"></v-img>

                    <v-card-title primary-title>
                        <div>
                            <h3 class="headline mb-0">BMW 316i</h3>
                            <div>
                                Placa: WQE-123
                                <br>
                                    Color: Rojo
                                    <br>
                                        Año: 2014
                                        <br>
                                            Precio: 89$
                                        </div>
                                    </div>
                                </v-card-title>

                                <v-layout row wrap justify-center>
                                    <v-date-picker v-model="picker" :landscape="landscape" :reactive="reactive"></v-date-picker>
                                </v-layout>

                                <v-card-actions>
                                    <!-- <v-btn flat color="orange">Share</v-btn> <v-btn flat color="orange">Explore</v-btn> -->
                                </v-card-actions>
                            </v-card>
                        </v-flex>

                    </v-card-text>
                    <!-- <v-divider class="mt-5"></v-divider> <v-card-actions> <v-btn flat>Cancel</v-btn> <v-spacer></v-spacer> <v-slide-x-reverse-transition> <v-tooltip
                    v-if="formHasErrors" left> <v-btn slot="activator" icon class="my-0" @click="resetForm"> <v-icon>refresh</v-icon> </v-btn> <span>Refresh form</span>
                    </v-tooltip> </v-slide-x-reverse-transition> <v-btn color="primary" flat @click="submit">Submit</v-btn> </v-card-actions> -->
                </v-card>
            </v-flex>

        </v-layout>
        <v-container text-lg-center>
        <v-btn color="success">Guardar</v-btn>
        <v-btn color="error">Cancelar</v-btn>
        </v-container>

        <!-- <pre>{{ $data }}</pre> -->
    </div>
</template>

<script>

  export default {
    props: ['token'],
    data: () => ({
      date: new Date().toISOString().substr(0, 10),
      menu1: false,
      menu2: false,
      menu3: false,
      menu4: false,
      promo: [],
      cliente: [],
      auto: [],
      promocion: "",
      picker: new Date().toISOString().substr(0, 10),
        landscape: false,
        reactive: false,
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
    created () {
      this.getDataCliente();
    },
      methods: {
        getDataCliente() {
          console.log("en get data nuew");
          axios
            .get(`/v1.0/reservas`)
            .then(response => {
              this.promo = response.data.promo;
              this.cliente = response.data.cliente;
              this.auto = response.data.auto;
              console.log(response.data);
              // var paginas =  Math.ceil(response.data.clientec / 8);
              // this.page = paginas;
            })
            .catch(e => {
              this.errors.push(e);
            });
        },
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
