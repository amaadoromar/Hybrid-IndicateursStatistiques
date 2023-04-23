<template>
  <div :class="{ loader: true, fadeout: !isLoading }">
  <img  src="../../assets/hcp/hcp2.png" style="width: 50%;padding-top:5%;"  />
  <ion-card>
  <ion-card-content>
  <h3 style="font-family: 'Lato'; color:  black;text-align:center;">
  Bienvenue à l'application de visualisation des indicateurs statistiques du Haut Commissariat au Plan
  Principal producteur de l’information statistique économique, démographique et sociale et chargé de l’établissement des comptes de la nation.
  </h3>
  </ion-card-content>
  </ion-card>
    <ion-progress-bar type="indeterminate" reversed="true"></ion-progress-bar>
  </div>
</template>

<script>
import { IonProgressBar } from '@ionic/vue';
export default {
     components: { IonProgressBar },
  name: "LoadingScreen",
  props: ["isLoading"]
};
</script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Lato:wght@400&display=swap');
.loader {
  background-color: #ffffff;
  background-image: url("../../assets/hcp/bg.png"); /* The image used */
  background-position: center; /* Center the image */
  background-repeat: no-repeat; /* Do not repeat the image */
  background-size: cover; 
  bottom: 0;
  color: white;
  display: block;
  font-size: 32px;
  left: 0;
  overflow: hidden;
  padding-top: 10vh;
  position: fixed;
  right: 0;
  text-align: center;
  top: 0;
}


.fadeout {
  animation: fadeout 2s forwards;
}

@keyframes fadeout {
  to {
    opacity: 0;
    visibility: hidden;
  }
}
</style>
