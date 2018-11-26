<template>
  <v-container grid-list-md fluid text-xs-justify>
    <v-layout justify-center align-center>
      <v-flex xs3>
        <v-card>
          <v-card-title>
            <v-avatar>
              <v-icon>perm_identity</v-icon>
            </v-avatar>
            <div>
              <span class="grey--text">500</span><br>
              <span>Total Clientes</span><br>
            </div>
          </v-card-title>
        </v-card>
      </v-flex>
      <v-flex xs3>
        <v-card>
          <v-card-title>
            <v-avatar>
              <v-icon>person_add</v-icon>
            </v-avatar>
            <div>
              <span class="grey--text">50</span><br>
              <span>Nuevos Clientes</span><br>
            </div>
          </v-card-title>
        </v-card>
      </v-flex>

      <v-flex xs3>
        <v-card>
          <v-card-title>
            <v-avatar>
              <v-icon>call_missed_outgoing</v-icon>
            </v-avatar>
            <div>
              <span class="grey--text">10%</span><br>
              <span>Aumento</span><br>
            </div>
          </v-card-title>
        </v-card>
      </v-flex>

      <v-flex xs1>
        <v-btn color="green" dark fab>
          <v-icon>
            add
          </v-icon>
        </v-btn>
      </v-flex>
    </v-layout>

    <hr>



    <v-container fluid grid-list-md>
      <v-data-iterator :items="items" :rows-per-page-items="rowsPerPageItems" :pagination.sync="pagination" content-tag="v-layout"
        row wrap>
        <v-flex slot="item" slot-scope="props" xs12 sm6 md4 lg6>
          <v-card>

            <!-- <v-card color="cyan darken-2" class="white--text"> -->
              <v-card>
              <v-layout>
                <v-flex xs3>
                  <v-img
                    :src="props.item.image"
                    height="125px"
                    contain
                  ></v-img>
                </v-flex>
                <v-flex xs9>
                  <v-card-title primary-title>
                    <div>
                      <div class="headline">{{ props.item.nombres }}</div>
                      <div>{{ props.item.dni }}</div>
                      <div>{{ props.item.direccion }}</div>
                    </div>
                  </v-card-title>
                </v-flex>

              </v-layout>
              <!-- <v-divider light></v-divider> -->
              
              <v-card-actions>
              </v-card-actions>
            </v-card>
          

          </v-card>
        </v-flex>
      </v-data-iterator>
    </v-container>


  </v-container>
</template>

<script>
  import axios from 'axios';
  export default {
    data: () => ({
      rowsPerPageItems: [4, 8, 12],
      pagination: {
        rowsPerPage: 8
      },
      items: [],
    }),
    created() {
      // Carga lsita de clientes despues de cargar la pagina
      this.getDataCliente();
    },
    methods: {
      getDataCliente() {
        axios
          .get(`/v1.0/clientes`)
          .then(response => {
            this.items = response.data;
            console.log(response.data);
          })
          .catch(e => {
            this.errors.push(e);
          });
      },
    },
  }
</script>