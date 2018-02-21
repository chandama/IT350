/*
* Chandler Taylor SQL Model 2-20-18
* 
* TODO: Still need to finish FK's for 1-1 relationships and review
* the syntax for the 1-M relationships already implemented below
* http://www.tech-recipes.com/rx/56738/one-to-one-one-to-many-table-relationships-in-sql-server/
*/

CREATE TABLE customer (
	cust_id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
	name VARCHAR(255) NOT NULL,
	email VARCHAR(255) NOT NULL,
	address VARCHAR (255) NOT NULL,
	cc_num VARCHAR(32)
);

CREATE TABLE cart (
	cart_id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
	status VARCHAR(64) NOT NULL,
	Fk_product_id INT,
	FOREIGN KEY (Fk_product_id) REFERENCES products(product_id)
);

CREATE TABLE employee (
	employee_id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
	Fk_cart_id INT,
	FOREIGN KEY (Fk_cart_id) REFERENCES cart(cart_id)
);

CREATE TABLE products (
	product_id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
	quantity_in_stock INT NOT NULL,
	price INT NOT NULL,
	Fk_review_id INT,
	FOREIGN KEY (Fk_review_id) REFERENCES review(review_id)
);

CREATE TABLE review (
	review_id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
	review_date TIMESTAMP,
	rating INT NOT NULL,
	review_text MEDIUMTEXT NOT NULL,
	author VARCHAR(255)
);

CREATE TABLE lines (
	line_id INT PRIMARY KEY REFERENCES products(product_id),
	weight VARCHAR(255) NOT NULL,
	sink_rate VARCHAR(64) NOT NULL,
	brand VARCHAR(64) NOT NULL,
	model VARCHAR(64) NOT NULL
);

CREATE TABLE reels (
	reel_id INT PRIMARY KEY REFERENCES products(product_id),
	weight VARCHAR(64) NOT NULL,
	brand VARCHAR(64) NOT NULL,
	model VARCHAR(64) NOT NULL,
	color VARCHAR(64) NOT NULL
);

CREATE TABLE rods (
	rod_id INT PRIMARY KEY REFERENCES products(product_id),
	weight VARCHAR(64) NOT NULL,
	brand VARCHAR(64) NOT NULL,
	model VARCHAR(64) NOT NULL,
	style VARCHAR(64) NOT NULL
);

CREATE TABLE flies (
	flies_id INT PRIMARY KEY REFERENCES products(product_id),
	name VARCHAR(64) NOT NULL,
	color VARCHAR(64) NOT NULL,
	fly_size INT NOT NULL
);

insert into 