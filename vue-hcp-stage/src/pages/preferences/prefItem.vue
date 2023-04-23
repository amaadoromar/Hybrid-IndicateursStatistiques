<template>
        <ion-list style="background:transparent;padding-left:2%;padding-right:2%;">
     <ion-item-sliding>

           <ion-item>
           <router-link :to="'/thematiques/' + pref.id">{{ pref.title.category_name }}</router-link>
           </ion-item>

          <ion-item-options side="end">
        <ion-item-option color="danger" @click="$emit('del-pref-item', pref.id)">Supprimer</ion-item-option>
      </ion-item-options>
    </ion-item-sliding>
           </ion-list>

</template>

<script>
import { IonList,IonItem } from '@ionic/vue';
    export default {
        components:{IonList,IonItem},
        name: "prefItem",
        props: ["pref"]
    }
</script>

<style scoped>
    .glyphicon-pencil, .glyphicon-trash{
        font-size: 15px;
        padding-left: 100px;
    }
    .float-right{
        float: right;
    }
</style>
