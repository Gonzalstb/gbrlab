<template>
  <nav class="navbar navbar-expand-lg navbar-dark bg-transparent py-3">
    <div class="container-fluid">
      <a class="navbar-brand d-flex align-items-center gap-2" href="/">
        <!-- Icono Bootstrap grid -->
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#fff" class="bi bi-grid" viewBox="0 0 16 16">
          <path d="M2 2h3v3H2V2zm4 0h3v3H6V2zm4 0h3v3h-3V2zM2 6h3v3H2V6zm4 0h3v3H6V6zm4 0h3v3h-3V6zM2 10h3v3H2v-3zm4 0h3v3H6v-3zm4 0h3v3h-3v-3z"/>
        </svg>
        <span class="fw-bold fs-4 text-white">Team Tasks</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link text-white" href="/dashboard">{{ t('dashboard') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="/tasks">{{ t('tasks') }}</a>
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
              <li><a class="dropdown-item" href="/profile/edit">{{ t('profile') }}</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#" @click.prevent="logout">{{ t('logout') }}</a></li>
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
const translations = ref(window.Laravel?.translations || {});

function t(key) {
  return translations.value[key] || key;
}

async function setLocale(locale) {
  if (currentLocale.value === locale) return;
  try {
    const res = await fetch(`/locale/${locale}?json=1`);
    if (res.ok) {
      const data = await res.json();
      currentLocale.value = data.locale;
      translations.value = data.translations;
    } else {
      window.location.href = `/locale/${locale}`;
    }
  } catch (e) {
    window.location.href = `/locale/${locale}`;
  }
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