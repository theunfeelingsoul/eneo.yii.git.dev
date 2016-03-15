CHANGE LOG
==========

2/11/2016 Thur
--------------
1. put all the html files made into Yii
2. create the admin section to create the categories 


2/13/2016 Sat
-------------
1. Fixed update category section
  - uploading and displaying image
2. Fix categories on front end 


2/14/2016 Sun
-------------
1. Fixed eneobizinfo CRUD
2. Fixed eneo/listing
3. fixed eneo/category list
4. fixed clicking on eneo/category list and being taken to the eneo/listing
5. Created a table for eneobizinfo
6. Fixed the image upload for eneobizinfo
7. fix the header links for the eneo frontend


2/16/2016
----------

1. Add cat_id field to eneobizinfo page
2. add a catehory select to the eneobizinfo create form
3. add the lin to the corresponfing category frontend

todo
-----

4. Create backend video upload 
5. Create front end display 

3/2/2016 Web
-------------
1. Removed the scroll effect on the maps

todo
----
1. The login
2. fix the admin theme


3/4/2016
--------
4. add lat lang to biz profile
1. Create single marker for business
2. create markers for adjacent businesses
3. Add an nice icon image for marker
todo
----

- add map marker images according to type of category 

3/6/2016
--------
1. chnage color to #9a82bc - purple from blue 00bff3

3/9/2016
--------
4. add link from youtube
5. get images from youtube
6. add login function
- eneobizinfo index.php to show only businesses form logegd in user
todo
----
3. make admin content cetntered like google plus
7. add video links at front end

3/10/2016
--------
1. added smoothscroll to category headermenu
2. 
todo
-----
1. create 5 categroes with good descriptions and pictures
2. create two busonesses with good pictures
3. remove highlights in the listing part
4. add videos to the businesses 
5. create the registreation part
6. in the listing add a cap for the number of images shown i.e 5 images or videos

3/12/2016
---------
- create the footer
todo
----
- make a seperate layout for super user i.e categories
-- the super admin can make users super admin bu upodating backendusers
- fix the serach on home page

- on map, display video or image when maker is clicked
- locations - find out from other websites
- figure out the panorama pics
- fix the business cover page
- fix the similar business sidebar
- make the pictures page or remove it for now
- see if you can make maps a different color e.g purple
- add the to the top arrow




Useful functions
https://css-tricks.com/snippets/jquery/smooth-scrolling/

Performs a smooth page scroll to an anchor on the same page.

$(function() {
  $('a[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});




Yii 2 Basic Project Template
============================

Yii 2 Basic Project Template is a skeleton [Yii 2](http://www.yiiframework.com/) application best for
rapidly creating small projects.

The template contains the basic features including user login/logout and a contact page.
It includes all commonly used configurations that would allow you to focus on adding new
features to your application.

[![Latest Stable Version](https://poser.pugx.org/yiisoft/yii2-app-basic/v/stable.png)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![Total Downloads](https://poser.pugx.org/yiisoft/yii2-app-basic/downloads.png)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![Build Status](https://travis-ci.org/yiisoft/yii2-app-basic.svg?branch=master)](https://travis-ci.org/yiisoft/yii2-app-basic)

DIRECTORY STRUCTURE
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources



REQUIREMENTS
------------

The minimum requirement by this project template that your Web server supports PHP 5.4.0.


INSTALLATION
------------

### Install from an Archive File

Extract the archive file downloaded from [yiiframework.com](http://www.yiiframework.com/download/) to
a directory named `basic` that is directly under the Web root.

Set cookie validation key in `config/web.php` file to some random secret string:

```php
'request' => [
    // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
    'cookieValidationKey' => '<secret random string goes here>',
],
```

You can then access the application through the following URL:

~~~
http://localhost/basic/web/
~~~


### Install via Composer

If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

You can then install this project template using the following command:

~~~
php composer.phar global require "fxp/composer-asset-plugin:~1.0.0"
php composer.phar create-project --prefer-dist --stability=dev yiisoft/yii2-app-basic basic
~~~

Now you should be able to access the application through the following URL, assuming `basic` is the directory
directly under the Web root.

~~~
http://localhost/basic/web/
~~~


CONFIGURATION
-------------

### Database

Edit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```

**NOTE:** Yii won't create the database for you, this has to be done manually before you can access it.

Also check and edit the other files in the `config/` directory to customize your application.
