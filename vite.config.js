import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/css/filament/admin/theme.css",
                "resources/js/filament/admin/app.js",
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
    build: {
        outDir: "public/build",
        manifest: true,
        rollupOptions: {
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/css/filament/admin/theme.css",
                "resources/js/filament/admin/app.js",
            ],
        },
    },
});
