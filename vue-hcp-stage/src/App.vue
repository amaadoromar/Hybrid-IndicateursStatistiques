<template>
    <LoadingScreen :isLoading="isLoading" />
    <main v-if="!isLoading">
      <IonApp>
      <IonRouterOutlet />
      </IonApp>
    </main>
</template>

<script>
import { IonApp, IonRouterOutlet } from '@ionic/vue';
import { defineComponent } from 'vue';
import  LoadingScreen from './components/base/LoadingScreen.vue';

export default defineComponent({
  name: 'App',
  components: {
    IonApp,
    IonRouterOutlet,
    LoadingScreen
  },
  data() {
    return { isLoading: true };
  },
  mounted() {
    setTimeout(() => {
      this.isLoading = false;
    }, 3000);
  }
});
</script>
