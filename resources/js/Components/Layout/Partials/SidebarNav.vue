<script lang="ts" setup>
import {AreaChartIcon, Users2Icon} from "lucide-vue-next";
import SidebarLink from "@/Components/Layout/Partials/SidebarLink.vue";
</script>

<template>

    <SidebarLink routeName="dashboard" :Icon="AreaChartIcon" label="Dashboard" />
    <SidebarLink routeName="users.index" :Icon="Users2Icon" label="Users" :count="10" />

</template>

<style scoped>

</style>
