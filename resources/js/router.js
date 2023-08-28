import { createRouter, createWebHistory } from 'vue-router';

const routes = [

    {
        path: '/practise',
        component: () => import('./components/Practise/IndexComponent.vue'),
        name: 'practise.index'
    },
    {
        path: '/practise/home',
        component: () => import('./components/Practise/HomeComponent.vue'),
        name: 'practise.home'
    },



];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;
