<script lang="ts" setup>

import {Button} from "@/Components/ui/button";
import Kbd from "@/Components/Kbd.vue";
import {SearchIcon} from "lucide-vue-next";
</script>

<template>
    <Button
        class="relative mt-2 h-8 w-full justify-start rounded-[0.5rem] bg-background text-sm font-normal text-muted-foreground shadow-none sm:pr-12 "
        variant="outline"
    >
        <SearchIcon class="size-4 mr-2 text-muted-foreground"/>
        <span class="inline-flex text-sm">Search...</span>
        <Kbd
            class="pointer-events-none absolute right-[0.3rem] top-[0.3rem] hidden h-5 select-none items-center gap-1 rounded border bg-muted px-1.5 font-mono text-[10px] font-medium opacity-100 sm:flex">
            <span class="text-xs">⌘</span>K
        </Kbd>
    </Button>
</template>

<style scoped>

</style>
