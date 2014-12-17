#
# Ref:
#   - http://stackoverflow.com/questions/23358918/debconf-set-selections-with-empty-string
#   - http://stackoverflow.com/questions/7739645/install-mysql-on-ubuntu-without-password-prompt
#
include:
  - mysql

salt-dependency:
  pkg.installed:
    - name: python-mysqldb
    - require:
      - pkg: db-server
      - file: /etc/mysql/debian.cnf

db-server:
  pkg.installed:
    - pkgs:
      - mariadb-server
      - galera
      - percona-toolkit
      - percona-xtrabackup
    - require:
      - pkgrepo: mariadb-apt-repo
  file.managed:
    - name: /etc/mysql/conf.d/server-unicode.cnf
    - source: salt://mysql/files/server-unicode.cnf
    - mode: 644
  service.running:
    - name: mysql
    - reload: True
    - enable: True

/etc/mysql/debian.cnf:
  file.exists:
    - require:
      - pkg: db-server
