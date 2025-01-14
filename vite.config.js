import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    server: {
        port: 25565,
        host: 'mc.necorupt.mooo.com',
        hmr: {
            port: 25565,
            host: 'mc.necorupt.mooo.com',
        }
    },
});
