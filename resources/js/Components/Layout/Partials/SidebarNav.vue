<script lang="ts" setup>
import {AreaChartIcon, Users2Icon,ShieldIcon} from "lucide-vue-next";
import SidebarLink from "@/Components/Layout/Partials/SidebarLink.vue";
</script>

<template>

    <SidebarLink routeName="dashboard" :activeIn="['dashboard']" :Icon="AreaChartIcon" label="Dashboard" />
    <SidebarLink routeName="users.index" :activeIn="['users.index']" :Icon="Users2Icon" label="Users" :count="10" />
    <SidebarLink routeName="roles.index" :activeIn="['roles.index','roles.create','roles.edit']" :Icon="ShieldIcon" label="Roles" />

</template>

<style scoped>

</style>
