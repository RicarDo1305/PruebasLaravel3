import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/validarform.js',
                'resources/js/crearGrafico.js',
                'resources/js/ventanaEmergente.js',
            ],
            refresh: true,
        }),
    ],
});
