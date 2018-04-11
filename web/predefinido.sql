
INSERT INTO `climas` ( `nombre`) VALUES 
( 'Dia soleado y noche estrellada fria'),
( 'Dia soleado y noche estrellada calurosa'),
('Dia nublado y noche estrellada fria'),
('Dia soleado y noche estrellada calurosa'),
('Dia soleado y noche nublada fria'),
('Dia nublado y noche nublada calurosa'),
('Dia lluvia y noche lluvia'),
('Dia soleado y noche lluvia'),
('Dia lluvia y noche estrellada'),
('Dia ventoso y noche ventosa'),
('Neblina');

INSERT INTO `mesas` (`nro`) VALUES ('01'),('02'),('03'),('04'),('05'),('06'),
('07'),('08'),('09'),('10'),('11'),('12'),('13'),('14'),('15'),
('16'),('17'),('18'),('19'),('20'),('21'),('22'),('23'),('24');


INSERT INTO `usuarios` (`id`, `permiso`, `nombre`, `password`, `alta`) VALUES 
('1', 'Administrador', 'Admin', '$2a$04$hAb7WMN6ptJSPN75b.RhE.rqtviDNhjSbQ7WTuoFAfLzpdYcgrDO6', '1');