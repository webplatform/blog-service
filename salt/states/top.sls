'base':
  '*':
    - git
    - php
    - apache
    - mysql.server
    - mysql.salt_local_module
  'biosversion:VirtualBox':
    - match: grain
    - wordpress.dev