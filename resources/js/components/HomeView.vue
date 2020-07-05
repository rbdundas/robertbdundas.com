<template>
    <section>
        <div class="tile is-ancestor">
            <div class="tile is-parent">
                <article class="tile is-child box">
                    <p class="title">Insurance</p>
                    <div class="content">
                        <p>All things related to the fun and exciting world of insurance, insuretech, and some general finance stuff for well-roundedness.</p>
                    </div>
                </article>
            </div>
            <div class="tile is-parent">
                <article class="tile is-child box">
                    <p class="title">Development</p>
                    <div class="content">
                        <p>Projects, lessons, advice for things that I have had to troubleshoot and want to remember and a general dumping ground for all things code and/or IT related.</p>
                    </div>
                </article>
            </div>
            <div class="tile is-parent">
                <article class="tile is-child box">
                    <p class="title">Finance</p>
                    <div class="content">
                        <p>A new topic to collect and record my path to retirement, mistakes, lessons and other related topics on the category.</p>
                    </div>
                </article>
            </div>
        </div>
        <div class="tile is-ancestor">
            <div class="tile is-vertical is-parent">
                <div class="tile is-child  notification is-warning">
                    <p class="title">Articles</p>
                    <div v-for="article in articles" :key="article.id">
                        <p class="content">
                            <a :href="constructRoute(viewpostroute, article.id)">{{ article.title }}</a> - {{ formatDate(article.published_date) }}
                        </p>
                    </div>
                </div>
                <div class="tile is-pink is-child notification">
                    <p class="title">Projects</p>
                    <div v-for="project in projects" :key="project.id">
                        <div class="is-half">
                            <a :href="constructRoute(viewpostroute, project.id)">{{ project.title }}</a> -
                            {{ formatDate(project.published_date) }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="tile is-half is-parent">
                <div class="tile is-child notification is-info">
                    <p class="title">About Me</p>
                    <ul>
                        <li>Director of Technology: LaBarre/Oksnee Insurance Agency (current)</li>
                        <li>Hiker/Nature Enthusiast</li>
                        <li>Dog person with an affinity to Boxers</li>
                        <li>Amateur Guitarist</li>
                        <li>Author</li>
                        <li>Husband, Father of three, Son</li>
                    </ul>
                    <p class="subtitle pt-3">About this site</p>
                    <p class="content">
                        This site is the proverbial dumping ground for everything that I have collected along the way. It
                        is to act as both a repository for the lessons learned, as well as a resume for the skills that I
                        have collected. I intend to publish a book on Insuretech and this will serve as a respository for
                        articles on that topic as well.
                    </p>
                </div>
            </div>
        </div>

        <div class="tile is-ancestor">
            <div class="tile is-parent">
                <div class="tile is-child notification is-danger">
                    <p class="title">This Site</p>
                    <p class="content">
                        This site was built using Laravel (PHP 7.4) and MySQL for the back-end. The
                        front-end is primarily Vue.js integrated with the Laravel Blade templates, and some of the components
                        use Buefy (a Vue.js component library). The entire site is styled with Bulma CSS, a very easy to
                        use CSS library. The appearance of 'hodge-podge' is intentional to provide examples of each of the
                        features and/or components. Where possible, features in this site/application will have a corresponding
                        how-to article for it.
                    </p>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        name: "HomeView",
        props: {
            image: String,
            articles: Array,
            projects: Array,
            viewpostroute: String
        },
        methods: {
            constructRoute(route, key) {
                return route + '?post_id=' + key;
            },
            formatDate(inDate) {
                let newDate =  inDate.split(' ')[0].split('-');
                return newDate[1] + "." + newDate[2] + "." + newDate[0]
            }
        }
    }
</script>

<style scoped>
    .box {
        box-shadow: 0 0.5em 1em -0.125em rgba(10,10,10,.1), 0 0 0 1px rgba(10,10,10,.02)
    }
    .box:hover {
        box-shadow: 0 0 1em 0em rgba(10,10,10,.1), 0 0 0 1px rgba(10,10,10,.02)
    }
</style>
