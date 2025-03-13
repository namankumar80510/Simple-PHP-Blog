const API_URL = '/api/v1';

export const ApiService = {
    getTest: () =>
        fetch(`${API_URL}/test`)
            .then(res => res.json())
            .catch(error => ({ error: error.message })),

    getPosts: () =>
        fetch(`${API_URL}/posts`)
            .then(res => res.json())
            .catch(error => ({ error: error.message })),

    getPostBySlug: (slug) =>
        fetch(`${API_URL}/posts/view/${slug}`)
            .then(res => res.json())
            .catch(error => ({ error: error.message }))
};
