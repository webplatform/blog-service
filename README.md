# WebPlatform Blog

Theme for [blog.webplatform.org](http://blog.webplatform.org/) for [WebPlatform](http://www.webplatform.org/).


## Expected plugins

Those plugins are expected to be installed. Installation as submodules #TODO

* public-post-preview
* w3-total-cache
* wp-piwik


## To install

* Clone this repo
* Get all submodules

        git submodule update --init --recursive

* Make sure you have the following php modules:
  * php5-memcache
* Install the *Expected plugins* (see note above this section)
* Copy error pages static files.  Automate with salt #TODO

        wget www.webplatform.org/errors/{503,500,404,403}.html

## Documentation

* [How to use Git with WordPress](http://blog.g-design.net/post/60019471157/managing-and-deploying-wordpress-with-git)
* [WordPress Packagist](http://wpackagist.org/)


## Please note

In a near future, all assets (CSS, JavaScript, images) that are specific for creating the image
of the WebPlatform site should be hosted/managed from within the [www.webplatform.org](https://github.com/webplatform/www.webplatform.org) project. Any other code that is specific to wordpress can stay in this repository.
