<template>
<div>
    <v-navigation-drawer v-model="drawer" temporary fixed clipped class="grey lighten-3" app>
        <v-divider></v-divider>
        <v-toolbar flat class="transparent">
            <v-list class="pa-0">
                <v-list-tile avatar>
                    <v-list-tile-avatar>
                        <img src="/img/avatar.jpg">
                    </v-list-tile-avatar>
                    <v-list-tile-content>
                        <v-list-tile-title>{{ user.name }}</v-list-tile-title>
                    </v-list-tile-content>
                </v-list-tile>
            </v-list>
        </v-toolbar>
        <v-divider></v-divider>

        <v-list dense class="grey lighten-3">
            <template v-for="(item, i) in items">
                <v-layout v-if="item.heading" :key="i" row align-center>
                </v-layout>
                <v-divider v-else-if="item.divider" :key="i" dark class="my-3"></v-divider>
                <v-list-tile v-else :key="i" @click="link(item.link)">
                    <v-list-tile-action>
                        <v-icon>{{ item.icon }}</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-content>
                        <v-list-tile-title class="grey--text">
                            {{ item.text }}
                        </v-list-tile-title>
                    </v-list-tile-content>
                </v-list-tile>
            </template>
        </v-list>
    </v-navigation-drawer>
    <v-toolbar dense dark color="black lighten-1">
        <v-toolbar-side-icon @click="drawer = !drawer"></v-toolbar-side-icon>
        <v-toolbar-title>SCHETTINI&nbsp;<span class="font-weight-light">RENT A CAR </span></v-toolbar-title>
        <v-spacer></v-spacer>
        <!-- {{ user.name }} -->
        <v-menu offset-x offset-y transition="scale-transition">
            <v-btn icon slot="activator">
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
    props: ['user'],
    data: () => ({
        drawer: null,
        csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        items: [{
                icon: 'lightbulb_outline',
                text: 'Dasboard',
                link: '/'
            }, {
                icon: 'touch_app',
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
                icon: 'favorite_border',
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
            {
                icon: 'settings',
                text: 'Settings',
                link: '/'
            }, {
                icon: 'chat_bubble',
                text: 'Trash',
                link: '/'
            }, {
                icon: 'help',
                text: 'Help'
            }, {
                icon: 'phonelink',
                text: 'App downloads',
                link: '/'
            }, {
                icon: 'keyboard',
                text: 'Keyboard shortcuts',
                link: '/'
            }, {
                icon: 'exit_to_app',
                text: 'Salir',
                link: 'logout'
            }
        ]
    }),
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
    },
}

</script>
