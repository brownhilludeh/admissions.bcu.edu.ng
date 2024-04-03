import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/bcuBackend.scss',
                'resources/sass/bcuFrontend.scss',
                'resources/sass/bcuMobile.scss',
                'resources/js/bcuBScript.js',
                'resources/js/bcuFScript.js',
            ],
            refresh: true,
        }),
    ],
});
