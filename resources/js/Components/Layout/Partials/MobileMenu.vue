<script lang="ts" setup>

import {Drawer, DrawerContent, DrawerDescription, DrawerHeader, DrawerTrigger} from "@/Components/ui/drawer";
import {Button} from "@/Components/ui/button";
import SidebarNav from "@/Components/Layout/Partials/SidebarNav.vue";
import SidebarNavBottom from "@/Components/Layout/Partials/SidebarNavBottom.vue";
import {MenuIcon} from "lucide-vue-next";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import {Link} from "@inertiajs/vue3";
import UserMenu from "@/Components/UserMenu.vue";
</script>

<template>
    <div class="bg-white absolute left-0 top-0 z-40 flex w-full flex-col items-center md:hidden">
        <div class="flex w-full items-center justify-between px-6 py-4">
            <Link :href="route('dashboard')">
                <h1 class=" hover:scale-90 transition-all ease-in-out">
                    <ApplicationLogo class="w-9"/>
                </h1>
            </Link>
            <Drawer>
                <DrawerTrigger>
                    <Button variant="outline">
                        <MenuIcon class="w-4 h-4"/>
                    </Button>
                </DrawerTrigger>
                <DrawerContent class="h-[90%] bg-neutral-100">
                    <DrawerHeader>
                        <DrawerDescription>
                            <UserMenu/>

                            <nav class="mt-6 flex-1 text-sm font-medium flex flex-col gap-2">

                                <SidebarNav/>
                                <SidebarNavBottom/>
                            </nav>

                        </DrawerDescription>
                    </DrawerHeader>
                </DrawerContent>
            </Drawer>
        </div>
    </div>
</template>

<style scoped>

</style>
