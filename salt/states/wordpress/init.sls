include:
  - php

php-i18n:
  pkg.installed:
    - names:
      - php5-intl
      - locales
  cmd.run:
    - names:
      - locale-gen fr_FR.utf8
      - locale-gen pt_BR.utf8
      - dpkg-reconfigure locales

# Because W3-Total-Cache doesn’t support php5-memcached PECL extension
php5-memcache:
  pkg.installed
