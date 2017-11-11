<template>
  <div>
    <v-stepper v-model="e6"  non-linear  >
      <div v-for="(item, i) in questions" :key="i">
        <v-stepper-step :step="i+1">
          {{item.description}}
          <small>Selecione uma resposta abaixo</small>
        </v-stepper-step>
        <v-stepper-content :step="i+1">
          <v-card class="mb-5">
            <v-card-text>
              <v-layout row wrap>
                <v-flex xs2 v-for="(j, key) in item.possibilities" :key="key">
                  <v-checkbox v-if="i == 0 || i == 1" :label="j" v-model="user_answers" :value="j"></v-checkbox>
                  <v-radio-group v-model="row" row v-else-if="i == 2 || i == 3">
                    <v-radio :label="j" :value="j" ></v-radio>
                  </v-radio-group>
                </v-flex>
              </v-layout>
            </v-card-text>
          </v-card>
          <v-btn v-if="i !== 3"  dark color="light-blue" @click.native="e6 = i+2">Próxima pergunta</v-btn>
          <v-btn v-if="i !== 0" dark color="amber darken-1" @click.native="e6 = i">Voltar para anterior</v-btn>
          <!--<v-btn flat>Cancel</v-btn>-->
        </v-stepper-content>
      </div>
    </v-stepper>
    
    {{user_answers}}
  </div>
</template>

<script>
  props: ['icon']
  export default {
    data () {
      return {
        e6: 1,
        questions: [
          { description: 'Qual é a faixa etária dos jogadores?', possibilities : ['Livre', 'Até 5','Até 10', 'Até 12', '+18']},
          { description: 'Quantas pessoas irão jogar?', possibilities : ['2','3', '4', '5', '6', '+7']},
          { description: 'Quantas pessoas irão jogar?', possibilities : ['2','3', '4', '5', '6', '+7']},
          { description: 'Quantas pessoas irão jogar?', possibilities : ['2','3', '4', '5', '6', '+7']},
        ],
        user_answers: [],
        row: []
      }
    }
  }
</script>

<style>

</style>