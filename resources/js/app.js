require("./bootstrap");
try {
    window.$ = window.jQuery = require("jquery");
    window.Popper = require("popper.js").default;
    require("bootstrap");
} catch (e) {}

window.Vue = require("vue");

Vue.component("guide", require("./components/guide.vue").default);
Vue.component("assetsdeck", require("./components/assetsdeck.vue").default);

Vue.component("asset-card", require("./components/asset_card.vue").default);

Vue.component(
    "bottombanner",
    require("./components/bottom_banner.vue").default
);
const app = new Vue({
    el: "#app"
});
