<script lang="ts" setup>
import DesktopMenu from "@/Components/Layout/Partials/DesktopMenu.vue";
import MobileMenu from "@/Components/Layout/Partials/MobileMenu.vue";
</script>

<template>
    <div
        class="flex h-[60px] items-center justify-between border-b border-neutral-100 dark:border-primary-foreground px-6">

        <MobileMenu/>

        <DesktopMenu/>

    </div>
</template>

<style scoped>

</style>
