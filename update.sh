#!sh
git pull origin master
mysql -uroot -e "drop database denis;create database denis;"
mysql -uroot denis < backup/database.sql
mysql -uroot -e "UPDATE wp_options SET option_value = 'http://localhost/denis/app/' WHERE option_name = 'home' OR option_name = 'siteurl';" denis