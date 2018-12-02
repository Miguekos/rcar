<template>
<div class="container-fluid">
    <div class="row">
        <div id="" class="col-md-12">
            <form id="ContactForm" @submit.prevent="update">
                        <div class="form-group">
                            <div class="form-group col-md-6">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" required :value="info.nombres" autofocus name="nombres" placeholder="">
                            </div>
      
                            <div class="form-group col-md-6">
                                <label for="telf">DNI</label>
                                <input type="text" class="form-control" required :value="info.dni" name="dni" placeholder="">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="direccion">Direccion</label>
                                <input type="text" class="form-control" required :value="info.direccion" name="direccion" placeholder="">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="dni">Telf</label>
                                <input type="text" class="form-control" required :value="info.celular" name="celular" placeholder="">
                            </div>

                        </div>
                        
                        <v-flex class="form-group col-md-12">
                            <v-btn
                                    :loading="loading"
                                    :disabled="loading"
                                    color="green"
                                    type="submit"
                                    black
                                    dark
                                    small
                            >
                                Guardar
                            </v-btn>
                            <v-btn black small color="red darken-1" dark @click.native="close">Cancel</v-btn>
                            
                        </v-flex>
                        <!-- <input type="hidden" name="agregado" :value="user.name">
                        <input type="hidden" name="agregado_id" :value="user.id">
                        <input type="hidden" name="abono_id" :value="0"> -->
                        <!-- <input type="hidden" name="_token" :value="csrf"> -->
                    </form>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        props: ['info'],
        data() {
            return{
                loader: null,
                agregado: "",
                agregado_id: "",
                abono_id: "",
                loading: false,
                loading2: false,
                loading3: false,
                loading4: false,
                formType: true,
//                serverResponse: false,
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            }
        },
        created() {
            this.getDataCliente();
            },
        watch: {
            loader () {
                const l = this.loader
                this[l] = !this[l]

                setTimeout(() => (this[l] = false), 3000)

                this.loader = null
            }
        },
        methods: {
            update () {
                console.log("aqui id para ipdate");
                // console.log(this.cliente.id);
//                alert('Enviando Form')
//                this.snackbar= true
                    let form = document.getElementById('ContactForm');
                    const formData = new FormData(form);
                    let jsonObject = {};
                    for (const [key, value]  of formData.entries()) {
                        jsonObject[key] = value;
                    }
                    console.log(jsonObject);
                    axios({
                        method: 'put',
                        url: `/v1.0/cliente/${this.info.id}`,
                        data: jsonObject,
                    })
                        .then(function (response) {
                            response.data
                            console.log(response.data);
                            window.location.href = '/cliente';
                        });
                    },
            preciono: function () {
                console.log("preciono el boton")
            }
        }
    }
</script>


<style>
    .custom-loader {
        animation: loader 1s infinite;
        display: flex;
    }
    @-moz-keyframes loader {
        from {
            transform: rotate(0);
        }
        to {
            transform: rotate(360deg);
        }
    }
    @-webkit-keyframes loader {
        from {
            transform: rotate(0);
        }
        to {
            transform: rotate(360deg);
        }
    }
    @-o-keyframes loader {
        from {
            transform: rotate(0);
        }
        to {
            transform: rotate(360deg);
        }
    }
    @keyframes loader {
        from {
            transform: rotate(0);
        }
        to {
            transform: rotate(360deg);
        }
    }
</style>
