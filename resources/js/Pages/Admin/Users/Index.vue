<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

const props = defineProps({
  users: Array
});
</script>

<template>

  <Head title="Users" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        Users
      </h2>
    </template>

    <div class="py-12">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div v-if="users.length">
          <ul class="flex flex-col pl-0 mb-0 rounded-lg">
            <li v-for="user in users" :key="user.id"
              class="relative flex p-6 mt-4 mb-2 border-0 rounded-xl bg-gray-50 dark:bg-slate-850">
              <div class="flex flex-col">
                <h6 class="mb-4 text-sm leading-normal dark:text-white">{{ user.name }}</h6>
                <span class="mb-2 text-xs leading-tight dark:text-white/80">
                  Email Address:
                  <span class="font-semibold text-slate-700 dark:text-white sm:ml-2">
                    {{ user.email }}
                  </span>
                </span>
                <span class="text-xs leading-tight dark:text-white/80">
                  Role:
                  <span class="font-semibold text-slate-700 dark:text-white sm:ml-2">
                    {{ user.role ?? '—' }}
                  </span>
                </span>
              </div>
              <div class="ml-auto text-right">
                <a class="relative z-10 inline-block px-4 py-2.5 mb-0 font-bold text-center text-transparent align-middle transition-all border-0 rounded-lg shadow-none cursor-pointer leading-normal text-sm ease-in bg-150 bg-gradient-to-tl from-red-600 to-orange-600 hover:-translate-y-px active:opacity-85 bg-x-25 bg-clip-text"
                  href="javascript:;"><i
                    class="mr-2 far fa-trash-alt bg-150 bg-gradient-to-tl from-red-600 to-orange-600 bg-x-25 bg-clip-text"></i>Delete</a>
                <a class="inline-block dark:text-white px-4 py-2.5 mb-0 font-bold text-center align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-normal text-sm ease-in bg-150 hover:-translate-y-px active:opacity-85 bg-x-25 text-slate-700"
                  href="javascript:;"><i class="mr-2 fas fa-pencil-alt text-slate-700" aria-hidden="true"></i>Edit</a>
              </div>
            </li>
          </ul>
        </div>
        <div v-else class="text-center text-gray-500">
          Tidak ada user yang ditemukan.
          <pre>{{ users }}</pre>

        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
