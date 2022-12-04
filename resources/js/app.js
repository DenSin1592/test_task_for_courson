import Vue from "vue"
import Index from  './components/index'
import router from "./router";

require('./bootstrap');

new Vue({
    el: '#app',

    components: {
        Index
    },
    router
});


