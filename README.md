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

    172.21.99.5 sky-routes.dev www.sky-routes.dev redis.sky-routes.dev


## Running the application

From the root application folder, run

    vagrant up --provision
    vagrant ssh (log in to the vagrant)
    sudo services apache2 restart 
    
When vagrant finishes bootstraping the VM, open up a browser and go to

**http://www.sky-routes.dev**

Have fun!
