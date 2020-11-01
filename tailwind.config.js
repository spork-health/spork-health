const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: {
        mode: 'all',
        content: [
            './vendor/laravel/jetstream/**/*.blade.php',
            './storage/framework/views/*.php',
            './resources/views/**/*.blade.php',
        ]
    },

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            height: {
                72: '18rem',
                80: '20rem',
                88: '22rem',
                96: '24rem',
            },
            colors: {
                primary: {
                    100: '#66d0ff',
                    200: '#4dc8ff',
                    300: '#33c0ff',
                    400: '#1ab8ff',
                    500: '#00b0ff',
                    600: '#009ee6',
                    700: '#008dcc',
                    800: '#007bb3',
                    900: '#006a99',
                },
            }
        },
    },

    variants: {
        opacity: ['responsive', 'hover', 'focus', 'disabled'],
    },

    plugins: [require('@tailwindcss/ui')],
};
