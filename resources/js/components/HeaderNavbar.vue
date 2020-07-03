<template>
    <b-navbar>
        <template slot="brand">
            <b-navbar-item :href="index_route">
                <img :src="brand" alt="A place to store everything.">
                RobertBDundas.com
            </b-navbar-item>
        </template>
        <template slot="start">

        </template>
        <template slot="end">
            <b-navbar-item :href="'https://twitter.com/rbdundas'"><i class="fab fa-twitter is-primary"></i></b-navbar-item>
            <b-navbar-item :href="'https://github.com/rbdundas'"><i class="fab fa-github is-primary"></i></b-navbar-item>
            <b-navbar-item :href="'https://medium.com/rbdundas'"><i class="fab fa-medium is-primary"></i></b-navbar-item>
            <b-navbar-item v-if="logged_in === 1" :href="home_route">
                Home
            </b-navbar-item>
            <b-navbar-item v-else :href="index_route">
                Home
            </b-navbar-item>
            <b-navbar-item href="#">
                Section
            </b-navbar-item>
            <b-navbar-dropdown label="Info">
                <b-navbar-item href="#">
                    About Me
                </b-navbar-item>
                <b-navbar-item href="#">
                    Contact Me
                </b-navbar-item>
            </b-navbar-dropdown>
            <a class="button is-light">
                Log in
            </a>
        </template>
    </b-navbar>
</template>

<script>
    export default {
        name: "HeaderNavbar",
        props: {
            brand: String,
            index_route: String,
            home_route: String,
            logged_in: [String, Number]
        }
    }
</script>

<style scoped>

</style>
