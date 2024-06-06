<script setup>
import { useLayout } from '@/layout/composables/layout';
import { ref, computed } from 'vue';
import AppConfig from '@/layout/AppConfig.vue';
import {useForm} from '@inertiajs/vue3';
import { usePage } from '@inertiajs/vue3';
import { useToast } from 'primevue/usetoast';
import Toast from 'primevue/toast';

const toast = useToast();

const page =usePage();
const form=useForm({
    'name':"",
    'email':"",
    'password':""
});

const submit = () => {
    form.post('/registration', {
        onSuccess: () => {
            if (page.props.flash.successMessage) {
                toast.add({
                    severity: 'success',
                    summary: 'Success',
                    detail: page.props.flash.successMessage,
                    life: 3000
                });
            }
        },
        onError: () => {
            if (form.errors.email) {
                toast.add({
                    severity: 'error',
                    summary: 'Error',
                    detail: page.props.errors,
                    life: 5000
                });
            }
        }
    });
};





const { layoutConfig } = useLayout();

const checked = ref(false);

const logoUrl = computed(() => {
    return `/layout/images/${layoutConfig.darkTheme.value ? 'logo-white' : 'logo-dark'}.svg`;
});
</script>

<template>

    <div class="surface-ground flex align-items-center justify-content-center min-h-screen min-w-screen overflow-hidden">
         <Toast />
        <div class="flex flex-column align-items-center justify-content-center">

            <img :src="logoUrl" alt="Sakai logo" class="mb-5 w-6rem flex-shrink-0" />

            <div style="border-radius: 56px; padding: 0.3rem; background: linear-gradient(180deg, var(--primary-color) 10%, rgba(33, 150, 243, 0) 30%)">
                <div class="w-full surface-card py-8 px-5 sm:px-8" style="border-radius: 53px">
                    <div class="text-center mb-5">
                        <img src="/public/demo/images/login/avatar.png" alt="Image" height="50" class="mb-3" />
                        <div class="text-900 text-3xl font-medium mb-3">Welcome!</div>
                        <span class="text-600 font-medium">Sign Up to continue</span>
                        <div v-if="$page.props.flash.message">{{ $page.props.flash.message }}</div>
                    </div>

                    <div>
                        <form @submit.prevent="submit">
                            <label for="name" class="block text-900 text-xl font-medium mb-2">Name</label>
                            <InputText id="name" type="text" placeholder="Your Name" class="w-full md:w-30rem mb-5" style="padding: 1rem" v-model="form.name" />
                            <div v-if="form.errors.name" class="text-red-500">{{ form.errors.name }}</div>

                            <label for="email1" class="block text-900 text-xl font-medium mb-2">Email</label>
                            <InputText id="email1" type="text" placeholder="Email address" class="w-full md:w-30rem mb-5" style="padding: 1rem" v-model="form.email" />
                            <div v-if="form.errors.email" class="text-red-500">{{ form.errors.email }}</div>

                            <label for="password1" class="block text-900 font-medium text-xl mb-2">Password</label>
                            <Password id="password1" v-model="form.password" placeholder="Password" :toggleMask="true" class="w-full mb-3" inputClass="w-full" :inputStyle="{ padding: '1rem' }"></Password>
                            <div v-if="form.errors.password" class="text-red-500">{{ form.errors.password }}</div>

                            <Button type="submit" label="Sign Up" class="w-full p-3 text-xl"></Button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <AppConfig simple />
</template>

<style scoped>
.pi-eye {
    transform: scale(1.6);
    margin-right: 1rem;
}

.pi-eye-slash {
    transform: scale(1.6);
    margin-right: 1rem;
}
</style>

