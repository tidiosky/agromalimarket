/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import {AxiosInstance as axios} from "axios";


require('./bootstrap');

window.Vue = require('vue');
import NProgress from 'nprogress'
import 'nprogress/nprogress.css'
axios.interceptors.request.use(function (config) {
    NProgress.start();
    return config;
},function (error) {
    console.error(error);
    return Promise.reject(error)
});
axios.interceptors.response.use(function (response) {
    NProgress.done();
    return response;
},function (error) {
    console.error(error);
    return Promise.reject(error)
});
$(document).ajaxSend(function (event,request,settings) {
    console.log(1);
    NProgress.start();
});
$(document).ajaxComplete(function (event,request,settings) {
    console.log(2);
    NProgress.done();
});
$(document).ajaxStart(function () {
    NProgress.start();
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example', require('./components/ExampleComponent.vue'));
// Vue.component('chat-message', require('./components/ChatMessage.vue'));
// Vue.component('chat-log', require('./components/ChatLog.vue'));
//
// const app = new Vue({
//     el: '#app'
// });
