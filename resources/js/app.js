
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

Vue.component('product-list', require('./components/ProductList.vue'));
Vue.component('review-cart', require('./components/ReviewCart.vue'));
Vue.component('check-out', require('./components/Checkout.vue'));
Vue.component('pay-with-stripe', require('./components/PaymentOptions/Stripe.vue'));

const app = new Vue({
    el: '#app'
});
