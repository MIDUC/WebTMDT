import './bootstrap';
import { createApp } from 'vue';
import { createPinia } from 'pinia';
import App from './app.vue';
import router from './router';

// Font Awesome setup
import { library } from '@fortawesome/fontawesome-svg-core';
import { fas } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { far } from '@fortawesome/free-regular-svg-icons';
import { fab } from '@fortawesome/free-brands-svg-icons';

import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap'

// Add toàn bộ solid icons vào thư viện
library.add(fas, far, fab);

const pinia = createPinia();
const app = createApp(App);

app.use(router);
app.use(pinia);

// Đăng ký component global
app.component('font-awesome-icon', FontAwesomeIcon);

app.mount("#app");
