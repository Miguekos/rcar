<template>

<v-container grid-list-md fluid text-xs-justify>
    <v-dialog v-model="dialog1" max-width="700px">
        <v-card>
            <v-card-title>
                <span class="headline">Editar Cliente</span>
            </v-card-title>
            <template>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <cliente-edit :cliente="editCliente" :user="user" :close="close" :carga="getDataCliente"></cliente-edit>
                        </div>
                    </div>
                </div>
            </template>
        </v-card>
    </v-dialog>
    <v-layout justify-center align-center>
        <v-flex xs3>
            <v-card dark color="green">
                <v-card-title>
                    <v-avatar>
                        <v-icon size="350%">perm_identity</v-icon>
                    </v-avatar>
                    <div>
                        <span>{{ total }}</span>
                        <br>
                        <span>Total Clientes</span>
                        <br>
                    </div>
                </v-card-title>
            </v-card>
        </v-flex>
        <v-flex xs3>
            <v-card dark color="blue">
                <v-card-title>
                    <v-avatar>
                        <v-icon size="350%">person_add</v-icon>
                    </v-avatar>
                    <div>
                        <span>50</span>
                        <br>
                        <span>Nuevos Clientes</span>
                        <br>
                    </div>
                </v-card-title>
            </v-card>
        </v-flex>

        <v-flex xs3>
            <v-card dark color="deep-orange">
                <v-card-title>
                    <v-avatar>
                        <v-icon size="350%">call_missed_outgoing</v-icon>
                    </v-avatar>
                    <div>
                        <span>10%</span>
                        <br>
                        <span>Aumento</span>
                        <br>
                    </div>
                </v-card-title>
            </v-card>
        </v-flex>

        <v-flex xs1 @click="crear()">
            <v-btn color="green" dark fab>
                <v-icon>
                    add
                </v-icon>
            </v-btn>
        </v-flex>
    </v-layout>

    <hr>

    <v-container grid-list-md text-xs-center>
        <v-layout row wrap>
            <v-flex xs4 text-sm-left>
                <h1>Clientes</h1>
            </v-flex>
            <v-spacer></v-spacer>
            <!-- <v-flex xs4> -->
                <!-- <v-card dark color="green">
                    <v-card-text class="px-4">Descargar</v-card-text>
                </v-card> -->
            <!-- </v-flex> -->
            <v-flex xs4>
                <v-text-field append-icon="search" label="Buscar" single-line hide-details v-model="search"></v-text-field>
            </v-flex>
        </v-layout>
    </v-container>


    <v-container fluid grid-list-md>
        <v-data-iterator :items="items" :rows-per-page-items="rowsPerPageItems" :pagination.sync="pagination" :search="search" content-tag="v-layout" row wrap>
            <v-flex slot="item" slot-scope="props" xs12 sm6 md4 lg6>
                <v-card>
                    <!-- <v-card color="cyan darken-2" class="white--text"> -->
                    <v-card>
                        <v-layout align-center justify-center row fill-height>
                            <v-flex xs2>
                                <v-avatar size="100%">
                                    <v-img :src="props.item.image"></v-img>
                                </v-avatar>
                            </v-flex>
                            <v-flex xs9>
                                <v-card-title primary-title>
                                    <div>

                                        <div class="headline">{{ props.item.nombres }}</div>
                                        <div>{{ props.item.direccion }}</div>
                                        <div>{{ props.item.celular }}</div>
                                        <v-spacer></v-spacer>
                                        <v-flex align-content-end>
                                            <v-icon small class="mr-2" @click="editItem(props.item)">
                                                edit
                                            </v-icon>
                                            <v-icon small @click="deleteItem(props.item)">
                                                delete
                                            </v-icon>
                                        </v-flex>
                                    </div>
                                </v-card-title>
                            </v-flex>
                        </v-layout>
                        <!-- <v-divider dense light></v-divider> -->
                        <v-card-actions>
                            uisfhjsf
                        </v-card-actions>
                    </v-card>
                </v-card>
            </v-flex>
            <template slot="no-data">
                <v-alert :value="true" color="red" icon="warning">
                    Lo siento no hay datos que cargar :(
                </v-alert>
            </template>
        </v-data-iterator>
    </v-container>

</v-container>

</template>

<script>

import axios from 'axios';
export default {
    props: ['user'],
    data: () => ({
        slider: 56,
        tile: false,
        search: "",
        total: "",
        editCliente: "",
        idedit: "",
        dialog: false,
        dialog1: false,
        rowsPerPageItems: [4, 8, 12],
        pagination: {
            rowsPerPage: 8
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
        crear() {
                window.location.href = '/cliente/create';
            },
            getDataCliente() {
                console.log("en get data nuew");
                axios
                    .get(`/v1.0/clientes`)
                    .then(response => {
                        this.items = response.data.cliente;
                        this.total = response.data.clientec;
                        console.log(response.data.cliente);
                    })
                    .catch(e => {
                        this.errors.push(e);
                    });
            },
            editItem(item) {
                // this.editedIndex = this.desserts.indexOf(item)
                // this.editedItem = Object.assign({}, item)
                this.dialog1 = true
                this.idedit = item.id
                console.log(item.id);
                axios
                    .get(`/v1.0/cliente/${item.id}`)
                    .then(response => {
                        this.editCliente = response.data;
                        console.log(response.data);
                    })
                    .catch(e => {
                        this.errors.push(e);
                    });
            },
            deleteItem(item) {
                const index = this.desserts.indexOf(item)
                console.log("Aqui abajo");
                console.log(item.id);
                confirm('Esta seguro que desea borrar esta Cliente?') && this.desserts.splice(index, 1)
                axios
                    .delete(`/v1.0/cliente/${item.id}`, {
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
