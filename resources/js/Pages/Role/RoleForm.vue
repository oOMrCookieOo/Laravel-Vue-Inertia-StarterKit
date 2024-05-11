<script lang="ts" setup>

import {Loader2Icon} from "lucide-vue-next";
import {Card, CardContent, CardFooter} from "@/Components/ui/card";
import {Separator} from "@/Components/ui/separator";
import {Checkbox} from "@/Components/ui/checkbox";
import {Link} from "@inertiajs/vue3";
import {Button} from "@/Components/ui/button";
import {Label} from "@/Components/ui/label";
import {Switch} from "@/Components/ui/switch";
import {Input} from "@/Components/ui/input";
import InputError from "@/Components/InputError.vue";
import {useRoleForm} from "@/Pages/Role/useRoleForm";
import {toast} from "vue-sonner";
import {onMounted} from "vue";
import {Role} from "@/types";

const {
    form,
    sentenceCase,
    lastWord,
    isSelected,
    selectPermission,
    isAllModelPermissionsSelected,
    toggleModelPermissions,
    _toggleAllPermissions,
} = useRoleForm();


const props = defineProps<{
    models: string[]
    permission_prefixes: string[],
    title: string,
    permissions?: string[]
    role?: Role
}>()


const submit = () => {
    if (props.role) {
        form.put(route('roles.update', props.role.id), {
            preserveScroll: true,
            onSuccess: () => {
                form.reset()
                toast.success(('The role was updated successfully.'))
            },
        });
    } else {
        form.post(route('roles.store'), {
            preserveScroll: true,
            onSuccess: () => {
                form.reset()
                toast.success(('The role was created successfully.'))
            },
        });
    }
};
const toggleAllPermissions = (values: boolean) => {
    _toggleAllPermissions(values, {
        models: props.models,
        permission_prefixes: props.permission_prefixes
    })
}

onMounted(() => {
    if (props.role) {
        form.name = props.role.name;
        form.guard_name = props.role.guard_name;
        form.permissions = props.permissions ?? [];
    }
})
</script>

<template>
    <div class="container">
        <h1 class="mb-4 text-4xl font-extrabold tracking-tight lg:text-3xl">
            {{ title }}
        </h1>
        <div class="flex flex-col gap-4">
            <Card>
                <CardContent class="py-6">

                    <div class="grid gap-6 grid-cols-3">
                        <div class="">
                            <Label for="name" value="name">Name</Label>

                            <Input
                                id="name"
                                v-model="form.name"
                                class="mt-1 block w-full"
                                placeholder="Admin"
                                required
                            />

                            <InputError :message="form.errors.name" class="mt-2"/>
                        </div>
                        <div class="">
                            <Label for="guard" value="guard">Guard Name</Label>

                            <Input
                                id="guard"
                                v-model="form.guard_name"
                                autocomplete="username"
                                class="mt-1 block w-full"
                                placeholder=""
                                required
                            />

                            <InputError :message="form.errors.guard_name" class="mt-2"/>
                        </div>
                        <div class="self-ce">

                            <div class="space-y-2 flex flex-row items-center justify-between rounded-lg ">
                                <div class="space-y-0.5">
                                    <Label class="flex items-center gap-2">
                                        <span>Select all</span>
                                        <Switch
                                            @update:checked="toggleAllPermissions"
                                        />
                                    </Label>
                                    <p class="text-sm text-muted-foreground">
                                        Enable all Permissions currently Enabled for this role
                                    </p>
                                </div>

                            </div>
                        </div>

                    </div>

                </CardContent>
            </Card>
            <div>
                <Card>
                    <CardContent class="py-6">

                        <div v-for="model in models" :key="model" class="border rounded-lg p-4 my-4">
                            <div class="flex flex-col">
                                <div>
                                    <h1 class="text-base font-semibold">{{ lastWord(model) }}</h1>
                                    <span class="text-sm text-muted-foreground">{{ model }}</span>
                                </div>
                            </div>
                            <Separator/>
                            <div class="mt-4 ">
                                    <span v-if="isAllModelPermissionsSelected(model,permission_prefixes)"
                                          class="font-semibold hover:underline text-sm cursor-pointer"
                                          @click="toggleModelPermissions(model,permission_prefixes)">Deselect all permissions</span>
                                <span v-else class="font-semibold hover:underline text-sm cursor-pointer"
                                      @click="toggleModelPermissions(model,permission_prefixes)">Select all permissions</span>
                                <div class="grid grid-cols-2 lg:grid-cols-3  gap-2 p-4">
                                    <div v-for="permission in permission_prefixes"
                                         :key="`${model}_${permission}`"
                                         class="flex items-center space-x-2">
                                        <Checkbox
                                            :id="`${model}_${permission}_input`"
                                            :checked="isSelected(permission, model)"
                                            @click="selectPermission(permission, model)"
                                        />
                                        <label
                                            :for="`${model}_${permission}_input`"
                                            class="text-sm font-medium capitalize"
                                        >
                                            {{ sentenceCase(permission) }}
                                        </label>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <InputError :message="form.errors.permissions" class="mt-2"/>
                    </CardContent>
                    <CardFooter class="flex flex-wrap justify-end gap-2">
                        <Link :href="route('roles.index')">
                            <Button variant="ghost">Cancel</Button>
                        </Link>
                        <Button @click="submit">
                            <Loader2Icon v-if="form.processing" class="mr-2 h-4 w-4 animate-spin"/>
                            Submit
                        </Button>
                    </CardFooter>
                </Card>
            </div>

        </div>

    </div>
</template>

<style scoped>

</style>
