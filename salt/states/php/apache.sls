include:
  - apache
  - php

php-apache:
  pkg.installed:
    - pkgs:
      - libapache2-mod-php5
    - require:
      - pkg: php5
    - require_in:
      - pkg: apache2 