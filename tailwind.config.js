import preset from './vendor/filament/support/tailwind.config.preset'
import colors from "tailwindcss/colors";

export default {
    presets: [preset],
    theme: {
        extend: {
            colors: {
                ...colors,
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
    ],
}
