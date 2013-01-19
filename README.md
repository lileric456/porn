Porn
======================
This project is ****

Installation
------

`$ git clone https://github.com/hackoh/porn.git`

And, edit app/configs/development/db.php for your environment.

    $ cd porn
    $ php oil r migrate
    $ php oil r init

Then, you can get awesome account.

Usage
------
### Administration ###
Goto `http://localhost(:port)/admin`
and click 'Site' in navbar.
 
### Settings ###

+ url: porn site url
+ patterns: set up as follows. using Regex.

### Patterns ###

    \<li\>\<a href="(.+?)"\>\<img src=".+?"\>\<\/a\>\<\/li\>@@@@(http\:\/\/.*?\.zip)
    @@@@ mean delimiter. for nest searching.

### Checking ###

    $ cd porn
    $ php oil r get:show {site_alias}    (example: php oil r get:show myfavoritepornsite)
    myfavoritepornsite 120 file(s)
    http://user:8h37yw@porn-is-my-life.com/files/111.zip
    http://user:8h37yw@porn-is-my-life.com/files/112.zip
    ....
 

### A deed of God ###

    $ cd {the path to save}
    $ php {the path where porn application was saved}/oil r get {site_alias}    (example: php oil r get myfavoritepornsite)
    myfavoritepornsite 120 file(s)
    Downloading myfavoritepornsite/111.zip... (1/120) (1/120)
    ....
 