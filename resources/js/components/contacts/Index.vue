<template>
    <main class="container">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Телефонный справочник</h1>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Phone number</th>
                    <th>Favorite</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="contact in listContacts" :key="contact.id">
                    <td>{{ contact.id }}</td>
                    <td>{{ contact.name }}</td>
                    <td>
                        <router-link :to="{ name: 'contact.show', params: {id:contact.id}}"> {{ contact.phone }}</router-link>
                    </td>
                    <td>
                        <a v-bind:class="{ 'link-danger': contact.favorite,'link-success': !contact.favorite,  }" href="#" @click.prevent="updateFavorite(contact.id, contact.favorite)">
                            {{ contact.favorite ? 'Remove to favorite' : 'Add to favorite' }}
                        </a>
                    </td>
                    <td><router-link :to="{ name: 'contact.update', params: {id:contact.id}}">Update</router-link></td>
                    <td><a class="link-danger" href="#" @click.prevent="deleteContact(contact.id)" >Delete</a></td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="mb-0">

            <div class="row ">
                <div class="col-md-6 offset-md-4">
                    <button @click.prevent="addContact" type="submit" class="btn btn-success">
                        Add contact
                    </button>
                    <button type="submit" class="btn btn-primary" @click.prevent="atFavorite">
                        At favorite
                    </button>
                </div>
            </div>

        </div>

    </main>

</template>

<script>
export default {
    name: "Index",

    data() {
        return {
            listContacts: null
        }
    },

    mounted() {
        this.getData();
    },

    methods: {
        getData() {
            axios.get('/api/v1/contact')
                .then(response => {
                    this.listContacts = response.data;
                })
        },
        addContact() {
            this.$router.push({name: 'contact.create'})
        },
        atFavorite() {
            this.$router.push({name: 'contact.favorite'})
        },
        updateFavorite(id, favorite) {
            axios.get('/sanctum/csrf-cookie').then(response => {
                axios.patch(`/api/v1/contact/favorite/${id}`, {favorite: !favorite})
                    .then(r => {
                        this.getData();
                    })
            })
        },
        deleteContact(id) {
            axios.get('/sanctum/csrf-cookie').then(response => {
                axios.delete(`/api/v1/contact/${id}`)
                    .then(r => {
                        this.getData();
                    })
            })
        }
    }
}
</script>

<style scoped>

</style>
