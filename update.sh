#!sh
git stash
git pull origin master
mysql -uroot -ppassword -e "drop database denis;"
mysql -uroot -ppassword -e "create database denis;"
mysql -uroot -ppassword denis < backup/database.sql
mysql -uroot -ppassword -e "UPDATE wp_options SET option_value = 'http://denis.dev/' WHERE option_name = 'home' OR option_name = 'siteurl';" denis
git stash pop

