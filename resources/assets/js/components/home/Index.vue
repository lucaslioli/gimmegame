<template>
  <v-app toolbar class="light-blue lighten-3">
    <v-toolbar dark fixed color="white">
      <v-toolbar-title justify-center fill-height><img class="mt-2" src="/img/GimmeGame_Typo01.png" width="180px"></v-toolbar-title>
      <v-spacer></v-spacer>
      <img src="/img/GimmeGame_Symbol01.png" width="50px">
    </v-toolbar>
    <main class="main">
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

<style>
  .main {
    margin-top: 65px;
  }
</style>
