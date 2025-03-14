<template>
    <Layout>
        <div class="card">
            <h1>About Us</h1>

            <div class="about-content">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <p>Ut enim ad minim veniam, quis nostrud exercitation.</p>

                <div class="about-info-section">
                    <h3>Our Mission</h3>
                    <p>To provide high-quality, user-friendly applications that solve real-world problems.</p>
                </div>

                <div class="about-info-section">
                    <h3>Technologies</h3>
                    <div class="tech-stack">
                        <span class="lozenge lozenge-new">Mithril</span>
                        <span class="lozenge lozenge-default">JavaScript</span>
                        <span class="lozenge lozenge-default">CSS</span>
                        <span class="lozenge lozenge-default">HTML</span>
                    </div>
                </div>
            </div>

            <div class="button-group">
                <a href="/" class="button button-primary">Back to Home</a>
            </div>
        </div>
    </Layout>
</template>

<script>
import { onMounted } from 'vue';
import Layout from './Layout.vue';

export default {
    name: 'About',
    components: {
        Layout
    },
    setup() {
        onMounted(() => {
            document.title = "About Us - My Blog";
        });
    }
};
</script>