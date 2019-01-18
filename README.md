# PHP e-commerce website
## 1. About
This is an example of a simple e-commerce website using PHP and MySQL.
It was created as a group project in the Database Technology (D0018E) course at Lulea Technology of University.

## 2. Features
- User accounts with different privileges (normal and admin)
- Shopping basket that is stored in the user account
- User page to see current and previously made orders
- Update orders and add products to website (admin only)
- Basic protection against SQL injections
- Password hashing

## 3. Getting started

### Prerequisites
You need a basic LAMP stack installed and setup properly. 
For Linux if you're running Ubuntu do the following:
```
sudo apt install apache2 

sudo apt install mysql-server

sudo apt install php libapache2-mod-php php-mysql
```
This will install a basic LAMP stack. To setup the web server and database
I would recommend searching for a tutorial online.

### Install
Place all the files in your web root (default is /var/www/html/). To initialize the database login to MySQL
as root and run the init file:
```
$ mysql -u root-p
mysql> source /dir/to/dbinit/dbInit.sql
```

## 4. Credits

## 5. Authors

## 6. Demo
Link to live demo below:

[DEMO](http://markhakansson.com/ecommerce_example)

Test user:  
username: user  
password: password  
