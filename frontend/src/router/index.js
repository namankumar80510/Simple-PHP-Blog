import { createRouter, createWebHistory } from 'vue-router';
import BlogIndex from '../views/BlogIndex.vue';
import BlogPostView from '../views/BlogPostView.vue';
import SearchResults from '../views/SearchResults.vue';

const routes = [
    {
        path: '/',
        name: 'BlogIndex',
        component: BlogIndex
    },
    {
        path: '/view/:slug',
        name: 'BlogPostView',
        component: BlogPostView
    },
    {
        path: '/search',
        name: 'SearchResults',
        component: SearchResults
    },
    {
        path: '/about',
        name: 'About',
        // Using the lazy loading pattern for the About page
        component: () => import('../views/About.vue')
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export { router };