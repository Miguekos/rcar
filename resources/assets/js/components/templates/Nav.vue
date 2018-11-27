<template>
    <div>
        <v-navigation-drawer v-model="drawer" temporary fixed clipped class="grey lighten-4" app>
            <v-list dense class="grey lighten-4">
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
        <v-toolbar dense>
            <v-toolbar-side-icon @click="drawer = !drawer"></v-toolbar-side-icon>
            <v-toolbar-title>SCHETTINI&nbsp;<span class="font-weight-light">RENT A CAR </span></v-toolbar-title>
            <v-spacer></v-spacer>
            {{ user.name }}
            <v-btn icon>
                <v-icon>more_vert</v-icon>
            </v-btn>
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
                },
                {
                    icon: 'touch_app',
                    text: 'Clientes',
                    link: '/cliente'
                },
                {
                    divider: true
                },
                {
                    heading: 'Labels'
                },
                {
                    icon: 'add',
                    text: 'Create new label',
                    link: '/'
                },
                {
                    divider: true
                },
                {
                    icon: 'archive',
                    text: 'Archive',
                    link: '/'
                },
                {
                    icon: 'delete',
                    text: 'Trash',
                    link: '/'
                },
                {
                    divider: true
                },
                {
                    icon: 'settings',
                    text: 'Settings',
                    link: '/'
                },
                {
                    icon: 'chat_bubble',
                    text: 'Trash',
                    link: '/'
                },
                {
                    icon: 'help',
                    text: 'Help'
                },
                {
                    icon: 'phonelink',
                    text: 'App downloads',
                    link: '/'
                },
                {
                    icon: 'keyboard',
                    text: 'Keyboard shortcuts',
                    link: '/'
                },
                {
                    icon: 'exit_to_app',
                    text: 'Salir',
                    link: 'logout'
                }
            ]
        }),
        methods: {
            logout: function () {
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