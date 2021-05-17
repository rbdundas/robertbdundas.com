<template>
    <section>
        <div class="container">
            <div class="columns is-centered">
                <div class="column is-two-thirds">
                    <h1 class="is-size-2"><a :href="list_articles_route" class="pr-5">Articles</a></h1>
                    <ul v-for="article in articles">
                      <div v-if="is_admin === 'true'">
                        <li>
                          <a :href="constructRoute(view_post_route, article.id)" class="pr-5">{{ article.title }}</a>
                          <span class="tag is-info">{{ article.category }}</span>
                          <span class="tag is-warning">{{ article.tag }}</span>
                          <span class="px-5">{{ formatDate(article.published_date) }}</span>
                          <span class="px-5"><a :href="'mailto:'+article.email">{{ article.name }}</a></span>
                          <span class="tag is-warning" v-if="is_admin === 'true'"><a :href="constructRoute(edit_post_route, article.id)" class="pr-5">edit</a></span>
                        </li>
                      </div>
                      <div v-else>
                        <li v-if="article.published === 1">
                          <a :href="constructRoute(view_post_route, article.id)" class="pr-5">{{ article.title }}</a>
                          <span class="tag is-info">{{ article.category }}</span>
                          <span class="tag is-warning">{{ article.tag }}</span>
                          <span class="px-5">{{ formatDate(article.published_date) }}</span>
                          <span class="px-5"><a :href="'mailto:'+article.email">{{ article.name }}</a></span>
                          <span class="tag is-warning" v-if="is_admin === 'true'"><a :href="constructRoute(edit_post_route, article.id)" class="pr-5">edit</a></span>
                        </li>
                      </div>
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
            'list_articles_route': String,
            'is_admin': String
        },
        methods: {
            constructRoute(route, id) {
                return route + '?post_id=' + id;
            },
            formatDate(inDate) {
              if (inDate) {
                let newDate =  inDate.split(' ')[0].split('-');
                return newDate[1] + "." + newDate[2] + "." + newDate[0]
              } else {
                return 'NOT PUBLISHED'
              }
            }
        }
    }
</script>

<style scoped>

</style>
