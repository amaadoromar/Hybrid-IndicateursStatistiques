<template>
        <base-layout page-title="Toutes les thematiques">
<div style="padding-top:2%">
<ion-chip>
    <ion-icon :icon="bookOutline"></ion-icon>
    <ion-label>Liste des thematiques</ion-label>
  </ion-chip>
</div>
    <ion-list style="background:transparent;padding-left:2%;padding-right:2%;" v-for="data in data" :key="data.id">
           <ion-item><router-link :to="'/indicateurs/' + data.id_thematique">{{ data.titre }}  </router-link></ion-item>
          
           </ion-list>

       </base-layout>
</template>

<script>

import { IonList,IonItem  } from '@ionic/vue';
import  {bookOutline} from  'ionicons/icons';

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
      const res = await fetch('http://127.0.0.1:3000/thematiquesbycategory/' + this.$route.params.id);
      const data = await res.json();
      this.data = data;
    }
},
setup(){
  return{
    bookOutline,
  }
}
}
</script>
