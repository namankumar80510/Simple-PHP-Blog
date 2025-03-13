import m from "mithril";
import { Layout } from "./views/Layout";
import "./App.css";

export const App = {
    view: () => (
        <Layout>
            <div class="card">
                <h1>Welcome to Mithril App</h1>
                <p class="intro-text">This application has been styled using Atlassian Design System principles to provide a clean, modern interface.</p>

                <div class="feature-grid">
                    <div class="feature-card">
                        <h3>Responsive Design</h3>
                        <p>Built to work seamlessly across desktop and mobile devices.</p>
                    </div>

                    <div class="feature-card">
                        <h3>Modern UI</h3>
                        <p>Clean interfaces inspired by Atlassian Design System.</p>
                    </div>

                    <div class="feature-card">
                        <h3>Fast Performance</h3>
                        <p>Lightweight and optimized for quick loading times.</p>
                    </div>
                </div>

                <div class="button-group">
                    <a href="/#/test" class="button button-primary">View Test Page</a>
                    <a href="/#/about" class="button button-secondary">Learn More</a>
                </div>
            </div>
        </Layout>
    )
};