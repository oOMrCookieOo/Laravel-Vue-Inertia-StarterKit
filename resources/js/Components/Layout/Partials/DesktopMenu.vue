<script lang="ts" setup>

import {useDark, useToggle} from "@vueuse/core";
import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuItem,
    DropdownMenuLabel,
    DropdownMenuSeparator,
    DropdownMenuTrigger
} from "@/Components/ui/dropdown-menu";

import {BellDotIcon, BellIcon, LanguagesIcon, MoonIcon, SunIcon} from "lucide-vue-next";
import {
    Breadcrumb,
    BreadcrumbItem,
    BreadcrumbLink,
    BreadcrumbList,
    BreadcrumbPage,
    BreadcrumbSeparator
} from "@/Components/ui/breadcrumb";
import {Button} from "@/Components/ui/button";
import {Link} from "@inertiajs/vue3";

const isDark = useDark()
const toggleDark = useToggle(isDark)
</script>

<template>
    <div v-if="$page.props.breadcrumbs?.length" class="hidden md:flex">
        <Breadcrumb>
            <BreadcrumbList>
                <BreadcrumbItem>
                    <BreadcrumbLink class="text-primary">
                        <Link :href="route('dashboard')">
                            Home
                        </Link>
                    </BreadcrumbLink>
                </BreadcrumbItem>
                <BreadcrumbSeparator/>
                <BreadcrumbItem v-for="(crumb, index) in $page.props.breadcrumbs" :key="index" :href="crumb.url">
                    <template v-if="index!==$page.props.breadcrumbs.length-1">
                        <BreadcrumbLink class="text-primary">
                            <Link  :href="crumb.url">
                                <BreadcrumbPage>{{ crumb.title }}</BreadcrumbPage>
                            </Link>
                        </BreadcrumbLink>
                        <BreadcrumbSeparator />
                    </template>
                    <BreadcrumbPage v-else >{{ crumb.title }}</BreadcrumbPage>
                </BreadcrumbItem>
            </BreadcrumbList>
        </Breadcrumb>
    </div>

    <div class="hidden  md:flex md:items-center md:gap-4">
        <DropdownMenu>
            <DropdownMenuTrigger>
                <Button variant="ghost">
                    <LanguagesIcon class="size-4"/>
                </Button>
            </DropdownMenuTrigger>
            <DropdownMenuContent align="end" class="w-32">
                <DropdownMenuLabel>{{ 'Languages' }}</DropdownMenuLabel>
                <DropdownMenuSeparator/>
                <DropdownMenuItem
                    class="w-full text-start flex gap-2 items-center cursor-pointer">
                    <svg class="size-4" viewBox="0 5 36 26" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M0 9.059V13h5.628zM4.664 31H13v-5.837zM23 25.164V31h8.335zM0 23v3.941L5.63 23zM31.337 5H23v5.837zM36 26.942V23h-5.631zM36 13V9.059L30.371 13zM13 5H4.664L13 10.837z"
                            fill="#00247D"/>
                        <path
                            d="M25.14 23l9.712 6.801c.471-.479.808-1.082.99-1.749L28.627 23H25.14zM13 23h-2.141l-9.711 6.8c.521.53 1.189.909 1.938 1.085L13 23.943V23zm10-10h2.141l9.711-6.8c-.521-.53-1.188-.909-1.937-1.085L23 12.057V13zm-12.141 0L1.148 6.2C.677 6.68.34 7.282.157 7.949L7.372 13h3.487z"
                            fill="#CF1B2B"/>
                        <path
                            d="M36 21H21v10h2v-5.836L31.335 31H32c1.117 0 2.126-.461 2.852-1.199L25.14 23h3.487l7.215 5.052c.093-.337.158-.686.158-1.052v-.058L30.369 23H36v-2zM0 21v2h5.63L0 26.941V27c0 1.091.439 2.078 1.148 2.8l9.711-6.8H13v.943l-9.914 6.941c.294.07.598.116.914.116h.664L13 25.163V31h2V21H0zM36 9c0-1.091-.439-2.078-1.148-2.8L25.141 13H23v-.943l9.915-6.942C32.62 5.046 32.316 5 32 5h-.663L23 10.837V5h-2v10h15v-2h-5.629L36 9.059V9zM13 5v5.837L4.664 5H4c-1.118 0-2.126.461-2.852 1.2l9.711 6.8H7.372L.157 7.949C.065 8.286 0 8.634 0 9v.059L5.628 13H0v2h15V5h-2z"
                            fill="#EEE"/>
                        <path d="M21 15V5h-6v10H0v6h15v10h6V21h15v-6z" fill="#CF1B2B"/>
                    </svg>
                    <span>English</span>
                </DropdownMenuItem>
            </DropdownMenuContent>
        </DropdownMenu>
        <DropdownMenu>
            <DropdownMenuTrigger>
                <Button size="icon" variant="ghost">
                    <BellDotIcon class="size-4 text-primary"/>
                </Button>
            </DropdownMenuTrigger>
            <DropdownMenuContent
                align="start"
                class="w-96"
                side="left"
            >
                <DropdownMenuLabel>Notifications</DropdownMenuLabel>
                <DropdownMenuSeparator/>
                <div class="bg-primary-foreground h-64 w-full flex justify-center items-center">
                    <p class="text-primary flex items-center gap-2">
                        <BellIcon class="size-6"/>
                        No notifications yet.
                    </p>
                </div>
            </DropdownMenuContent>
        </DropdownMenu>
        <Button
            aria-label="Toggle dark mode"
            class="w-9 h-9"
            size="icon"
            variant="ghost"
            @click="toggleDark()"
        >
            <component
                :is="isDark ? SunIcon : MoonIcon"
                class="w-5 h-5 text-foreground"
            />
        </Button>

    </div>
</template>

<style scoped>

</style>
