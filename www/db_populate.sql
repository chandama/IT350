/*
*	Chandler Taylor
*	March 5 2018
*
*	Use this as a test set of data to populate all of the tables with a
*	sample set of data for testing purposes. 
*
*	You can remove all of these entries from the database by using the command:
*	mysql -u bluehalo -p < db_unpopulate.sql
*/

USE bluehalo;

INSERT INTO customer (name,email,address,cc_num) values ('Bobby Tables','droptables@gmail.com','123 Tables Avenue','1111222233334444');
INSERT INTO customer (name,email,address,cc_num) values ('Johannes Bach','bachrocks@gmail.com','555 Classy Avenue','1234567891234567');
INSERT INTO customer (name,email,address,cc_num) values ('Smith Junior','lilsmith@gmail.com','54 North 69 South','4444333322221111');

INSERT INTO employee (employee_name,logged_in,administrator,password) values ('Chan',1,1,'password');
INSERT INTO employee (employee_name,logged_in,administrator,password) values ('NormalEmployee',0,0,'password');
INSERT INTO employee (employee_name,logged_in,administrator,password) values ('AdminNotloggedin',0,1,'password');
INSERT INTO employee (employee_name,logged_in,administrator,password) values ('Normnotloggedin',0,0,'password');

INSERT INTO products (inventory,price,image_path) values (100,)