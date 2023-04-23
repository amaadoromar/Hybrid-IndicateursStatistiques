<template>

    
        <form @submit="addpref">
        
                 <select class="form-control" v-model="title">
                 <option value=""  disabled hidden>Choisir Ici</option>
            <option  :value="{'id':data.id,'category_name':data.category_name}"  v-for="(data) in data" :key="data.id" selected>{{data.category_name}}</option>
            </select>
            
  <ion-button  type="submit">Ajouter</ion-button>

        </form>
    
</template>

<script>


    export default {
        name: "AddprefItem",
        props: ['editpref'],
        data () {
            return {
                title: {},
                id: '',
                edit: false,
                data:{},
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
    },
            addpref(e){
                e.preventDefault();
                if (this.edit === false){
                    const newpref = {
                        title: this.title,
                        id: this.title.id,
                    };
                    if (newpref.title !== ''){
                        this.$emit('add-pref-event', newpref);
                    }
                    this.title = ''
                }
            }
        },
        watch: {
            title:{
                handler(){
                    if(this.title === ''){
                        this.edit = false;
                    }
                }
            }
        }
    }
</script>

<style scoped>
</style>
