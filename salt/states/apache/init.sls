apache2:
  pkg:
    - installed
  service.running:
    - enable: True
    - reload: True
    - require:
      - pkg: apache2
    - watch:
      - pkg: apache2

/etc/apache2/sites-enabled/000-default.conf:
  file.absent:
    - watch_in:
      - service: apache2

/etc/apache2/conf-enabled/charset.conf:
  file.managed:
    - source: salt://apache/files/charset
    - user: root
    - group: root
    - mode: 644
