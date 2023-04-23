<template>
    <div>
        <div v-bind:key="pref.id" v-for="pref in prefs">
            <prefItem v-bind:pref="pref" v-on:del-pref-item="delprefMethod" />
        </div>
        <div v-if="!prefs.length">
            <p>Aucune catégorie préferrée</p>
        </div>
    </div>
</template>

<script>
    import prefItem from "./prefItem";
    export default {
        name: "prefs",
        props: ["prefs"],
        components: {
            prefItem
        },
        methods: {
            delprefMethod(id){
                //send to parent
                this.$emit('del-pref-event', id);
            },
        }
    }
</script>

<style scoped>

</style>
