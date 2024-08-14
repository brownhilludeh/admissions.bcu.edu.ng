import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/frontend.scss',
                'resources/sass/backend.scss',
                'resources/sass/mobile.scss',
                'resources/js/script.js',
            ],
            refresh: true,
        }),
    ],
});
