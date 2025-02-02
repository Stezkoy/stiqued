Stiqued is an Open-Source PHP Pastebin, with the aim of keeping a simple and easy to use user interface.

Stiqued allows you to easily share code with anyone you wish. Based on the [original Stikked](http://code.google.com/p/stikked/) and it's fork, [Stikked](https://github.com/claudehohl/Stikked).

Here are some features:

* Easy setup
* Syntax highlighting for many languages, including live syntax highlighting with CodeMirror
* Paste replies
* Diff view between the original paste and the reply
* An API
* Search pastes
* Trending pastes
* Encrypted pastes
* Burn on reading
* Anti-Spam features
* Themes support
* Multilanguage support
* Stikked client with support for client side encryption/decryption: [gostikkit](https://github.com/tcolgate/gostikkit)
* Another CLI tool requiring only curl program: [pbin](https://github.com/glensc/pbin)
* And many more. View [this review](http://maketecheasier.com/run-your-own-pastebin-with-stikked/2013/01/11)


Try it out
----------

https://paste.scratchbook.ch/

See an encrypted paste: https://paste.scratchbook.ch/view/1427473f#iP7p05DRH0BC72qQjxv01BjUeOmNV073


Prerequisites
-------------

* A web server: Apache, Lighttpd, Nginx, Cherokee.
* A database: MySQL, Postgres. OR a writable folder on your filesystem for SQLite.
* PHP version 5.6 or newer is recommended.
* PHP-GD for the creation of QR-codes.


Installation
------------

1. Download Stiqued from https://github.com/krayon/stiqued/releases
2. Create a user and database for Stiqued
3. Copy application/config/stiqued.php.dist to application/config/stiqued.php
4. Edit configuration settings in application/config/stiqued.php - everything is described there
5. You're done!

* The database structure will be created automatically if it doesn't exist.
* No special file permissions are needed by default. Optional: If you want to have the JavaScript- and CSS-files minified, the static/asset/ folder has to be writable.
* To ensure that pastes with an expiration set get cleaned up, define the cron key in the config and set up a cronjob, for example:
  * `*/5 * * * * curl --silent http://yoursite.com/cron/[key]`
* If you encounter errors with stylesheets and paths, make sure your base_url config value is not empty (see [here](http://www.codeigniter.com/user_guide/installation/upgrade_303.html)).
* Be sure to also copy the .htaccess file when you move files around. This is a hidden file and easily overlooked.


How to run it in Docker
-----------------------

    docker-compose up

This automatically builds the docker-image and fires up nginx, php and mariadb. Access your Stiqued instance at http://localhost/.

All files are served directly; the Stiqued-configuration for Docker resides in docker/stiqued.php


Documentation
-------------

In the folder doc/, you will find:

* Webserver example configurations for Apache, Nginx, Lighttpd, Cherokee
* A troubleshooting guide
* How to create your own theme
* How to translate Stiqued into your language
* How to contribute and improve Stiqued


Changelog
---------

### Version 0.14.0:

* Rewritten the Docker setup to be simple and clean:
  * switch to nginx-alpine, php-fpm-alpine and mariadb
  * docker-compose: autobuild php-image for stiqued
  * serve all files directly (htdocs is mounted instead of copied)
  * stiqued-configuration for docker resides in docker/stiqued.php
* force private-flag when a previously encrypted paste gets pasted public
* Fixed a critical bug that allowed pasting despite captcha
* Various bugfixes and improvements

#### Upgrade instructions

Copy your htdocs/application/stiqued.php config file away. Upload the new version. Copy it back.

### Version 0.13.0:

* Updated CodeIgniter to 3.1.9
* Various improvements in the Docker setup
* Reverted the "intelligent language switcher" back to a fixed language setting because of too many side-effects
* Fixed encodings and decryption functionality in various themes
* Various bugfixes and improvements

#### Upgrade instructions

Copy your htdocs/application/stiqued.php config file away. Upload the new version. Copy it back.

The language setting in config/stiqued.php is back, you can set a fixed language:

```php
$config['language'] = 'english';
```

New config option: Content expiration. \
Sets the "Expires:"-header to make use of browser-caching \
Format: http://php.net/manual/en/function.strtotime.php \
Examples: '+10 seconds', '+1 year', '-1 week' \
Browser-caching is disabled when this option is not set.

```php
$config['content_expiration'] = '+1 week';
```

### Version 0.12.0:

* Updates ensuring the compatibility with PHP7:
  * Updated CodeIgniter to 3.1.5
  * Updated GeSHi to 1.0.9.0
* Ability to run Stiqued in Docker
* Small security fixes regarding XSS and LDAP
* Various bugfixes and improvements

#### Upgrade instructions

Copy your htdocs/application/stiqued.php config file away. Upload the new version. Copy it back.

If you want to keep QR codes being displayed, add the following line in config/stiqued.php:

```php
$config['qr_enabled'] = true;
```

### Version 0.11.0:

* Upgrade to CodeIgniter 3.1.0
* Added ACE editor
* Ability to select JS editor (CodeMirror, ACE or none)
* Insert paste text via drag & drop
* BBCode support
* Improved Spamadmin; ability to delete single and multiple pastes at once
* Soft api key
* Lots of bugfixes and improvements

#### Upgrade instructions

Copy your htdocs/application/stiqued.php config file away. Upload the new version. Copy it back.

Add and set the base_url in htdocs/application/config/stiqued.php

### Version 0.10.0:

* Upgrade to CodeIgniter 3.0.1 and with it, lots of improvements:
  * SQLite support (yay!)
  * Lots of "Error 500" and blank screens fixed
* New theme: i386
* New translations: Lithuanian, Danish, Polish
* Automatic language detection
* Support for the new ReCaptcha API
* Support for Goo.gl and Bit.ly URL shorteners
* Display expiration time if set
* XSS fixes
* Word wrap for looong words in paste display
* And many more

#### Upgrade instructions

Copy your htdocs/application/stiqued.php config file away. Upload the new version.

Append the $config['expires'] part at the bottom of application/config/stiqued.php.dist to your config.

Copy it back.

### Version 0.9.0:

* New translations: Japanese, Chinese-Simplified, Chinese-Traditional, Russian
* New themes: Stikkedizr, Cleanwhite
* Display QR code in paste
* Multiline highlighter
* Encrypted pastes (yeah!) - see it in action: http://paste.scratchbook.ch/view/1427473f#iP7p05DRH0BC72qQjxv01BjUeOmNV073
* Added "burn on reading" as expiration
* Search function - search in recent and trending pastes
* Added mockingjay to word list for unknown posters - let the revolution begin!
* Bugfixes and improvements

#### Upgrade instructions

Copy your htdocs/application/stiqued.php config file away. Upload the new version. Copy it back.

### Version 0.8.6:

* New translations: Portuguese, Norwegian, Turkish, French
* New theme: Snowkat
* YOURLS support (http://yourls.org/)
* There is now a stiqued.php.dist. You may copy that to config.php and have your own settings
* The API has more possibilities, see API doc
* Captcha must be entered only once, no more for further pastes
* Bugfixes and improvements

#### Upgrade instructions

Copy your htdocs/application/stiqued.php config file away. Upload the new version. Copy it back.

### Version 0.8.5:

* Themes! Configure a different theme in config/stiqued.php - or create your own
* Multilanguage support. Configure a different language in config/stiqued.php
* Diff view for paste replies! View differences between the original paste and its reply
 * see it in action: http://paste.scratchbook.ch/view/de81a093/diff
* Possibility to set default expiration time
* Updated GeSHi to version 1.0.8.11
* Updated CodeMirror to version 3.11
* Lots of minor fixes and improvements
* Added guides for troubleshooting, development, translation and creating themes
* Added webserver example configurations
* Added reCaptcha integration for better antispam

#### Upgrade instructions

The following lines must be present config/stiqued.php

```php
$config['theme'] = 'default';
```

You can choose between default, bootstrap, gabdark, gabdark3 and a fancy geocities theme ;)

Create you own theme. See doc/CREATING_THEMES.md

```php
$config['language'] = 'english';
```

You can choose between english, german and swissgerman ;)

Help translating Stiqued into your language! See doc/TRANSLATING_STIQUED.md

##### reCaptcha

```php
$config['recaptcha_publickey'] = '';
$config['recaptcha_privatekey'] = '';
```

If these lines are filled, reCaptcha will be used.
Get a key from https://www.google.com/recaptcha/admin/create

### Version 0.8.4:

* Trending pastes: http://paste.scratchbook.ch/trends
* LDAP authentication (thanks to Daniel, https://github.com/lightswitch05)
* Blocked words; maintain a comma separated list in your config, e.g. '.es.tl, mycraft.com, yourbadword' - pastes with this words will never get pasted
* Spam trap for bots
* Bugfix: Remove\_invisible\_characters removing legitimate paste content (https://github.com/claudehohl/Stikked/issues/28)
* Possibility to manually set the paste's displayed URL (used with mod\_rewrite configurations)
* Print layout for pastes
* Updated to CodeIgniter version 2.1.3

### Version 0.8.3:

* From now on, IPs get logged in the DB
* Added spamadmin:
  * Enter credentials in config/stiqued.php
  * Visit /spamadmin, login
  * Click on an IP to list all pastes belonging to it
  * You can remove all the pastes listed, and optionally block the IP range
* Updated to CodeIgniter version 2.1.2

### Version 0.8.2:

* Database optimizations: Pastes use less space (if you upgrade from a previous version, execute this SQL statement: "ALTER TABLE pastes DROP paste;"
* Anti spam features:
  * Option to disable recent pastes
  * Option to require the user to enter a captcha

### Version 0.8.1:

* Cleaner options
* Valid RSS feed
* Simpler API response (non-JSON)
* Favicon
* gw.gd URL shortener (replaces bit.ly)
* Minor fixes

### Version 0.8:

* Added backup function (yoursite.com/backup; set credentials in stiqued.php config)
* Added pagination to the replies table
* Added RSS-Feeds to recent pastes and paste replies
* Embeddable pastes
* GeSHi updated to version 1.0.8.10
* Codemirror turned off by default
* Codemirror: Syntax changes dynamically with selection in language dropdown

### Version 0.7:

* An API (see http://paste.scratchbook.ch/api)
* Integration of Codemirror (http://codemirror.net)

### Version 0.6:

* The language-selection was broken; the dropdown now features all the languages that GeSHi supports
* Updated to CodeIgniter version 2.1.0
* Creation of bit.ly-URLs (instead of snipurl)
* Fixed download link
* Paste downloads as a .txt file
* No need to have PHP short tags enabled
* Automatic creation of all necessary MySQL tables
* Raw-mode is now like the raw-mode on pastebin.com
* Minification and concatenation of CSS and JavaScript files (can be turned on/off)
* Breached the license by removing the nasty copyright footer

### Version 0.5:

* Paste Replies
* Fluid width pastes
* Auto copying paste url to clipboard.
* Paste expiration.
* Fully standards compliant css and xhtml.
* Random generating names for anonymous users
* Paste downloading
