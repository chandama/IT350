# IT350
Public Databases Repo

Updated: 3/5/18

Started work on the HTML/PHP front end and finishing up the final touches on the 
db_setup.sql. Still need to figure out the order/orderitems and products tables
so that they all link up correctly so that orders can reference the products table
and not the different types of product tables individually. 

Also need to take the 210 code and get it all tied up nicely to work with the new
MySQL database and fix the queries to prepared statements.

3/7/18

Changed the entire database schema to simplify things. By doing this I will have to forego 
lots of the detailed specifics of the different products and use the same attributes
(color, weight, etc.) for each one. I might change this later but we will see.
