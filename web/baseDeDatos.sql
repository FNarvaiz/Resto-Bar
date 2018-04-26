/*
Created		19/09/2017
Modified		19/09/2017
Project		
Model		
Company		
Author		
Version		
Database		mySQL 5 
*/


Create table SOCIOS (
	nro Int NOT NULL,
	nombre Varchar(150),
	puntos Int,
 Primary Key (nro)) ENGINE = InnoDb;

Create table MESAS (
	nro Int NOT NULL,
 Primary Key (nro)) ENGINE = InnoDb;

Create table VENTAS (
	nro Int NOT NULL AUTO_INCREMENT,
	id_caja_diaria Int NOT NULL,
	nroMesa Int NOT NULL,
	idUsuario Int NOT NULL,
	abierta Time NOT NULL,
	puntos Int,
	cerrada Time,
	descuento Decimal(10,2),
 Primary Key (nro)) ENGINE = InnoDb;

Create table USUARIOS (
	id Int NOT NULL,
	nombre Varchar(150) NOT NULL,
	password Varchar(100) NOT NULL,
	alta Bool NOT NULL,
	permiso Varchar(20) NOT NULL,
 Primary Key (id)) ENGINE = InnoDb;

Create table CAJAS_DIARIAS (
	id Int NOT NULL AUTO_INCREMENT,
	idClima Int NOT NULL,
	fecha Date NOT NULL,
	evento Bool NOT NULL,
	monto Decimal(10,2),
    totalVenta Decimal(10,2),
 Primary Key (id)) ENGINE = InnoDb;

Create table CLIMAS (
	id Int NOT NULL AUTO_INCREMENT,
	nombre Varchar(150),
 Primary Key (id)) ENGINE = InnoDb;

Create table ARTICULOS (
	codigo Int NOT NULL,
	nombre Varchar(150),
	precio Decimal(10,2),
	cocina Bool NOT NULL,
	bar Bool NOT NULL,
	alta Bool NOT NULL,
 Primary Key (codigo)) ENGINE = InnoDb;

Create table ITEMS (
	codigo Int NOT NULL,
	nroVenta Int NOT NULL,
	cantidad Smallint NOT NULL,
	monto Decimal(10,2) NOT NULL,
id Int NOT NULL AUTO_INCREMENT,
 Primary Key (id)) ENGINE = InnoDb;

Create table ITEMS_SOCIOS (
	codigo Int NOT NULL,
	nroVenta Int NOT NULL,
	nroSocio Int NOT NULL,
	cantidad Smallint NOT NULL,
	monto Decimal(10,2),
	puntos Smallint,
id Int NOT NULL AUTO_INCREMENT,
 Primary Key (id)) ENGINE = InnoDb;

Create table COMBOS (
	codigoCombo Int NOT NULL,
	codigoArticulo Int NOT NULL,
	cantidad Smallint NOT NULL,
 Primary Key (codigoCombo,codigoArticulo)) ENGINE = InnoDb;

Create table ESTADOS (
	id Int NOT NULL AUTO_INCREMENT,
	estado BOOLEAN NOT NULL,
	codigo Int NOT NULL,
	nro Int NOT NULL,
 Primary Key (id)) ENGINE = InnoDb;

Alter table ITEMS_SOCIOS add Foreign Key (nroSocio) references SOCIOS (nro) on delete  restrict on update  restrict;
Alter table VENTAS add Foreign Key (nroMesa) references MESAS (nro) on delete  restrict on update  restrict;
Alter table ITEMS add Foreign Key (nroVenta) references VENTAS (nro) on delete  restrict on update  restrict;
Alter table ITEMS_SOCIOS add Foreign Key (nroVenta) references VENTAS (nro) on delete  restrict on update  restrict;
Alter table VENTAS add Foreign Key (idUsuario) references USUARIOS (id) on delete  restrict on update  restrict;
Alter table VENTAS add Foreign Key (id_caja_diaria) references CAJAS_DIARIAS (id) on delete  restrict on update  restrict;
Alter table CAJAS_DIARIAS add Foreign Key (idClima) references CLIMAS (id) on delete  restrict on update  restrict;
Alter table ITEMS add Foreign Key (codigo) references ARTICULOS (codigo) on delete  restrict on update  restrict;
Alter table ITEMS_SOCIOS add Foreign Key (codigo) references ARTICULOS (codigo) on delete  restrict on update  restrict;
Alter table COMBOS add Foreign Key (codigoCombo) references ARTICULOS (codigo) on delete  restrict on update  restrict;
Alter table COMBOS add Foreign Key (codigoArticulo) references ARTICULOS (codigo) on delete  restrict on update  restrict;
Alter table ESTADOS add Foreign Key (codigo) references ARTICULOS (codigo) on delete  restrict on update  restrict;
Alter table ESTADOS add Foreign Key (nro) references VENTAS (nro) on delete  restrict on update  restrict;


