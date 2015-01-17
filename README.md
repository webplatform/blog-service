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


## Use with Vagrant and VirtualBox

1. This will create a master less Salt managed VM.

1. Install plugins first:

        vagrant plugin install vagrant-salt
        vagrant plugin install vagrant-vbguest

1. Clone full project, get dependencies

        // git clone ...
        git submodule update --init --recursive
        patch --binary -p1 < assets/revision-control-fixes.patch

1. Create the VM

        vagrant up

1. Once if finishes, you might see error messages. Sorry about that, it should be fixed soon. We need to connect to the VM and do some things manually.

        sudo -s
        DEBIAN_FRONTEND=noninteractive apt-get -q -y install mariadb-server
        apt-get -y autoremove
        exit
        salt state.highstate

    The latter is an alias in the `salt/states/wordpress/dev.sls` file that creates an alias to not need su privileges to issue salt commands.

1. Once its done, exit and check for the VM IP address.

        vagrant ssh

  Notice the IP address Vagrant announces. Adjust your local hosts file with it

        172.28.128.3 blog.local

  NOTE: In Windows its generally in `%windir%\system32` in drivers\etc and called `hosts` (without file extension). If you never changed a hosts file on Microsoft Windows, [refer to this *Microsoft Support Knowledge base* article](http://support.microsoft.com/kb/972034).

1. Ensure you have a `local.php`

        cp local.php.example local.php

1. Install the development database "fixtures"

        mysql -u root wordpress < assets/fixtures-dev.sql

1. Then allow writing on some folders.
  Those are workarounds because /vagrant is not really in the VM and the web server would throw errors because the file system will fail

        mkdir /tmp/wp-cache
        ln -s /tmp/wp-cache /vagrant/wp-content/cache


## Documentation

* [How to use Git with WordPress](http://blog.g-design.net/post/60019471157/managing-and-deploying-wordpress-with-git)
* [WordPress Packagist](http://wpackagist.org/)


### TODO, eventually

1. [Forbid to update plugins](http://tkjune.com/disable-update-checking-of-wordpress-3/)
2. Commit back upstream revision-control plugin patch using SVN. [See issue comment](https://wordpress.org/support/topic/php-errors-37?replies=2#post-6343317)
3. Change Memcached handler?
  * https://wordpress.org/plugins/memcached/
  * https://wordpress.org/plugins/batcache/

## Please note

In a near future, all assets (CSS, JavaScript, images) that are specific for creating the image
of the WebPlatform site should be hosted/managed from within the [www.webplatform.org](https://github.com/webplatform/www.webplatform.org) project. Any other code that is specific to wordpress can stay in this repository.
