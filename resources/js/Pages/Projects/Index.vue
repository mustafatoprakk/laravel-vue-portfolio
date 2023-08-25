<template >
    <Head title="Projects Index" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Projects</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-end m-2 p-2">
                    <Link href="/projects/create"
                        class="bg-indigo-500 px-4 py-2 text-white hover:bg-indigo-700 rounded-full">
                    New Project
                    </Link>
                </div>

                <!--table list-->
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Project name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Skill Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Image
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Project Url
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="project in projects.data" :key="project.id"
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ project.name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ project.skill.name }}
                                </td>
                                <td class="px-6 py-4">
                                    <img :src="project.image" alt="" class="w-12 h-12 rounded-full">
                                </td>
                                <th scope="col" class="px-6 py-3">
                                    {{ project.url }}
                                </th>
                                <td class="px-6 py-4">
                                    <Link :href="route('projects.edit', project.id)"
                                        class="form-medium text-blue-500 hover:text-blue-700 mr-2">Edit
                                    </Link>
                                    <Link :href="route('projects.destroy', project.id)" method="delete" as="button"
                                        type="button" class="form-medium text-red-500 hover:text-red-700 mr-2">Delete
                                    </Link>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>


<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    projects: Object
})
</script>