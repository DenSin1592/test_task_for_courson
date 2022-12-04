<template>
    <main class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Login</div>

                    <div class="card-body">
                        <form>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>

                                <div class="col-md-6">

                                    <input v-model="email" id="email" type="email" class="form-control"
                                           placeholder="Email" name="email" required autocomplete="email" autofocus>


                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>

                                <div class="col-md-6">
                                    <input v-model="password" id="password" type="password" placeholder="Password"
                                           class="form-control"  name="password"
                                           required autocomplete="current-password">

                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input  v-model="remember" class="form-check-input" type="checkbox" name="remember" id="remember" >


                                        <label class="form-check-label" for="remember">
                                            Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary" @click.prevent="login">
                                        Login
                                    </button>

                                    <a class="btn btn-link" href="#" @click.prevent="forgotPassword">
                                        Forgot Your Password?
                                    </a>

                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

</template>

<script>
export default {
    name: "Login",

    data() {
        return {
            email: null,
            password: null,
            remember: null,
        }
    },

    methods: {
        login() {
            axios.get('/sanctum/csrf-cookie').then(response => {
                axios.post('/login', {email: this.email, password: this.password, remember: this.remember})
                    .then(r => {
                        localStorage.setItem('x_xsrf_token', r.config.headers['X-XSRF-TOKEN'])
                        this.$router.push({name: 'contact.index'})
                    })
            });
        },
        forgotPassword() {
            this.$router.push({name: 'user.password.forget'})
        }
    }
}
</script>

<style scoped>

</style>
