<template>
    <app-layout title="Menu">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Menuboard
            </h2>
        </template>
        

        <Link href="/menu/show">照会処理</Link>
        <Link href="/menu/edit">
             更新処理 
        </Link>
        
        <Link href="/dashboard">
            Dahsboard
        </Link>
        

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
