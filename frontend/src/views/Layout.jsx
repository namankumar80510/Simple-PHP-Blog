import m from "mithril";

export const Layout = {
    oninit: (vnode) => {
        vnode.state.searchQuery = "";
    },
    handleSearch: (e, state) => {
        e.preventDefault();
        if (state.searchQuery.trim()) {
            window.location.href = `/search.php?q=${encodeURIComponent(state.searchQuery)}`;
        }
    },
    view: (vnode) => (
        <div class="layout">
            <nav>
                <a href="/blog/">Home</a>
                <a href="/blog/about">About</a>
                <a href="/blog/test">Test</a>
            </nav>
            <div class="search-container">
                <form onsubmit={(e) => Layout.handleSearch(e, vnode.state)}>
                    <input 
                        type="text" 
                        class="search-input" 
                        placeholder="Search..." 
                        value={vnode.state.searchQuery}
                        oninput={(e) => { vnode.state.searchQuery = e.target.value }}
                    />
                    <button type="submit" class="search-button">Search</button>
                </form>
            </div>
            <main>
                {vnode.children}
            </main>
        </div>
    )
};