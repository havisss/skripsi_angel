import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', 'Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                kop: {
                    green: '#047857',
                    greenDark: '#065f46',
                    light: '#ecfdf5',
                    blue: '#1e3a8a',
                    blueDark: '#172554',
                    accent: '#f59e0b',
                    accentDark: '#d97706',
                    warm: '#faf9f6',
                }
            }
        },
    },

    plugins: [forms],
};
