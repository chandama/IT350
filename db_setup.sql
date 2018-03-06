/*
* Chandler Taylor SQL Model 2-20-18
* 
* TODO: Still need to finish FK's for 1-1 relationships and review
* the syntax for the 1-M relationships already implemented below
* http://www.tech-recipes.com/rx/56738/one-to-one-one-to-many-table-relationships-in-sql-server/
*
* ATTENTION: On some of the online MySQL workbenchs FK's werent working on 
* TABLE CREATE so I had to use:
* 
* 	ALTER TABLE cart ADD FOREIGN KEY (product_id) REFERENCES products(product_id);
* 
* TO add the FK's after the tables were created. 
* REFERENCES In Product subclasses may not need reference to 
* Product ID. Just enforce it manually in your DB.
*/

CREATE TABLE customer (
	cust_id INT AUTO_INCREMENT NOT NULL,
	name VARCHAR(255) NOT NULL,
	email VARCHAR(255) NOT NULL,
	address VARCHAR (255) NOT NULL,
	cc_num VARCHAR(32),
	PRIMARY KEY (cust_id)
);

CREATE TABLE cart (
	cart_id INT AUTO_INCREMENT NOT NULL,
	status VARCHAR(64) NOT NULL,
	Fk_product_id INT,
	PRIMARY KEY (cart_id),
	/*FOREIGN KEY (Fk_product_id) REFERENCES products(product_id)*/
);

CREATE TABLE employee (
	employee_id INT AUTO_INCREMENT NOT NULL,
	Fk_cart_id INT,
	PRIMARY KEY (employee_id),
	/*FOREIGN KEY (Fk_cart_id) REFERENCES cart(cart_id)*/
);

CREATE TABLE products (
	product_id INT AUTO_INCREMENT NOT NULL,
	quantity_in_stock INT NOT NULL,
	price INT NOT NULL,
	Fk_review_id INT,
	PRIMARY KEY (product_id),
	/*FOREIGN KEY (Fk_review_id) REFERENCES review(review_id)*/ 
);

CREATE TABLE review (
	review_id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
	review_date TIMESTAMP,
	rating INT NOT NULL,
	review_text MEDIUMTEXT NOT NULL,
	author VARCHAR(255)
);

/*
	Probably don't need the REFERENCES on lines, reeels, rods, or flies. 
	Just manually enforce it. Lines has already been changed to 
	reflect these changes. Make sure it works before chanigng everything.
*/

CREATE TABLE lines (
	product_id INT PRIMARY KEY NOT NULL,
	weight VARCHAR(255) NOT NULL,
	sink_rate VARCHAR(64) NOT NULL,
	brand VARCHAR(64) NOT NULL,
	model VARCHAR(64) NOT NULL
);

CREATE TABLE reels (
	reel_id INT PRIMARY KEY NOT NULL,
	weight VARCHAR(64) NOT NULL,
	brand VARCHAR(64) NOT NULL,
	model VARCHAR(64) NOT NULL,
	color VARCHAR(64) NOT NULL
);

CREATE TABLE rods (
	rod_id INT PRIMARY KEY NOT NULL,
	weight VARCHAR(64) NOT NULL,
	brand VARCHAR(64) NOT NULL,
	model VARCHAR(64) NOT NULL,
	style VARCHAR(64) NOT NULL
);

CREATE TABLE flies (
	flies_id INT PRIMARY KEY NOT NULL,
	name VARCHAR(64) NOT NULL,
	color VARCHAR(64) NOT NULL,
	fly_size INT NOT NULL
);
