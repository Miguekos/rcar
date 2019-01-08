<template>
  <div class="">
<v-container fill-height fluid grid-list-xl>
  <v-layout justify-center wrap>
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

  </v-layout>

</v-container>

<v-container fill-height fluid grid-list-xl>
<v-layout align-center justify-center>
  <v-flex>
    <v-card>
      <v-card-text>
        <v-toolbar-title>Precio Total</v-toolbar-title>
        <table class="v-datatable v-table theme--light">
          <thead>
            <tr>
              <th role="columnheader" scope="col" aria-label="Items: Not sorted." aria-sort="none" class="column text-xs-left">Items</th>
              <th role="columnheader" scope="col" aria-label="Precio: Not sorted." aria-sort="none" class="column text-xs-right">Precio</th>
            </tr>
            <tr class="v-datatable__progress">
              <th colspan="2" class="column"></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Vehiculo</td>
              <td class="text-xs-right"></td>
            </tr>
            <tr>
              <td>Paquete</td>
              <td class="text-xs-right"></td>
            </tr>
            <tr class="v-datatable__expand-row">
              <td colspan="2" class="v-datatable__expand-col"></td>
            </tr>
            <tr>
              <td>Delivery</td>
              <td class="text-xs-right"></td>
            </tr>
            <tr class="v-datatable__expand-row">
              <td colspan="2" class="v-datatable__expand-col"></td>
            </tr>
            <tr>
              <td>Silla Bebe</td>
              <td class="text-xs-right"></td>
            </tr>
            <tr class="v-datatable__expand-row">
              <td colspan="2" class="v-datatable__expand-col"></td>
            </tr>
            <tr>
              <td>Doble Piloto</td>
              <td class="text-xs-right"></td>
            </tr>
            <tr class="v-datatable__expand-row">
              <td colspan="2" class="v-datatable__expand-col"></td>
            </tr>
            <tr>
              <td>Tanque LLeno</td>
              <td class="text-xs-right"></td>
            </tr>
            <tr class="v-datatable__expand-row">
              <td colspan="2" class="v-datatable__expand-col"></td>
            </tr>
            <tr>
              <td>Seguro</td>
              <td class="text-xs-right"></td>
            </tr>
            <tr class="v-datatable__expand-row">
              <td colspan="2" class="v-datatable__expand-col"></td>
            </tr>
            <tr>
              <td>Dia Adicional</td>
              <td class="text-xs-right"></td>
            </tr>
            <tr class="v-datatable__expand-row">
              <td colspan="2" class="v-datatable__expand-col"></td>
            </tr>
          </tbody>
          <tfoot>
            <tr>
              <td><strong>IGV 18%</strong></td>
              <td class="text-xs-right"><b></b></td>
            </tr>
            <tr>
              <td><strong>Total a Depositar</strong></td>
              <td class="text-xs-right"><b> $</b></td>
            </tr>
          </tfoot>
        </table>
      </v-card-text>
    </v-card>
  </v-flex>
</v-layout>
</v-container>
</div>
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
