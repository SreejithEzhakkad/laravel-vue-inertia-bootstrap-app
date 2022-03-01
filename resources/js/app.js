require('./bootstrap');

// Import modules...
import { createApp, h } from 'vue';
import { App as InertiaApp, plugin as InertiaPlugin } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import Store from '@/Store/index'

const el = document.getElementById('app');
el.classList.add('d-flex', 'flex-column', 'h-100');

createApp({
    render: () =>
        h(InertiaApp, {
            initialPage: JSON.parse(el.dataset.page),
            resolveComponent: (name) => require(`./Pages/${name}`).default,
        }),
})
    .mixin({ methods: { route } })
    .use(Store)
    .use(InertiaPlugin)
    .mount(el);

InertiaProgress.init({ color: '#ffffff' });
