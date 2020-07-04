<template>
    <section>
        <div class="container">
            <div class="columns is-centered">
                <div class="column is-two-thirds ">
                    <form :action="save_post_route" method="post">
                        <input type="hidden" name="_token" :value="csrf">
                        <input type="hidden" name="post_id" :value="post.id">
                        <b-field label="Title">
                            <b-input name="title" :value="post.title"></b-input>
                        </b-field>
                        <b-field label="Subtitle">
                            <b-input name="subtitle" :value="post.subtitle"></b-input>
                        </b-field>
                        <b-field label="Summary">
                            <b-input maxlength="200" name="summary" type="textarea" :value="post.summary"></b-input>
                        </b-field>
                        <b-field label="Post">
                            <b-input maxlength="1000" type="textarea" name="article" :value="post.article"></b-input>
                        </b-field>
                        <b-button type="is-primary" native-type="submit">Save</b-button>
                    </form>
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
            'save_post_route': String,
            'csrf': String
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
