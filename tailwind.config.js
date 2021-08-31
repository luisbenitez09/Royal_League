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
                'online-t': "url('/img/online-t.png')",
                'prox-t': "url('/img/prox-t.png')",
                'no-t': "url('/img/no-t.png')",
                'footer-texture': "url('/img/bg-footer.jpg')",
                'quotes': "url('/img/quotes.jpg')",
                'login': "url('/img/bg-login.png')",
                'register': "url('/img/bg-register.png')",
                'fill-info': "url('/img/bg-fill-info.png')",
                'dash': "url('/img/bg-dash.png')",
                'teams': "url('/img/bg-teams.png')",
                'profile': "url('/img/bg-profile.png')",
                'tournaments': "url('/img/bg-live-tournament.png')",
                'card-users': "url('/img/card-users.png')",
                'card-teams': "url('/img/card-teams.png')",
                'card-tournament': "url('/img/card-tournament.png')",
                'card-table': "url('/img/card-table.png')",
                'mainCTA': "url('/img/cta.jpg')",
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
