<script setup lang="ts">

import { Card, CardContent, CardHeader, CardTitle } from '@/Components/ui/card';

defineProps<{
  title: string
  value: string
  Icon: any
  subText?: string
}>()
</script>

<template>
    <Card class="shadow-none">
        <CardHeader class="flex flex-row items-center justify-between space-y-0 pb-2">
            <CardTitle class="text-sm font-medium">{{title}}</CardTitle>
            <component :is="Icon" class="h-4 w-4 text-muted-foreground" />
        </CardHeader>
        <CardContent>
            <div class="text-2xl font-bold">{{value}}</div>
            <p v-if="subText" class="text-xs text-muted-foreground">{{subText}}</p>
        </CardContent>
    </Card>
</template>

<style scoped>

</style>
