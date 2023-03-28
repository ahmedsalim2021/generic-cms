# <center>Generic CMS</center>

*System Installation and requirement*

- install php 8.0 or higher
- apache or nginx
- php extensions (common, intl, mbstring, json,
  curl, mysql, xml, zip)
- create .env file and copy content of .env.example into it
- run *php artisan key:generate*
- run *php artisan jwt:secret*
- add DB credentials to .env file
- run *php artisan migrate --seed* to create database schema and seeding it
- run *php artisan serve* to start project

*Postman APIs documentation*
https://documenter.getpostman.com/view/3446458/2s93RRvCnm
