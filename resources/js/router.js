import Vue from 'vue';
import VueRouter from 'vue-router';
import Cards from './components/Cards';
import tiptap from './components/Tiptap';
import VueMaterial from 'vue-material';

Vue.use(VueRouter);
Vue.use(VueMaterial);

export default new VueRouter({
    routes :[
        { path : '/vue/tiptap', component: tiptap},
        { path : '/vue/cards', component: Cards},
    ],
    mode : 'history'
});
