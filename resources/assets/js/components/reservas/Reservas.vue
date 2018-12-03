<template>
  <div>
    <template>
      <!-- <v-tabs
        centered
        color="green"
        dark
        icons-and-text
      > -->
      <v-tabs
        centered
      >
        <v-tabs-slider background-color="gray" color="green"></v-tabs-slider>

        <v-tab href="#tab-1">
          Pre-Reserva &nbsp;
          <h2>24</h2>

        </v-tab>

        <v-tab href="#tab-2">
          Evaluacion Pendiente &nbsp;
          <h2>24</h2>

        </v-tab>

        <v-tab href="#tab-3">
          Reserva Aprobada &nbsp;
          <h2>24</h2>

        </v-tab>

        <v-tab href="#tab-4">
          Pendiente de Entrega &nbsp;
          <h2>24</h2>

        </v-tab>

        <v-tab href="#tab-5">
          Liquidacion &nbsp;
          <h2>24</h2>

        </v-tab>

        <v-tab-item
          id="tab-1"
        >
          <v-card flat>
            <v-card-text>
              <pre-reserva></pre-reserva>
            </v-card-text>
          </v-card>
        </v-tab-item>

        <v-tab-item
          id="tab-2"
        >
          <v-card flat>
            <v-card-text>2</v-card-text>
          </v-card>
        </v-tab-item>
        <v-tab-item
          id="tab-3"
        >
          <v-card flat>
            <v-card-text>3</v-card-text>
          </v-card>
        </v-tab-item>

        <v-tab-item
          id="tab-4"
        >
          <v-card flat>
            <v-card-text>4</v-card-text>
          </v-card>
        </v-tab-item>

        <v-tab-item
          id="tab-5"
        >
          <v-card flat>
            <v-card-text>5</v-card-text>
          </v-card>
        </v-tab-item>
      </v-tabs>
    </template>

    <!-- <pre>{{ $data }}</pre> -->
  </div>
</template>

<script>
  import axios from 'axios';
  export default {
    props: ['user'],
    data: () => ({
      // boton inicio
      // boton fin
      // pagination: {},
      registros: "",
      page: "",
      reviews: 413,
      value: 4.5,
      eliminar: "",
      dialog3: false,
      pagination: {},
      slider: 56,
      tile: false,
      search: "",
      total: "",
      fecha: "",
      clienten: "",
      editCliente: "",
      idedit: "",
      dialog: false,
      dialog1: false,
      rowsPerPageItems: [8, 12],
      pagination: {
        // rowsPerPage: 8
      },
      items: [],
      editedIndex: -1,
      editedItem: {

      },
      defaultItem: {

      },
    }),
    created() {
      this.getDataCliente();

    },
    computed: {

    },
    methods: {
        paginas() {
            var paginas = Math.ceil(this.items / 8)
            console.log(paginas);
            console.log(this.items.length);
            this.registros = this.items.length;
            this.page = paginas;
        },
      crear() {
        window.location.href = '/reserva/create';
      },
      getDataCliente() {
        console.log("en get data nuew");
        axios
          .get(`/v1.0/reservas`)
          .then(response => {
            this.items = response.data;
            // this.total = response.data.clientec;
            // this.fecha = response.data.fecha;
            // this.clienten = response.data.clienten;
            // console.log(response.data.fecha);
          })
          .catch(e => {
            this.errors.push(e);
          });
          this.paginas();
          console.log("aqui");

      },
      editItem(item) {
        window.location.href = `/reserva/${item.id}/edit`;
        // this.editedIndex = this.desserts.indexOf(item)
        // this.editedItem = Object.assign({}, item)
        // this.dialog1 = true
        // this.idedit = item.id
        // console.log(item.id);
        // axios
          // .get(`/v1.0/cliente/${item.id}`)
          // .then(response => {
            // this.editCliente = response.data;
            // console.log(response.data);
          // })
          // .catch(e => {
            // this.errors.push(e);
          // });
      },
      deleteItem(item) {
        // const index = this.desserts.indexOf(item)
        console.log("Aqui abajo");
        console.log(item.id);
        var borrar = confirm('Esta seguro que desea borrar est reserva?')
        if (!borrar) {
          alert("Se cancelo");
        }else{
        axios
          .delete(`/v1.0/reserva/${item.id}`, {
            _token: this.csrf
          })
          .then(response => {
            //                    window.location.href = '/';
            // JSON responses are automatically parsed.
            //                        this.user = response.data;
            //                        console.log(response.data);
            console.log("Borrado correctamente");
          })
          .catch(e => {
            //                        this.errors.push(e);
          });
          this.getDataCliente();
        }
      },
      close() {
        this.dialog1 = false
        this.dialog = false
        console.log("entro seguo que si");

        // setTimeout(() => {
        // this.editedItem = Object.assign({}, this.defaultItem)
        // this.editedIndex = -1
        // }, 300)
      },
    },

  }
</script>
