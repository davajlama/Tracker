JS Tracker
==========
Simple application for track and log javascript errors written in Nette Framework

**WARNING**: THIS IS STILL DEVELOPMENT VERSION

Install
-------
    1) clone this project
    2) run composer install
    3) create config.local.neon and set databse config to mysql
    4) run php bin/console.php schema:update --dump or --force
    5) run php bin/console.php user:create <username> <password>
    6) run php -S localhost:8080 www/index.php
    7) sign in to appliaction
    8) create a target (example.localhost)
    9) put js from homepage to your project (example.localhost)
    10) throw JS error :)

Tips
----
    - project HOST must be same as TARGET (host = foo.bar.cz then target must be foo.bar.cz)