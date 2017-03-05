require('./bootstrap')

//Vue 三方组件


//路由组件
import VueRouter from 'vue-router'
Vue.use(VueRouter);
import App from './App.vue'
import User from './components/User.vue'
import Home from './components/Home.vue'
import UserEdit from './components/UserEdit.vue'

import Bus from './components/Bus.vue'
import BusEdit from './components/BusEdit.vue'
import BusUser from './components/BusUsers.vue'
const routes = [
    {path: '/', component: Home},
    {path: '/users', component: User},

    {path: '/user/create', name: 'user.create', component: UserEdit},
    {path: '/user/:id', name: 'user', component: UserEdit, props: true},

    {path: '/buses', name: 'buses', component: Bus},
    {path: '/buses/user', name: 'buses.user', component: BusUser},

];

const router = new VueRouter({
    routes,
    base: '/admin'
});




new Vue({
    router,
    el: '#app',
    render: h=>h(App)
});
