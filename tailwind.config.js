import preset from './vendor/filament/support/tailwind.config.preset'
import colors from "tailwindcss/colors";

export default {
    presets: [preset],
    theme: {
        fontFamily: {
            'body': ['Overused Grotesk'],
            'heading': ['DM Serif Text']
        },
        extend: {
            colors: {
                primary: '#225CA8',
                secondary: '#5590DD',
                accent: '#1A467F',
                textsub: '#525252',
                texthead: '#171717'
            },
            maxWidth: {
                'screen-2xl': '1400px',
            },
            screens: {
                'xs': '480px'
            },
            boxShadow:{
                'grid': '0 0 30px 7px rgba(100, 100, 111, 0.09)'
            }
        }
    },
    content: [
        './app/Filament/**/*.php',
        './resources/views/filament/**/*.blade.php',
        './resources/views/livewire/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
        '../../vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        '../../storage/framework/views/*.php',
        '../**/*.blade.php',
        './resources/views/**/*.blade.php',
    ],
}
