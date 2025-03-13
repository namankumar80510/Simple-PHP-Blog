import m from "mithril";
import { BlogIndex } from "./BlogIndex.jsx";
import { BlogPost } from "./BlogPostView.jsx";
import { About } from "./About.jsx";
import { Test } from "./Test.jsx";

const mountNode = document.querySelector("#app");

m.route.prefix="/blog/"; // remove it for default prefix '#!' or change it to something else

m.route(mountNode, "/", {
    "/": BlogIndex,
    "/about": About,
    "/test": Test,
    "/view/:slug": BlogPost
});
