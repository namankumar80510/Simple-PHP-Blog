<template>
    <Layout>
        <h1>Search Results</h1>
        <div class="search-container">
            <input type="text" v-model="searchQuery" placeholder="Search posts..." @keyup.enter="performSearch"
                class="search-input" />
            <button @click="performSearch" class="search-button">Search</button>
        </div>
        <p v-if="searchPerformed" class="intro-text">
            Showing results for: "{{ searchQuery }}"
        </p>
        <div class="feature-grid">
            <div v-if="error" class="error-message">
                Unable to fetch data: {{ error }}
            </div>
            <div v-else-if="loading" class="loading">
                Loading data from API...
            </div>
            <template v-else-if="posts && posts.length > 0">
                <div v-for="post in posts" :key="post.id" class="feature-card">
                    <h3>{{ post.title }}</h3>
                    <p>
                        <span class="post-meta">Posted by {{ post.posted_by }} on {{ formatDate(post.date.date)
                            }}</span>
                    </p>
                    <p class="post-excerpt">
                        {{ stripHtml(post.description).substring(0, 100) }}{{ post.description.length > 100 ? '...' : ''
                        }}
                    </p>
                    <router-link :to="`/view/${post.slug}`" class="button button-primary">Read more</router-link>
                </div>
            </template>
            <div v-else-if="searchPerformed" class="no-posts">
                No results found for "{{ searchQuery }}".
            </div>
            <div v-else class="no-posts">
                Enter a search term above to find blog posts.
            </div>
        </div>
    </Layout>
</template>

<script>
import { ref, onMounted } from 'vue';
import { useRoute } from 'vue-router';
import Layout from './Layout.vue';
import { ApiService } from '../services/api';

export default {
    name: 'SearchResults',
    components: {
        Layout
    },
    setup() {
        const route = useRoute();
        const posts = ref([]);
        const error = ref(null);
        const loading = ref(false);
        const searchQuery = ref('');
        const searchPerformed = ref(false);

        const performSearch = async () => {
            if (!searchQuery.value.trim()) return;

            loading.value = true;
            error.value = null;
            searchPerformed.value = true;

            try {
                const result = await ApiService.searchPosts(searchQuery.value);
                if (result.error) {
                    error.value = result.error;
                } else {
                    posts.value = result.posts || [];
                }
            } catch (err) {
                error.value = err.message || "Unknown error occurred";
            } finally {
                loading.value = false;
            }
        };

        const stripHtml = (html) => {
            return html.replace(/<[^>]*>/g, '');
        };

        const formatDate = (dateString) => {
            return new Date(dateString).toLocaleDateString();
        };

        onMounted(() => {
            document.title = "Search Results - My Blog";

            // Check if there's a query parameter in the URL
            const queryParam = route.query.q;
            if (queryParam) {
                searchQuery.value = queryParam;
                performSearch();
            }
        });

        return {
            posts,
            error,
            loading,
            searchQuery,
            searchPerformed,
            performSearch,
            stripHtml,
            formatDate
        };
    }
};
</script>

<style scoped>
.loading,
.error-message,
.no-posts {
    padding: 20px;
    text-align: center;
    grid-column: 1 / -1;
}

.error-message {
    color: #f44336;
}

.search-container {
    display: flex;
    margin-bottom: 20px;
}

.search-input {
    flex-grow: 1;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px 0 0 4px;
    font-size: 16px;
}

.search-button {
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 0 4px 4px 0;
    cursor: pointer;
    font-size: 16px;
}

.search-button:hover {
    background-color: #45a049;
}
</style>