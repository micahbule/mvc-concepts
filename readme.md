# CRUD App Example

#### DISCLAIMER: This won't be a spoon-feeding guide. The hard way is the right way. Questions are allowed, however. :)

## Requirements

1. Composer (https://getcomposer.org/)
2. Git (https://git-scm.com/)
3. NodeJS (https://nodejs.org/en/)
4. Simple terminal/command-prompt knowledge (CMD is your new found friend)
5. Patience (like a lot of it if you're a first timer in Web)

#### OS-Specifics
If you're on Windows, XAMPP or WAMP is okay for your web stack, otherwise (ex. Mac or any Linux distro such as Ubuntu), you'll need to manually install PHP, MySQL, and a web server [Apache/nginx]

## Installation
After installing all requirements mentioned above, you should first try to install a default Laravel app just so you know the requirements you've installed are working properly. To install a default Laravel app go to https://laravel.com/docs/5.2 and follow the installation guide.

Should you hit any problems, https://www.google.com.ph and http://stackoverflow.com/ should help you out, just type the right keywords to your issue.

If you've successfully installed Laravel, you should be able to see a large "Laravel 5" on your browser. This should mean you've installed the optimal environment for a Laravel app. You're now ready to deploy this project.

1. Clone this repo using Git. (If you don't know Git, go here http://rogerdudler.github.io/git-guide/; to clone this repo see "checkout a repository" section of the guide)
2. After cloning, using the terminal/command-prompt, navigate to the project directory (should be a simple `cd` command) and install the dependencies by issuing a `composer install` command. **(NOTE: You'll need good internet connection for this step as it will download dependencies for the project)**
3. After installing the dependencies, you'll need to configure your environment settings (ex. DB host, user, password, database name, etc.). Just copy the `.env.example` file, rename it to `.env` and fill out the fields for the database credentials. Also, run `php artisan key:generate` command in the terminal/command-prompt to generate a unique app key.