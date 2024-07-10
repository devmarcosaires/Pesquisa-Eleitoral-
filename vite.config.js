import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path'


export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/scss/core.scss',
                'resources/scss/theme-default.scss',
                'resources/scss/auth.scss',
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/menu.js',
                'resources/js/helpers.js',
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
        }
    },
});
