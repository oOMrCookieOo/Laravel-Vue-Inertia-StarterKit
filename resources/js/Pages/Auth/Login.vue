<script lang="ts" setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import {Head, Link, useForm} from '@inertiajs/vue3';
import {Card, CardContent, CardDescription, CardHeader, CardTitle} from "@/Components/ui/card";
import {Loader2Icon} from "lucide-vue-next";
import {Button} from "@/Components/ui/button";
import {Label} from "@/Components/ui/label";
import {Input} from "@/Components/ui/input";

defineProps<{
    canResetPassword?: boolean;
    status?: string;
}>();

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => {
            form.reset('password');
        },
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Log in"/>
        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>
        <Card class="mx-auto max-w-lg">
            <CardHeader>
                <CardTitle class="text-xl">
                    Sign In
                </CardTitle>
                <CardDescription>
                    Enter your information to login
                </CardDescription>
            </CardHeader>
            <CardContent>
                <form @submit.prevent="submit">
                    <div class="grid gap-4">
                        <div class="grid gap-2">
                            <Label for="email" value="Email">Email</Label>

                            <Input
                                id="email"
                                v-model="form.email"
                                autocomplete="username"
                                class="mt-1 block w-full"
                                placeholder="m@example.com"
                                required
                                type="email"
                            />

                            <InputError :message="form.errors.email" class="mt-2"/>
                        </div>
                        <div class="grid gap-2">
                            <div class="flex items-center">
                                <Label for="password" value="Password">Password</Label>
                                <Link
                                    v-if="canResetPassword"
                                    :href="route('password.request')"
                                    class=" ml-auto inline-block text-sm underline"
                                >
                                    Forgot your password?
                                </Link>
                            </div>
                            <Input
                                id="password"
                                v-model="form.password"
                                autocomplete="new-password"
                                class="mt-1 block w-full"
                                placeholder="********"
                                required
                                type="password"
                            />
                            <InputError :message="form.errors.password" class="mt-2"/>
                        </div>
                        <Button :disabled="form.processing" class="w-full flex items-center gap-2" type="submit">
                            <Loader2Icon v-if="form.processing" class="size-4 animate-spin"/>
                            Log in
                        </Button>
                    </div>
                    <div class="mt-4 text-center text-sm">
                        Don't have an account?
                        <Link
                            :href="route('register')"
                            class=" ml-auto inline-block text-sm underline"
                        >
                            Sign up
                        </Link>
                    </div>

                </form>
            </CardContent>
        </Card>
    </GuestLayout>
</template>
