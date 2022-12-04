<template>
    <main class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Reset Password</div>

                    <div class="card-body">
                        <form>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>

                                <div class="col-md-6">
                                    <input id="email" v-model="email" placeholder="Email" type="email" class="form-control" name="email" required autocomplete="email" autofocus>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button @click.prevent="resetPassword" type="submit" class="btn btn-primary">
                                        Send Password Reset Link
                                    </button>
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
    name: "ForgotPassword",

    data() {
        return {
            email: null,
        }
    },

    methods: {
        resetPassword() {
            this.$el.querySelector('button[type="submit"]').setAttribute('disabled', 'disabled')
            axios.get('/sanctum/csrf-cookie').then(response => {
                axios.post('/password/email', {email: this.email})
                    .then(response => {
                        this.$router.push({name: 'user.login'})
                    })
            });
        }
    }
}
</script>

<style scoped>

</style>
