<template>
  <base-layout page-title="Details de l'indicateur ">
  <ion-button v-on:click="changeshowinfo()">
      <a style="color:white" v-if="showinfo==true">Masquer les données</a>
      <a style="color:white" v-else-if="showinfo==false">Afficher les données</a>
  </ion-button>
<div v-if="showinfo" class="info">
 <ion-card>
    <ion-card-header>
      <ion-card-title>Definition</ion-card-title>
    </ion-card-header>

    <ion-card-content>
      {{ definition }}
    </ion-card-content>
  </ion-card>
   <ion-card>
    <ion-card-header>
      <ion-card-title>Unité</ion-card-title>
    </ion-card-header>

    <ion-card-content>
      {{ unite }}
    </ion-card-content>
  </ion-card>
   <ion-card>
    <ion-card-header>
      <ion-card-title>Indication</ion-card-title>
    </ion-card-header>

    <ion-card-content>
      {{ indication }}
    </ion-card-content>
  </ion-card>
   <ion-card>
    <ion-card-header>
      <ion-card-title>Source</ion-card-title>
    </ion-card-header>

    <ion-card-content>
      {{ source }}
    </ion-card-content>
  </ion-card>
   <ion-card>
    <ion-card-header>
      <ion-card-title>Periodicité</ion-card-title>
    </ion-card-header>

    <ion-card-content>
      {{ periodicite }}
    </ion-card-content>
  </ion-card>
     <ion-card>
    <ion-card-header>
      <ion-card-title>Couverture</ion-card-title>
    </ion-card-header>

    <ion-card-content>
      {{ couverture }}
    </ion-card-content>
  </ion-card>
</div>
<div class="infodata">
<div v-if="pagination==false">
<center>
  <table>
    <caption> {{definition}} </caption>
    <tr>
        <th scope="col">Année</th>
        <th scope="col">Valeur</th>
        <th scope="col">Unité</th>
    </tr>
    <tr  v-for="data in data" :key="data.id">
        <th scope="row">{{ data.annee }}</th>
        <td>{{ data.valeur }}</td>
        <td>{{ data.unite }}</td>
    </tr>
</table>
</center>
</div>
<div v-else-if="pagination==true">
<StatistiquesChart id="ds"  />
</div>
<div v-else>
</div>
</div>
 <ion-button :href="'http://localhost/hcp/api/download.php?id_indicateur=' + this.$route.params.id">
    EXPORTER CSV 
  </ion-button>

<ion-button v-on:click="change()">
      <a style="color:white" v-if="pagination==true">Afficher le tableau</a>
      <a style="color:white" v-else-if="pagination==false">Afficher le graphique en barres</a>
  </ion-button>

</base-layout>
</template>

<script>
import { IonButton } from '@ionic/vue';
import StatistiquesChart from './StatistiquesChart.vue'

export default {
  
    components: {  
      IonButton,StatistiquesChart
    },
      name: "infodata",
  data() {
    return {
      data: {},
      definition :'',
      unite:'',
      indication:'',
      source:'',
      periodicite:'',
      couverture:'',
      pagination:false,
      showinfo:true,
    }
  },
  beforeMount(){
    this.getName();
  },
  methods: {
    async getName(){
      const self =  this;
      const res = await fetch('http://localhost:3000/databyindicateur/' + this.$route.params.id);
      const data = await res.json();
      this.data = data;
      self.definition  = data[0].definition;
      self.unite = data[0].unite;
      self.indication = data[0].indication;
      self.source = data[0].source;
      self.periodicite = data[0].periodicite;
      self.couverture = data[0].couverture;
    
      console.log(data);
      StatistiquesChart.idstatistique = 1;
    },
  
    change(){
      this.pagination = !this.pagination;
    },
    changeshowinfo(){
      this.showinfo = !this.showinfo;
    }
  }
}

</script>
