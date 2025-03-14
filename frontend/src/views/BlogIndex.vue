<template>
    <Layout>
        <div class="card">
            <h1>Blog Index</h1>
            <p class="intro-text">
                Latest blog entries are displayed below.
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
                            {{ stripHtml(post.description).substring(0, 100) }}{{ post.description.length > 100 ? '...'
                            : '' }}
                        </p>
                        <router-link :to="`/view/${post.slug}`" class="button button-primary">Read more</router-link>
                    </div>
                </template>
                <div v-else class="no-posts">
                    No blog posts available.
                </div>
            </div>
        </div>
    </Layout>
</template>

<script>
import { ref, onMounted } from 'vue';
import Layout from './Layout.vue';
import { ApiService } from '../services/api';

export default {
    name: 'BlogIndex',
    components: {
        Layout
    },
    setup() {
        const posts = ref([]);
        const error = ref(null);
        const loading = ref(true);

        const fetchPosts = async () => {
            try {
                const result = await ApiService.getPosts();
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
            fetchPosts();
        });

        return {
            posts,
            error,
            loading,
            stripHtml,
            formatDate
        };
    }
};
</script>

<style scoped>
.feature-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 20px;
    margin-top: 20px;
}

.feature-card {
    border: 1px solid #eee;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.post-meta {
    color: #666;
    font-size: 0.9rem;
}

.button-primary {
    display: inline-block;
    padding: 8px 16px;
    background-color: #4CAF50;
    color: white;
    text-decoration: none;
    border-radius: 4px;
    margin-top: 10px;
}

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
</style>