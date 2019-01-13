<template>
<div>
    <v-navigation-drawer v-model="drawer" temporary="temporary" fixed="fixed" clipped="clipped" app="app">
        <!-- <v-divider></v-divider> -->
        <v-toolbar class="titulos">
            <v-list class="pa-0">
                <v-list-tile avatar="avatar">
                    <v-list-tile-avatar>
                        <img src="/img/avatar.jpg"></v-list-tile-avatar>
                        <v-list-tile-content>
                            <v-list-tile-title>{{ user.name }}</v-list-tile-title>
                            <h6 class="text--blue">
                                v1.5
                            </h6>
                        </v-list-tile-content>
                    </v-list-tile>
                </v-list>
            </v-toolbar>
            <!-- <v-divider></v-divider> -->

            <v-list dense="dense">
                <template v-for="(item, i) in items">
                    <v-layout v-if="item.heading" :key="i" row="row" align-center="align-center"></v-layout>
                    <v-divider v-else-if="item.divider" :key="i" dark="dark" class="my-3"></v-divider>
                    <v-list-tile :ripple="{ class: 'darken-1' }" v-else="v-else" :key="i" @click="link(item.link)">
                        <v-list-tile-action>
                            <v-icon>{{ item.icon }}</v-icon>
                        </v-list-tile-action>
                        <v-list-tile-content>
                            <v-list-tile-title>
                                {{ item.text }}
                            </v-list-tile-title>
                        </v-list-tile-content>
                    </v-list-tile>
                </template>
            </v-list>
        </v-navigation-drawer>

        <v-toolbar class="titulos-2">
            <v-toolbar-side-icon color="black" dark="dark" @click="drawer = !drawer"></v-toolbar-side-icon>
            <!-- <img src="loginnew/images/logo.png" alt="logo" width="2%"> -->
            <v-toolbar-title>SCHETTINI&nbsp;</v-toolbar-title>
            <v-divider class="mx-3" inset="inset" vertical="vertical"></v-divider>
            <v-list-tile @click="atras()">
                <v-list-tile-title>
                    <v-icon>arrow_back_ios</v-icon>
                </v-list-tile-title>
            </v-list-tile>

            <v-spacer></v-spacer>
            <v-menu offset-x="offset-x" offset-y="offset-y" transition="scale-transition">
                <v-btn icon="icon" slot="activator">

                    <v-icon>more_vert</v-icon>
                </v-btn>
                <v-list>
                    <v-list-tile @click="logout()">
                        <v-list-tile-title>Salir</v-list-tile-title>
                    </v-list-tile>
                </v-list>
            </v-menu>
        </v-toolbar>
    </div>
</template>

<script>
export default {
  props: ['user','titulo'],
  data: () => ({
    drawer: null,
    back: "",
    csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
    items: [
      {
        icon: 'dashboard',
        text: 'Dasboard',
        link: '/'
      },
      {
        icon: 'add',
        text: 'Disponibilidad',
        link: '/prueba'
      },
      {
        icon: 'group',
        text: 'Clientes',
        link: '/cliente'
      },
      // {
      //     divider: false
      // },
      {
        heading: 'Labels'
      },
      {
        icon: 'card_giftcard',
        text: 'Promos',
        link: '/promo'
      },
      // {
      //     divider: false
      // },
      {
        icon: 'directions_car',
        text: 'Autos',
        link: '/auto'
      },
      {
        icon: 'delete',
        text: 'Reservas',
        link: '/reserva'
      },
      // {
      //     divider: false
      // },
      // {
      //   icon: 'settings',
      //   text: 'Settings',
      //   link: '/'
      // }, {
      //   icon: 'chat_bubble',
      //   text: 'Trash',
      //   link: '/'
      // }, {
      //   icon: 'help',
      //   text: 'Help'
      // }, {
      //   icon: 'phonelink',
      //   text: 'App downloads',
      //   link: '/'
      // },
       {
        icon: 'keyboard',
        text: 'Limpiar Cache',
        link: '/clear-cache'
      }, {
        icon: 'exit_to_app',
        text: 'Salir',
        link: 'logout'
      }
    ]
  }),
  created () {
    var cadena = new String(this.titulo);
    cadena = cadena.toLowerCase();
    this.back = cadena;
  },
  methods: {
    logout: function() {
      console.log("entro a al logout");
      axios
        .post(`/logout`, {
          _token: this.csrf
        })
        .then(response => {
          window.location.href = '/';
        })
        .catch(e => {
          console.log(e);
        });
    },
    link(link) {
      if (link != 'logout') {
        window.location.href = `${link}`;
      } else {
        this.logout();
      }
    },
    atras () {
      window.location.href = `/${this.back}`;
    },
  },
}
</script>
