import { defineConfig } from "vite";
import vue from '@vitejs/plugin-vue'

export default defineConfig({
  plugins: [vue()],
  build: {
    emptyOutDir: true,
    outDir: "../public/dist",
    rollupOptions: {
      output: {
        entryFileNames: `[name].js`,
        chunkFileNames: `[name].js`,
        assetFileNames: `[name].[ext]`,
      },
    },
  },
  server: {
    proxy: {
      '/api': {
        target: 'https://blog.test', // add the URL of your api backend (PHP); e.g. http://localhost:8080
        changeOrigin: true,
        secure: false
      }
    },
    cors: {
      origin: 'https://blog.test', // Allow requests from this origin; add the URL of your api backend (PHP); e.g. http://localhost:8080
    },
  }
});
