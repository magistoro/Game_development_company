import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',


                'resources/css/bootstrap.css',
                'resources/css/animate.css',
                'resources/css/templatemo-cyborg-gaming.css',
                'resources/css/flex-slider.css',
                'resources/css/fontawesome.css',
                'resources/css/owl.css',
                'resources/css/app.css'
            ],
            refresh: true,
        }),
    ],
});
