/*
* 	Chandler Taylor 
*	SQL Model 
*	March 5 2018
* 
* 
* ATTENTION: On some of the online MySQL workbenchs FK's werent working on 
* TABLE CREATE so I had to use:
* 
* 	ALTER TABLE cart ADD FOREIGN KEY (product_id) REFERENCES products(product_id);
* 
* TO add the FK's after the tables were created. 
* REFERENCES In Product subclasses may not need reference to 
* Product ID. Just enforce it manually in your DB.
*
* Look at this link below and finish up the products and order/orderitems tables so they
* are in 3NF and are working and referencing ID's how they should be
* https://www.mikesdotnetting.com/article/210/razor-web-pages-e-commerce-adding-a-shopping-cart-to-the-bakery-template-site
*/

CREATE DATABASE IF NOT EXISTS bluehalo;
USE bluehalo;

CREATE TABLE IF NOT EXISTS customer (
	cust_id INT AUTO_INCREMENT NOT NULL,
	fname VARCHAR(255) NOT NULL,
	lname VARCHAR(255) NOT NULL,
	email VARCHAR(255) NOT NULL,
	phone VARCHAR(20) NOT NULL,
	address VARCHAR (255) NOT NULL,
	postcode VARCHAR (10) NOT NULL,
	registered TINYINT NOT NULL,
	cc_num VARCHAR(32),
	PRIMARY KEY (cust_id)
);

CREATE TABLE IF NOT EXISTS delivery_addresses (
	id INT AUTO_INCREMENT NOT NULL,
	fname VARCHAR(255) NOT NULL,
	lname VARCHAR(255) NOT NULL,
	address VARCHAR (255) NOT NULL,
	postcode VARCHAR (10) NOT NULL,	
	email VARCHAR(255) NOT NULL,
	phone VARCHAR(20) NOT NULL,
	PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS cart (
	id INT AUTO_INCREMENT NOT NULL,
	customer_id INT NOT NULL,
	registered INT NOT NULL,
	delivery_add_id INT NOT NULL,
	date_created DATETIME NOT NULL,
	status INT NOT NULL,
	session VARCHAR(100) NOT NULL,
	total DECIMAL(15,2),
	PRIMARY KEY (id)
	/*FOREIGN KEY (Fk_product_id) REFERENCES products(product_id)*/
);

CREATE TABLE IF NOT EXISTS cart_items (
	id INT NOT NULL AUTO_INCREMENT,
	cart_id INT NOT NULL,
	product_id INT NOT NULL,
	quantity INT NOT NULL,
	PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS admin (
	id INT AUTO_INCREMENT NOT NULL,
	username VARCHAR(100) NOT NULL,
	password VARCHAR(40) NOT NULL,
	logged_in INT NOT NULL DEFAULT 0,
	PRIMARY KEY (id)
	/*FOREIGN KEY (Fk_cart_id) REFERENCES cart(cart_id)*/
);

CREATE TABLE IF NOT EXISTS products (
	id INT AUTO_INCREMENT NOT NULL,
	cat_id INT NOT NULL,
	name VARCHAR(150) NOT NULL,
	description TEXT NOT NULL,
	inventory INT NOT NULL,
	price DECIMAL NOT NULL,
	image VARCHAR(255),
	PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS categories (
	id INT NOT NULL AUTO_INCREMENT,
	name VARCHAR(100) NOT NULL,
	PRIMARY KEY (id)
);

/*CREATE TABLE IF NOT EXISTS review (
	review_id INT NOT NULL,
	review_date TIMESTAMP,
	rating INT NOT NULL,
	review_text MEDIUMTEXT NOT NULL,
	author VARCHAR(255),
	PRIMARY KEY (review_id)
);*/

/*CREATE TABLE IF NOT EXISTS flylines (
	id INT AUTO_INCREMENT NOT NULL,
	weight VARCHAR(255) NOT NULL,
	sink_rate VARCHAR(64) NOT NULL,
	brand VARCHAR(64) NOT NULL,
	model VARCHAR(64) NOT NULL,
	inventory INT NOT NULL,
	price DECIMAL(15,2) NOT NULL,
	image_path VARCHAR(255),
	PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS reels (
	id INT AUTO_INCREMENT NOT NULL,
	weight VARCHAR(64) NOT NULL,
	brand VARCHAR(64) NOT NULL,
	model VARCHAR(64) NOT NULL,
	color VARCHAR(64) NOT NULL,
	inventory INT NOT NULL,
	price DECIMAL(15,2) NOT NULL,
	image_path VARCHAR(255),
	PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS rods (
	id INT AUTO_INCREMENT NOT NULL,
	weight VARCHAR(64) NOT NULL,
	brand VARCHAR(64) NOT NULL,
	model VARCHAR(64) NOT NULL,
	style VARCHAR(64) NOT NULL,	
	inventory INT NOT NULL,
	price DECIMAL(15,2) NOT NULL,
	image_path VARCHAR(255),
	PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS flies (
	id INT AUTO_INCREMENT NOT NULL,
	name VARCHAR(64) NOT NULL,
	color VARCHAR(64) NOT NULL,
	fly_size INT NOT NULL,
	inventory INT NOT NULL,
	price DECIMAL(15,2) NOT NULL,
	image_path VARCHAR(255),
	PRIMARY KEY (id)
);

ALTER TABLE flylines AUTO_INCREMENT=1000;
ALTER TABLE reels AUTO_INCREMENT=2000;
ALTER TABLE rods AUTO_INCREMENT=3000;
ALTER TABLE flies AUTO_INCREMENT=4000;*/