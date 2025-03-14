<template>
    <div class="layout">
        <header>
            <nav>
                <router-link to="/">Home</router-link>
                <router-link to="/about">About</router-link>
            </nav>
            <form @submit.prevent="performSearch" class="search-box">
                <input v-model="searchQuery" type="text" placeholder="Search..." />
                <button type="submit" class="button button-primary">Search</button>
            </form>
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
    name: 'Layout',
    data() {
        return {
            searchQuery: ''
        };
    },
    methods: {
        performSearch() {
            if (this.searchQuery.trim()) {
                window.location.href = `/search.php?q=${encodeURIComponent(this.searchQuery)}`;
            }
        }
    }
};
</script>

<style scoped>
/* Add your layout styles here */
.layout {
    max-width: 1200px;
    margin: 0 auto;
    padding: 1rem;
}

.search-box {
    margin-top: 1rem;
    display: flex;
    gap: 0.5rem;
}

.search-box input {
    padding: 0.5rem;
    flex: 1;
}

.search-box button {
    padding: 0.5rem 1rem;
    cursor: pointer;
}
</style>
