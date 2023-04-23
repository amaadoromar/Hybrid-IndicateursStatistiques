<template>
        <base-layout page-title="Mes preferences">
<ion-card>
    <ion-card-header>
      <ion-card-title>Liste des catégories préferrées</ion-card-title>
    </ion-card-header>

    <ion-card-content>
      <ion-button v-on:click="changeaddinfo()">
      <a style="color:white" v-if="additem==false">Ajouter une catégorie</a>
      <a style="color:white" v-else-if="additem==true">Masquer</a>
  </ion-button>
  <div v-if="additem==true">
    <AddprefItem v-on:add-pref-event="addprefItem" />
    </div>
    </ion-card-content>
  </ion-card>
 
      <prefs style="background:transparent;padding-left:2%;padding-right:2%;" v-bind:prefs="prefs" v-on:del-pref-event="deleteprefItem"  />

       </base-layout>
</template>


<script>
  import { toastController,IonCardHeader,IonCardTitle,IonButton,IonCardContent,IonCard} from '@ionic/vue';
  import prefs from "./preferences/prefs";
  import AddprefItem from "./preferences/AddprefItem";

export default {
  name: 'App',
  components: {
    prefs,
    AddprefItem,
    IonCard,
    IonCardHeader,
    IonCardContent,
    IonButton,
    IonCardTitle,
  },
  data () {
    return {
      prefs: [],
      notadded:false,
      additem:false,
    
    }
  },
  methods: {
      changeaddinfo(){
         this.additem = !this.additem;
      },
       async openToastfalse() {
      const toast = await toastController
        .create({
          message: 'Vous avez deja ajouter cette categorie.',
          position: 'middle',
          duration: 2000
        })
      return toast.present();
    },  
         async openToasttrue() {
      const toast = await toastController
        .create({
          message: 'Ajout avec succès',
          position: 'middle',
          duration: 2000
        })
      return toast.present();
    },
    addprefItem(newpref){
       console.log('newpref', newpref.title);
        console.log(this.prefs);
        
         for (var i = 0; i < this.prefs.length; i++) {
          if(newpref.id==this.prefs[i].id){
           this.notadded = true;
           this.openToastfalse();
           break;
          }
     }

    if(this.notadded==false)
     {
        
       this.prefs = [...this.prefs, newpref];
       this.openToasttrue();
     }
        
    },
    deleteprefItem(id){
      this.prefs = this.prefs.filter(pref => pref.id !== id);
    },
  },
  watch: {
    prefs: {
      handler() {
        localStorage.setItem('prefs',JSON.stringify(this.prefs))
      },
      deep: true
    }
  },
  mounted() {
    if (localStorage.getItem("prefs")){
      this.prefs = JSON.parse(localStorage.getItem("prefs"))
    }
  }
}
</script>

<style>
#app {
  text-align: center;
  color: #2c3e50;
}
</style>

