<template>
    <div class="layout">
        <header>
            <nav>
                <router-link to="/">Home</router-link>
                <router-link to="/about">About</router-link>
            </nav>
        </header>
        <main>
            <slot></slot>
        </main>
        <footer>
            <p>© {{ new Date().getFullYear() }} My Blog</p>
        </footer>
    </div>
</template>

<script>
export default {
    name: 'Layout'
}
</script>

<style scoped>
/* Add your layout styles here */
.layout {
    max-width: 1200px;
    margin: 0 auto;
    padding: 1rem;
}
</style>