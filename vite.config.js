import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.scss', 'resources/js/mix.js'],
            refresh: true,
        }),
    ],
    build: {
        rollupOptions: {
            output: {
                entryFileNames: `assets/[name].min.js`,
                chunkFileNames: `assets/[name].min.js`,
                assetFileNames: `assets/[name].min.[ext]`
            }
        }
    }
});
