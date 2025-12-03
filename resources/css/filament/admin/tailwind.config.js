import preset from '../../../../vendor/filament/filament/tailwind.config.preset'
import colors from "tailwindcss/colors";

export default {
    presets: [preset],
    theme: {
        extend: {
            colors: {
                shade: '#EAF1FB'
            }
        }
    },
    content: [
        './app/Filament/**/*.php',
        './resources/views/filament/**/*.blade.php',
        './resources/views/vendor/**/*.blade.php',
        './resources/views/livewire/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
        './vendor/awcodes/filament-curator/resources/**/*.blade.php',
        './vendor/awcodes/filament-tiptap-editor/resources/**/*.blade.php',
    ],
}
