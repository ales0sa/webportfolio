<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Web
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                                <create-web-form :available-technologies="availableTechnologies"/>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'    
    import JetSectionBorder from '@/Jetstream/SectionBorder'
    import CreateWebForm from './Form'

    export default {
        props: ['web', 'availableTechnologies'],

        components: {
            AppLayout,
            CreateWebForm,
            JetSectionBorder,
        },
    }
</script>
