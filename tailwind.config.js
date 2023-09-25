import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {

    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/wire-elements/modal/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],


    safelist:[
        'sm:max-w-sm',
        'sm:max-w-md',
  
        'md:max-w-lg',
        'md:max-w-xl',
  
        'lg:max-w-2xl',
        'lg:max-w-3xl',
  
        'xl:max-w-4xl',
        'xl:max-w-5xl',
  
        '2xl:max-w-6xl',
        '2xl:max-w-7xl',

    ],

    


    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    
    daisyui:{
        themes:['light']
    },

    plugins: [forms,require("daisyui"),require('tailwind-scrollbar-hide')],
};
