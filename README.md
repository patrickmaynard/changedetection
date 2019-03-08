# changedetection

This is a super-simple, very opinionated change-detection script for monitoring additions to webpages. It's currently a broken work in progress. 

See the TODOS.md document for things that need to change before this gets used anywhere. 

## To clone and move to the correct directory

`git clone https://github.com/patrickmaynard/changedetection.git && cd changedetection`

## To install dependencies

`composer install`

## To run unit tests

`vendor/bin/phpunit src/test/*`

## To run the checker manually 

`php check.php`

## Experimental: Install Laradock in the project

./start-laradock.sh

## To make a cron job that runs the checker hourly

Coming soon ;-)