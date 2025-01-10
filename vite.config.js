import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/css/style.css', // Adicione seu arquivo de estilo aqui
                'resources/css/style_products.css', // Adicione seu arquivo de estilo aqui
                'resources/js/custom.js'   // Adicione seu arquivo JS aqui
            ],
            refresh: true,
        }),
    ],
});
