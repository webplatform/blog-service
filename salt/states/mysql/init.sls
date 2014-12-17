mariadb-apt-repo:
  pkgrepo.managed:
    - name: deb http://ftp.osuosl.org/pub/mariadb/repo/10.1/ubuntu trusty main
    - humanname: MariaDB Repositories
    - keyserver: keyserver.ubuntu.com
    - keyid: 1BB943DB
    - file: /etc/apt/sources.list.d/mariadb.list
  file.managed:
    - name: /etc/apt/preferences.d/00-mariadb.pref
    - source: salt://mysql/files/mariadb.apt.pref

mysql:
  pkg.installed:
    - name: mariadb-client
    - require:
      - pkgrepo: mariadb-apt-repo
  file.managed:
    - name: /etc/mysql/conf.d/client-unicode.cnf
    - source: salt://mysql/files/client-unicode.cnf
    - mode: 644