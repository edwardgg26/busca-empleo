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
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors:{
                primary: '#0d9488',
                primary_darken: '#0f766e',
                secondary: '#94651C',
                secondary_darken: '#704D15',
                secondary_ligthen: '#FFF5C7',
                danger: '#C21A11',
                danger_darken: '#9E150E',
                success: '#22c55e',

                /*Colores modo dark */
                dark_primary: '#57CFB5',
                dark_primary_ligthen: '#6AFCDD',
                dark_secondary: '#FFCB96',
                dark_secondary_ligthen: '#FFE1AC',
                dark_danger: '#FF674E',
                dark_danger_ligthen: '#FF7A5E',
            }
        },
    },

    plugins: [forms],
};
