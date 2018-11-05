
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));
// Vue.component('director-component', require('./components/DirectorClientComponent.vue'));
Vue.component('app-catalog-component', require('./components/catalog/Main.vue'));
Vue.component('app-workshop-component', require('./components/catalog/Workshop.vue'));
// Vue.component('app-director-component', require('./components/member/Director.vue'));
Vue.component('app-producer-component', require('./components/member/Producer.vue'));
// Vue.component('app-cast-component', require('./components/member/Cast.vue'))
Vue.component('app-film-component', require('./components/film/Film.vue'));
Vue.component('app-admin-film-component', require('./components/admin/Main.vue'));
Vue.component('app-admin-crew-component', require('./components/admin/Crew.vue'));
Vue.component('app-admin-producer-component', require('./components/admin/Producer.vue'));
Vue.component('app-admin-cast-component', require('./components/admin/Cast.vue'));
Vue.component('app-admin-writer-component', require('./components/admin/Writer.vue'));
Vue.component('app-single-member-films', require('./components/film/SingleMemberFilms.vue'));


const app = new Vue({
    el: '#app'
});
