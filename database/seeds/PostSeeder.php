<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                <p class="py-3">The Laravel documentation is very good, so for anything Laravel related, I suggest starting with the docs. This guide will explain how to complete all of your development locally, push the code to the code control repository (I use GitHub), and then deploy the code out on the hosting server (I use A2Hosting.com). I believe the importance of this step is overlooked and also performed incorrectly by a lot of developers. If you aren\'t committing after every feature change, there\'s an issue. If you are pushing your entire application stack to the repo, there\'s an issue. I have seen enough developers with packages checked in, entire node_modules directories and a number of other issues that make synchronization a problem that I thought it would be good to write a guide. Also, I want a resource for developers that I hire to use and standardize the process that I would like for them to follow.</p>

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
            'title' => 'Agency Automation: Screen Scraping for Documents Using Python and BeautifulSoup',
            'user_id' => 1,
            'subtitle' => 'HOW TO login to a carrier website to find and download policy documents automatically',
            'summary' => 'This article will illustrate how to use Python and BeautifulSoup to login to a website, dynamically build a list of files, then download those attachments to a local repository.',
            'article' => '<img src="/img/AgencyAutomation/ScreenScraping/ScreenScrapingTitle.png" alt-"Python Plus Beautiful Soup Equals Agency Automation" class="image is-centered"/>
<br/>
<p>The insurance CSR (Client Service Representative, aka Account Manager) or their administrative assistants are responsible for downloading a number of documents related to an account. These include everything from estimates, inspection reports, policy information and a number of other documents. If we can write a utility that will log into a carrier’s website, retrieve those documents and upload those to our agency management system, then we have saved the CSR a chunk of time that can be spent better servicing their customers or growing the book of business.
In this article, I will walk through a very basic example using an existing carrier website (or any website) for the purpose of downloading policy documents using Python.</p>
<br/>
<p>In this first example, I have selected a website where the authentication is very simple. There are no cookies, no modern or strange authentication mechanisms. This site looks to be built in the early 2000’s and has remained relatively unchanged since. Why fix what isn’t broke, right?</p>
<br/>
<p>Please note, that this is for educational purposes only. I’ll be redacting anything that can identify the site and/or its contents.</p>
<br/>
<p>That said, let’s get into it…</p>
<br/>
<p>Before starting, you’ll need to install BeautifulSoup:</p><br/>
<pre v-highlightjs class="py-0 px-0"><code class="command solarized-dark">pip install BeautifulSoup</code></pre>
<br/><p>Once installed, set up a code block for scraping a website. You only need the urllib for fetching a site, but I will be using the others soon enough:</p>
<br/>
<pre v-highlightjs class="py-0 px-0"><code class="command solarized-dark">import re
from urllib import parse, request
from bs4 import BeautifulSoup</code></pre>
<br/>
<p>Let’s start with writing a method to retrieve the login page for the site. This will not be used in the final code (we won’t need to GET the login but POST the login to the next step for authentication):</p>
<br/>
<pre v-highlightjs class="py-0 px-0"><code class="command solarized-dark">scrapeurl = "https://thesitewewanttoscrape.com"
def get_login():
    req = request.Request(url=scrapeurl)
    with request.urlopen(req) as f:
        print(f.read())</code></pre>
<br/>
<p>After running this in the IDE, we get an HTML returned document:</p>
<br/>
<img src="/img/AgencyAutomation/ScreenScraping/screenshot1.png" alt="Console screenshot 1" class="image is-horizontal-center"/>
<br/>
<p>We’re off to a good start…</p>
<br/>
<p>Next, we need to take a look a the website and see what is being used to login. So, using Chrome, open the developer tools and click the Network tab to view the information being sent to and from the website during login (I have redacted source information from the screenshots).</p>
<br/>
<p>What you should note is that the Network tab, when opened fresh, will be empty. Once you log into the site, the Network tab will capture the data sent to and from the server:</p>
<br/>
<img src="/img/AgencyAutomation/ScreenScraping/screenshot2.png" alt="Console screenshot 2" class="image is-horizontal-center"/>
<br/>
<p>After login, you’ll see everything retrieved and sent by the browser:</p>
<br/>
<img src="/img/AgencyAutomation/ScreenScraping/screenshot3.png" alt="Console screenshot 3" class="image is-horizontal-center"/>
<br/>
<p>Then, by clicking on the call that actually sent the login form to the server, look for the Header that included POST in the Request Method. In this case, it is Route.htm.</p>
<br/>
<img src="/img/AgencyAutomation/ScreenScraping/screenshot4.png" alt="Console screenshot 4" class="image is-horizontal-center"/>
<br/>
<p>Scrolling down on that tab, you should see the data that was posted to the server:
Notice that it is NOT “username” and “password”. There’s a lot more to this form that we need to note in our code. I have changed the actual field names to XXX. To login successfully, we’ll need to pass the exact same information to the server.</p>
<br/>
<img src="/img/AgencyAutomation/ScreenScraping/screenshot5.png" alt="Console screenshot 5" class="image is-horizontal-center"/>
<br/>
<p>In our code, we’ll want to create a Python dictionary defining each of those form elements as Keys with their respective values.</p>
<br/>
<pre v-highlightjs class="py-0 px-0"><code class="command solarized-dark">form = {
    \'XXX-ID\': \'theusername\',
    \'XXX-PWD\': \'xxxxxxxxxxx\',
    \'Submit\': \'Enter\',
    \'AgZip1\': \'\',
    \'AgNum\': \'\',
    \'XxxPgm\': \'Login\'
}</code></pre>
<br/>
<p>Now, we need to encode the values from the Python dictionary to something a webserver will understand (I have seen this written a couple of different ways, but this works for this site):</p>
<br/>
<pre v-highlightjs class="py-0 px-0"><code class="command solarized-dark">data = parse.urlencode(form).encode(\'ascii\')</code></pre>
<br/>
<p>Now, using the Request URL taken from the Chrome Network tab in the above screenshot (redacted), we can post the login to that webpage:</p>
<br/>
<pre v-highlightjs class="py-0 px-0"><code class="command solarized-dark">req = request.Request(url=scrapeurl, data=data, method=\'POST\')</code></pre>
<br/>
<p>Lastly, we want to see the results, so let’s just stream it to the console for now:</p>
<br/>

<pre v-highlightjs class="py-0 px-0"><code class="command solarized-dark">with request.urlopen(req) as f:
    print(f.read())</code></pre>
<br/>
<p>Putting it altogether, the entire method looks like the following:</p>
<br/>
<pre v-highlightjs class="py-0 px-0"><code class="command solarized-dark">def post_login():

    form = {
        \'XXX-ID\': \'username\',
        \'XXX-PWD\': \'xxxxxxxx\',
        \'Submit\': \'Enter\',
        \'AgZip1\': \'\',
        \'AgNum\': \'\',
        \'XxxPgm\': \'Login\'
    }

    data = parse.urlencode(form).encode(\'ascii\')

    req = request.Request(url=scrapeurl, data=data, method=\'POST\')
    with request.urlopen(req) as f:
        print(f.read())</code></pre>
<br/>
<p>That was easy! Running it in the IDE gives us a hot mess, but it’s the website results that we want (redacted):</p>
<br/>
<img src="/img/AgencyAutomation/ScreenScraping/screenshot6.png" alt="Console screenshot 6" class="image is-horizontal-center"/>
<br/>
<p>Now, to make it pretty, or in this case, “Beautiful” (nudge-nudge-wink-wink), we sprinkle in some BeautifulSoup magic:</p>
<br/>
<p>Change the print(f.read()) line to</p>
<br/>
<pre v-highlightjs class="py-0 px-0"><code class="command solarized-dark">soup = BeautifulSoup(f.read(), \'html.parser\')
print(soup.prettify())</code></pre>
<br/>
<p>Viola! We are now loading the page after login, and it is readable.</p>
<br/>
<img src="/img/AgencyAutomation/ScreenScraping/screenshot7.png" alt="Console screenshot 7" class="image is-horizontal-center"/>
<br/>
<p>What we need to do now is figure out which policies we want to retrieve from our script. In this case, I’ll be looking for a status called “Bound”.</p>
<br/>
<p>To do this, we need to use BeautifulSoup to parse the HTML document, look for any string that matches the word “Bound”, then go back four cells (TD tags) to get the ID of the input tab before it (see above screenshot with the red boxes). This will be the ID that we need to pass to retrieve the policy docs in a later step. So, after we’ve made our soup, use a regular expression to search for the matching Bound string using BeautifulSoup’s findAll method as follows. This loosely translates to “Look for all of the td tags that have the word Bound’ as text between the tags”.</p>
<br/>
<pre v-highlightjs class="py-0 px-0"><code class="command solarized-dark">search_tags = soup.findAll(\'td\', text=re.compile(\'Bound\'))
    print(search_tags)</code></pre>
<br/>
<img src="/img/AgencyAutomation/ScreenScraping/screenshot8.png" alt="Console screenshot 8" class="image is-horizontal-center"/>
<br/>
<p>Now, we need it to traverse up to the parent, then find the first input to retrieve our id value. Replace the print command with a new print command that will find the first input tag of the parent tag of the Bound tag, and return the ID attribute…that’s a lot!</p>
<br/>
<pre v-highlightjs class="py-0 px-0"><code class="command solarized-dark">print(each.parent.find(\'input\').attrs[\'id\'])</code></pre>
<br/>
<img src="/img/AgencyAutomation/ScreenScraping/screenshot9.png" alt="Console screenshot 9" class="image is-horizontal-center"/>
<br/>
<p>Perfect! Now we have the ID used to retrieve the policy documents from another area of the site. We need to capture these ID tags as a n array, then iterate through them. For each ID, we’ll construct a filename, get the filename from the server, download the policy document to our local computer, and name it something meaningful to the file system.</p>
<br/>
<p>After looking through the site using the Chrome debug tools, I found that the documents are retrieved using a jQuery ajax call:</p>
<br/>
<img src="/img/AgencyAutomation/ScreenScraping/screenshot10.png" alt="Console screenshot 10" class="image is-horizontal-center"/>
<br/>
<img src="/img/AgencyAutomation/ScreenScraping/screenshot11.png" alt="Console screenshot 11" class="image is-horizontal-center"/>
<br/>
<p>So, all we need to do is construct a filename that matches the name passed from JavaScript (for Policy Documents, it is “P”+ID+”.pdf”) to the appropriate directory/URL in the ajax function, which is just “/agency/” from the application root. If we write a binary file matching the same name, we should be able to capture the file using just urllib.
I wrote a new method that will call the URL, get the file, then save the file to a PDF directory:</p>
<br/>

<pre v-highlightjs class="py-0 px-0"><code class="command solarized-dark">def get_file(filename):
    fileurl = \'https://sitethatwearescraping.com/agency/\'+filename
    req = request.Request(url=fileurl)
    file = open(\'pdf/\' + filename, \'wb\')
    with request.urlopen(req) as f:
        file.write(f.read())
    file.close()</code></pre>
<br/>
<p>In this code, I define the new file URL. Create a new, binary file of the same name. As the program reads the file from the server, it is writing the file to a pdf directory, and, finally, closing the file.
    I’ll test with one of the IDs from the prior call:</p>
<br/>
<img src="/img/AgencyAutomation/ScreenScraping/screenshot13.png" alt="Console screenshot 13" class="image is-horizontal-center"/>
<br/>
<p>You can see that the pdf directory now has a new P458198.pdf, which I confirm is the Policy Document that I wanted to fetch from the server.</p>
<br/>
<p>The last thing to do would be to loop through the results of the ID fetch method, construct a filename, then call get_file(filename) for each of the IDs in that list.</p>
<br/>
<p>Go back to that print(each.parent.find(‘input’).attrs[‘id’]) line and replace with the following:</p>
<br/>
<pre v-highlightjs class="py-0 px-0"><code class="command solarized-dark">for each in soup.findAll(‘td’, text=re.compile(‘Bound’)):
        filename = ‘P’ + each.parent.find(‘input’).attrs[‘id’] + ‘.pdf’
    get_file(filename)</code></pre>
<br/>
<p>Instead of printing the ID for the line, this will build a filename and then call the get_file method, which will write to the filesystem.</p>
<br/>
<p>After a quick run, we can see the files populating in the pdf directory (note that I changed the openurl to open a local copy of the HTML to save time):</p>
<br/>
<img src="/img/AgencyAutomation/ScreenScraping/screenshot14.png" alt="Console screenshot 14" class="image is-horizontal-center"/>
<br/>
<p>And there you have it! A basic screen scraper that will login, fetch a list of id fields, build a filename dynamically, then fetch the filename from the remote server.</p>
<br/>
<p>Instead of an Admin or CSR clicking through each policy and downloading the policy documents from the site each day, this can be run for a given day and all of the files saved automatically to a local computer.</p>
<br/>
<p>The next steps would be to put meaningful information into the filename (i.e. like the customer name and date), then, connect to the Agency Management System and automatically upload the document to the client account. But one step at a time. For now, I am happy that the resource will have everything downloaded automatically for them.
                                                                                                                                                                                                                                                                                                                                              This was a fun project that will save the agency anywhere from one to ten hours depending on the volume of documents to retrieve, and, this is one of the most mundane tasks there is.</p>
<br/>
<p>Here, the point is to take a manual job and automate, thus saving the resource, who would normally be clicking and downloading, can now be used to do something more meaningful and more enjoyable. This article is not intended to perform any malicious or nefarious task. Quite the opposite, it is meant to add value to the company.</p>
<br/>
<p>Let me know your thoughts or opinions in the comments.</p>
<br/>
<p>Happy coding!</p>',
            'published' => true,
            'published_date' => '2021-06-22',
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
                <img src="/img/ziggy.jpg" alt="Image of Ziggy the Boxer">
                ',
            'published' => true,
            'published_date' => '2020-06-28',
            'post_category_id' => 1,
            'post_type_id' => 1,
            'post_tag_id' => 1
        ]);

    }
}
