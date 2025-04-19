<script setup>
import { useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { usePage } from '@inertiajs/vue3';

const props = defineProps({
    user: Object
});

const form = useForm({
    name: props.user.name,
    email: props.user.email,
    password: '',
    password_confirmation: '',
    role: props.user.role,
});

const submit = () => {
    form.put(route('admin.users.update', props.user.id), {
        onSuccess: () => {
            form.reset('password', 'password_confirmation');
        },
    });
};
</script>

<template>
    <AuthenticatedLayout>
        <div class="py-12 px-4 sm:px-6 lg:px-8 bg-gray-100 dark:bg-gray-900 min-h-screen">
            <div class="max-w-3xl mx-auto bg-white dark:bg-gray-800 p-8 rounded-lg shadow-md">
                <h1 class="text-3xl font-bold text-center mb-6 text-gray-800 dark:text-white">Edit User</h1>

                <form @submit.prevent="submit">
                    <!-- Name -->
                    <div class="mb-4">
                        <InputLabel for="name" value="Full Name" />
                        <TextInput id="name" type="text" v-model="form.name" required autofocus
                            class="bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-white border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-green-500 p-3 rounded-md w-full" />
                        <InputError class="mt-2" :message="form.errors.name" />
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <InputLabel for="email" value="Email Address" />
                        <TextInput id="email" type="email" v-model="form.email" required
                            class="bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-white border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-green-500 p-3 rounded-md w-full" />
                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <InputLabel for="password" value="New Password (Optional)" />
                        <TextInput id="password" type="password" v-model="form.password"
                            class="bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-white border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-green-500 p-3 rounded-md w-full"
                            placeholder="Leave blank if not changing" />
                        <InputError class="mt-2" :message="form.errors.password" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-4">
                        <InputLabel for="password_confirmation" value="Confirm New Password" />
                        <TextInput id="password_confirmation" type="password" v-model="form.password_confirmation"
                            class="bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-white border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-green-500 p-3 rounded-md w-full"
                            placeholder="Confirm only if changing password" />
                        <InputError class="mt-2" :message="form.errors.password_confirmation" />
                    </div>

                    <!-- Role -->
                    <div class="mb-4">
                        <InputLabel for="role" value="Role" />
                        <select id="role" v-model="form.role" required
                            class="bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-white border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-green-500 p-3 rounded-md w-full">
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                        <InputError class="mt-2" :message="form.errors.role" />
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-6 flex justify-between items-center">
                        <!-- Tombol Back -->
                        <button type="button" @click="$inertia.visit(route('admin.users.index'))"
                            class="px-6 py-3 rounded-md text-white bg-gradient-to-r from-gray-400 to-gray-600 hover:brightness-110 transition">
                            Back
                        </button>

                        <!-- Tombol Update -->
                        <button type="submit" :disabled="form.processing" :class="[
                            'px-6 py-3 rounded-md text-white transition',
                            form.processing
                                ? 'opacity-50 cursor-not-allowed bg-gradient-to-r from-blue-500 to-indigo-500'
                                : 'bg-gradient-to-r from-green-500 to-lime-500 hover:brightness-110'
                        ]">
                            Update User
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
