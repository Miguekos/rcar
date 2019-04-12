<template>
  <div>
    <v-layout row wrap py-4 px-4>
      <v-flex xs12 sm6 md3>
        <label for>Autos</label>
        <v-autocomplete
          :items="autosafiliados"
          item-text="placa"
          item-value="id"
          label="Placa.."
          v-model="autodelafiliado"
          required="required"
          @change="getautoafiliado()"
        ></v-autocomplete>
      </v-flex>
      <!-- <v-btn @click="getautoafiliado()" color="success">text</v-btn> -->
      <v-flex xs12 sm6 md3>
        <label for>Marca</label>
        <v-text-field v-model="autoaguardar.marca"></v-text-field>
      </v-flex>

      <v-flex xs12 sm6 md3>
        <label for>Modelo</label>
        <v-text-field v-model="autoaguardar.modelo"></v-text-field>
      </v-flex>

      <v-flex xs12 sm6 md3>
        <label for>Pago por dias</label>
        <v-text-field v-model="autoaguardar.precio_por_dia"></v-text-field>
      </v-flex>
    </v-layout>
    
    <div v-if="mostrar2">
    <v-layout row wrap py-4 px-4>
      <v-flex xs12 sm6 md3>
        <label for>Autos</label>
        <v-autocomplete
          :items="autosafiliados"
          item-text="placa"
          item-value="id"
          label="Placa.."
          v-model="autodelafiliado"
          required="required"
          @change="getautoafiliado()"
        ></v-autocomplete>
      </v-flex>
      <!-- <v-btn @click="getautoafiliado()" color="success">text</v-btn> -->
      <v-flex xs12 sm6 md3>
        <label for>Marca</label>
        <v-text-field v-model="autoaguardar.marca"></v-text-field>
      </v-flex>

      <v-flex xs12 sm6 md3>
        <label for>Modelo</label>
        <v-text-field v-model="autoaguardar.modelo"></v-text-field>
      </v-flex>

      <v-flex xs12 sm6 md3>
        <label for>Pago por dias</label>
        <v-text-field v-model="autoaguardar.precio_por_dia"></v-text-field>
      </v-flex>
    </v-layout>
    </div>
    <!-- <pre>{{ $data }}</pre> -->
  </div>
</template>

<script>
export default {
  data: () => ({
    autoaguardar: {},
    autosafiliados: {},
    autodelafiliado: "",
    mostrar2: false
  }),
  methods: {
    removeTodo(index) {
        console.log(index);
        var asd = this.autosafiliados;
        asd.splice(index, 1);
    },
    getautoafiliado() {
      console.log("getautoafiliado");
      axios
        .get(`/v1.0/auto/${this.autodelafiliado}`)
        .then(response => {
          console.log(response.data);
          this.autoaguardar = response.data;
          this.removeTodo(response.data);
          this.mostrar2 = true
        })
        .catch(err => {
          console.log(err);
        });
    },
    getAutos() {
      axios
        .get(`/v1.0/autos`)
        .then(response => {
          console.log(response.data.autos);
          this.autosafiliados = response.data.autos;
        })
        .catch(err => {
          console.log(err);
        });
    }
  },
  mounted() {
    this.getAutos();
  }
};
</script>