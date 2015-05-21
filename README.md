PHP-MySql based Invenotry Manegement System
==========================================================
(This is a university course based project. So that it is not commpleted. If you wantn to use that, just take your responsibility to update according your criteria. So that this project coded by procedural way of PHP and MySql. But I used functions to omake this coding reusable. In some cases, I used some special classes for make our project more smoothly.)


## Languages, that is used
- PHP
  - Procedural Coding, but for making reusable our code, I used functions(). 
- MySql
- SB Admin 2 (Twitter Bootstrap Template)
- Twitter Bootstrap
- Java Script
- jQuery
- Carbon
  - A special php class for handeling PHP Date and Time Smoothly. [Official Website] [https://github.com/briannesbitt/Carbon]. To know more, take a look [http://www.tisuchi.com/php-date-time-customization-carbon/]



## Need to Change to use this project
In order to use this project, you need to change few things. Go to **functions/database.php** 
```php
mysql_connect("localhost", "root", "");
mysql_select_db("inventory");
```
Just change **Host Name**, **Host Username **, **Host User Password** & **Database Name**.

Now you need to upload database tables in your database. I already extracted all the tables and data. Go to **db** and upload **inventory.sql**. Hope everything will goes smoothly.

> Username : admin   ,   
> Password: password

**in database, for all users, default password is 'password'**




## What need to make a Complete Project
In order to make a complete project of this inventory, you need to create **edit** & **delete** options of all the segments. 
- Edit User 
- Delete User
- Edit Product Categorya
- Delete Product Category
- Edit Product
- Delete Project


Thank you.



