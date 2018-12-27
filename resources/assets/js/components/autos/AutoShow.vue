<template lang="html">
<div class="">
    {{ auto }}
    <v-container grid-list-md="grid-list-md" text-xs-center="text-xs-center">
        <v-layout row="row" wrap="wrap">

            <v-flex xs6="xs6">
                <v-card dark="dark" color="secondary">
                    <v-card-text class="px-0">6</v-card-text>
                </v-card>
            </v-flex>

            <v-flex xs6="xs6">
                <v-card dark="dark" color="secondary">
                    <v-card-text class="px-0">6</v-card-text>
                </v-card>
            </v-flex>

        </v-layout>
    </v-container>

    <v-container grid-list-md="grid-list-md" text-xs-center="text-xs-center">
        <v-layout row="row" wrap="wrap">

          <v-flex xs3="xs3" lg3 class="sinborde">
            <v-card light elevation-2 hover ripple class="sinborde">
              <v-card-title class="sinborde1" primary-title>
                <span>Ingreso a Taller</span>
              </v-card-title>
            </v-card>
          </v-flex>

          <v-flex xs3="xs3" lg3 class="sinborde">
            <v-card light elevation-2 hover ripple class="sinborde">
              <v-card-title class="sinborde1" primary-title>
                <span>Historial</span>
              </v-card-title>
            </v-card>
          </v-flex>

            <v-flex xs6="xs6">
                <v-card dark="dark" color="secondary">
                    <v-card-text class="px-0">6</v-card-text>
                </v-card>
            </v-flex>

        </v-layout>
    </v-container>

    <v-container fluid="fluid" class="borde" grid-list-md="grid-list-md" text-xs-center="text-xs-center">
        <v-layout row="row" wrap="wrap">
            <v-flex xs2="xs2">
                <v-subheader>Marca</v-subheader>
            </v-flex>
            <v-flex xs4="xs4">
                <v-text-field label="Amount" value="10.00" solo="solo"></v-text-field>
            </v-flex>
        </v-layout>

        <v-layout row="row">
            <v-flex xs2="xs2">
                <v-subheader>Modelo</v-subheader>
            </v-flex>
            <v-flex xs4="xs4">
                <v-text-field label="Weight" value="28.00" solo="solo"></v-text-field>
            </v-flex>
        </v-layout>

        <v-layout row="row">
            <v-flex color="grey" xs2="xs2">
                <v-subheader>Transmision</v-subheader>
            </v-flex>
            <v-flex xs4="xs4">
                <v-text-field label="Email address" value="example" solo="solo"></v-text-field>
            </v-flex>
        </v-layout>

        <v-layout row="row">
            <v-flex xs2="xs2">
                <v-subheader>Combustible</v-subheader>
            </v-flex>
            <v-flex xs4="xs4">
                <v-text-field label="Label Text" value="12:30:00" solo="solo"></v-text-field>
            </v-flex>
        </v-layout>

        <v-layout row="row" wrap="wrap">
            <v-flex xs2="xs2">
                <v-subheader>Color</v-subheader>
            </v-flex>
            <v-flex xs4="xs4">
                <v-text-field label="Amount" value="10.00" solo="solo"></v-text-field>
            </v-flex>
        </v-layout>

        <v-layout row="row">
            <v-flex xs2="xs2">
                <v-subheader>Precio</v-subheader>
            </v-flex>
            <v-flex xs4="xs4">
                <v-text-field label="Weight" value="28.00" solo="solo"></v-text-field>
            </v-flex>
        </v-layout>

        <v-layout row="row">
            <v-flex color="grey" xs2="xs2">
                <v-subheader>Aros</v-subheader>
            </v-flex>
            <v-flex xs4="xs4">
                <v-text-field label="Email address" value="example" solo="solo"></v-text-field>
            </v-flex>
        </v-layout>

        <v-layout row="row">
            <v-flex xs2="xs2">
                <v-subheader>Cilindros</v-subheader>
            </v-flex>
            <v-flex xs4="xs4">
                <v-text-field label="Label Text" value="12:30:00" solo="solo"></v-text-field>
            </v-flex>
        </v-layout>

        <v-layout row="row" wrap="wrap">
            <v-flex xs2="xs2">
                <v-subheader>Turbo</v-subheader>
            </v-flex>
            <v-flex xs4="xs4">
                <v-text-field label="Amount" value="10.00" solo="solo"></v-text-field>
            </v-flex>
        </v-layout>

        <v-layout row="row">
            <v-flex xs2="xs2">
                <v-subheader>Kilometraje</v-subheader>
            </v-flex>
            <v-flex xs4="xs4">
                <v-text-field label="Weight" value="28.00" solo="solo"></v-text-field>
            </v-flex>
        </v-layout>

        <v-layout row="row">
            <v-flex color="grey" xs2="xs2">
                <v-subheader>AirBag</v-subheader>
            </v-flex>
            <v-flex xs4="xs4">
                <v-text-field label="Email address" value="example" solo="solo"></v-text-field>
            </v-flex>
        </v-layout>

        <v-layout row="row">
            <v-flex xs2="xs2">
                <v-subheader>Sandroof</v-subheader>
            </v-flex>
            <v-flex xs4="xs4">
                <v-text-field label="Label Text" value="12:30:00" solo="solo"></v-text-field>
            </v-flex>
        </v-layout>

        <v-layout row="row" wrap="wrap">
            <v-flex xs2="xs2">
                <v-subheader>Sonido</v-subheader>
            </v-flex>
            <v-flex xs4="xs4">
                <v-text-field label="Amount" value="10.00" solo="solo"></v-text-field>
            </v-flex>
        </v-layout>

        <v-layout row="row">
            <v-flex xs2="xs2">
                <v-subheader>Garantia</v-subheader>
            </v-flex>
            <v-flex xs4="xs4">
                <v-text-field label="Weight" value="28.00" solo="solo"></v-text-field>
            </v-flex>
        </v-layout>

    </v-container>

</div>
</template>

<script>
export default {
  prop: ['auto'],
  data: () => ({

  })
}
</script>

<style lang="css">
</style>
