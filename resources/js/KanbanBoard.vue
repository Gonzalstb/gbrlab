<template>
  <div class="container py-4">
    <div class="row mb-4">
      <div class="col text-center">
        <h2>Tablero Kanban de Tareas</h2>
      </div>
    </div>
    <div class="row kanban-board">
      <div
        v-for="status in statuses"
        :key="status.key"
        class="col kanban-column"
      >
        <div :class="['card', 'shadow-sm', 'mb-3', status.cardClass]">
          <div :class="['card-header', 'text-center', 'fw-bold', status.headerClass]">
            {{ status.label }}
          </div>
          <div class="card-body p-2 kanban-tasks">
            <draggable
              v-model="tasksByStatus[status.key]"
              :group="'tasks'"
              class="kanban-draggable-list"
              @end="onDragEnd(status.key)"
            >
              <template #item="{element}">
                <div :class="['card', 'mb-2', 'task-card', status.cardClass]">
                  <div class="card-body p-2">
                    <h6 class="card-title mb-1">{{ element.title }}</h6>
                    <div class="mb-1">
                      <span class="badge bg-secondary me-1">{{ element.due_date }}</span>
                      <span v-if="element.assigned_to" class="badge bg-info text-dark">
                        <i class="bi bi-person-circle"></i> {{ element.assigned_to.name }}
                      </span>
                    </div>
                    <div class="mb-1">
                      <small class="text-muted">Tiempo estimado: {{ element.estimated_time !== null && element.estimated_time !== undefined && element.estimated_time !== '' ? element.estimated_time + 'h' : 'No especificado' }}</small><br>
                      <small class="text-muted">Tiempo gastado: {{ element.spent_time !== null && element.spent_time !== undefined && element.spent_time !== '' ? element.spent_time + 'h' : 'No especificado' }}</small>
                    </div>
                    <div>
                      <small class="text-muted">{{ element.description }}</small>
                    </div>
                  </div>
                </div>
              </template>
            </draggable>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import draggable from 'vuedraggable';
import 'bootstrap/dist/css/bootstrap.min.css';

const statuses = [
  { key: 'to do', label: 'TO DO', cardClass: 'border-primary', headerClass: 'bg-primary text-white' },
  { key: 'in progress', label: 'IN PROGRESS', cardClass: 'border-info', headerClass: 'bg-info text-white' },
  { key: 'doing', label: 'DOING', cardClass: 'border-primary', headerClass: 'bg-primary text-white' },
  { key: 'testing', label: 'TESTING', cardClass: 'border-info', headerClass: 'bg-info text-white' },
  { key: 'done', label: 'DONE', cardClass: 'border-primary', headerClass: 'bg-primary text-white' },
];

const tasks = ref([]);
const tasksByStatus = ref({});

function groupTasks() {
  const grouped = {};
  statuses.forEach(s => {
    grouped[s.key] = tasks.value.filter(t => t.status === s.key);
  });
  tasksByStatus.value = grouped;
}

function onDragEnd(statusKey) {
  const movedTask = tasksByStatus.value[statusKey][0];
  if (movedTask && movedTask.status !== statusKey) {
    movedTask.status = statusKey;
    fetch('/kanban/update-status', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
      },
      body: JSON.stringify({
        task_id: movedTask.id,
        status: statusKey,
      })
    });
  }
}

onMounted(() => {
  tasks.value = window.kanbanTasks || [];
  groupTasks();
});
</script>

<style scoped>
.kanban-board {
  overflow-x: auto;
}
.kanban-column {
  min-width: 250px;
  max-width: 300px;
}
.kanban-tasks {
  min-height: 100px;
}
.task-card {
  cursor: grab;
}
</style> 