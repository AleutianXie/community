
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('jquery-json');
require('select2');
require('X-editable/dist/bootstrap3-editable/js/bootstrap-editable.min');
require('bootstrap-treeview/dist/bootstrap-treeview.min');
require('./jssor.slider-25.2.0.min');
require('bootstrap-fileinput');
require('bootstrap-fileinput/js/locales/zh');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app'
});
