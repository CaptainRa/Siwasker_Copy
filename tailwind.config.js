import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './node_modules/flowbite/**/*.js'
    ],
    
    theme: {
        extend: {
            fontFamily: {
                sans: ['"Poppins"', 'sans-serif']
            },
            colors: {
                background:{
                    primaryBg : "#009B4D",
                    secondaryBg : "#F9F7DC",
                    red1Bg : "#D9281F",
                    red2Bg : "#E46A64",
                    red3Bg : "#EB938E",
                    red4Bg : "#F5CAC8",
                    yellow1Bg : "#F9B72C",
                    yellow2Bg : "#FAC350",
                    yellow3Bg : "#FCDD9C",
                    yellow4Bg : "#FDEDC9",
                    Green2Bg : "#30AE6F",
                    Green3Bg : "#4DB982",
                    Green4Bg : "#66C394",
    
                },
                button:{
                    loginBtn : "#FAC350",
                    acceptBtn : "#4CAF50",
                    declineBtn : "#F66358",
                    primaryBtn : "#1a56db",
                    hoverPrimaryBtn: "#1e429f",
                    hoverBtn : "#357A38",
                    hoverDeclineBtn : "#AB2F26",
                    hoverPendingBtn : "#e3a008"
                }
            },
        },
    },
    plugins: [
        require('flowbite/plugin')
    ],
};
