// vite.config.js
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

import vue from '@vitejs/plugin-vue'


export default defineConfig({
    plugins: [

        vue(),

        laravel({
            input: [ 'resources/sass/app.scss','resources/js/app.js','resources/js/custom.js'],
            refresh: true,
        }),
    ],
});
