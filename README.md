# Installation

1. Download as .zip or clone this repo using  
   `git clone https://github.com/0-BSCode/paper-trail.git`
2. Import the `data/paper_trail_db.sql` file to phpMyAdmin
3. Install composer  
   https://getcomposer.org/download/
4. Run `composer install`
5. Start your Apache server and go to http://localhost/paper-trail

You're done :)

## Project structure

As most MVC frameworks, this project flows through `public/index.php` and loads the correspondant page base on the URL

```
php-mvc/
    config/             # Database credentials, utility functions, constants used frequently
    data/               # SQL database file
    public/             # Accessible files. What final users see
        css/            # Compiled css file
        js/             # Compiled javascript file
        index.php       # Starting point for the entire app
    src/                # Application source code
        app/            # Router class, routes.php
        controllers/    # Controller classes
        models/         # Model classes
        views/          # Views
        .htaccess       # Make src/ unaccessible for users
    vendor/             # Composer files, autoloader !ignored
    .gitignore          # Files/folders to be ignored by version control
    .htaccess           # Redirect everything to public/ folder
    composer.json       # Composer dependency file
```

## Acknowledgements

I did this by making a combination of what I learnt from some online PHP courses I took

- [The PHP Practitioner](https://github.com/laracasts/The-PHP-Practitioner-Full-Source-Code) by Laracasts
- [Write PHP like a Pro](https://github.com/daveh/php-mvc) by Dave Hollingworth
- [Object Oriented PHP & MVC](https://www.udemy.com/object-oriented-php-mvc/) by Brad Traversy
- [Original Template Repo](https://github.com/crjoseabraham)
