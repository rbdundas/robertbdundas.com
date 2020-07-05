<template>
    <section>
        <div class="container">
            <div class="columns is-centered">
                <div class="column is-two-thirds">
                    <h1 class="is-size-2">Articles</h1>
                    <ul v-for="article in articles">
                        <li>
                            <a :href="constructRoute(view_post_route, article.id)" class="pr-5">{{ article.title }}</a>
                            <span class="tag is-info">{{ article.category }}</span>
                            <span class="tag is-warning">{{ article.tag }}</span>
                            <span class="px-5">{{ formatDate(article.published_date) }}</span>
                            <span class="px-5"><a :href="'mailto:'+article.email">{{ article.name }}</a></span>
                            <span class="tag is-warning" v-if="is_admin === 'true'"><a :href="constructRoute(edit_post_route, article.id)" class="pr-5">edit</a></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        name: "ListArticles",
        props: {
            'articles': Array,
            'view_post_route': String,
            'edit_post_route': String,
            'is_admin': String
        },
        methods: {
            constructRoute(route, id) {
                return route + '?post_id=' + id;
            },
            formatDate(inDate) {
                let newDate =  inDate.split(' ')[0].split('-');
                return newDate[1] + "." + newDate[2] + "." + newDate[0]
            }
        }
    }
</script>

<style scoped>

</style>
