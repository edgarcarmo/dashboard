CREATE TABLE users (
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
	name VARCHAR(200) NOT NULL,
	email VARCHAR(200) NOT NULL,
	password VARCHAR(20) NOT NULL,
	isadmin TINYINT NOT NULL
) ENGINE = innodb

INSERT users(name, email, password, isadmin) VALUES ('Administrador', 'atocf1@gmail.com', '123456', 1)