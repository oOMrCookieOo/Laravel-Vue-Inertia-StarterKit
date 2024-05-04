<script lang="ts" setup>

import {Badge} from "@/Components/ui/badge";
import {ChevronsUpDownIcon, LogOutIcon} from "lucide-vue-next";
import {Link} from "@inertiajs/vue3";
import {DropdownMenu, DropdownMenuContent, DropdownMenuItem, DropdownMenuTrigger} from "@/Components/ui/dropdown-menu";
import {Avatar, AvatarFallback, AvatarImage} from "@/Components/ui/avatar";
</script>

<template>
    <DropdownMenu>
        <DropdownMenuTrigger class="bg-white dark:bg-black  border p-2  rounded-2xl mt-4 w-full">
            <div class="flex items-center gap-2">
                <Avatar class="rounded-xl">
                    <AvatarImage alt="@radix-vue" src="https://github.com/radix-vue.png"/>
                    <AvatarFallback>CN</AvatarFallback>
                </Avatar>
                <div class="flex flex-col justify-start text-start overflow-hidden flex-1">
                    <span class="truncate text-sm">{{ $page.props.auth.user.name }} </span>
                    <Badge class="w-fit" variant="secondary">Admin</Badge>
                </div>
                <ChevronsUpDownIcon class="size-4 text-"/>
            </div>
        </DropdownMenuTrigger>
        <DropdownMenuContent class=w-64>
            <DropdownMenuItem>
                <Link :href="route('logout')" as="button" class="w-full text-start flex items-center"
                      method="post">
                    <LogOutIcon class="mr-2 size-4"/>
                    <span>Log out</span>
                </Link>
            </DropdownMenuItem>
        </DropdownMenuContent>
    </DropdownMenu>
</template>

<style scoped>

</style>
