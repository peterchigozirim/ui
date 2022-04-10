require('./bootstrap');

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';

// font awesome 
import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { faArrowRight, faBars, faCircleMinus, faMoneyCheckDollar, faHome, faMoon, faRotate, faShield, faSun, faUserSecret, faSearch, faRectangleXmark } from '@fortawesome/free-solid-svg-icons'
import { faFontAwesome } from '@fortawesome/free-brands-svg-icons'
import { faFile, faSpinner } from '@fortawesome/free-regular-svg-icons'

library.add(faUserSecret, faBars, faMoon, faSun, faRotate, faArrowRight, faMoneyCheckDollar, faShield, faHome, faSearch, faFile, faCircleMinus, faRectangleXmark)

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

import CKEditor from '@ckeditor/ckeditor5-vue';
// toast notification
import Toast from "vue-toastification";
// Import the CSS or use your own!
import "vue-toastification/dist/index.css";

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => require(`./Pages/${name}.vue`),
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .use(CKEditor)
            .use(Toast)
            .component('font-awesome', FontAwesomeIcon)
            .mixin({ methods: { route } })
            .mount(el);
    },
});

InertiaProgress.init({ color: '#4B5563' });
