<template>
    <div class="w-full max-w-xs mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8">
        <div class="text-2xl text-teal-800 text-center">Log in</div>
        <div class="">
            <div class="bg-red-200 text-red-400 rounded-sm" v-if="has_error">
                <p>Error. Invalid credentials.</p>
            </div>
            <form autocomplete="off" @submit.prevent="login" method="post">
                <div class="form-group">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">E-mail</label>
                    <input type="email" id="email" class="shadow-sm appearance-none border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-teal-500" v-model="email" required>
                </div>
                <div class="form-group">
                    <label for="password" class="block text-gray-700 text-sm font-bold mt-4 mb-2">Password</label>
                    <input type="password" id="password" class="shadow-sm appearance-none border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-teal-500" v-model="password" required>
                </div>
                <button type="submit" class="bg-teal-100 border border-teal-400 text-teal-700 hover:border-teal-700 font-bold mt-4 py-2 px-4 rounded focus:outline-none focus:shadow-outline">Login</button>
            </form>
        </div>
    </div>
</template>
<script>
  export default {
    data() {
      return {
        email: null,
        password: null,
        has_error: false
      }
    },
    mounted() {
      //
    },
    methods: {
      login() {
        // get the redirect object
        var redirect = this.$auth.redirect()
        console.log(redirect);
        var app = this
        this.$auth.login({
          params: {
            email: app.email,
            password: app.password
          },
          success: function() {
            // handle redirection
            console.log(app.$auth.user());
            const redirectTo = redirect ? redirect.from.name : app.$auth.user().role === 1 ? 'admin.dashboard' : 'dashboard'
            app.$router.push({name: redirectTo})
          },
          error: function() {
            app.has_error = true
          },
          rememberMe: true,
          fetchUser: true
        })
      }
    }
  }
</script>