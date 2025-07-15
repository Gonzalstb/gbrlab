<template>
  <nav class="navbar navbar-expand-lg navbar-dark bg-transparent py-3">
    <div class="container-fluid">
      <a class="navbar-brand d-flex align-items-center gap-2" href="/">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#fff" class="bi bi-book" viewBox="0 0 16 16">
          <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893C5.998 1.797 7.354 2 8 2s2.002-.203 3.612-.065c1.234.124 2.503.523 3.388.893V14c-.885.37-2.154.769-3.388.893C10.002 14.203 8.646 14 8 14s-2.002.203-3.612.065C3.154 13.936 1.885 13.537 1 13.167V2.828zM8 1c-.668 0-2.042.2-3.682.37C2.07 1.57 1 2.07 1 2.828v10.339c0 .758 1.07 1.258 3.318 1.458C5.958 14.8 7.332 15 8 15s2.042-.2 3.682-.37C13.93 14.43 15 13.93 15 13.172V2.828c0-.758-1.07-1.258-3.318-1.458C10.042 1.2 8.668 1 8 1z"/>
        </svg>
        <span class="fw-bold fs-4 text-white">Team Tasks</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link text-white" href="/dashboard">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="/tasks">Tareas</a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center gap-2">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" id="langDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ currentLocale.toUpperCase() }}
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="langDropdown">
              <li><a class="dropdown-item" href="#" @click.prevent="setLocale('es')">Español</a></li>
              <li><a class="dropdown-item" href="#" @click.prevent="setLocale('en')">English</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle d-flex align-items-center gap-2 text-white" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <span>{{ userName }}</span>
              <img :src="userAvatar" class="rounded-circle" alt="avatar" width="32" height="32" />
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
              <li><a class="dropdown-item" href="/profile/edit">Perfil</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#" @click.prevent="logout">Cerrar sesión</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script setup>
import { ref } from 'vue';
const userName = ref(window.Laravel?.user?.name || 'Invitado');
const userAvatar = ref(`https://ui-avatars.com/api/?name=${encodeURIComponent(userName.value)}&background=1e3a5c&color=fff&size=32`);
const currentLocale = ref(window.Laravel?.locale || 'es');

function setLocale(locale) {
  window.location.href = `/locale/${locale}`;
}
function logout() {
  const form = document.createElement('form');
  form.method = 'POST';
  form.action = '/logout';
  const csrf = document.createElement('input');
  csrf.type = 'hidden';
  csrf.name = '_token';
  csrf.value = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
  form.appendChild(csrf);
  document.body.appendChild(form);
  form.submit();
}
</script>

<style scoped>
.navbar {
  background: transparent;
}
.navbar .navbar-brand svg {
  vertical-align: middle;
}
</style> 