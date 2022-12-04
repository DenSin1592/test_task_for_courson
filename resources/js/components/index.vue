<template>
    <div>
        <header class="p-3 bg-dark text-white">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                        <router-link v-if="token" :to="{ name: 'contact.index'}">Contacts</router-link>
                    </ul>


                    <router-link v-if="!token" :to="{ name: 'user.login'}" class="btn btn-outline-light me-2">Login</router-link>
                    <router-link v-if="!token" :to="{ name: 'user.registration'}" class="btn btn-warning">Registration</router-link>
                    <a v-if="token" @click.prevent="logout" href="#" class="btn btn-danger">Logout</a>

                </div>
            </div>
        </header>
        <router-view></router-view>
    </div>


</template>

<script>
export default {
    name: "index",
    data(){
        return {
            token: null
        }
    },

    mounted() {
        this.getToken()
    },

    updated() {
        this.getToken()
    },
    methods: {

        getToken(){
            this.token = localStorage.getItem('x_xsrf_token');
        },
        logout() {
            axios.post('/logout')
                .then((response) => {
                    localStorage.removeItem('x_xsrf_token')
                    this.$router.push({name: 'user.login'})
                })
        }
    }
}
</script>

<style scoped>

</style>
