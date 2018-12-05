<template>
<div class="">
  <v-toolbar-title>Precio Total</v-toolbar-title>
  <v-data-table :headers="headers" :items="desserts" item-key="name" hide-actions>
    <template slot="items" slot-scope="props">
      <tr @click="props.expanded = !props.expanded">
        <td>{{ props.item.name }}</td>
        <td class="text-xs-right">{{ props.item.costo }}</td>
      </tr>
    </template>
    <template slot="expand" slot-scope="props">
      <v-card flat>
        <v-card-text>{{ props.item.costo }}</v-card-text>
      </v-card>
    </template>
    <template slot="footer">
      <tr>
        <td>
          <strong>Total a Depositar</strong>
        </td>
        <td class="text-xs-right"><b>4.302 $</b></td>
      </tr>
    </template>
  </v-data-table>
</div>
</template>

<script>
export default {
  data() {
    return {
      headers: [{
          text: 'Items',
          align: 'left',
          value: 'name',
          sortable: false,
        },
        {
          text: 'Precio',
          align: 'right',
          sortable: false,
          value: 'iron',
        }
      ],
      desserts: [{
          value: false,
          name: 'Paquete',
          costo: 159,
        },
        {
          value: false,
          name: 'Delivery',
          costo: 237,
        },
        {
          value: false,
          name: 'Silla Bebe',
          costo: 262,
        },
        {
          value: false,
          name: 'Doble Piloto',
          costo: 305,
        },
        {
          value: false,
          name: 'Tanque LLeno',
          costo: 356,
        },
        {
          value: false,
          name: 'Seguro Tipo A',
          costo: 356,
        },
        {
          value: false,
          name: 'Dia Adicional',
          costo: 356,
        },
      ]
    }
  }
}
</script>
