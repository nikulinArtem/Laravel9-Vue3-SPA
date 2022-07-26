import './bootstrap';

import { createApp } from "vue";

import App from "./components/App.vue";

import router from "./components/router/index.js";

createApp(App).use(router).mount('#app')
