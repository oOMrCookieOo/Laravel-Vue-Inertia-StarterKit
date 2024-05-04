<script lang="ts" setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import StatsCard from '@/Components/Dashboard/StatsCard.vue';
import {Card, CardContent, CardHeader, CardTitle} from '@/Components/ui/card';
import Overview from '@/Components/Dashboard/OverView.vue';
import OverViewDonut from "@/Components/Dashboard/OverViewDonut.vue";
import {DollarSignIcon, UserRoundCheckIcon, UserRoundPlusIcon, UsersIcon} from "lucide-vue-next";
import {computed} from "vue";
import {Head} from "@inertiajs/vue3";
import OverViewLine from "@/Components/Dashboard/OverViewLine.vue";


const todayDate = computed(() => new Date().toLocaleDateString('en-US', {
    weekday: 'long',
    year: 'numeric',
    month: 'long',
    day: 'numeric',

}));
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <div class="grid w-full gap-8 container">
            <div class="mt-4">
                <h2
                    class="pb-2 text-3xl font-semibold tracking-tight transition-colors "
                >
                    Hey, {{ $page.props.auth.user.name }}
                </h2>
                <span class="text-secondary-foreground text-sm">{{todayDate}}</span>

            </div>

            <div class="w-full">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <StatsCard
                        :Icon="UsersIcon"
                        subText="Total users joined"
                        title="Users"
                        value="100000"
                    />

                    <StatsCard
                        :Icon="DollarSignIcon"
                        subText="Total revenue generated"
                        title="Revenue"
                        value="40"
                    />

                    <StatsCard
                        :Icon="UserRoundPlusIcon"
                        subText="Total subscriptions made"
                        title="Subscriptions"
                        value="10"
                    />

                    <StatsCard
                        :Icon="UserRoundCheckIcon"
                        subText="Current active subscriptions"
                        title="Active Subscriptions"
                        value="4"
                    />
                </div>

                <div class="mt-4 grid md:grid-cols-2  gap-4">
                    <Card class="shadow-none col-span-full">
                        <CardHeader>
                            <CardTitle>Overview Line</CardTitle>
                        </CardHeader>
                        <CardContent class="pl-2">
                            <OverViewLine/>
                        </CardContent>
                    </Card>
                    <Card class="shadow-none">
                        <CardHeader>
                            <CardTitle>Overview Bar</CardTitle>
                        </CardHeader>
                        <CardContent class="pl-2">
                            <Overview/>
                        </CardContent>
                    </Card>
                    <Card class="shadow-none">
                        <CardHeader>
                            <CardTitle>Overview Donut</CardTitle>
                        </CardHeader>
                        <CardContent class="pl-2 md:h-full">
                            <OverViewDonut/>
                        </CardContent>
                    </Card>
                </div>

            </div>

        </div>
    </AuthenticatedLayout>
</template>
