import m from "mithril";
import { Layout } from "./views/Layout";
import { ApiService } from "./services/api";
import "./App.css";

const BlogIndexView = {
    view: ({ attrs: { data, error } }) => (
        <Layout>
            <div class="card">
                <h1>Blog Index</h1>
                <p class="intro-text">
                    Latest blog entries are displayed below.
                </p>
                <div class="feature-grid">
                    {error ? (
                        <div class="error-message">
                            Unable to fetch data: {error}
                        </div>
                    ) : !data ? (
                        <div class="loading">
                            Loading data from API...
                        </div>
                    ) : (
                        data.posts && data.posts.length > 0 ?
                            data.posts.map(post => (
                                <div class="feature-card" key={post.id}>
                                    <h3>{post.title}</h3>
                                    <p>
                                        <span class="post-meta">Posted by {post.posted_by} on {new Date(post.date.date).toLocaleDateString()}</span>
                                    </p>
                                    <p class="post-excerpt">
                                        {post.description.replace(/<[^>]*>/g, '').substring(0, 100)}
                                        {post.description.length > 100 ? '...' : ''}
                                    </p>
                                    <a href={`/blog/view/${post.slug}`} class="button button-primary">Read more</a>
                                </div>
                            ))
                            : (
                                <div class="no-posts">
                                    No blog posts available.
                                </div>
                            )
                    )}
                </div>
            </div>
        </Layout>
    )
};

export const BlogIndex = {
    data: null,
    error: null,
    oninit: async () => {
        try {
            const result = await ApiService.getPosts();
            BlogIndex.error = result.error;
            BlogIndex.data = result.error ? null : result;
        } catch (err) {
            BlogIndex.error = err.message || "Unknown error occurred";
        }
        m.redraw();
    },
    view: () => (
        <BlogIndexView data={BlogIndex.data} error={BlogIndex.error} />
    )
};