<script lang="ts" setup>
import {computed} from 'vue';
import {Link} from '@inertiajs/vue3';
import {LucideIcon} from "lucide-vue-next";

const props = defineProps<{
    label: string;
    routeName: string;
    activeIn: string[];
    Icon?: LucideIcon;
    count?: number;
}>();

const classes = computed(() =>
    props.activeIn.includes(route().current() as string)
        ? 'inline-flex items-center whitespace-nowrap font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground shadow hover:bg-primary/90 h-10 rounded-md px-3 text-xs dark:bg-muted dark:text-white dark:hover:bg-muted dark:hover:text-white justify-start'
        : 'inline-flex items-center whitespace-nowrap font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-10 rounded-md px-3 text-xs justify-start'
);
</script>

<template>
    <Link :class="classes" :href="route(routeName)" class="active exact-active">
        <component :is="Icon" v-if="Icon" class="size-4 mr-2"/>
        <span class="text-sm">{{ label }}</span>
        <div
            v-if="count"
            class="whitespace-nowrap border px-4 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2  bg-white dark:bg-black  text-primary  ml-auto flex h-6 w-6 shrink-0 items-center justify-center rounded-full">
            {{ count }}
        </div>
    </Link>
</template>
