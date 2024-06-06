
<!-- toast.add({
    severity: 'error',
    summary: 'Error',
    detail: page.props.errors,
    life: 5000
}); -->
<!-- <script setup>
import { useLayout } from '@/layout/composables/layout';
import { ref, computed } from 'vue';
import AppConfig from '@/layout/AppConfig.vue';
import {useForm} from '@inertiajs/vue3';
import { usePage } from '@inertiajs/vue3';
import { watch} from 'vue';
import { useToast } from 'primevue/usetoast';
import Toast from 'primevue/toast';

const toast = useToast();

const { props } = usePage();
const form=useForm({
    name:"",
    email:"",
    password:""
});

const submit = () => {
    form.post('/registration', {
        onSuccess: () => {
   alert(page.props.errors.message)
           form.reset()
        },
    });
};

const flashMessage = computed(() => props.value.flash);

watch(
    flashMessage,
    (flash) => {
        if (flash.success) {
            alert(flash.success);
        } else if (flash.error) {
            alert(flash.error);
        }
    },
    { immediate: true }
);


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
                        <div v-if="page.props.flash.successMessage">{{ page.props.flash.successMessage}}</div>
                    </div>

                    <div>
                        <form @submit.prevent="submit">
                            <label for="name" class="block text-900 text-xl font-medium mb-2">Name</label>
                            <InputText id="name" type="text" placeholder="Your Name" class="w-full md:w-30rem mb-5" style="padding: 1rem" v-model="form.name" />
                            <div v-if="form.errors.name" class="text-red-500">{{ form.errors.name }}</div>

                            <label for="email" class="block text-900 text-xl font-medium mb-2">Email</label>
                            <InputText id="email" type="text" placeholder="Email address" class="w-full md:w-30rem mb-5" style="padding: 1rem" v-model="form.email" />
                            <div v-if="form.errors.email" class="text-red-500">{{ form.errors.email }}</div>

                            <label for="password" class="block text-900 font-medium text-xl mb-2">Password</label>
                            <Password id="password" v-model="form.password" placeholder="Password" :toggleMask="true" class="w-full mb-3" inputClass="w-full" :inputStyle="{ padding: '1rem' }"></Password>
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
</style> -->
<template>
    <div class="surface-ground flex align-items-center justify-content-center min-h-screen min-w-screen overflow-hidden">
       <h1></h1>
        <div class="flex flex-column align-items-center justify-content-center">
            <img :src="logoUrl" alt="Sakai logo" class="mb-5 w-6rem flex-shrink-0" />

            <div style="border-radius: 56px; padding: 0.3rem; background: linear-gradient(180deg, var(--primary-color) 10%, rgba(33, 150, 243, 0) 30%)">
                <div class="w-full surface-card py-8 px-5 sm:px-8" style="border-radius: 53px">
                    <div class="text-center mb-5">
                        <img src="/public/demo/images/login/avatar.png" alt="Image" height="50" class="mb-3" />
                        <div class="text-900 text-3xl font-medium mb-3">{{ $page.props.message }}</div>
                        <span class="text-600 font-medium">Sign Up to continue</span>
                    </div>

                    <div>
                        <form @submit.prevent="submit">
                            <label for="name" class="block text-900 text-xl font-medium mb-2">Name</label>
                            <InputText id="name" type="text" placeholder="Your Name" class="w-full md:w-30rem mb-5" style="padding: 1rem" v-model="form.name" />
                            <div v-if="$page.props.errors.name" class="text-red-500">{{ $page.props.errors.name }}</div>

                            <label for="email" class="block text-900 text-xl font-medium mb-2">Email</label>
                            <InputText id="email"  type="text" placeholder="Email address" class="w-full md:w-30rem mb-5" style="padding: 1rem" v-model="form.email" />
                            <div v-if="$page.props.errors.email" class="text-red-500">{{$page.props.errors.email }}</div>

                            <label for="password" class="block text-900 font-medium text-xl mb-2">Password</label>
                            <Password id="password" v-model="form.password" placeholder="Password" :toggleMask="true" class="w-full mb-3" inputClass="w-full" :inputStyle="{ padding: '1rem' }"></Password>
                            <div v-if="$page.props.errors.password" class="text-red-500">{{ $page.props.errors.password }}</div>

                            <Button type="submit" label="Sign Up" class="w-full p-3 text-xl"></Button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <AppConfig simple />
</template>

<script setup>
import { useLayout } from '@/layout/composables/layout';
import { ref, computed,reactive } from 'vue';
import AppConfig from '@/layout/AppConfig.vue';
// import { useForm } from '@inertiajs/vue3';
import { usePage } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3'

const page = usePage();
const form = reactive({
    name: "",
    email: "",
    password: ""
});
defineProps({ errors: Object })

const submit = () => {
    // form.post('/register', {
    //      onSuccess:()=>{
    //         alert($page.props.message);

    //      }
    // });
    router.post('/register', form)
};

// const flashMessage = computed(() => props.value.flash);

// watch(
//     flashMessage,
//     (flash) => {
//         if (flash.success) {
//             alert(flash.success);
//         } else if (flash.error) {
//             alert(flash.error);
//         }
//     },
//     { immediate: true }
// );

const { layoutConfig } = useLayout();

const checked = ref(false);

const logoUrl = computed(() => {
    return `/layout/images/${layoutConfig.darkTheme.value ? 'logo-white' : 'logo-dark'}.svg`;
});
</script>

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
