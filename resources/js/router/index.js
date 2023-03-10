import { createRouter, createWebHistory } from "vue-router";

import DashboardView from '../views/admin/DashboardView.vue';
import HomeView from "../views/home/HomeView.vue";
import NotFoundView from '../views/errors/NotFoundView.vue';
import LoginView from '../views/auth/LoginView.vue'
import QuestionnaireListView from '../views/admin/questionnaire/QuestionnaireListView.vue'
import QuestionnaireAddView from '../views/admin/questionnaire/QuestionnaireAddView.vue'
import QuestionnaireResponseView from '../views/questionnaire/QuestionnaireResponseView.vue'
import InvalidTokenView from '../views/errors/InvalidTokenView.vue'
import ThankYouView from '../views/home/ThankYouView.vue'

const routes = [
   {
      path: '/admin/dashboard',
      name: 'dashboard',
      component: DashboardView,
      meta: {
         requiresAuth: true
      }
   },
   {
      path: '/',
      name: 'home',
      component: HomeView,
      meta: {
         requiresAuth: false
      }
   },

   {
      path: '/login',
      name: 'login',
      component: LoginView,
      meta: {
         requiresAuth: false
      }
   },
   {
      path: '/admin/questionnaires',
      name: 'questionnaire',
      component: QuestionnaireListView,
      meta: {
         requiresAuth: true
      }
   },
   {
      path: '/admin/questionnaires/create',
      name: 'create-questionnaire',
      component: QuestionnaireAddView,
      meta: {
         requiresAuth: true
      }
   },
   {
      path: '/questionnaire/response/:token',
      name: 'resposne-questionnaire',
      component: QuestionnaireResponseView,
      meta: {
         requiresAuth: false
      }
   },
   {
      path: '/invalid-token',
      name: 'invalid-token',
      component: InvalidTokenView,
      meta: {
         requiresAuth: false
      }
   },
   {
      path: '/thank-you',
      name: 'thank-you',
      component: ThankYouView,
      meta: {
         requiresAuth: false
      }
   },
   {
      path: '/:pathMatch(.*)*',
      name: 'notfound',
      component: NotFoundView,
      meta: {
         requiresAuth: false
      }
   }


]

const router = createRouter({
   history: createWebHistory(),
   routes
})
router.beforeEach((to, form) => {
   if (to.meta.requiresAuth && !localStorage.getItem('token')) {
      return { name: 'login' }
   }
   if (to.name == 'login' && localStorage.getItem('token')) {
      return { name: 'dashboard' }
   }

})
export default router;