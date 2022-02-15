require('./bootstrap');

import { createApp } from 'vue';

import store from './store'
import App from './App.vue'
import Toast from "vue-toastification";
import "vue-toastification/dist/index.css";

const app = createApp(App)
const options = {
  // You can set your default options here
};
app.use(store)
app.use(Toast, options);
app.mount('#app')