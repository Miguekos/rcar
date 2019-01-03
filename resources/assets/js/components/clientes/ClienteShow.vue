<template>
<v-container fill-height fluid grid-list-xl>
  <v-layout justify-center wrap>
    <v-flex xs12 md8>
      <v-card title="Edit Profile" text="Complete your profile">
        <v-form>
          <v-container py-0>
            <v-layout wrap>
              <v-flex xs12 md4>
                <v-text-field label="Apellido Paterno" />
              </v-flex>
              <v-flex xs12 md4>
                <v-text-field label="Apellido Materno" />
              </v-flex>
              <v-flex xs12 md4>
                <v-text-field label="Nombres" />
              </v-flex>
              <v-flex xs12 md6>
                <v-text-field label="DNI / C.E" />
              </v-flex>
              <v-flex xs12 md6>
                <v-text-field label="Fecha de Nacimiento" />
              </v-flex>
              <v-flex xs12 md6>
                <v-text-field label="Correo" />
              </v-flex>
              <v-flex xs12 md6>
                <v-text-field label="Celular" />
              </v-flex>
              <v-flex xs12 md4>
                <v-text-field label="Direccion" />
              </v-flex>
              <v-flex xs12 md4>
                <v-text-field label="Ciudad" />
              </v-flex>
              <v-flex xs12 md4>
                <v-text-field label="CCI" />
              </v-flex>
              <v-flex xs12 md4>
                <v-text-field label="Banco" />
              </v-flex>
              <v-flex xs12 md4>
                <v-text-field label="Nombre Titular" />
              </v-flex>
              <v-flex xs12 md4>
                <v-text-field label="N. Bravete" />
              </v-flex>
              <v-flex xs12 md4>
                <v-text-field label="Fecha Vencimiento Brevete" />
              </v-flex>
              <v-flex xs12 md4>
                <v-text-field label="Foto Dni" />
              </v-flex>
              <v-flex xs12 md4>
                <v-text-field label="Clasificacion Cliente" />
              </v-flex>
              <v-flex xs12>
                <v-textarea label="Comentario" />
              </v-flex>
              <v-flex xs12 text-xs-right>
                <v-btn class="mx-0 font-weight-light" color="success">
                  Actualizar Perfil
                </v-btn>
              </v-flex>
            </v-layout>
          </v-container>
        </v-form>
      </v-card>
    </v-flex>
    <v-flex style="
      padding-top: 0px;" xs12 md4>
      <v-card>
        <material-card class="v-card-profile">
          <v-avatar slot="offset" class="mx-auto d-block" size="130">
            <img src="https://demos.creative-tim.com/vue-material-dashboard/img/marc.aba54d65.jpg">
          </v-avatar>
          <v-card-text class="text-xs-center">
            <h6 class="category text-gray font-weight-thin mb-3">CEO / CO-FOUNDER</h6>
            <h4 class="card-title font-weight-light">Alec Thompson</h4>
            <p class="card-description font-weight-light">Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...</p>
            <v-btn color="success" round class="font-weight-light">Cargar</v-btn>
          </v-card-text>
        </material-card>
      </v-card>
    </v-flex>
  </v-layout>
</v-container>
</template>

<script>
export default {
  data: () => ({

  }),
  methods: {
    disponible: function() {
      console.log("entro a al logout");
      axios
        .post(`/v1.0/disponible`, {
          fechaIni: this.date,
          fechaFin: this.date1,
          _token: this.csrf
        })
        .then(response => {
          if (response.data == "") {
            this.disponi = "";
            // alert("No se consigue data");
            this.dialog7 = false;
          } else {
            console.log("dasddssda");
            console.log(response.data);
            this.disponi = response.data;
            this.dialog7 = false;
          }
          // window.location.href = '/';
        })
        .catch(e => {
          console.log(e);
          this.dialog7 = false;

        });
    },
    link(link) {
      if (link != 'logout') {
        window.location.href = `${link}`;
      } else {
        this.logout();
      }
    },
    atras() {
      window.location.href = `/${this.back}`;
    },
  },
}
</script>
