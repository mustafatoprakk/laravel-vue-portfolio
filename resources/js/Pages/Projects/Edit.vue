<template >
    <Head title="Edit Project" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Project</h2>
        </template>

        <div class="py-12">
            <div class="max-w-md mx-auto sm:px-6 lg:px-8">
                <form class="p-4" @submit.prevent="submit">
                    <!--Skills-->
                    <div class="mt-2">
                        <label for="countries" class="">Select skill</label>
                        <select v-model="form.skill_id" id="skill_id" name="skill_id"
                            class="mt-1 ps-2 h-9 block w-full border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                            <option v-for="skill in skills" :key="skill.id" :value="skill.id"
                                :selected="project.skill_id == skill.id ? skill.name : ''">{{ skill.name }}</option>
                        </select>
                    </div>
                    <!--Name-->
                    <div class="mt-2">
                        <InputLabel for="name" value="Name" />

                        <TextInput id="name" type="name"
                            class="mt-1 ps-2 h-9 block w-full border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1"
                            placeholder="Skill Name" v-model="form.name" required autofocus autocomplete="username" />
                    </div>
                    <!--Project Url-->
                    <div class="mt-2">
                        <InputLabel for="url" value="Project Url" />

                        <TextInput id="url" type="text"
                            class="mt-1 ps-2 h-9 block w-full border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1"
                            placeholder="Skill url" v-model="form.url" required autofocus autocomplete="www.Iam.com" />
                    </div>
                    <!--Image-->
                    <div class="mt-4">
                        <InputLabel for="image" value="image" />

                        <TextInput id="image" type="file" class="mt-1 block w-full text-sm text-slate-500
                            file:mr-4 file:py-2 file:px-4
                            file:rounded-full file:border-0
                            file:text-sm file:font-semibold
                            file:bg-violet-50 file:text-violet-700
                            hover:file:bg-violet-100" @input="form.image = $event.target.files[0]"
                            autocomplete="current-image" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Update
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>


<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { router } from '@inertiajs/vue3'
import { Inertia } from '@inertiajs/inertia';

const props = defineProps({
    skills: Array,
    project: Object
})
// form elemanlarını tanımlama
const form = useForm({
    skill_id: props.project.skill_id,
    name: props.project.name,
    image: null,
    url: props.project.url
})

// formu submit etme
const submit = () => {
    Inertia.post(`/projects/${props.project.id}`, {
        _method: "put",
        skill_id: form.skill_id,
        name: form.name,
        image: form.image,
        url: form.url,
    });
}


</script>