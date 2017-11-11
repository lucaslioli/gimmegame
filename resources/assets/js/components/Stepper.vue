<template>
  <div>
    <v-stepper v-model="e6"  non-linear  >
      <div v-for="(item, i) in questions" :key="i">
        <v-stepper-step :step="i+1">
          {{item.description}}
          <small v-if="i > 0">Selecione uma resposta abaixo</small>
        </v-stepper-step>
        <v-stepper-content :step="i+1">
          <v-card class="mb-5" v-if="i > 0">
            <v-card-text>
              <v-layout row wrap>
                <v-flex xs2 v-for="(j, key) in item.possibilities" :key="key">
                  <v-checkbox v-if="i == 3" :label="j" v-model="fields_multiples3" :value="j"></v-checkbox>
                  <v-checkbox v-if="i == 4" :label="j" v-model="fields_multiples4" :value="j"></v-checkbox>
                  <v-radio-group v-model="fields_uniques1" row v-else-if="i == 1 ">
                    <v-radio :label="j" :value="j" ></v-radio>
                  </v-radio-group>
                  <v-radio-group v-model="fields_uniques2" row v-else-if="i == 2 ">
                    <v-radio :label="j" :value="j" ></v-radio>
                  </v-radio-group>
                </v-flex>
              </v-layout>
            </v-card-text>
          </v-card>
          <v-btn v-if="i == 0"  dark color="light-blue" @click.native="e6 = i+2">Vamos Começar</v-btn>
          <v-btn v-else-if="i !== 4"  dark color="light-blue" @click.native="e6 = i+2">Próxima pergunta</v-btn>
          
          <v-btn v-if="i !== 0" dark color="amber darken-1" @click.native="e6 = i">Voltar para anterior</v-btn>
          <!--<v-btn flat>Cancel</v-btn>-->
        </v-stepper-content>
      </div>
    </v-stepper>
  
    <v-fab-transition>
      <v-btn class="amber darken-1 search-button" @click.native.stop="searchGames()"
             dark
             fab
             fixed
             bottom
             right
      >
        <v-icon>search</v-icon>
        <v-icon>close</v-icon>
      </v-btn>
    </v-fab-transition>
  </div>
</template>

<script>

  import VForm from "vuetify/src/components/VForm/VForm";

  props: ['icon']
  export default {
    components: {VForm},
    created () {
      console.log(this.$router.currentRoute)
      
      this.getQuestions()
    },
    data () {
      return {
        e6: 1,
        questions: [],
        fields_multiples3: [],
        fields_multiples4: [],
        fields_uniques1: [],
        fields_uniques2: [],
        fields_text: []
      }
    },
    methods: {
      targetRoute: function (target) {
        return this.$router.push(target)
      },
      getQuestions () {
        axios.get('questions').then((res) => {
          console.log(res)
          this.questions = res.data;
        });
      },
      searchGames () {
        this.fields_uniques1
        this.fields_uniques2
        this.fields_multiples3
        this.fields_multiples4
        this.fields_text
        
        let fields = {
          minimun_age: this.fields_uniques1,
          minimun_number_player: this.fields_uniques2,
          categories: this.fields_multiples3,
          objects: this.fields_multiples4,
          search_text: this.fields_multiples4,
        }
        
        axios.post(`search?fields=${fields}`, fields).then((res) => {
          console.log(res)
          this.questions = []
          this.e6 = 1
          this.$emit('searchGame', res.data)
          this.targetRoute('/results')
        });
      }
    }
    
  }
</script>

<style>
 .search-button {
   margin-right: 15px
 }
</style>