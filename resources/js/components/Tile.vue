<template>
    <section>
        <div class="tile is-ancestor">
            <div class="tile is-4 is-parent">
                <div class="tile is-child notification is-info">
                    <p class="title">About Me</p>
                </div>
            </div>
            <div class="tile is-vertical is-parent">
                <div class="tile is-child  notification is-warning">
                    <div v-for="article in articles" :key="article.id">
                        <p class="title">Articles</p>
                        <p class="content">{{ article.title }}</p>
                    </div>
                </div>
                <div class="tile is-child  notification is-light">
                    <div v-for="project in projects" :key="project.id">
                        <p class="title">Projects</p>
                        <div class="is-half">
                            <p class="content">{{ project.name }}</p>
                        </div>
                        <div class="is-half">
                            <p class="content">{{ project.description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tile is-ancestor">
            <div class="tile is-parent">
                <div class="tile is-child notification is-danger">
                    <p class="title">This Site</p>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        name: "Tile",
        props: {
            image: String,
            articles: Array,
            projects: Array
        }
    }
</script>

<style scoped>

</style>
