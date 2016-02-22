Sky Rotues = API Sky Scanner + PHP in DDD
=====================

## Requirements

All you need to run this application is Vagrant.

**http://www.vagrantup.com/**

## Installation

```bash
git clone https://github.com/coboshm/sky_routes.git
cd sky_routes
wget http://getcomposer.org/composer.phar
php composer.phar install
```

Next you have to update your hosts file (usually located at */etc/hosts*), with the line below

    172.21.99.7 sky_routes.dev www.sky_routes.dev redis.sky_routes.dev
    
## Running the application

From the root application folder, run

    vagrant up --provision
    
When vagrant finishes bootstraping the VM, open up a browser and go to

**http://www.mydddblog.dev**

Have fun!
