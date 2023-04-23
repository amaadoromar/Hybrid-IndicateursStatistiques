<template>
 <base-layout page-title="Accueil">
 <router-link style="color:inherit;text-decoration:none;" :to="'/statistiques'">
      <ion-card>
        <img src="../assets/hcp/categories.jpg" />
        <ion-card-header>
          <ion-card-title>Categories</ion-card-title>
        </ion-card-header>
        <ion-card-content>
          Cliquer Ici pour afficher toutes les categories des indicateurs
        </ion-card-content>
      </ion-card>
      </router-link>
    <router-link style="color:inherit;text-decoration:none;" :to="'/allindicateurs'">
      <ion-card>
        <img src="../assets/hcp/indicateurs.jpg" />
        <ion-card-header>
          <ion-card-title>Indicateurs</ion-card-title>
        </ion-card-header>
        <ion-card-content>
          Cliquer Ici pour afficher tous les indicateurs
        </ion-card-content>
      </ion-card>
      </router-link>
    <router-link style="color:inherit;text-decoration:none;" :to="'/aboutus'">
      <ion-card>
        <img src="../assets/hcp/info.jpg" />
        <ion-card-header>
          <ion-card-title>Haut-Commissariat au Plan</ion-card-title>
        </ion-card-header>
        <ion-card-content>
          Qui sommes nous?
        </ion-card-content>
      </ion-card>
      </router-link>
</base-layout>
</template>

<script>
import {IonCard,IonCardHeader,IonCardTitle,IonCardContent} from '@ionic/vue';
export default {
    components: {IonCard,
		IonCardHeader,
		IonCardTitle,
		IonCardContent,},
      name: "app",
}
</script>
<style>

ion-toolbar{
        --background: #FFFFFF;
}

.logoplace {
            border-radius: 10px 60px;
            background: #ffffff;
            padding : 10px;
            text-align: center;
            width: 250px;
            height: 80px;
        }
</style>
