# Simple-Contacts-Database
//below is a schema used to test the database.
CREATE TABLE contactsU5 (
        contact_id int(11) NOT NULL AUTO_INCREMENT,
        first_name varchar(20) NOT NULL,
        middle_name varchar(35) NULL,
	last_name varchar(30) NOT NULL,
	DOB DATE,
	address varchar(35) NULL,
	city varchar(20) NULL,
	postcode varchar(10) NULL,
	tel varchar(14) NULL,
	email varchar(40) NOT NULL,
        CONSTRAINT contacts_pk PRIMARY KEY (contact_id)

);
