/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
// DEPENDENCIES
import Vue from 'vue';
import VueSweetalert2 from 'vue-sweetalert2';
import DatePicker from 'vue2-datepicker';
import wysiwyg from "vue-wysiwyg";
import Stepper from 'bs-stepper'
import VueCroppie from 'vue-croppie';
import Draggable from 'vuedraggable'
import VueSocketIO from 'vue-socket.io';
import socketio from 'socket.io-client';

// COMPONENTS
import SelectPicker from './components/Select';
import Table from './components/Table';
import TagInput from './components/TagInput';
import Dropzone from './components/Dropzone';

// DIRECTIVES
import ClickOutside from './directives/click-outside';

// SCREENS
import Profile from './screens/user/profile/index.vue';
import Project from './screens/user/project/index.vue';
import Projects from './screens/user/project/projects.vue';
import Credits from './screens/user/credits/index.vue';
import Inbox from './screens/chat/index.vue'
import Workspace from './screens/workspace/index.vue'

// PLUGINS
import store from './store'

// MISC
import './bootstrap';

window.Vue = Vue;

Vue.component('v-date-picker', DatePicker);
Vue.component('v-draggable', Draggable);
Vue.component('select-picker', SelectPicker);
Vue.component('tag-input', TagInput);
Vue.component('a-table', Table);
Vue.component('dropzone', Dropzone);

Vue.component('profile-screen', Profile);
Vue.component('my-credit-screen', Credits);
Vue.component('inbox-screen', Inbox);
Vue.component('project-screen', Project);
Vue.component('projects-screen', Projects);
Vue.component('workspace-screen', Workspace)

Vue.use(VueCroppie);
Vue.use(VueSweetalert2);
Vue.use(wysiwyg, {
	hideModules: { "image": true },
});

Vue.use(new VueSocketIO({
    debug: true,
	connection: socketio('192.168.10.10:3800')
}));

Vue.directive('click-outside', ClickOutside);

$(document).ready(function () {
	let stepper = new Stepper($('.bs-stepper')[0]);
	$('#first-part-next').on('click', () => {
		let hasNullValue = [
			'name',
			'lastname',
			'email',
			'profession',
			'user',
			'password',
			'phone'
		].map(el => document.querySelector(`#${el}`)).some(el => !el.value)

		if (!hasNullValue) {
			stepper.next()
		} else {
			alert('Llena todos los campos')
		}
	})

	$('#back-button').on('click', () => {
		stepper.previous();
	})
})

if (document.querySelector('#app')) {
    new Vue({
		el: '#app',
		store
    });
}
