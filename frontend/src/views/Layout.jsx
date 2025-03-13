import m from "mithril";

export const Layout = {
    view: ({ children }) => (
        <div class="layout">
            <nav>
                <a href="/blog/">Home</a>
                <a href="/blog/about">About</a>
                <a href="/blog/test">Test</a>
            </nav>
            <main>
                {children}
            </main>
        </div>
    )
};
