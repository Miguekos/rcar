<template>
  <div>
    <v-app :dark="isDark">
      <v-content>
        <v-container>
          <v-layout row justify-center class="ma-5">
            <v-flex xs12 sm8 lg12>
              <v-card>
                <v-toolbar color="blue darken-4" dark>
                  <v-toolbar-side-icon></v-toolbar-side-icon>
                  <v-toolbar-title class="headline">Afiliar Autos</v-toolbar-title>

                  <v-spacer></v-spacer>

                  <v-btn icon>
                    <v-icon>search</v-icon>
                  </v-btn>
                  <v-tooltip bottom>
                    <template v-slot:activator="{ on }">
                      <v-btn icon @click="show = !show" v-on="on">
                        <v-icon
                          v-model="isDark"
                          @click="isDark = !isDark"
                        >{{ show ? 'check_circle' : 'check_circle_outline' }}</v-icon>
                      </v-btn>
                    </template>
                    <span>Dark mode</span>
                  </v-tooltip>
                </v-toolbar>

                <v-list two-line subheader>
                  <v-container>
                    <v-subheader class="headline">{{day}} , {{date}}{{ord}}</v-subheader>
                    <v-spacer></v-spacer>

                    <p class="text-xs-right">
                      <b>{{todos.length}}</b> Tasks
                    </p>

                    <v-btn @click="addTodo(), getautoafiliado()" color="success">text</v-btn>

                    <v-flex xs12>
                      <v-autocomplete
                        clearable
                        :items="autosafiliados"
                        item-text="placa"
                        item-value="id"
                        color="white"
                        v-model="newTodo"
                        id="newTodo"
                        name="newTodo"
                        label="Type your task"
                        @keyup.enter="addTodo"
                      ></v-autocomplete>
                    </v-flex>
                  </v-container>
                  <v-subheader
                    class="subheading"
                    v-if="todos.length == 0"
                  >You have 0 Tasks, add some</v-subheader>
                  <v-subheader class="subheading" v-else="todos.length == 1">Your Tasks</v-subheader>
                  <div v-for="(todo, i) in todos">
                    <v-list-tile avatar>
                      <v-list-tile-action>
                        <v-checkbox v-if="!todo.done" v-model="todo.done"></v-checkbox>
                      </v-list-tile-action>
                      <v-list-tile-content>
                        <v-list-tile-title
                          :class="{
                  done: todo.done
                  }"
                          class="title"
                        >{{todo.title | capitalize}}</v-list-tile-title>
                        <v-list-tile-sub-title>Added on: {{date}}{{ord}} {{day}} {{year}}</v-list-tile-sub-title>
                      </v-list-tile-content>
                      <v-btn icon ripple color="red" @click="removeTodo(i)">
                        <v-icon class="white--text">close</v-icon>
                      </v-btn>
                    </v-list-tile>
                  </div>
                </v-list>
              </v-card>
            </v-flex>
          </v-layout>
        </v-container>
      </v-content>
      <pre>{{ $data }}</pre>
    </v-app>
  </div>
</template>
<script>
export default {
  data() {
    return {
      autosafiliados: {},
      isDark: false,
      show: true,
      newTodo: "",
      todo: [],
      todos: [],
      day: this.todoDay(),
      date: new Date().getDate(),
      ord: this.nth(new Date().getDate()),
      year: new Date().getFullYear()
    };
  },
  methods: {
    getAutos() {
      axios
        .get(`/v1.0/autos`)
        .then(response => {
          console.log(response.data.autos);
          this.autosafiliados = response.data.autos;
        })
        .catch(err => {
          console.log(err);
        });
    },
    getautoafiliado() {
      console.log("getautoafiliado");
      axios
        .get(`/v1.0/auto/${this.newTodo}`)
        .then(response => {
          console.log(response.data);
          this.autoaguardar = response.data;
          this.removeTodo(response.data);
        })
        .catch(err => {
          console.log(err);
        });
    },
    addTodo() {
      //   var value = this.newTodo && this.newTodo.trim();
      //   if (!value) {
      //     return;
      //   }
      this.todos.push({
        title: this.newTodo,
        done: false
      });
      // this.newTodo = "";
    },
    removeTodo(index) {
      this.todos.splice(index, 1);
      this.autosafiliados.splice(index, 1);
    },
    todoDay() {
      var d = new Date();
      var days = [
        "Sunday",
        "Monday",
        "Tuesday",
        "Wednesday",
        "Thursday",
        "Friday",
        "Saturday"
      ];
      return days[d.getDay()];
    },
    nth(d) {
      if (d > 3 && d < 21) return "th";
      switch (d % 10) {
        case 1:
          return "st";
        case 2:
          return "nd";
        case 3:
          return "rd";
        default:
          return "th";
      }
    }
  },
  filters: {
    capitalize: function(value) {
      if (!value) return "";
      value = value.toString();
      return value.charAt(0).toUpperCase() + value.slice(1);
    }
  },
  mounted() {
    this.getAutos();
  }
};
</script>

<style scoped>
.done {
  text-decoration: line-through;
}
</style>
