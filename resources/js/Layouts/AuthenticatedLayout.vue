<script lang="ts" setup>
import Sidebar from '@/Components/Layout/Sidebar.vue';
import {Toaster} from "@/Components/ui/sonner"
import Header from '@/Components/Layout/Header.vue';

console.log()
</script>

<template>
    <div
        class="mx-auto flex min-h-screen  w-full min-w-[320px] flex-col transition-all duration-300 ease-out md:ps-72 overflow-hidden">
        <Sidebar/>
        <div class="md:p-3 bg-white dark:bg-primary-foreground">
            <div class="bg-[#F6F6F3] dark:bg-black rounded-xl border-2">
                <Header/>
                <main class="h-[calc(100vh-64px)] md:h-[calc(100vh-90px)] py-2 px-2 md:px-4 xl:px-8 overflow-y-auto">
                    <slot/>
                </main>
            </div>
        </div>

        <Toaster closeButton expand position="top-right" />
    </div>
</template>
