import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/admin.css',
                'resources/css/admin/services.css',
                'resources/css/admin/employees.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});