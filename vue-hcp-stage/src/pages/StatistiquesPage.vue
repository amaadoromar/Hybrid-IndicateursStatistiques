<template>
        <base-layout page-title="toutes les Categories">
 <div style="padding-top:2%">
<ion-chip>
    <ion-icon :icon="home"></ion-icon>
    <ion-label>Liste des catégories</ion-label>
  </ion-chip>
</div>
    <ion-list style="background:transparent;padding-left:2%;padding-right:2%;" v-for="data in data" :key="data.id">
          
           <ion-item style="background:transparent;">
           <router-link :to="'/thematiques/' + data.id">{{ data.category_name }}</router-link></ion-item>
           </ion-list>

       </base-layout>
</template>

<script>

import { IonList,IonItem } from '@ionic/vue';
import { home } from 'ionicons/icons';

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
      const res = await fetch('http://localhost:3000/categories/');
      const data = await res.json();
      this.data = data;
    }
  },
   setup() {
    return {
      home,
    }
   }
}
</script>
<style>

</style>