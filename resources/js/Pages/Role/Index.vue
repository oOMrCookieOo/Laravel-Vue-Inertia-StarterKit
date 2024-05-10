<script lang="ts" setup>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Card, CardContent, CardFooter, CardHeader, CardTitle} from "@/Components/ui/card";
import {Role} from "@/types";
import {EyeIcon, Trash2Icon,Loader2Icon,PlusIcon} from "lucide-vue-next";

import {Link, useForm} from "@inertiajs/vue3";
import {Button} from "@/Components/ui/button";
import {Badge} from "@/Components/ui/badge";

import {
    AlertDialog,
    AlertDialogAction,
    AlertDialogCancel,
    AlertDialogContent,
    AlertDialogDescription,
    AlertDialogFooter,
    AlertDialogHeader,
    AlertDialogTitle,
} from '@/Components/ui/alert-dialog'
import {ref} from "vue";
import {toast} from "vue-sonner";
import {useChangeCase} from "@vueuse/integrations/useChangeCase";


defineProps<{
    roles: Role[]
}>()

const showDeleteDialog = ref(false)
const selectedRole = ref<Role|null>(null)
const deleteClicked = (role: Role) => {
    selectedRole.value = role
    showDeleteDialog.value = true
}


const form = useForm({})

const deleteRole = () => form.delete(route('roles.destroy', selectedRole.value?.id), {
    onSuccess: () => {
        selectedRole.value = null
        showDeleteDialog.value = false
        toast.success('Role deleted')
    }
})

const sentenceCase = (str: string) => useChangeCase(str, 'sentenceCase').value;

</script>

<template>
    <AuthenticatedLayout>
        <div class="container">
            <div class="flex items-center justify-between">
                <h1 class="mb-4 text-4xl font-extrabold tracking-tight lg:text-3xl">
                    Roles
                </h1>

                <Link :href="route('roles.create')">
                    <Button variant="outline">
                        <PlusIcon class="mr-1 size-4"/>
                        Create
                    </Button>
                </Link>

            </div>

            <div class="grid grid-cols-3 gap-4">
                <Card v-for="role in roles" :key="role.id" class="shadow-none">
                    <CardHeader>
                        <CardTitle class="capitalize text-xl">{{ role.name }}</CardTitle>
                    </CardHeader>
                    <CardContent class="flex items-center gap-2 flex-wrap">
                        <Badge class="text-xs"  v-for="permission in role.permissions" :key="permission.id" >{{ sentenceCase(permission.name) }}</Badge>
                    </CardContent>
                    <CardFooter class="flex items-center flex-wrap justify-end gap-2">
                        <Link :href="route('roles.edit', role.id)">
                            <Button size="sm" variant="outline">
                                <EyeIcon class="mr-1 size-4"/>
                                View
                            </Button>
                        </Link>
                        <Button size="sm" variant="destructive" @click="deleteClicked(role)">
                            <Trash2Icon class="mr-1 size-4"/>
                            Delete
                        </Button>
                    </CardFooter>
                </Card>
            </div>
        </div>

        <AlertDialog v-model:open="showDeleteDialog">
            <AlertDialogContent>
                <AlertDialogHeader>
                    <AlertDialogTitle>Are you absolutely sure?</AlertDialogTitle>
                    <AlertDialogDescription>
                        This action cannot be undone. This will permanently delete {{ selectedRole?.name }}.
                    </AlertDialogDescription>
                </AlertDialogHeader>
                <AlertDialogFooter>
                    <AlertDialogCancel>Cancel</AlertDialogCancel>
                        <Button
                            variant="destructive"
                            @click="deleteRole"
                        >
                            <Loader2Icon v-if="form.processing" class="mr-2 h-4 w-4 animate-spin"/>
                            {{ ('Delete') }}
                        </Button>
                </AlertDialogFooter>
            </AlertDialogContent>
        </AlertDialog>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
