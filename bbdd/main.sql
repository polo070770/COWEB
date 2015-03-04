DROP TABLE IF EXISTS reserva_propiedad;
DROP TABLE IF EXISTS reserva_habitacion;
DROP TABLE IF EXISTS user;
DROP TABLE IF EXISTS propiedad;
DROP TABLE IF EXISTS habitacion;

CREATE TABLE user(
	
	email VARCHAR(50) PRIMARY KEY NOT NULL,

	nombre VARCHAR(50),
	apellido_1 VARCHAR(50),
	apellido_2 VARCHAR(50),
	contrasenya VARCHAR(50)

);

CREATE TABLE propiedad(

	id_propiedad INTEGER PRIMARY KEY NOT NULL,

	capacidad INTEGER,
	dormitorios INTEGER,
	banyos INTEGER,
	precio NUMERIC(6,2)

);

CREATE TABLE habitacion(

	id_habitacion INTEGER PRIMARY KEY NOT NULL,

	capacidad INTEGER,
	camas INTEGER,
	banyos INTEGER,
	banyo_privado BOOLEAN,
	precio NUMERIC(6,2)

);

CREATE TABLE reserva_propiedad(

	fk_email VARCHAR(50),
	fk_propiedad INTEGER,

	FOREIGN KEY (fk_email) REFERENCES user(email),
	FOREIGN KEY (fk_propiedad) REFERENCES propiedad(id_propiedad)

);

CREATE TABLE reserva_habitacion(

	fk_email VARCHAR(50),
	fk_habitacion INTEGER,

	FOREIGN KEY (fk_email) REFERENCES user(email),
	FOREIGN KEY (fk_habitacion) REFERENCES habitacion(id_habitacion)

);

LOAD DATA INFILE '/home/maikel/Github/polo070770.github.io/bbdd/user.csv'
INTO TABLE user
FIELDS TERMINATED BY ';'
LINES TERMINATED BY '\n';

LOAD DATA INFILE '/home/maikel/Github/polo070770.github.io/bbdd/propiedad.csv'
INTO TABLE propiedad
FIELDS TERMINATED BY ';'
LINES TERMINATED BY '\n';

LOAD DATA INFILE '/home/maikel/Github/polo070770.github.io/bbdd/habitacion.csv'
INTO TABLE habitacion
FIELDS TERMINATED BY ';'
LINES TERMINATED BY '\n';


LOAD DATA INFILE '/home/maikel/Github/polo070770.github.io/bbdd/reserva_propiedad.csv'
INTO TABLE reserva_propiedad
FIELDS TERMINATED BY ';'
LINES TERMINATED BY '\n';

LOAD DATA INFILE '/home/maikel/Github/polo070770.github.io/bbdd/reserva_habitacion.csv'
INTO TABLE reserva_habitacion
FIELDS TERMINATED BY ';'
LINES TERMINATED BY '\n';