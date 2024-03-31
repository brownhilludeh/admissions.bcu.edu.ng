import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                 'resources/sass/backend.scss',
                'resources/sass/frontend.scss',
                'resources/sass/mobile.scss',
                'resources/js/brownportal.js',
                'resources/sass/app.scss',
            ],
            refresh: true,
        }),
    ],
});
