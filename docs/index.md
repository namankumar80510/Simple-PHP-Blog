# Simple PHP MySQL Blog

This is a simple php blog script, a modern refactored fork of the original script <https://github.com/Philipinho/Simple-PHP-Blog>.

This new version offers a better separation of concerns with vuejs serving the frontend instead of pure php. Nothing wrong with php, but I wanted to learn SPA development with vue and php.

PHP Serves as a robus backend api and admin panel both. For now, I have retained the original admin panel (may refactor later) and only added read apis and frontend. Even search.php is retained for now.

## API Endpoints

For now there are only two endpoints:

### 1. Posts List: `/api/v1/posts`

Returns a list of all posts.

### 2. Single Post: `/api/v1/posts/{slug}`

Returns a single post.

**WORK IN PROGRESS**
