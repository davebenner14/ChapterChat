import { defineConfig } from "vite";
import vue from "@vitejs/plugin-vue";
import { resolve } from "path";
import tailwindcss from "tailwindcss";
import autoprefixer from "autoprefixer";

// https://vitejs.dev/config/
export default defineConfig(({ command }) => ({
    plugins: [vue()],
    resolve: {
        alias: {
            "@": resolve(__dirname, "resources/js"),
        },
    },
    build: {
        manifest: true,
        outDir: "public/build",
        rollupOptions: {
            input: "/resources/js/app.js",
        },
    },
    server: {
        strictPort: true,
        port: 3000,
        hmr: {
            host: "localhost",
        },
    },
    css: {
        postcss: {
            plugins: [tailwindcss, autoprefixer],
        },
    },
}));
