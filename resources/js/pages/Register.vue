<template>
  <div class="w-full max-w-sm mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8">
    <div class="text-2xl text-teal-800 text-center mb-2">Register</div>
    <div class>
      <div class="bg-red-200 text-red-400 rounded-sm" v-if="has_error && !success">
        <p v-if="error == 'registration_validation_error'">Error: Data not valid. Please verify</p>
        <p v-else>An error occured at this time. Try later</p>
      </div>
      <form class="w-full max-w-sm" autocomplete="off" @submit.prevent="register" v-if="!success" method="post">
        <!-- full name -->
        <div class="md:flex md:items-center mb-6">
          <div class="md:w-1/3">
            <label class="block text-gray-800 md:text-right mb-1 md:mb-0 pr-4" for="full-name">Full Name</label>
          </div>
          <div class="md:w-2/3">
            <input v-model="name" class="appearance-none border border-teal-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-teal-400" id="full-name" type="text" required/>
          </div>
        </div>

        <!-- email -->
        <div class="md:flex md:items-center mb-6">
          <div class="md:w-1/3">
            <label class="block text-gray-800 md:text-right mb-1 md:mb-0 pr-4" for="email">Email</label>
          </div>
          <div class="md:w-2/3">
            <input v-model="email" class="appearance-none border border-teal-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-teal-400" id="email" type="email" required/>
          </div>
        </div>

        <!-- college_id -->
        <div class="md:flex md:items-center mb-6">
          <div class="md:w-1/3">
            <label class="block text-gray-800 md:text-right mb-1 md:mb-0 pr-4" for="college-id">College Id</label>
          </div>
          <div class="md:w-2/3">
            <input v-model="college_id" class="appearance-none border border-teal-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-teal-400" id="college-id" type="text" required/>
          </div>
        </div>

        <!-- role -->
        <div class="md:flex md:items-center mb-6">
          <div class="md:w-1/3">
            <label class="block text-gray-800 md:text-right mb-1 md:mb-0 pr-4" for="role">Role</label>
          </div>
          <div class="relative md:w-2/3">
            <select v-model="role" class="block appearance-none w-full border border-teal-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:border-teal-400" id="role">
              <option value="1">Admin</option>
              <option value="2">Faculty</option>
              <option value="3">Student</option>
              <option value="4">Operator</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
              <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
            </div>
          </div>
        </div>

        <!-- password -->
        <div class="md:flex md:items-center mb-6">
          <div class="md:w-1/3">
            <label class="block text-gray-800 md:text-right mb-1 md:mb-0 pr-4" for="password">Password</label>
          </div>
          <div class="md:w-2/3">
            <input v-model="password" class="appearance-none border border-teal-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-teal-400" id="password" type="password" required/>
          </div>
        </div>

        <!-- confirm password -->
        <div class="md:flex md:items-center mb-6">
          <div class="md:w-1/3">
            <label class="block text-gray-800 md:text-right mb-1 md:mb-0 pr-4" for="confirm-password">Confirm Password</label>
          </div>
          <div class="md:w-2/3">
            <input v-model="password_confirmation" class="appearance-none border border-teal-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-teal-400" id="password" type="confirm-password" required/>
          </div>
        </div>

        <div class="md:flex md:items-center">
          <div class="md:w-1/3"></div>
          <div class="md:w-2/3">
            <button class="bg-teal-100 border border-teal-400 text-teal-700 hover:border-teal-700 font-bold mt-4 py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Register</button>
          </div>
        </div>
      </form>
    </div>
    <!--
        <div class="container">
            <div class="card card-default">
                <div class="card-header">Inscription</div>
                <div class="card-body">

                    <form autocomplete="off" @submit.prevent="register" v-if="!success" method="post">
                        <div class="form-group" v-bind:class="{ 'has-error': has_error && errors.email }">
                            <label for="email">E-mail</label>
                            <input type="email" id="email" class="form-control" placeholder="user@example.com" v-model="email">
                            <span class="help-block" v-if="has_error && errors.email">{{ errors.email }}</span>
                        </div>
                        <div class="form-group" v-bind:class="{ 'has-error': has_error && errors.password }">
                            <label for="password">Mot de passe</label>
                            <input type="password" id="password" class="form-control" v-model="password">
                            <span class="help-block" v-if="has_error && errors.password">{{ errors.password }}</span>
                        </div>
                        <div class="form-group" v-bind:class="{ 'has-error': has_error && errors.password }">
                            <label for="password_confirmation">Confirmation mot de passe</label>
                            <input type="password" id="password_confirmation" class="form-control" v-model="password_confirmation">
                        </div>
                        <button type="submit" class="btn btn-default">Inscription</button>
                    </form>
                </div>
            </div> 
        </div>
    -->
  </div>
</template>
<script>
export default {
  data() {
    return {
      name: "",
      email: "",
      college_id: "",
      role: "3",
      password: "",
      password_confirmation: "",
      has_error: false,
      error: "",
      errors: {},
      success: false
    };
  },
  methods: {
    register() {
      var app = this;
      this.$auth.register({
        data: {
          name: app.name,
          email: app.email,
          college_id: app.college_id,
          role: parseInt(app.role),
          password: app.password,
          password_confirmation: app.password_confirmation
        },
        success: function() {
          app.success = true;
          this.$router.push({
            name: "login",
            params: { successRegistrationRedirect: true }
          });
        },
        error: function(res) {
          console.log(res.response.data.errors);
          app.has_error = true;
          app.error = res.response.data.error;
          app.errors = res.response.data.errors || {};
        }
      });
    }
  }
};
</script>