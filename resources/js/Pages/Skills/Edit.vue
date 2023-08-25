<template >
    <Head title="Edit Skill" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Skills</h2>
        </template>

        <div class="py-12">
            <div class="max-w-md mx-auto sm:px-6 lg:px-8 bg-white">
                <form class="p-4" @submit.prevent="submit">
                    <div class="mt-2">
                        <InputLabel for="name" value="Name" />

                        <TextInput id="name" type="name"
                            class="mt-1 ps-2 h-9 block w-full border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1"
                            placeholder="Skill Name" v-model="form.name" required autofocus autocomplete="username" />
                    </div>

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
import { Inertia } from "@inertiajs/inertia"

const props = defineProps({
    skill: Object
});

const form = useForm({
    name: props.skill.name,
    image: null,
})

const submit = () => {
    Inertia.post(`/skills/${props.skill.id}`, {
        _method: 'put',
        name: form.name,
        image: form.image,
    })
}
</script>