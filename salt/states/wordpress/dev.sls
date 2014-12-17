#
# Working with WordPress for development?
#
# See also:
#   Notes on how to use salt to install WordPress plugins:
#     - url: https://gist.github.com/renoirb/1b42edac44c723185c9d
#
include:
  - wordpress
  - apache
  - mysql.server

memcached:
  pkg.installed

/home/vagrant/.bash_aliases:
  file.managed:
    - user: vagrant
    - group: vagrant
    - source: salt://wordpress/files/dev/bash_aliases.txt

/home/vagrant/workspace:
  file.symlink:
    - target: /vagrant

Apache WordPress required modules:
  cmd.run:
    - name: a2enmod rewrite

/etc/apache2/sites-available/wordpress-vagrant.conf:
  file.managed:
    - source: salt://wordpress/files/dev/apache2.vhost.vagrant.conf.jinja
    - context:
        vhost_name: {{ grains['nodename'] }}
    - template: jinja
  cmd.run:
    - name: a2ensite wordpress-vagrant
    - watch_in:
      - service: apache2

Local development WordPress database:
  mysql_database.present:
    - name: wordpress
    - require:
      - pkg: db-server
