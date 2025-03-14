<template>
    <router-view />
</template>

<script>
export default {
    name: 'App'
}
</script>

<style>
/* Atlassian-inspired Design System */
:root {
    /* Color palette based on Atlassian Design System */
    --ds-background-default: #ffffff;
    --ds-background-neutral: #f4f5f7;
    --ds-background-neutral-subtle: #ebecf0;
    --ds-background-neutral-bold: #dfe1e6;
    --ds-background-selected: #e6effc;
    --ds-background-selected-bold: #0052cc;
    --ds-background-danger: #ffebe6;

    /* Text colors */
    --ds-text: #172b4d;
    --ds-text-subtle: #6b778c;
    --ds-text-disabled: #a5adba;
    --ds-text-inverse: #ffffff;
    --ds-text-selected: #0052cc;
    --ds-text-danger: #de350b;
    --ds-text-warning: #ff8b00;
    --ds-text-success: #006644;

    /* Border colors */
    --ds-border: #dfe1e6;
    --ds-border-focused: #4c9aff;
    --ds-border-danger: #ff5630;

    /* Interactive colors */
    --ds-brand: #0052cc;
    --ds-brand-bold: #0747a6;
    --ds-selected: #0052cc;
    --ds-selected-bold: #0747a6;

    /* Accents */
    --ds-accent-red: #ff5630;
    --ds-accent-orange: #ff8b00;
    --ds-accent-yellow: #ffab00;
    --ds-accent-green: #36b37e;
    --ds-accent-teal: #00b8d9;
    --ds-accent-blue: #0065ff;
    --ds-accent-purple: #6554c0;
    --ds-accent-magenta: #bf2600;

    /* Elevation (shadows) */
    --ds-shadow-raised: 0 1px 1px rgba(9, 30, 66, 0.25), 0 0 1px rgba(9, 30, 66, 0.31);
    --ds-shadow-card: 0 4px 8px -2px rgba(9, 30, 66, 0.25), 0 0 1px rgba(9, 30, 66, 0.31);
    --ds-shadow-overlay: 0 8px 16px -4px rgba(9, 30, 66, 0.25), 0 0 1px rgba(9, 30, 66, 0.31);

    /* Spacing */
    --ds-space-025: 2px;
    --ds-space-050: 4px;
    --ds-space-075: 6px;
    --ds-space-100: 8px;
    --ds-space-150: 12px;
    --ds-space-200: 16px;
    --ds-space-250: 20px;
    --ds-space-300: 24px;
    --ds-space-400: 32px;
    --ds-space-500: 40px;
    --ds-space-600: 48px;

    /* Border radius */
    --ds-radius-small: 2px;
    --ds-radius-medium: 3px;
    --ds-radius-large: 8px;

    /* Transitions */
    --ds-transition-duration: 0.22s;
    --ds-transition-timing: cubic-bezier(0.2, 0, 0, 1);
}

/* Base styles */
* {
    box-sizing: border-box;
}

body {
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Oxygen", "Ubuntu", "Helvetica Neue",
        sans-serif;
    margin: 0;
    padding: 0;
    color: var(--ds-text);
    line-height: 1.5;
    background-color: var(--ds-background-neutral);
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

img {
    max-width: 100%;
}

/* Layout */
.layout {
    max-width: 1140px;
    margin: 0 auto;
    padding: var(--ds-space-400);
    background-color: var(--ds-background-default);
    box-shadow: var(--ds-shadow-card);
    border-radius: var(--ds-radius-large);
    min-height: 100vh;
}

main {
    padding: var(--ds-space-200) 0;
}

/* Typography */
h1,
h2,
h3,
h4,
h5,
h6 {
    margin-top: 0;
    margin-bottom: var(--ds-space-300);
    font-weight: 500;
    line-height: 1.3;
    color: var(--ds-text);
    letter-spacing: -0.01em;
}

h1 {
    font-size: 24px;
    margin-bottom: var(--ds-space-400);
    font-weight: 600;
}

h2 {
    font-size: 20px;
    margin-bottom: var(--ds-space-300);
}

h3 {
    font-size: 16px;
    margin-bottom: var(--ds-space-200);
}

p {
    margin-top: 0;
    margin-bottom: var(--ds-space-200);
    color: var(--ds-text-subtle);
    font-size: 14px;
    line-height: 1.6;
}

/* Navigation */
nav {
    display: flex;
    align-items: center;
    padding: var(--ds-space-200) 0;
    margin-bottom: var(--ds-space-400);
    border-bottom: 1px solid var(--ds-border);
}

nav a {
    display: inline-flex;
    align-items: center;
    margin-right: var(--ds-space-400);
    color: var(--ds-text-subtle);
    text-decoration: none;
    font-weight: 500;
    font-size: 14px;
    padding: var(--ds-space-100) var(--ds-space-050);
    position: relative;
    transition: color var(--ds-transition-duration) var(--ds-transition-timing);
    border-radius: var(--ds-radius-small);
}

nav a:hover {
    color: var(--ds-text-selected);
    background-color: var(--ds-background-selected);
}

nav a:after {
    content: "";
    position: absolute;
    bottom: -1px;
    left: 0;
    width: 0;
    height: 2px;
    background-color: var(--ds-selected);
    transition: width var(--ds-transition-duration) var(--ds-transition-timing);
}

nav a:hover:after {
    width: 100%;
}

/* Atlassian-style active navigation */
nav a[aria-current="page"] {
    color: var(--ds-text-selected);
    font-weight: 600;
}

nav a[aria-current="page"]:after {
    width: 100%;
}

/* Tables */
table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    margin-bottom: var(--ds-space-400);
    font-size: 14px;
    border: 1px solid var(--ds-border);
    border-radius: var(--ds-radius-medium);
    overflow: hidden;
}

thead {
    background-color: var(--ds-background-neutral-subtle);
}

th {
    text-align: left;
    font-weight: 600;
    padding: var(--ds-space-200);
    color: var(--ds-text);
    border-bottom: 2px solid var(--ds-border);
}

td {
    padding: var(--ds-space-200);
    border-bottom: 1px solid var(--ds-border);
}

tbody tr {
    background-color: var(--ds-background-default);
    transition: background-color var(--ds-transition-duration) var(--ds-transition-timing);
}

tbody tr:hover {
    background-color: var(--ds-background-selected);
}

tbody tr:last-child td {
    border-bottom: none;
}

/* Cards for content sections */
.card {
    background-color: var(--ds-background-default);
    border-radius: var(--ds-radius-medium);
    padding: var(--ds-space-300);
    margin-bottom: var(--ds-space-300);
    box-shadow: var(--ds-shadow-raised);
    border: 1px solid var(--ds-border);
    transition:
        transform var(--ds-transition-duration) var(--ds-transition-timing),
        box-shadow var(--ds-transition-duration) var(--ds-transition-timing);
}

.card:hover {
    transform: translateY(-2px);
    box-shadow: var(--ds-shadow-card);
}

/* Status indicators */
.status {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 2px var(--ds-space-100);
    border-radius: 3px;
    font-size: 12px;
    font-weight: 600;
    line-height: 1;
    text-transform: uppercase;
}

.status-success {
    background-color: #e3fcef;
    color: var(--ds-text-success);
}

.status-error {
    background-color: var(--ds-background-danger);
    color: var(--ds-text-danger);
}

/* Error & loading states */
.error-message {
    color: var(--ds-text-danger);
    padding: var(--ds-space-200);
    border-radius: var(--ds-radius-medium);
    background-color: var(--ds-background-danger);
    margin-bottom: var(--ds-space-200);
    font-size: 14px;
    display: flex;
    align-items: center;
}

.error-message:before {
    content: "!";
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 20px;
    height: 20px;
    border-radius: 50%;
    background-color: var(--ds-accent-red);
    color: white;
    font-weight: bold;
    margin-right: var(--ds-space-100);
    flex-shrink: 0;
}

.loading {
    display: flex;
    align-items: center;
    color: var(--ds-text-subtle);
    font-size: 14px;
}

.loading:before {
    content: "";
    display: inline-block;
    width: 16px;
    height: 16px;
    border: 2px solid var(--ds-background-neutral-bold);
    border-radius: 50%;
    border-top-color: var(--ds-brand);
    animation: spin 1.5s linear infinite;
    margin-right: var(--ds-space-100);
}

@keyframes spin {
    to {
        transform: rotate(360deg);
    }
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .layout {
        padding: var(--ds-space-200);
        margin: var(--ds-space-100);
        border-radius: var(--ds-radius-medium);
    }

    nav {
        flex-direction: column;
        align-items: flex-start;
    }

    nav a {
        margin-bottom: var(--ds-space-100);
        margin-right: 0;
        width: 100%;
    }

    table {
        display: block;
        overflow-x: auto;
    }

    .feature-grid {
        grid-template-columns: 1fr;
    }
}

/* Button styles - Atlassian-inspired */
.button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 8px 16px;
    border-radius: var(--ds-radius-medium);
    font-size: 14px;
    font-weight: 500;
    line-height: 1;
    cursor: pointer;
    transition:
        background-color var(--ds-transition-duration) var(--ds-transition-timing),
        color var(--ds-transition-duration) var(--ds-transition-timing);
    text-decoration: none;
    border: none;
}

.button-primary {
    background-color: var(--ds-brand);
    color: white;
}

.button-primary:hover {
    background-color: var(--ds-brand-bold);
}

.button-secondary {
    background-color: var(--ds-background-neutral-subtle);
    color: var(--ds-text);
}

.button-secondary:hover {
    background-color: var(--ds-background-neutral-bold);
}

.button-subtle {
    background-color: transparent;
    color: var(--ds-text-subtle);
}

.button-subtle:hover {
    background-color: var(--ds-background-neutral-subtle);
    color: var(--ds-text);
}

/* Lozenge - like Atlassian badges */
.lozenge {
    display: inline-flex;
    align-items: center;
    padding: 2px 8px;
    border-radius: 3px;
    font-size: 11px;
    font-weight: 700;
    line-height: 1;
    text-transform: uppercase;
    letter-spacing: 0.06em;
}

.lozenge-success {
    background-color: #e3fcef;
    color: #006644;
}

.lozenge-removed {
    background-color: #ffebe6;
    color: #bf2600;
}

.lozenge-new {
    background-color: #deebff;
    color: #0747a6;
}

.lozenge-moved {
    background-color: #eae6ff;
    color: #403294;
}

.lozenge-default {
    background-color: var(--ds-background-neutral-subtle);
    color: var(--ds-text-subtle);
}

/* Footer */
footer {
    margin-top: var(--ds-space-600);
    padding-top: var(--ds-space-300);
    border-top: 1px solid var(--ds-border);
}

.footer-text {
    font-size: 12px;
    color: var(--ds-text-subtle);
    text-align: center;
}

/* Feature grid for homepage */
.feature-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: var(--ds-space-300);
    margin: var(--ds-space-400) 0;
}

.feature-card {
    background-color: var(--ds-background-neutral-subtle);
    padding: var(--ds-space-300);
    border-radius: var(--ds-radius-medium);
    border: 1px solid var(--ds-border);
}

.feature-card h3 {
    margin-top: 0;
    font-size: 16px;
    color: var(--ds-text);
}

.feature-card p {
    font-size: 14px;
    margin-bottom: 0;
}

/* Button groups */
.button-group {
    display: flex;
    gap: var(--ds-space-200);
    margin-top: var(--ds-space-400);
}

/* About page specific */
.about-content {
    margin-bottom: var(--ds-space-400);
}

.about-info-section {
    margin-top: var(--ds-space-400);
    padding-top: var(--ds-space-300);
    border-top: 1px solid var(--ds-border);
}

.tech-stack {
    display: flex;
    gap: var(--ds-space-100);
    margin-top: var(--ds-space-200);
}

/* API Test page specific */
.api-status-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: var(--ds-space-300);
}

.api-status-info {
    display: flex;
    align-items: center;
    gap: var(--ds-space-200);
}

.api-method {
    font-family: monospace;
    background-color: var(--ds-background-neutral-subtle);
    padding: 2px 8px;
    border-radius: 3px;
    font-size: 12px;
}

/* Intro text styling */
.intro-text {
    font-size: 16px;
    color: var(--ds-text);
    margin-bottom: var(--ds-space-400);
}

/* Search box styles */
.search-container {
    margin-bottom: var(--ds-space-400);
    padding-bottom: var(--ds-space-200);
    border-bottom: 1px solid var(--ds-border);
}

.search-container form {
    display: flex;
    gap: var(--ds-space-100);
}

.search-input {
    flex: 1;
    padding: var(--ds-space-100) var(--ds-space-200);
    border: 1px solid var(--ds-border);
    border-radius: var(--ds-radius-medium);
    font-size: 14px;
    color: var(--ds-text);
    transition: border-color var(--ds-transition-duration) var(--ds-transition-timing);
}

.search-input:focus {
    outline: none;
    border-color: var(--ds-border-focused);
    box-shadow: 0 0 0 2px rgba(76, 154, 255, 0.2);
}

.search-button {
    background-color: var(--ds-brand);
    color: white;
    border: none;
    border-radius: var(--ds-radius-medium);
    padding: var(--ds-space-100) var(--ds-space-200);
    font-size: 14px;
    font-weight: 500;
    cursor: pointer;
    transition: background-color var(--ds-transition-duration) var(--ds-transition-timing);
}

.search-button:hover {
    background-color: var(--ds-brand-bold);
}

@media (max-width: 768px) {
    .search-container form {
        flex-direction: column;
    }

    .search-button {
        align-self: flex-start;
    }
}
</style>