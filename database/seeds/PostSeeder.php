<?php

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('post_categories')->insert([
            'category' => 'insurance'
        ]);
        DB::table('post_categories')->insert([
            'category' => 'development'
        ]);
        DB::table('post_categories')->insert([
            'category' => 'money'
        ]);
        DB::table('post_categories')->insert([
            'category' => 'other'
        ]);
        DB::table('post_types')->insert([
            'type' => 'project'
        ]);
        DB::table('post_types')->insert([
            'type' => 'article'
        ]);
        DB::table('post_types')->insert([
            'type' => 'journal'
        ]);
        DB::table('post_types')->insert([
            'type' => 'lesson'
        ]);
        DB::table('post_tags')->insert([
            'tag' => 'javascript'
        ]);
        DB::table('post_tags')->insert([
            'tag' => 'python'
        ]);
        DB::table('post_tags')->insert([
            'tag' => 'PHP'
        ]);
        DB::table('post_tags')->insert([
            'tag' => 'Laravel'
        ]);
        DB::table('post_tags')->insert([
            'tag' => 'Vue.js'
        ]);
        DB::table('post_tags')->insert([
            'tag' => 'insuretech'
        ]);
        DB::table('posts')->insert([
            'title' => 'Dummy Article',
            'user_id' => 1,
            'summary' => 'This is a summary of the article.',
            'article' => '
                This is the body of the article. It is <strong>short</strong> for now. <br/>
                Here is some code:<br/>
                <pre v-highlightjs class="box px-0 py-0"><code class="javascript solarized-dark">const s = new Date().toString()</code></pre>
                And, here is an image: <br/>
                <img src="img/ziggy.jpg">
                ',
            'published' => true,
            'published_date' => '2020-06-28',
            'post_category_id' => 1,
            'post_type_id' => 2,
            'post_tag_id' => 1
        ]);
        DB::table('posts')->insert([
            'title' => 'Dummy Project',
            'user_id' => 1,
            'summary' => 'This is a summary of the project.',
            'article' => '
                This is the body of the project details. It is <strong>short</strong> for now. <br/>
                Here is some code:<br/>
                <pre v-highlightjs class="box px-0 py-0"><code class="javascript solarized-dark">const s = new Date().toString()</code></pre>
                And, here is an image: <br/>
                <img src="img/ziggy.jpg">
                ',
            'published' => true,
            'published_date' => '2020-06-28',
            'post_category_id' => 1,
            'post_type_id' => 1,
            'post_tag_id' => 1
        ]);

    }
}
