<template>
<base-layout page-title="Toutes les Indicateurs">
  <StatistiquesChart  />
  </base-layout >
</template>

<script>
import { defineComponent } from 'vue'
import StatistiquesChart from './StatistiquesChart.vue'

export default defineComponent({
  name: 'App',
  components: {
    StatistiquesChart
  },
 
 
})
</script>