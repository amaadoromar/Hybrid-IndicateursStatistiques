<script>
import { defineComponent } from 'vue'
import { Bar } from 'vue3-chart-v2'

export default defineComponent({
  name: 'StatistiquesChart',
  extends: Bar,
   data() {
    return {
      data:{},
      annee: [],
      valeur : [],
      titre :[],
    }
  },
  
  beforeMount(){
this.getStatistiques();
  },
  mounted () {
    this.renderChart({
      labels: this.annee,
      datasets: [
        {
          label: this.titre,
          backgroundColor: '#f87979',
          data: this.valeur
        }
      ]
    })
  },
   methods: {
    async getStatistiques(){
      const self =  this;
      const res = await fetch('http://localhost:3000/databi/' + this.$route.params.id);
      const data = await res.json();
      self.data = data;
      this.titre[0] = data[1].definition;
      for (var i = 0; i < data.length; i++) {
     this.annee[i] = data[i].annee
     this.valeur[i] = data[i].valeur
     }
    }
  }
})
</script>