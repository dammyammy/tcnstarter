## Tech Companion Starter Kit For Projects

[![Build Status](https://travis-ci.org/dammyammy/tcnstarter.png)](https://travis-ci.org/dammyammy/tcnstarter)

Here is a Quick start for Projects to Rapidly Speed Up Development.

## Requirements 

* PHP => 5.4+
* MySQL => 5.5


## Biult with the following

##### ** [Laravel 4.1](http://laravel.com) as Server Side Framework.**
##### ** [Mailgun](http://mailgun.com) for Transaction Emails.**
##### ** [Mailchimp](http://mailchimp.com) for Bulk Emails/ Newsletters.**
##### ** [Iron](http://iron.io) for Queues.**
##### ** [jQuery](http://laravel.com) as Client Side Framework.**
##### ** [Gulp JS](http://gulpjs.com). - A JS Task Runner
##### ** [PHPSpec](http://phpspec.org). - Unit Testing Tool **

## Installing as Fresh Project Without Git History

```bash 
# Download Project:
git clone --depth=1 https://github.com/dammyammy/tcnstarter.git projectname
# OR
git clone --depth=1 git@github.com:dammyammy/tcnstarter.git projectname

# Remove Git History:
rm -rf projectname/.git

# Move to Project Directory:
cd projectname

# Install Dependencies For Project:
composer install

# Quickly Bootstrap the New Project:
./setup.sh
```

## Clone Project With History

```bash 
# Download Project:
git clone https://github.com/dammyammy/tcnstarter.git projectname
# OR
git clone git@github.com:dammyammy/tcnstarter.git projectname

# Move to Project Directory:
cd projectname

# Install Dependencies For Project:
composer install

# You can Quickly Bootstrap the New Project:
./setup.sh
```

## Copyright and license

2013-2014 - Tech Companion NG

Code is licensed under AGPLv3