require('./bootstrap');
const axios = require('axios');
import VueCurrencyFilter from 'vue-currency-filter'

window.Vue = require('vue');

Vue.use(VueCurrencyFilter,
{
    symbol : 'R$',
    thousandsSeparator: '.',
    fractionCount: 2,
    fractionSeparator: ',',
    symbolPosition: 'front',
    symbolSpacing: true
})

Vue.component('consultores', require('./components/consultores.vue').default);

const app = new Vue({
    el: '#app'
});