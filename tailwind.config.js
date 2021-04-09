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
                'empty': "url('/img/empty-card.png')",
                'footer-texture': "url('/img/bg-footer.jpg')",
                'quotes': "url('/img/quotes.jpg')",
                'login': "url('/img/bg-login.png')",
                'register': "url('/img/bg-register.png')",
                'fill-info': "url('/img/bg-fill-info.png')",
                'dash': "url('/img/bg-dash.png')",
                'teams': "url('/img/bg-teams.png')",
                'profile': "url('/img/bg-profile.png')",
                'tournaments': "url('/img/bg-live-tournament.png')",
                'admin-dash': "url('/img/bg-admin-dash.png')",
                'admin-users': "url('/img/bg-users.png')",
                'admin-teams': "url('/img/bg-admin-teams.png')",
                'edit-teams-a': "url('/img/bg-admin-edit-team.png')",
                'admin-tournaments': "url('/img/bg-tournaments.png')",
                'admin-edit-t': "url('/img/bg-edit-tournaments.png')",
                'admin-add-t': "url('/img/bg-add-t.png')",
                'edit-users': "url('/img/bg-edit-user.png')",
                'live-tournament': "url('/img/bg-live-tournament.png')",
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
