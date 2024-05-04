<script lang="ts" setup>
import {CogIcon} from "lucide-vue-next";
import SidebarLink from "@/Components/Layout/Partials/SidebarLink.vue";
</script>

<template>

    <SidebarLink :Icon="CogIcon" class="my-1 mb-4" label="Settings" routeName="profile.edit"/>

</template>

<style scoped>

</style>
