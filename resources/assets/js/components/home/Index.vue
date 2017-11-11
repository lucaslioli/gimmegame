<template>
  <v-app  class="light-blue">
    <v-toolbar dark color="white">
      <v-toolbar-title class="white--text">{{title}}</v-toolbar-title>
      <v-spacer></v-spacer>
    </v-toolbar>
    <main>
      <v-container fluid>
        <slot></slot>
      </v-container>
    </main>
  </v-app>
</template>
<script>
  export default {
    props: ['title'],
    data () {
      return {
      
      }
    },
  }
</script>