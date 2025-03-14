<template>
    <Layout>
        <div class="card">
            <div v-if="error" class="error-message">
                Unable to fetch data: {{ error }}
            </div>
            <div v-else-if="loading" class="loading">
                Loading data from API...
            </div>
            <div v-else class="blog-post">
                <h1>{{ post.title }}</h1>
                <div class="post-meta">
                    Posted by <span class="author">{{ post.posted_by }}</span> on <span class="date">{{
                        formatDate(post.date.date) }}</span>
                </div>
                <div class="post-content" v-html="post.description"></div>
                <div class="post-actions">
                    <router-link to="/" class="button button-secondary">Back to all posts</router-link>
                </div>
            </div>
        </div>
    </Layout>
</template>

<script>
import { ref, onMounted, watch } from 'vue';
import { useRoute } from 'vue-router';
import Layout from './Layout.vue';
import { ApiService } from '../services/api';

export default {
    name: 'BlogPostView',
    components: {
        Layout
    },
    setup() {
        const route = useRoute();
        const post = ref({});
        const error = ref(null);
        const loading = ref(true);

        const fetchPost = async () => {
            try {
                const slug = route.params.slug;

                if (!slug) {
                    error.value = "Post slug is missing";
                    loading.value = false;
                    return;
                }

                const result = await ApiService.getPostBySlug(slug);
                if (result.error) {
                    error.value = result.error;
                } else {
                    post.value = result.post || {};
                }
            } catch (err) {
                error.value = err.message || "Unknown error occurred";
            } finally {
                loading.value = false;
            }
        };

        const formatDate = (dateString) => {
            return new Date(dateString).toLocaleDateString();
        };

        onMounted(() => {
            fetchPost();
        });

        // Watch for post title changes and update document title
        watch(post, (newPost) => {
            if (newPost.title) {
                document.title = `${newPost.title} - My Blog`; // Customize the title format
            }
        });

        return {
            post,
            error,
            loading,
            formatDate
        };
    }
};
</script>

<style scoped>
.blog-post {
    max-width: 800px;
    margin: 0 auto;
}

.post-meta {
    color: #666;
    margin-bottom: 20px;
    font-style: italic;
}

.post-content {
    line-height: 1.6;
}

.post-actions {
    margin-top: 30px;
    padding-top: 20px;
    border-top: 1px solid #eee;
}

.button-secondary {
    display: inline-block;
    padding: 8px 16px;
    background-color: #607D8B;
    color: white;
    text-decoration: none;
    border-radius: 4px;
}

.loading,
.error-message {
    padding: 20px;
    text-align: center;
}

.error-message {
    color: #f44336;
}
</style>