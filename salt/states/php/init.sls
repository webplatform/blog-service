include:
  - php.composer

php5:
  pkg.installed:
    - pkgs:
      - php5
      - php5-common
      - php5-cli
      - php-pear

php-db:
  pkg.installed:
    - pkgs:
      - php-db
      - php5-mysqlnd
    - require:
      - pkg: php5

/etc/php5/apache2/conf.d/unicode.ini:
  file.managed:
    - source: salt://php/files/unicode.ini
    - mode: 644
    - require:
      - pkg: php5

/etc/php5/apache2/conf.d/logging.ini:
  file.managed:
    - source: salt://php/files/logging.ini
    - mode: 644
    - require:
      - pkg: php5