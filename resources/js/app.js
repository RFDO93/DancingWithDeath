/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('book-appointment-component', require('./components/BookAppointmentComponent.vue').default);
Vue.component('date-box-component', require('./components/DateBoxComponent.vue').default);
Vue.component('control-panel-component', require('./components/ControlPanelComponent.vue').default);
Vue.component('detail-appointment-component', require('./components/DetailAppointmentComponent.vue').default);
Vue.component('hour-detail-component', require('./components/HourDetailComponent.vue').default);
Vue.component('appointment-component', require('./components/AppointmentComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
