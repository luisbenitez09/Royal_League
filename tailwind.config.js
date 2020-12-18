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
                'fill-info': "url('/img/bg-fill-info.png')"
            })
        },
    },

    variants: {
        opacity: ['responsive', 'hover', 'focus', 'disabled'],
    },

    plugins: [require('@tailwindcss/ui')],
};
