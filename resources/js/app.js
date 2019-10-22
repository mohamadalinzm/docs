import Vue from 'vue';
import router from './router';
import App from './components/App';
import VueMaterial from 'vue-material';
import 'vue-material/dist/vue-material.min.css';
import { Bold, Italic, Link, HardBreak, Heading } from 'tiptap-extensions';

Vue.use(VueMaterial);

require('./bootstrap');

Vue.config.productionTip = false

const app = new Vue({
    el: '#app',
    components: {
        App,
        Bold,
        Italic,
        Link,
        HardBreak,
        Heading,
    },
    router,
    render: h => h(App)
}).$mount('#app');

