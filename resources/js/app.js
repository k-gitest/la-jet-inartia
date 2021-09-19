require('./bootstrap');

    import { createApp, h } from 'vue';
    import { createInertiaApp , Link , Head } from '@inertiajs/inertia-vue3';
    import { InertiaProgress } from '@inertiajs/progress';
    import { createI18n } from 'vue-i18n'//日本語化追加

    const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

    //日本語化メソッド
    async function loadLocaleMessages(i18n, locale){
        const messages = await import(`../lang/${locale}.json`)
        i18n.global.setLocaleMessage(locale, messages.default)
    }

    createInertiaApp({
        title: (title) => `${title} - ${appName}`,
        resolve: (name) => require(`./Pages/${name}.vue`),
        async setup({ el, app, props, plugin }) {

            //日本語化true
            const i18n = createI18n({
                legacy: false,
                globalInjection: true,
                locale: __locale
            })

            //日本語ファイル呼び出し
            await loadLocaleMessages(i18n, __locale)

            return createApp({ render: () => h(app, props) })
                .use(plugin)
                .use(i18n)//日本語をグローバルで使う
                .component('InertiaHead', Head)
            .component('InertiaLink', Link)
                .mixin({ methods: { route } })
                .mount(el);
        },
    });

    InertiaProgress.init({ color: '#4B5563' });