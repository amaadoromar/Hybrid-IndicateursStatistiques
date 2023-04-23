<template>
        <base-layout page-title="Toutes les Indicateurs">
<div style="padding-top:2%">
<ion-chip>
    <ion-icon :icon="statsChart"></ion-icon>
    <ion-label>Liste de tous les indicateurs</ion-label>
  </ion-chip>
</div>
    <ion-list style="background:transparent;padding-left:2%;padding-right:2%;" v-for="data in data" :key="data.id">
           <ion-item><router-link :to="'/data/' + data.id_indicateur">{{ data.category_name }} : {{ data.definition }} <h5 style="color:red">{{ data.unite }}</h5></router-link></ion-item>
           </ion-list>

       </base-layout>
</template>

<script>

import { IonList,IonItem } from '@ionic/vue';
import {statsChart}  from 'ionicons/icons';

export default {
    components: {
        IonList,
        IonItem,
    },
      name: "app",
  data() {
    return {
      data: {}
    }
  },
  beforeMount(){
    this.getName();
  },
  methods: {
    async getName(){
      const res = await fetch('http://localhost:3000/indicateurs/');
      const data = await res.json();
      this.data = data;
    }
  },
  setup(){
    return{
      statsChart,
    }
  }
}
</script>
