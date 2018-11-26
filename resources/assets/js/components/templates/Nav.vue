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
        <v-toolbar color="grey darken-4" dark app absolute clipped-left>
            <v-toolbar-side-icon @click="drawer = !drawer"></v-toolbar-side-icon>
            <span class="title ml-3 mr-5">SCHETTINI&nbsp;<span class="font-weight-light">RENT A CAR</span></span>
            <!-- <v-text-field solo-inverted flat hide-details label="Search" prepend-inner-icon="search"></v-text-field> -->
            <v-spacer></v-spacer>
            
        </v-toolbar>
    </div>
</template>

<script>
  export default {
      props:['user'],
    data: () => ({
      drawer: null,
      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
      items: [
        { icon: 'lightbulb_outline', text: 'Dasboard', link: '/' },
        { icon: 'touch_app', text: 'Clientes', link: '/cliente' },
        { divider: true },
        { heading: 'Labels' },
        { icon: 'add', text: 'Create new label', link: '/' },
        { divider: true },
        { icon: 'archive', text: 'Archive', link: '/' },
        { icon: 'delete', text: 'Trash', link: '/' },
        { divider: true },
        { icon: 'settings', text: 'Settings', link: '/' },
        { icon: 'chat_bubble', text: 'Trash', link: '/' },
        { icon: 'help', text: 'Help' },
        { icon: 'phonelink', text: 'App downloads', link: '/' },
        { icon: 'keyboard', text: 'Keyboard shortcuts', link: '/' }
      ]
    }),
    methods: {
            logout: function () {
                console.log("entro a al logout");
                //                this.dialog = true;
                axios
                    .post(`/logout`, {
                        _token: this.csrf
                    })
                    .then(response => {
                        window.location.href = '/';
                        // JSON responses are automatically parsed.
                        //                        this.user = response.data;
                        //                        console.log(response.data);
                    })
                    .catch(e => {
                        //                        this.errors.push(e);
                    });
            },
            // edit () { window.location.href = '/cliente'; },
            link (link) { 
                window.location.href = `${link}`;
             },
            // home: function () {
            //     console.log("no entra");
                
            //     window.location.href = '/';
            // },
            clientes: function () {
                window.location.href = '/cliente';
            },
            control: function () {
                window.location.href = '/control';
            },
            reporte: function () {
                window.location.href = '/report';
            },
            usuarios: function () {
                window.location.href = '/user';
            },
        },
  }
</script>