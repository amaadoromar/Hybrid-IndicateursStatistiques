import { createRouter, createWebHistory } from '@ionic/vue-router';
import StatistiquesPage from '../pages/StatistiquesPage.vue';
import ThematiquesPage from '../pages/ThematiquesPage.vue';
import IndicateursbyIDPage from '../pages/IndicateursbyIDPage.vue';
import allindicateurs from '../pages/IndicateursallPage.vue';
import data from '../pages/IndicateursDetails.vue';
import home from '../pages/Home.vue';
import aboutus from '../pages/aboutus.vue';
import test  from '../pages/test.vue';
import preferences from '../pages/Preferences.vue';
import importation from '../pages/importation.vue';

const routes = [
  {
    path: '/',
    component : home
  },
 {
   path: '/statistiques',
   component: StatistiquesPage
 },
 {
  path: '/thematiques/:id',
  component: ThematiquesPage
},
{
path: '/indicateurs/:id',
  component: IndicateursbyIDPage
},
{
path: '/allindicateurs/',
  component: allindicateurs
},
{
  path: '/data/:id',
    component: data
  },
  {
    path: '/aboutus',
    component: aboutus
  },
  {
    path: '/importation',
    component: importation
  },
{
  path: '/test',
  component: test
},
{
  path: '/preferences',
  component: preferences
},
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
