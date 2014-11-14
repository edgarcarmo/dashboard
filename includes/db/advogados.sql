CREATE TABLE advogados (
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
	oab	VARCHAR(100) NULL,
	oabuf VARCHAR(2) NULL,
	cpf	VARCHAR(11) NULL,
	name VARCHAR(200) NULL,
	phone VARCHAR(11) NULL,
	cellphone VARCHAR(11) NULL,
	email VARCHAR(200) NULL,
	cep VARCHAR(8) NULL,
	address VARCHAR(200) NULL,
	number VARCHAR(50) NULL,
	complement VARCHAR(100) NULL,
	neighborhood VARCHAR(100) NULL,
	city VARCHAR(100) NULL,
	state VARCHAR(2) NULL
) ENGINE = innodb

