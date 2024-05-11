<script lang="ts" setup>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import RoleForm from "@/Pages/Role/RoleForm.vue";

defineProps<{
    models: string[]
    permission_prefixes: string[],
}>()


</script>

<template>
    <AuthenticatedLayout>
        <RoleForm :models :permission_prefixes title="Create Role"/>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
