import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    server: {
        port: 3001, // Możesz użyć innego portu, np. 3001
    },
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
    ],
    build: {
        outDir: "public", // Katalog docelowy dla skompilowanych plików
        manifest: true, // Utwórz plik manifestu
    },
});
