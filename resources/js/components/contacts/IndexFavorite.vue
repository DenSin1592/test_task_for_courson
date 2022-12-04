<template>
    <main class="container">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Телефонный справочник</h1>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Phone number</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="contact in listContacts" :key="contact.id">
                    <td>{{ contact.id }}</td>
                    <td>{{ contact.name }}</td>
                    <td>
                        <router-link :to="{ name: 'contact.show', params: {id:contact.id}}"> {{ contact.phone }}</router-link>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="mb-0">

            <div class="row ">
                <div class="col-md-8 offset-md-4">
                    <button @click.prevent="addContact" type="submit" class="btn btn-success">
                        Add contact
                    </button>
                    <button type="submit" class="btn btn-primary" @click.prevent="atHome">
                        At home
                    </button>
                </div>
            </div>

        </div>
    </main>

</template>

<script>
export default {
    name: "IndexFavorite",

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
            axios.get('/api/v1/contact/favorite')
                .then(response => {
                    this.listContacts = response.data;
                })
        },
        addContact() {
            this.$router.push({name: 'contact.create'})
        },
        atHome(){
            this.$router.push({name: 'contact.index'})
        }
    }
}
</script>

<style scoped>

</style>
