<template>
    <main class="container">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Создать контакт</h1>
        </div>

        <form>

            <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-end">Name</label>

                <div class="col-md-6">

                    <input v-model="name" id="name" class="form-control"
                           placeholder="Name" name="name" required autocomplete="name" autofocus>
                </div>
            </div>

            <div class="row mb-3">
                <label for="password" class="col-md-4 col-form-label text-md-end">Phone</label>

                <div class="col-md-6">
                    <input v-model="phone" id="phone" placeholder="Phone"
                           class="form-control" name="phone"
                           required autocomplete="phone">

                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4"></div>
                <div class=" col-md-6">
                    <div class="list-group">
                        <label class="list-group-item d-flex gap-3">

                            <input v-model="favorite" name="favorite" class="form-check-input flex-shrink-0" type="checkbox" style="font-size: 1.375em;">

                            <span class="pt-1 form-checked-content">
                                <strong>Favorite</strong>
                            </span>
                        </label>
                    </div>

                </div>
            </div>


            <div class="row ">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary" @click.prevent="update">
                        Update contact
                    </button>
                </div>
            </div>

        </form>
    </main>

</template>

<script>
export default {
    name: "Update",

    data() {
        return {
            name: null,
            phone: null,
            favorite: null,
        }
    },
    mounted() {
        this.getData();
    },
    methods: {
        getData() {
            axios.get('/sanctum/csrf-cookie').then(response => {
                axios.get(`/api/v1/contact/${this.$route.params.id}`)
                    .then(r => {
                        this.name =  r.data.name;
                        this.phone =  r.data.phone;
                        this.favorite =  r.data.favorite;
                    })
            })
        },
        update() {
            axios.get('/sanctum/csrf-cookie').then(response => {
                axios.put(`/api/v1/contact/${this.$route.params.id}`, {name: this.name, phone: this.phone, favorite: this.favorite})
                    .then(r => {
                         if(r?.status === 200 || r?.status === 204){
                               this.$router.push({name: 'contact.index'})
                         }
                    })
            })
        }
    }
}
</script>

<style scoped>

</style>
