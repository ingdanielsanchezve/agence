require('./bootstrap');
const axios = require('axios');

    window.Vue = require('vue');

    Vue.component('consultores', require('./components/consultores.vue').default);

    const app = new Vue({
        el: '#app'
    });