import {
    defineConfig
} from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'public/assets/css/main/app.css',
                'public/assets/extensions/fontawesome/all.min.css',
                'public/assets/js/bootstrap.js',
                'public/assets/js/app.js',
                'public/assets/extensions/fontawesome/all.min.js',
            ],
            refresh: true,
        }),
    ],
});
