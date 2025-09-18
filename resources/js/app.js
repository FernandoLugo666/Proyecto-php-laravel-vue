import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import PrimeVue from 'primevue/config'; // ✅ Importa PrimeVue
import 'primevue/resources/themes/saga-blue/theme.css'; // ✅ funciona en v3


import 'primevue/resources/primevue.min.css'; // Estilos base
import 'primeicons/primeicons.css'; // Iconos
import FloatLabel from 'primevue/floatlabel';
import InputText from 'primevue/inputtext';


const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        const app = createApp({ render: () => h(App, props) });

        app.use(plugin);        // Inertia
        app.use(ZiggyVue);      // Ziggy
        app.use(PrimeVue);      // ✅ PrimeVue

        //Componentes globales
        app.component('FloatLabel', FloatLabel);
        app.component('InputText', InputText);

        return app.mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
