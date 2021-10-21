const routes = [
    {
        path: '/',
        component: () => import('../Pages/Home.vue'),
        name: 'home',
    },
    {
        path: '/create-campaigns',
        component: () => import('../Pages/Campaign/Create.vue'),
        name: 'campaign_create',
    },
    {
        path: '/edit-campaigns/:id',
        component: () => import('../Pages/Campaign/Edit.vue'),
        name: 'campaign_edit',
    },
]

export default routes;
