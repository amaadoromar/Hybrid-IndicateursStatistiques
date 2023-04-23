<template>
 <ion-page>
       <ion-header>
           <ion-toolbar>
           <div style="padding-left:3%;float:left">
           <router-link style="color: inherit;"  :to="'/'"><ion-icon :icon="home"></ion-icon></router-link>
           </div>
<div style="padding-right:3%;float:right;">
            <router-link style="color: inherit;"  :to="'/aboutus'"><ion-icon :icon="informationCircle"></ion-icon></router-link>
           </div>
           <ion-buttons slot="start">
           <ion-back-button></ion-back-button>
           </ion-buttons>
           
           <ion-title>
           
           <img alt="logo" height="20"  src="../../assets/hcp/logo2.png" >  {{ pageTitle }}
             
           </ion-title> 
         
           </ion-toolbar>
       </ion-header>
       <ion-content>
       <div id="picachu">
       
                  <slot />
                  </div>
       </ion-content>
<ion-footer>
       <ion-tabs>
      <ion-tab-bar slot="bottom">
        <ion-tab-button tab="home" href="/statistiques/">
           <ion-icon :icon="home"></ion-icon>
          <ion-label>Categories</ion-label>
        </ion-tab-button>

        <ion-tab-button tab="Indicateurs" href="/allindicateurs">
              <ion-icon :icon="statsChart"></ion-icon>
          <ion-label>Tous les indicateurs</ion-label>
        </ion-tab-button>

        <ion-tab-button tab="Preferences" href="/preferences">
              <ion-icon :icon="heart"></ion-icon>
          <ion-label>Preferences</ion-label>
        </ion-tab-button>

           <ion-tab-button tab="New" href="/importation">
              <ion-icon :icon="add"></ion-icon>
          <ion-label>Importer indicateur</ion-label>
        </ion-tab-button>
      </ion-tab-bar>
    </ion-tabs>
     </ion-footer>  
   </ion-page>
</template>

<script>
import {IonPage , IonToolbar, IonTabBar, IonTabButton, IonTabs, IonIcon, IonLabel, IonHeader, IonTitle, IonContent , IonButtons, IonBackButton } from '@ionic/vue';
import { calendar,home, personCircle,statsChart,add,heart,informationCircle } from 'ionicons/icons';

  
export default {
props: ['pageTitle'],
    components: {
        IonPage,
        IonIcon, 
        IonLabel, 
        IonHeader,
        IonToolbar,
        IonTitle,
        IonContent,
        IonBackButton,
        IonButtons,
        IonTabBar, 
        IonTabButton, 
        IonTabs,
      
    },
     setup() {
    return {
      calendar,
      home,
      personCircle,
      statsChart,
      add,
      heart,
      informationCircle
    }
} }

</script>
<style>
#picachu{
  background-image:url('../../assets/hcp/background.jpg');
  position:absolute;
  width:100%;
  height:100%;
}
</style>