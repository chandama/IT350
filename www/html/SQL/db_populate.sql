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


INSERT INTO  `bluehalo`.`customer` (`cust_id` ,`fname` ,`lname` ,`email` ,`phone` ,`address` ,`postcode` ,`registered` ,`cc_num`) VALUES (NULL ,  'Chandler',  'Taylor',  'chandler.taylor11111@gmail.com',  '8018888888',  '444 Nothingburger Way',  '84604',  '0', NULL);
INSERT INTO  `bluehalo`.`customer` (`cust_id` ,`fname` ,`lname` ,`email` ,`phone` ,`address` ,`postcode` ,`registered` ,`cc_num`) VALUES (NULL ,  'Jose',  'Trevor',  'jrockeror11@gmail.com',  '8018454888',  '123 s 123 e',  '84604',  '0', NULL);
INSERT INTO  `bluehalo`.`customer` (`cust_id` ,`fname` ,`lname` ,`email` ,`phone` ,`address` ,`postcode` ,`registered` ,`cc_num`) VALUES (NULL ,  'John',  'Smith',  'js1@gmail.com',  '8018888888',  '321 Nothingburger Way',  '84804',  '0', NULL);
INSERT INTO  `bluehalo`.`customer` (`cust_id` ,`fname` ,`lname` ,`email` ,`phone` ,`address` ,`postcode` ,`registered` ,`cc_num`) VALUES (NULL ,  'Kool',  'Kat',  'c00lbr01@gmail.com',  '8011234567',  '654 s Right Way',  '84604',  '0', NULL);

INSERT INTO  `bluehalo`.`products` (cat_id,name,description,inventory,price,image) values(1,"Loop Cross SX 6100", "6Wt 10ft Loop Cross SX Fly Rod",2,899.99,"/img/CrossSX610.jpg");
INSERT INTO  `bluehalo`.`products` (cat_id,name,description,inventory,price,image) values(2,"Sage 4200 Series Fly Reel", "Sage 4200 Series fly reel in 7/8wt configuration. Color: Ember",3,309.99,"/img/Sage4280Ember.jpg");
