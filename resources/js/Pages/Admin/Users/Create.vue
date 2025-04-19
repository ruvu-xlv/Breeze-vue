<script setup>
import { useForm } from '@inertiajs/vue3';
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

// Initialize the form data
const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    role: 'user',
});

// Submit the form data
const submit = () => {
    form.post(route('admin.users.store'), {
        onSuccess: () => {
            form.reset("password", "password_confirmation");  // Reset password fields after success
        },
        onError: () => {
            // You can also handle errors here if you need to perform additional actions
        }
    });
};
</script>

<template>
    <AuthenticatedLayout>
        <div class="py-12 px-4 sm:px-6 lg:px-8 bg-gray-100 dark:bg-gray-900 min-h-screen">
            <div class="max-w-3xl mx-auto bg-white dark:bg-gray-800 p-8 rounded-lg shadow-md">
                <h1 class="text-3xl font-bold text-center mb-6 text-gray-800 dark:text-white">Tambah User</h1>

                <form @submit.prevent="submit">
                    <!-- Name -->
                    <div class="mb-4">
                        <InputLabel for="name" value="Full Name" />
                        <TextInput id="name" type="text" v-model="form.name" required autofocus
                            placeholder="Enter full name"
                            class="bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-white border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-green-500 p-3 rounded-md w-full" />
                        <InputError class="mt-2" :message="form.errors.name" />
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <InputLabel for="email" value="Email Address" />
                        <TextInput id="email" type="email" v-model="form.email" required
                            placeholder="Enter email address"
                            class="bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-white border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-green-500 p-3 rounded-md w-full" />
                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <InputLabel for="password" value="Password" />
                        <TextInput id="password" type="password" v-model="form.password" required
                            placeholder="Enter password"
                            class="bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-white border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-green-500 p-3 rounded-md w-full" />
                        <InputError class="mt-2" :message="form.errors.password" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-4">
                        <InputLabel for="password_confirmation" value="Confirm Password" />
                        <TextInput id="password_confirmation" type="password" v-model="form.password_confirmation"
                            required placeholder="Confirm your password"
                            class="bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-white border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-green-500 p-3 rounded-md w-full" />
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
                    <div class="mt-6 text-right">
                        <button type="submit" :disabled="form.processing" :class="[
                            'px-6 py-3 rounded-md text-white transition',
                            form.processing ? 'opacity-50 cursor-not-allowed' : 'bg-gradient-to-r from-green-500 to-lime-500 hover:brightness-110'
                        ]">
                            Add User
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
