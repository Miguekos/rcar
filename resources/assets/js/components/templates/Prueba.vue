<template>
  <v-form>
    <v-container grid-list-lg>
      <v-layout align-center justify-center fill-height>

        <v-flex xs12 sm4 md4>
          <label>Fecha Inicio</label>
          <v-text-field
            solo
          ></v-text-field>
        </v-flex>

        <v-flex xs12 sm4 md4>
          <label>Fecha Fin</label>
          <v-text-field
            solo
          ></v-text-field>
        </v-flex>
      </v-layout>
    </v-container>
    <v-container grid-list-xs,sm,md,lg,xl>
        <v-flex text-lg-center lg12>
          <v-btn color="primary">Buscar</v-btn>
        </v-flex>
    </v-container>

    <v-container grid-list-lg>
      <v-layout row wrap>
        <comp-disponibilidad></comp-disponibilidad>
      </v-layout>
    </v-container>

  </v-form>
</template>
