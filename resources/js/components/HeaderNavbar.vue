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
            <b-navbar-item :href="'https://medium.com/@rbdundas'"><i class="fab fa-medium is-primary"></i></b-navbar-item>
            <b-navbar-item v-if="logged_in === 1" :href="home_route">
                Home
            </b-navbar-item>
            <b-navbar-item v-else :href="index_route">
                Home
            </b-navbar-item>
            <b-navbar-dropdown label="Posts">
                <b-navbar-item :href="articles_route">
                    Articles
                </b-navbar-item>
                <b-navbar-item :href="projects_route">
                    Projects
                </b-navbar-item>
            </b-navbar-dropdown>
            <b-navbar-dropdown label="Info">
                <b-navbar-item href="#">
                    About Me
                </b-navbar-item>
                <b-navbar-item href="#">
                    Contact Me
                </b-navbar-item>
            </b-navbar-dropdown>
            <div v-if="logged_in === '1'">
                <form :action="logout_route" method="POST">
                    <input type="hidden" name="_token" :value="csrf">
                    <b-button type="is-primary" native-type="submit">Logout</b-button>
                </form>
            </div>
            <div v-else>
                <button class="button is-primary"
                        @click="isComponentModalActive = true">
                    Login
                </button>

                <b-modal :active.sync="isComponentModalActive"
                         has-modal-card
                         trap-focus
                         :destroy-on-hide="false"
                         aria-role="dialog"
                         aria-modal>
                    <modal-form v-bind="formProps"></modal-form>
                </b-modal>
            </div>
        </template>
    </b-navbar>
</template>

<script>
    const ModalForm = {
        props: ['email', 'password', 'login_route', 'csrf'],
        template: `
            <form :action="login_route" method="post">
                <input type="hidden" name="_token" :value="csrf">
                <div class="modal-card" style="width: auto">
                    <header class="modal-card-head">
                        <p class="modal-card-title">Login</p>
                    </header>
                    <section class="modal-card-body">
                        <b-field label="Email">
                            <b-input
                                type="email"
                                name="email"
                                placeholder="Your email"
                                required>
                            </b-input>
                        </b-field>

                        <b-field label="Password">
                            <b-input
                                type="password"
                                password-reveal
                                name="password"
                                placeholder="Your password"
                                required>
                            </b-input>
                        </b-field>

                    </section>
                    <footer class="modal-card-foot">
                        <button class="button" type="button" @click="$parent.close()">Close</button>
                        <button class="button is-primary">Login</button>
                    </footer>
                </div>
            </form>
        `
    }

    export default {
        name: "HeaderNavbar",
        components: {
            ModalForm
        },
        props: {
            brand: String,
            index_route: String,
            home_route: String,
            login_route: String,
            articles_route: String,
            projects_route: String,
            logged_in: [String, Number],
            logout_route: String,
            csrf: String
        },
        data() {
            return {
                isComponentModalActive: false,
                formProps: {
                    email: this.email,
                    password: this.password,
                    login_route: this.login_route,
                    csrf: this.csrf
                }
            }
        }
    }
</script>

<style scoped>

</style>
