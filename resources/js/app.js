import { createApp } from 'vue';
import router from "./router.js";
import Index from './components/Index.vue';

const app = createApp({});
app.use(router)

app.component('index', Index);

app.mount('#app');
