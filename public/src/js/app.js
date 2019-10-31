import "@babel/polyfill";
require("./vendors.js");

import Vue from "vue";
import VueQrcode from '@chenfengyuan/vue-qrcode';
import store from "./store/store";
import FontAwesomeIcon from "vendor_config/vue_fontawesome";
import VueNumberInput from '@chenfengyuan/vue-number-input';

$(document).ready(() => {
    const app = document.getElementById('vue-app');
    if(app) {
        Vue.component('font-awesome-icon', FontAwesomeIcon);
        Vue.component(VueQrcode.name, VueQrcode);
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
