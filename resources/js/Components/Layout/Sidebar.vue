<script lang="ts" setup>

import SidebarNav from "@/Components/Layout/Partials/SidebarNav.vue";
import Search from "@/Components/Search.vue";
import UserMenu from "@/Components/UserMenu.vue";
import SidebarNavBottom from "@/Components/Layout/Partials/SidebarNavBottom.vue";
</script>

<template>
    <nav
        class=" bg-white dark:bg-primary-foreground fixed bottom-0 start-0 top-0 z-50 hidden md:flex h-full w-full flex-col transition-transform duration-300 ease-out md:w-72 shrink-0">
        <aside
            class="hidden h-screen w-full flex-shrink-0 flex-col justify-between   px-2  md:flex overflow-y-auto">

            <UserMenu/>

            <Search/>

            <nav class="mt-6 flex-1 text-sm font-medium flex flex-col gap-2">
                <SidebarNav/>
            </nav>
            <SidebarNavBottom/>
        </aside>
    </nav>
</template>

<style scoped>

</style>
