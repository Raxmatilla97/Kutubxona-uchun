import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        // './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        // './storage/framework/views/*.php',
        './resources/views/vendor/pagination/*.blade.php',
        './resources/views/auth/*.blade.php',
    ],
    options: {
        safelist: [
          'collapse',
          // Agar yana qandaydir sinflarni e'tiborga olish kerak bo'lsa, bu yerda qo'shing
        ],
      },

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
