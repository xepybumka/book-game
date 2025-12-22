import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                // css
                'resources/css/app.css',
                'resources/css/bootstrap.css',
                'resources/css/bootstrap-grid.css',
                'resources/css/bootstrap-reboot.css',
                'resources/css/dice-box.css',
                // js
                'resources/js/app.js',
                'resources/js/admin.js',
                'resources/js/dice-box.js',
                'resources/js/dropdown-helper.js'
            ],
            refresh: true,
        }),
    ],
});
