import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    safelist: [
        'dropdown',
        'dropdown-toggle',
        'dropdown-menu',
        'dropdown-item',
        'show',
        'navbar-nav',
        'nav-link',
        'navbar-toggler',
        'navbar-collapse',
        'navbar-brand',
        'navbar',
        'dropdown-divider',
        'dropdown-menu-end',
        'nav-item',
        'navbar-dark',
        'bg-transparent',
        'align-items-center',
        'gap-2',
        'me-3',
        'ms-auto',
        'mb-2',
        'mb-lg-0',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
