<template>
  <v-layout row>
    <v-flex xs12 sm8 offset-sm2>
      <v-card class="grid">
        <v-toolbar color="white" flat>
          <v-btn icon light>
            <v-icon color="grey darken-2">arrow_back</v-icon>
          </v-btn>
          <v-toolbar-title class="grey--text text--darken-4">Olhe o que encontramos para você:</v-toolbar-title>
          <v-spacer></v-spacer>
        </v-toolbar>
        <v-subheader>Categoria Tabuleiro</v-subheader>
        <v-container fluid grid-list-sm>
          <v-layout row wrap>
            <v-flex xs12 sm6 md4 v-for="(item, i) in results" :key="i" class="my-2">
              <v-card height="100%" @click.stop="openDetails(item)" dark :class="'ma-1 ' + 'cardItens ' +  `blue-grey darken-${i+1}`">
                <v-card-text>
                  <v-layout>
                    <v-flex xs10>
                      <v-icon dark xLarge >{{ item.icon }}</v-icon>
                      <h3 class="headline mb-0">{{ item.title }}</h3>
                      <div>{{ item.description }}</div>
                    </v-flex>
                    <v-flex xs2>
                      <v-chip class="cyan badge-card">{{item.badge}}</v-chip>
                    </v-flex>
                  </v-layout>
                </v-card-text>
              </v-card>
  
              <v-dialog v-model="dialog" persistent width="100%">
                <!--<v-btn primary dark slot="activator">Open Dialog</v-btn>-->
                <v-card>
                  <v-card-title>
                    <h5>Como o jogo funciona?</h5>
                  </v-card-title>
                  <v-divider></v-divider>
                  <v-card-text class="modal-body">
                    {{ item.description}}
                  </v-card-text>
                  <v-divider></v-divider>
                  <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn class="grey lighten-1 black--text" dark @click.native="!dialog">Fechar</v-btn>
                  </v-card-actions>
                </v-card>
              </v-dialog>
              
            </v-flex>
          </v-layout>
        </v-container>
        <v-footer class="mt-5"></v-footer>
      </v-card>
    </v-flex>
  </v-layout>
</template>
<script>
  export default {
    created () {
      console.log(this.$router.currentRoute)

      this.$on('searchGame', (data) => {
        this.results = data
        this.dialog = false
      })
    },
    data () {
      return {
        results: [],
        dialog: false
      }
    }
  }
</script>