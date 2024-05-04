<script lang="ts" setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import {Head, Link, useForm} from '@inertiajs/vue3';
import {Card, CardContent, CardDescription, CardHeader, CardTitle} from "@/Components/ui/card";
import {Button} from "@/Components/ui/button";
import {Label} from "@/Components/ui/label";
import {Input} from "@/Components/ui/input";
import {Loader2Icon} from "lucide-vue-next";

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => {
            form.reset('password', 'password_confirmation');
        },
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Register"/>

        <Card class="mx-auto max-w-lg">
            <CardHeader>
                <CardTitle class="text-xl">
                    Sign Up
                </CardTitle>
                <CardDescription>
                    Enter your information to create an account
                </CardDescription>
            </CardHeader>
            <CardContent>
                <form @submit.prevent="submit">
                    <div class="grid gap-4">
                        <div class="grid gap-2">
                            <Label for="name" value="Name">Name</Label>
                            <Input
                                id="name"
                                v-model="form.name"
                                autocomplete="name"
                                autofocus
                                class="mt-1 block w-full"
                                placeholder="John Doe"
                                required
                                type="text"
                            />

                            <InputError :message="form.errors.name" class="mt-2"/>
                        </div>
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
                            <Label for="password" value="Password">Password</Label>

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
                        <div class="grid gap-2">
                            <Label for="password_confirmation" value="Confirm Password">Confirm Password</Label>

                            <Input
                                id="password_confirmation"
                                v-model="form.password_confirmation"
                                autocomplete="new-password"
                                class="mt-1 block w-full"
                                placeholder="********"
                                required
                                type="password"
                            />

                            <InputError :message="form.errors.password_confirmation" class="mt-2"/>
                        </div>
                        <Button :disabled="form.processing" class="w-full flex items-center gap-2" type="submit">
                            <Loader2Icon v-if="form.processing" class="size-4 animate-spin"/>
                            Create an account
                        </Button>
                    </div>
                    <div class="mt-4 text-center text-sm">
                        Already have an account?
                        <Link
                            :href="route('login')"
                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        >
                            Sign in
                        </Link>
                    </div>
                </form>
            </CardContent>
        </Card>
    </GuestLayout>
</template>
