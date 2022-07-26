import { createRouter, createWebHistory } from 'vue-router'

import Home from "../pages/Home.vue";
import News from "../pages/News.vue";
import Contact from "../pages/Contact.vue";
import NotFound from "../NotFound.vue";

const routes = [
    {
        path: '/',
        component: Home
    },
    {
        path: '/news',
        component: News
    },
    {
        path: '/Contact',
        component: Contact
    },
    {
        path: '/:pathMatch(.*)*',
        component: NotFound
    }
]

const router = createRouter({
    routes,
    history: createWebHistory()
})

export default router
