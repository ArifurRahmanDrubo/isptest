<template>
    <div>
      <h1>Login</h1>
      <form @submit.prevent="submit">
        <div>
          <label for="name">Name:</label>
          <input id="name" v-model="form.name" type="text" />
          <div v-if="form.errors.name">{{ errors.name }}</div>
        </div>
        <div>
          <label for="email">Email:</label>
          <input id="email" v-model="form.email" type="email" />
          <div v-if="form.errors.email">{{ errors.email }}</div>
        </div>

        <div>
          <label for="password">Password:</label>
          <input id="password" v-model="form.password" type="password" />
          <div v-if="form.errors.password">{{ errors.password }}</div>
        </div>

        <button type="submit">registration</button>
      </form>
      <p v-if="message">{{ message }}</p>
    </div>
    <div><h1>{{ page.props.flash.successMessage }}</h1>
        <h1>{{ page.props.errors }}</h1>
    </div>
  </template>

  <script setup>
  import { reactive, ref } from 'vue'
  import { useForm } from '@inertiajs/vue3'
  import { usePage } from '@inertiajs/vue3';

  const page=usePage();
  const form =useForm({
    name:'',
    email: '',
    password: ''
  })


  const errors = reactive({})
  const message = ref('')

//   async function login() {
//     try {
//       const response = await $axios.post('/login', form)
//       localStorage.setItem('auth_token', response.data.token)
//       message.value = 'Login successful'
//       form.email = ''
//       form.password = ''
//       Object.keys(errors).forEach(key => errors[key] = '') // Clear errors
//       // Optionally, redirect the user
//       // window.location.href = '/dashboard'
//     } catch (error) {
//       if (error.response && error.response.data.errors) {
//         Object.assign(errors, error.response.data.errors)
//       } else {
//         message.value = 'Invalid credentials'
//       }
//     }
//   }
  </script>

