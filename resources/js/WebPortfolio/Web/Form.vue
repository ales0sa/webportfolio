<template>
    <jet-form-section @submitted="createWeb">
        <template #title>
            Web Details
        </template>

        <template #description>
            Add a website to your portfolio.
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4" >
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            ref="photo"
                            name="photo"
                            @change="updatePhotoPreview">

                <jet-label for="photo" value="Photo" />

                <!-- Current Profile Photo -->
                <div class="mt-2" v-show="! photoPreview">
                    <img :src="form.image" alt="Current Web Photo" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" v-show="photoPreview">
                    <span class="block rounded-full w-20 h-20"
                          :style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <jet-secondary-button class="mt-2 mr-2" type="button" @click.native.prevent="selectNewPhoto">
                    Select A New Photo
                </jet-secondary-button>

                <jet-secondary-button type="button" class="mt-2" @click.native.prevent="deletePhoto" v-if="form.image">
                    Remove Photo
                </jet-secondary-button>

                <jet-input-error :message="form.error('photo')" class="mt-2" />
            </div>


            <div class="col-span-6 sm:col-span-4">
                <jet-label for="name" value="Name" />
                <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" autofocus />
                
                <jet-input-error :message="form.error('name')" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="url" value="URL" />
                <jet-input id="url" name="url" type="url" class="mt-1 block w-full" v-model="form.url" autofocus />

                <jet-input-error :message="form.error('url')" class="mt-2" />
            </div>
                <div class="col-span-6" v-if="availableTechnologies.length > 0">
                    <jet-label for="technologies" value="Technologies" />

                    <div class="mt-2 grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div v-for="tech in availableTechnologies" :key="tech">
                            <label class="flex items-center">
                                <input type="checkbox" class="form-checkbox" :value="tech" v-model="form.selectedTechnologies">
                                <span class="ml-2 text-sm text-gray-600">{{ tech }}</span>
                            </label>
                        </div>
                    </div>
                </div>
        </template>

        <template #actions>
            <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                Saved.
            </jet-action-message>

            <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Save
            </jet-button>
        </template>
    </jet-form-section>
</template>

<script>
    import JetActionMessage from '@/Jetstream/ActionMessage'
    import JetButton from '@/Jetstream/Button'
    import JetFormSection from '@/Jetstream/FormSection'
    import JetInput from '@/Jetstream/Input'
    import JetInputError from '@/Jetstream/InputError'
    import JetLabel from '@/Jetstream/Label'
    import JetSecondaryButton from '@/Jetstream/SecondaryButton'
            
    export default {
        components: {
            JetActionMessage,
            JetButton,
            JetFormSection,
            JetInput,
            JetInputError,
            JetLabel,
            JetSecondaryButton,
        },
        props: [
            'availableTechnologies',
        ],
        data() {
            return {
                form: this.$inertia.form({
                    _method: 'PUT',
                    name: '',
                    url: '',
                    photo: null,
                    selectedTechnologies: this.availableTechnologies,
                }, {
                    bag: 'createWeb',
                    resetOnSuccess: true,
                }),
                photoPreview: null
            }
        },

        methods: {
            createWeb() {
                if (this.$refs.photo) {
                    this.form.photo = this.$refs.photo.files[0]
                }

                this.form.post(route('webs.store'), {
                    preserveScroll: true
                }).then(() => {
                    this.photoPreview = null
                });
            },
            selectNewPhoto() {
                this.$refs.photo.click();
            },

            updatePhotoPreview() {
                const reader = new FileReader();

                reader.onload = (e) => {
                    this.photoPreview = e.target.result;
                };

                reader.readAsDataURL(this.$refs.photo.files[0]);
            },

            deletePhoto() {
                this.$inertia.delete(route('current-user-photo.destroy'), {
                    preserveScroll: true,
                }).then(() => {
                    this.photoPreview = null
                });
            }
        },
    }
</script>
