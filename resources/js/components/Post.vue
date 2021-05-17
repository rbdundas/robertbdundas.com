<template>
    <section>
        <div class="container">
            <div class="columns is-centered">
                <div class="column is-two-thirds ">
                    <h1 class="title">
                        {{ post.title }}
                    </h1>
                    <h2 class="subtitle" v-if="post.published === 1">
                        Published on {{ formatDate(post.published_date) }} by <a :href="'mailto:'+post.author.email">{{ post.author.name }}</a>
                    </h2>
                    <h2 class="subtitle" v-else>
                        NOT PUBLISHED by <a :href="'mailto:'+post.author.email">{{ post.author.name }}</a>
                    </h2>
                    <span v-html="post.article"></span>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    var hljs = require('highlight.js/lib/core.js');

    export default {
        name: "Post",
        props: {
            'post': Object,
            'edit_post': Boolean
        },
        methods: {
            formatDate(inDate) {
                let newDate =  inDate.split(' ')[0].split('-');
                return newDate[1] + "." + newDate[2] + "." + newDate[0]
            }
        },
        mounted() {
            hljs.initHighlightingOnLoad();
        }
    }
</script>

<style scoped>
</style>
