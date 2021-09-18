<template>
    <app-layout title="Menu">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Menuboard
            </h2>
        </template>
        <div>
            ようこそ{{ $page.props.user.name }}さん！
        </div>
        <hr>
        <Link href="/menu/show">照会処理</Link>
        <Link href="/menu/edit">更新処理</Link>
        <Link href="/dashboard">ダッシュボード</Link>
        
        <div v-if="$page.props.user.access_auth > 0">
            <Link :href="route('secret')">秘密の部屋</Link>
        </div>
        
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <welcome />
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import { Link } from '@inertiajs/inertia-vue3';//追加
    import AppLayout from '@/Layouts/AppLayout.vue'
    import Welcome from '@/Jetstream/Welcome.vue'

    export default defineComponent({
        components: {
            Link,//追加
            AppLayout,
            Welcome,
        },
    })
</script>
