import m from "mithril";
import { Layout } from "./views/Layout";
import { ApiService } from "./services/api";
import "./App.css";

const BlogPostView = {
    view: ({ attrs: { data, error } }) => (
        <Layout>
            <div class="card">
                {error ? (
                    <div class="error-message">
                        Unable to fetch data: {error}
                    </div>
                ) : !data ? (
                    <div class="loading">
                        Loading data from API...
                    </div>
                ) : (
                    <div class="blog-post">
                        <h1>{data.post.title}</h1>
                        <div class="post-meta">
                            Posted by <span class="author">{data.post.posted_by}</span> on <span class="date">{new Date(data.post.date.date).toLocaleDateString()}</span>
                        </div>
                        <div class="post-content" oncreate={vnode => { vnode.dom.innerHTML = data.post.description }}></div>
                        <div class="post-actions">
                            <a href="/blog" class="button button-secondary">Back to all posts</a>
                        </div>
                    </div>
                )}
            </div>
        </Layout>
    )
};

export const BlogPost = {
    data: null,
    error: null,
    oninit: vnode => {
        const fetchPost = async () => {
            try {
                // Get the slug from the route parameter
                const slug = m.route.param("slug");
                
                if (!slug) {
                    BlogPost.error = "Post slug is missing";
                    return;
                }
                
                const result = await ApiService.getPostBySlug(slug);
                BlogPost.error = result.error;
                BlogPost.data = result.error ? null : result;
            } catch (err) {
                BlogPost.error = err.message || "Unknown error occurred";
            }
            m.redraw();
        };
        
        fetchPost();
    },
    view: () => (
        <BlogPostView data={BlogPost.data} error={BlogPost.error} />
    )
};