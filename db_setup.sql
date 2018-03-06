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

CREATE DATABASE bluehalo;
USE bluehalo;

CREATE TABLE customer (
	cust_id INT AUTO_INCREMENT NOT NULL,
	name VARCHAR(255) NOT NULL,
	email VARCHAR(255) NOT NULL,
	address VARCHAR (255) NOT NULL,
	cc_num VARCHAR(32),
	PRIMARY KEY (cust_id)
);

CREATE TABLE order (
	cart_id INT AUTO_INCREMENT NOT NULL,
	customer_id NOT NULL,
	status VARCHAR(64) NOT NULL,
	total_cost MONEY,
	date_created DATE NOT NULL,
	checked_out BIT NOT NULL DEFAULT 0,
	PRIMARY KEY (cart_id)
	/*FOREIGN KEY (Fk_product_id) REFERENCES products(product_id)*/
);

CREATE TABLE orderitems {
	id INT AUTO_INCREMENT NOT NULL,
	product_id
};

CREATE TABLE employee (
	employee_id INT AUTO_INCREMENT NOT NULL,
	employee_name VARCHAR(40) NOT NULL,
	logged_in BOOLEAN,
	administrator BOOLEAN NOT NULL,
	password VARCHAR(40),
	PRIMARY KEY (employee_id)
	/*FOREIGN KEY (Fk_cart_id) REFERENCES cart(cart_id)*/
);

/*CREATE TABLE products (
	product_id INT AUTO_INCREMENT NOT NULL,
	inventory INT NOT NULL,
	price DECIMAL NOT NULL,
	image_path VARCHAR(255),
	Fk_review_id INT,
	PRIMARY KEY (product_id)
);*/

CREATE TABLE review (
	review_id INT NOT NULL,
	review_date TIMESTAMP,
	rating INT NOT NULL,
	review_text MEDIUMTEXT NOT NULL,
	author VARCHAR(255),
	PRIMARY KEY (review_id)
);

CREATE TABLE flylines (
	id INT AUTO_INCREMENT NOT NULL,
	weight VARCHAR(255) NOT NULL,
	sink_rate VARCHAR(64) NOT NULL,
	brand VARCHAR(64) NOT NULL,
	model VARCHAR(64) NOT NULL,
	inventory INT NOT NULL,
	price MONEY NOT NULL,
	image_path VARCHAR(255),
	PRIMARY KEY (id)
);

CREATE TABLE reels (
	id INT AUTO_INCREMENT NOT NULL,
	weight VARCHAR(64) NOT NULL,
	brand VARCHAR(64) NOT NULL,
	model VARCHAR(64) NOT NULL,
	color VARCHAR(64) NOT NULL,
	inventory INT NOT NULL,
	price DECIMAL NOT NULL,
	image_path VARCHAR(255),
	PRIMARY KEY (id)
);

CREATE TABLE rods (
	id INT AUTO_INCREMENT NOT NULL,
	weight VARCHAR(64) NOT NULL,
	brand VARCHAR(64) NOT NULL,
	model VARCHAR(64) NOT NULL,
	style VARCHAR(64) NOT NULL,	
	inventory INT NOT NULL,
	price DECIMAL NOT NULL,
	image_path VARCHAR(255),
	PRIMARY KEY (id)
);

CREATE TABLE flies (
	id INT AUTO_INCREMENT NOT NULL,
	name VARCHAR(64) NOT NULL,
	color VARCHAR(64) NOT NULL,
	fly_size INT NOT NULL,
	inventory INT NOT NULL,
	price DECIMAL NOT NULL,
	image_path VARCHAR(255),
	PRIMARY KEY (id)
);

ALTER TABLE flylines AUTO_INCREMENT=1000;
ALTER TABLE reels AUTO_INCREMENT=2000;
ALTER TABLE rods AUTO_INCREMENT=3000;
ALTER TABLE flies AUTO_INCREMENT=4000;