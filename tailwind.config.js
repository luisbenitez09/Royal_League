const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Poppins'],
            },
            backgroundImage: theme => ({
                'mainCTA': "url('/img/cta.jpg')",
                'footer-texture': "url('/img/bg-footer.jpg')",
                'quotes': "url('/img/quotes.jpg')",
                'login': "url('/img/bg-login.png')",
                'register': "url('/img/bg-register.png')",
                'fill-info': "url('/img/bg-fill-info.png')",
                'dash': "url('/img/bg-dash.png')"
            })
        },
        backdropFilter: {
            'none': 'none',
            'blur': 'blur(20px)',
        },
    },

    variants: {
        opacity: ['responsive', 'hover', 'focus', 'disabled'],
        filter: ['responsive'],
        backdropFilter: ['responsive'],
        extend: {
            animation: ['hover', 'focus'],
        },
    },

    plugins: [
        require('@tailwindcss/ui'),
        require('tailwindcss-filters'),
    ],
};
