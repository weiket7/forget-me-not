import Vue from 'vue'
import App from './App.vue'
import router from './router'
import Label from './components/Label'
import StaticText from './components/StaticText'
import InputError from './components/InputError'
import Textbox from './components/Textbox'
import Textarea from './components/Textarea'
import Radio from './components/Radio'
import Card from './components/Card'
import CardHeader from './components/CardHeader'
import CardBody from './components/CardBody'
import CardFooter from './components/CardFooter'
import Datepicker from './components/Datepicker'
import CheckboxSingle from './components/CheckboxSingle'
import Modal from './components/Modal'
import "./filters"

Vue.component('textbox-component', Textbox);
Vue.component('label-component', Label);
Vue.component('static-text', StaticText);
Vue.component('input-error', InputError);
Vue.component('textarea-component', Textarea);
Vue.component('radio-component', Radio);
Vue.component('card', Card);
Vue.component('card-header', CardHeader);
Vue.component('card-body', CardBody);
Vue.component('form-footer', CardFooter);
Vue.component('datepicker-component', Datepicker);
Vue.component('checkbox-single', CheckboxSingle);
Vue.component('modal', Modal);

new Vue({
  el: '#app',
  router,
  render: h => h(App)
})