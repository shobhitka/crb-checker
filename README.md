# crb-checker
CRB Check Application for BITS SEM1 DDA Project

## How to run the website on a local server

1. Tested on Ubuntu 20.04 Linux. Should work at least any flavour of Linux.
2. curl -sS https://getcomposer.org/installer | php; → Install composer tool
3. sudo mv composer.phar /usr/local/bin/composer
4. composer install → Install all dependencies using composer
5. mysql -u <user> -p < crbcheck.sql → This created the database and all tables with test data
6. php yii serve → Start local web server for the website
7. point your browser to http://localhost:8080
8. Login as admin using username: “shobhit”, password: “user123”

