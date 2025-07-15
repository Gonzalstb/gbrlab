import './bootstrap';

import Alpine from 'alpinejs';
import { createApp } from 'vue';
import BootstrapVue3 from 'bootstrap-vue-3';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap-vue-3/dist/bootstrap-vue-3.css';
import KanbanBoard from './KanbanBoard.vue';

window.Alpine = Alpine;
Alpine.start();

const kanbanApp = document.getElementById('kanban-app');
if (kanbanApp) {
    const app = createApp(KanbanBoard);
    app.use(BootstrapVue3);
    app.mount('#kanban-app');
}
// Punto de montaje para la navbar Vue
const navbarApp = document.getElementById('navbar-app');
if (navbarApp) {
    import('./Navbar.vue').then(({ default: Navbar }) => {
        const app = createApp(Navbar);
        app.use(BootstrapVue3);
        app.mount('#navbar-app');
    });
}
