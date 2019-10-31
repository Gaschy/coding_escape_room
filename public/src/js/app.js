import "@babel/polyfill";
require("./vendors.js");

import Vue from "vue";
import VueQrcode from '@chenfengyuan/vue-qrcode';
import store from "./store/store";
import FontAwesomeIcon from "vendor_config/vue_fontawesome";
import VueNumberInput from '@chenfengyuan/vue-number-input';
import CodeEditor from "components/codeEditor";

$(document).ready(() => {
    const app = document.getElementById('vue-app');
    if(app) {
        Vue.component('font-awesome-icon', FontAwesomeIcon);
        Vue.component(VueQrcode.name, VueQrcode);
        Vue.component("code-editor", CodeEditor);
        Vue.use(VueNumberInput);

        window.vm = new Vue({
            el: "#vue-app",
            store: store,
            delimiters: ['${', '}']
        });
    }
});

import '../css/vendors.scss'
import '../css/style.scss';
