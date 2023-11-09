import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
const colors = require('tailwindcss/colors')

export default {
    darkMode: 'class',

    content: [

        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/views/*.blade.php',
        './packages/Kemetech/Fusion/resources/views/*.blade.php',
        './packages/Kemetech/Fusion/resources/views/**/*.blade.php',
        './packages/Kemetech/Fusion/resources/views/**/**/*.blade.php',
        './packages/Kemetech/Fusion/src/View/Components/*.php',
        './packages/Kemetech/Fusion/src/View/Components/**/*.php',
        
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: colors.indigo,
                secondary: colors.gray,
                danger: colors.red,
                success: colors.emerald,
                warning: colors.amber,
                info: colors.cyan,
                disabled: colors.gray,
              },
        },
    },

    plugins: [forms, typography],
};
