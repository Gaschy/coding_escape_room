import "@babel/polyfill";
require("./vendors.js");

import Vue from "vue";
import VueQrcode from '@chenfengyuan/vue-qrcode';
import store from "./store/store";
import ElementUI from 'element-ui';
import FontAwesomeIcon from "vendor_config/vue_fontawesome";

$(document).ready(() => {
    const app = document.getElementById('vue-app');
    if(app) {
        Vue.use(ElementUI);
        Vue.component('font-awesome-icon', FontAwesomeIcon);
        Vue.component(VueQrcode.name, VueQrcode);

        window.vm = new Vue({
            el: "#vue-app",
            store: store,
            delimiters: ['${', '}']
        });
    }
});

import '../css/vendors.scss'
import '../css/style.scss';
