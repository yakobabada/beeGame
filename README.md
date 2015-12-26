The Bee Game
=======================

Introduction
------------
- The application was created from scratch and structured using mvc and frontController design pattern.
- A button must be present to kick off the process of hitting a random bee.


Download and Installation
--------------------------- 
- using github to projects directory
  - `git clone https://github.com/yakobabada/beeGame.git`

Web server setup
----------------

### Apache setup

To setup apache, setup a virtual host to point to the base directory of the
project and you should be ready to go! It should look something like below:

    <VirtualHost *:80>
        ServerName beegame.localhost
        DocumentRoot /path/to/beeGame
        <Directory /path/to/beeGame>
            DirectoryIndex index.php
            AllowOverride All
            Order allow,deny
            Allow from all
            <IfModule mod_authz_core.c>
            Require all granted
            </IfModule>
        </Directory>
    </VirtualHost>

Documentation
----------------
- Start New game: 
  - 'yourdomain.com/'.