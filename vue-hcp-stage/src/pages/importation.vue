<template>
<base-layout page-title="Importer un indicateur">
<div class="importation">
  <form v-on:submit.prevent="submitForm" >
<ion-card>
    <ion-card-header>
      <ion-card-title>Spécifier le nom de l'indicateur</ion-card-title>
    </ion-card-header>
    <ion-card-content>
                    <input type="text" name="nom" id="nom" ref="nom" placeholder="le nom d'indicateur" v-model="form.nom" required>
                    <br />
    </ion-card-content>
    </ion-card>

    <ion-card>
    <ion-card-header>
      <ion-card-title>Spécifier la catégorie</ion-card-title>
    </ion-card-header>
    <ion-card-content>
                  <input type="text" name="categorie" id="categorie" ref="categorie" placeholder="categorie de l'indicateur"  v-model="form.categorie" required>
                    <br />
    </ion-card-content>
    </ion-card>

 <ion-card>
    <ion-card-header>
      <ion-card-title>Spécifier la thématique</ion-card-title>
    </ion-card-header>
    <ion-card-content>
                  <input type="text" name="thematique" id="thematique" ref="thematique" placeholder="thematique de l'indicateur"  v-model="form.thematique" required>

<br />
    </ion-card-content>
    </ion-card>

 <ion-card>
    <ion-card-header>
      <ion-card-title>Importer les données sous forme d'un fichier CSV</ion-card-title>
    </ion-card-header>
    <ion-card-content>
                    <label>Choisir le Fichier CSV <input accept=".csv" type="file" id="file" ref="file" required/> </label>
   
    </ion-card-content>
    </ion-card>
         
                    <ion-button v-on:click="uploadFile()">ENOVYER LES  DONNEES</ion-button>
            </form>
            </div>
  </base-layout>
</template>
<script>
  import { toastController } from '@ionic/vue';
  export default  {
      data () {
      return { 
          success:'',     
          file:'',
          form: {
                nom: '',
                categorie: '',
                thematique: '',
            }
           
      }    
    },
    methods: {   
        async openToastfalse() {
      const toast = await toastController
        .create({
          message: 'Erreur.',
          position: 'middle',
          duration: 2000
        })
      return toast.present();
    },  
         async openToasttrue() {
      const toast = await toastController
        .create({
          message: 'Importation complète  , Merci.',
          position: 'middle',
          duration: 2000
        })
      return toast.present();
    },  
       uploadFile: function(){
                 const self = this;
                 this.file = this.$refs.file.files[0];                
                 let formData = new FormData();
                 formData.append('file', this.file);
                 formData.append('nom', document.querySelector("input[name=nom]").value);
                 formData.append('categorie',document.querySelector("input[name=categorie]").value);
                 formData.append('thematique',document.querySelector("input[name=thematique]").value);
                 this.$refs.file.value = '';
                 if(this.file != null && document.querySelector("input[name=nom]").value != null && document.querySelector("input[name=categorie]").value != null && document.querySelector("input[name=thematique]").value != null )
                {
                this.axios.post('http://localhost/hcp/api/upload.php', formData,
                {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                    
                    }
                })
                .then(function (response) {
                    if(!response.data){
                       self.openToastfalse();
                       return self.success =  false;   
                    }else{
                        self.openToasttrue();
                        return self.success =  true;                    
                    }
                })
                .catch(function (error) {
                    console.log(error);
                 });}
                 else {
                   self.openToastfalse();
                 }
       }
    },
    
    
}
</script>
<style>
.importation{
    padding-top:5%;
    padding-bottom:19%;
   background-image: url('http://www.fsdmfes.ac.ma/Template/img/background.jpg');
}
</style>