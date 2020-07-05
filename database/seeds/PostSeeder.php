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
            'title' => 'Getting Frameworks (Laravel) Up and Running for Server Hosting',
            'user_id' => 1,
            'subtitle' => 'How to configure a local development environment with remote server hosting',
            'summary' => 'This article will detail the steps that I take to complete development on my local Windows 10 computer, push the code to the code repository, and deploy the code on the hosting provider\'s server.',
            'article' => '
                <p class="py-3">The Larvel documentation is very good, so for anything Laravel related, I suggest starting with the docs. This guide will explain how to complete all of your development locally, push the code to the code control repository (I use GitHub), and then deploy the code out on the hosting server (I use A2Hosting.com). I believe the importance of this step is overlooked and also performed incorrectly by a lot of developers. If you aren\'t committing after every feature change, there\'s an issue. If you are pushing your entire application stack to the repo, there\'s an issue. I have seen enough developers with packages checked in, entire node_modules directories and a number of other issues that make synchronization a problem that I thought it would be good to write a guide. Also, I want a resource for developers that I hire to use and standardize the process that I would like for them to follow.</p>

<p class="py-3">You\'ll notice that I don\'t like to add a lot of extra steps in anything I write, because I usually have a point to make and I don\'t want to waste time getting to that point. So, you\'ll see that I have intentionally left steps out of these guides for the sole purpose of getting to the point. For many of these steps, there are plenty of resources with either the documentation or other guides that do a better job of explaining than I do. So, I will typically skip the extra junk to get to the point, make the point and then end...no waste :) </p>

<p class="py-3">First, make sure to have PHP and MySQL installed locally and talking to each other (>10 years of guides on this).

<p class="py-3">Next, install and configure Laravel locally. Again, lots of guides, but here are the steps in summary:</p>

<pre v-highlightjs class="py-0 px-0"><code class="command solarized-dark">c:\projects\test>composer require laravel/laravel
c:\projects\test>composer require laravel/ui
c:\projects\test>composer install
c:\projects\test>npm install
c:\projects\test>php artisan ui vue --auth</code></pre>

<p class="py-3">Once installed, now initialize the project as a git repository. This will create the .git folder and configure git to allow you to make commits against it.</p>

<pre v-highlightjs class="py-0 px-0"><code class="command solarized-dark">c:\projects\test>git init</code></pre>

<p class="py-3">This will get Laravel installed and running with the Vue auth hooks that you will want to use in every project. The next step would be to copy the .env-example file as your .env and configure it with you local environment settings. Once save, make sure to update the .ignore file to include your IDE specific folders/config files and the newly created .env file...you do <strong>not</strong> want to check these into the source repo. Finally, run the following commands to initialize your environment:</p>

<pre v-highlightjs class="py-0 px-0"><code class="command solarized-dark">c:\projects\test>c:\projects\test\>php artisan config:clear
c:\projects\test\>php artisan config:cache
c:\projects\test\>php artisan migrate</code></pre>

<p class="py-3">The last step should complete without errors.  Of course, if it does, you\'ll have to trouble-shoot and fix those errors until the migrate command completes successfully. At this point, it would be a good idea to go into the database/seeds/UserSeeder.php file and configure a new user that can be used as a "default" user. For example:</p>

<pre v-highlightjs class="py-0 px-0"><code class="php solarized-dark">    public function run()
    {
        DB::table(\'users\')->insert([
            \'name\' => \'rbdundas\',
            \'email\' => \'rbdundas@gmail.com\',
            \'password\' => Hash::make(\'My1Password!\')
        ]);
    }</code></pre>

 <p class="py-3">Finally, getting to the point! (See why I skip the unnecessary steps...if this were a guide on installing Laravel, it would be a book!). Anyway, you should have a local Laravel installation that you can start/stop the server, log into, load the default index and home page(s), etc.. This is the foundation of your application and most of this doesn\'t require checking into the repository. Open the .gitignore file and add all of the directories that should be ignored by git. In addition, you can add a .gitignore to a number of the directories that you want git to skip completely (Laravel does this for a number of directories during the installation process anyway). In addition to the default files and directories defined in my root .gitignore, I added .idea/ (my IDE\'s config directory) and I verified that .env was present.</p>

 <p class="py-3">Now you have a base, pristine installation of a configured Laravel application, and you should have confirmed that it is working perfectly by running the serve command (php artisan serve) and tested the UI (again, out of scope for this article). This should be the initial commit. So, in either your IDE or command line, perform the first commit against your application. During this, you should review and confirm that all of your .gitignore files and directories are actually ignored the way you expect them to be. Here\'s an example commit:</p>

<pre v-highlightjs class="py-0 px-0"><code class="command solarized-dark">D:\projects\test>git commit -m "Initial Commit."
[master f67f7ca] Initial Commit.
 3 files changed, 31 insertions(+), 54 deletions(-)
 create mode 100644 {list of all of the files}</code></pre>

<p class="py-3">The last step to complete locally is to push the code to the repository. I use GitHub for my projects. The public repository accounts are free and the paid private accounts are about $7/month, which allows for both private and public repositories. If you haven\'t already done so, create the repository on GitHub as an empty repo and copy the repo URL (it should be something like this: https://github.com/rbdundas/robertbdundas.com.git). Using either your IDE, the GitHub windows client, or the command line, push your local changes to the remote repository (you will be prompted for your GitHub username and password -- you can set this up to be credential-less as well, but that is a different topoic). You will receive a message indicating that the commits were pushed to Origin/Master. </p>

<pre v-highlightjs class="py-0 px-0"><code class="command solarized-dark">D:\projects\test>git push https://github.com/rbdundas/robertbdundas.com.git</code></pre>

<p class="py-3">Now, for the server...log into your server via the terminal app in CPanel or using Windows Terminal (or good ol\' fashioned PuTTY). I have my PuTTY set up for credential-less login using certs. Once logged in, and assuming this is a new installation, you need to first configure the environment. Remember, we only check in source code into the repository, so all of the framework related files need to be installed and configure. So, create a directory and run the same steps on the server as you ran locally to set-up the Laravel installation there. I.e.

<pre v-highlightjs class="py-0 px-0"><code class="command solarized-dark">~/test#composer require laravel/laravel
~/test#composer require laravel/ui
~/test#composer install
~/test#npm install
~/test#php artisan ui vue --auth</code></pre>

<p class="py-3">My hosting provider allows for composer, npm and laravel to be installed and run outside of CPanel. I noticed that GoDaddy did not on a recent project, and there are a lot of work-arounds to get GoDaddy working, but why? I went with A2Hosting because they provide a server space where I can do just about anything, and the support is great. Anyway, this should give you the exact same base install as before, but there is a bit more configuration. You need to configure the hosting provider\'s Apache instance to serve your domain out of the Laravel/public directory and also make sure that the public/.htaccess file is configured according to the Laravel documentation. Assuming all of the steps are completed correctly, you should be able to open the Laravel page in your browser with your domain URL.</p>

<p class="py-3">Finally, this is a two-step process. First, you need to clone the git repository to the server. If you created a directory that is the same name as your repository, then, go up to the parent directory to run the clone command, as this should clone it into the directory that is named for the repository. Next, create a script that changes to the directory, runs the stash command (to remove any local changes), then pull the code from the repository. You will see some back and forth about the use of pull versus the use of fetch. I use pull because I want to always ensure that the remote code is overwritten by the source code, and fetch only fetches a copy.</p>

<pre v-highlightjs class="py-0 px-0"><code class="shell solarized-dark">~/test#vi .updrbd
cd ~/robertbdundas.com
git stash
git pull https://github.com/rbdundas/robertbdundas.com.git
php artisan migrate
</code></pre>

<p class="py-3">Obviously, there is a lot more you can do with the artisan automation (building tables, seeding tables, completing migrations, etc., but I like to run those manually so that I can see and troubleshoot the errors. For now, I just want to automate getting the code from the remote repository and installing it locally. If there are no database changes, the code should work without any further actions.</p>

<p class="py-3">There is one last step, which is to schedule the script to run automatically. That way, as you make changes during the day and push the changes to the repo, you can automatically deploy the changes to the hosting server without having to do anything. I find this helpful when coding for clients who want to see daily progress and have a look at features that were added the day before. You could also employ a view that allows the you or client to see the change log (messages and files) to get an idea of what was added in the previous day (another lesson I think). You can set these up under Cron Jobs in CPanel, which allows you to schedule scripts that reside in your directory or on the server (if you have permission). I will let the documentation for your hosting provider explain how to do this.</p>

<p class="py-3">I think there are several points to this article and why I wrote it:</p>
<ul>
<li><strong>ALWAYS</strong> use a source code control repository for your projects</li>
<li>Check-in the code that is considered your <strong>source</strong> code. Do not check-in every file in the framework and application. This will just create performance issues later. The key is repeatability. Create a README.md that explains the steps, with the final step being a clone of the remote repo. Now, developers should be able to create your application on any machine, anywhere.</li>
<li>Create a firm branching and check-in process so that developers can follow the steps and get their code into the repository without your involvement.
<li><strong>NEVER</strong> give your developers your server credentials. Use the scripts to deploy their code and use the cron to do this automatically if required.</li>
</ul>

<p class="py-3">Following these steps should give you a formal, hands-free method of deploying code that was developed anywhere in the world. Happy coding!</p>
                ',
            'published' => true,
            'published_date' => '2020-06-28',
            'post_category_id' => 2,
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
