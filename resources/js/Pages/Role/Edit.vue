<script lang="ts" setup>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Role} from "@/types";
import RoleForm from "@/Pages/Role/RoleForm.vue";


defineProps<{
    models: string[]
    permission_prefixes: string[],
    role: Role,
    permissions: string[]
}>()


</script>

<template>
    <AuthenticatedLayout>
        <RoleForm :models :permission_prefixes :permissions :role title="Edit Role"/>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
