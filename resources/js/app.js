import('./bootstrap');
// import('alpinejs');

import Alpine from "alpinejs";

import './tailwind.css'
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
// import { TailwindPagination } from 'laravel-vue-pagination'
import { createApp } from 'vue'
import App from '@/App.vue'
import router from './router'
const vueApp = createApp(App)
vueApp.use(router)
vueApp.use(VueSweetalert2)
// vueApp.component(TailwindPagination)
vueApp.mount('#app');
