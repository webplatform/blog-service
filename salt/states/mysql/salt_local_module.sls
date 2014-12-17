include:
  - mysql
  - mysql.server

python-mysqldb:
  pkg.installed:
    - require:
      - pkg: db-server
  file.managed:
    - name: /etc/salt/minion.d/mysql.conf
    - contents: 'mysql.default_file: "/etc/mysql/debian.cnf"'
