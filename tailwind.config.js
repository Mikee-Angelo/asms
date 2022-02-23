const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    important: true,
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    darkMode: "class",
    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
            backgroundColor: ["checked"],
            borderColor: ["checked"],
            inset: ["checked"],
            zIndex: ["hover", "active"],
        },
    },

    plugins: [require('@tailwindcss/forms')],
    future: {
        purgeLayersByDefault: true,
    },
};
