import './bootstrap';

import Alpine from 'alpinejs';
import { createApp } from 'vue';
import KanbanBoard from './KanbanBoard.vue';

window.Alpine = Alpine;

Alpine.start();

const kanbanApp = document.getElementById('kanban-app');
if (kanbanApp) {
    createApp(KanbanBoard).mount('#kanban-app');
}
