-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 28-04-2018 a las 23:12:38
-- Versión del servidor: 5.7.19
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `restobar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

DROP TABLE IF EXISTS `articulos`;
CREATE TABLE IF NOT EXISTS `articulos` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `cocina` tinyint(1) NOT NULL,
  `bar` tinyint(1) NOT NULL,
  `alta` tinyint(1) NOT NULL,
  `socio` tinyint(1) NOT NULL,
  `happy` tinyint(1) NOT NULL,
  `puntos` int(11) NOT NULL DEFAULT '0',
  `promedio` int(11) DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=1428 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`codigo`, `nombre`, `precio`, `cocina`, `bar`, `alta`, `socio`, `happy`, `puntos`, `promedio`) VALUES
(1, 'Cerveza: Cream Ale', '90.00', 0, 1, 0, 1, 1, 0, NULL),
(2, 'Cerveza: Golden Ale', '90.00', 0, 1, 0, 1, 1, 0, NULL),
(3, 'Cerveza: Honey', '95.00', 0, 1, 0, 1, 1, 0, NULL),
(4, 'Cerveza: Irish Red', '90.00', 0, 1, 0, 1, 1, 0, NULL),
(5, 'Cerveza: Scotch Ale', '90.00', 0, 1, 0, 1, 1, 0, NULL),
(6, 'Cerveza: Brown Ale', '90.00', 0, 1, 0, 1, 1, 0, NULL),
(7, 'Cerveza: Triple AAA', '90.00', 0, 1, 0, 1, 1, 0, NULL),
(8, 'Cerveza: Porter', '90.00', 0, 1, 0, 1, 1, 0, NULL),
(9, 'Cerveza: Lemon Beer', '95.00', 0, 1, 0, 1, 1, 0, NULL),
(10, 'Cerveza: Irish Stout', '90.00', 0, 1, 0, 1, 1, 0, NULL),
(11, 'Cerveza: IPA', '95.00', 0, 1, 0, 1, 1, 0, NULL),
(12, 'Cerveza: Stout con Whisky', '105.00', 0, 1, 0, 1, 1, 0, NULL),
(13, 'Cerveza: Outmeal Stout', '95.00', 0, 1, 0, 1, 1, 0, NULL),
(14, 'Cerveza: Session IPA', '90.00', 0, 1, 0, 1, 1, 0, NULL),
(15, 'Cerveza: Belgian Dubbel', '90.00', 0, 1, 0, 1, 1, 0, NULL),
(16, 'Cerveza: Belgian Blonde', '95.00', 0, 1, 0, 1, 1, 0, NULL),
(17, 'Cerveza: Belgian Tripel', '95.00', 0, 1, 0, 1, 1, 0, NULL),
(19, 'Cerveza: Barley Wine', '120.00', 0, 1, 0, 0, 0, 0, NULL),
(20, 'Cerveza: Kolsch', '90.00', 0, 1, 0, 1, 1, 0, NULL),
(22, 'Cerveza: IPA DEPRESTADOS', '95.00', 0, 1, 0, 1, 1, 0, NULL),
(23, 'Schweppes Pomelo', '45.00', 0, 1, 0, 0, 0, 0, NULL),
(24, 'Aquarius Pomelo', '45.00', 0, 1, 0, 0, 0, 0, NULL),
(25, 'Aquarius Naranja', '45.00', 0, 1, 0, 0, 0, 0, NULL),
(26, 'Aquarius Limon', '45.00', 0, 1, 0, 0, 0, 0, NULL),
(127, 'Agua sin gas', '45.00', 0, 1, 0, 0, 0, 0, NULL),
(128, 'Agua con gas', '45.00', 0, 1, 0, 0, 0, 0, NULL),
(200, 'Coca Cola', '45.00', 0, 1, 0, 0, 0, 0, NULL),
(1254, 'Coca Cola Light', '45.00', 0, 1, 0, 0, 0, 0, NULL),
(1255, 'Coca Cola Zero', '45.00', 0, 1, 0, 0, 0, 0, NULL),
(1256, 'Fanta', '45.00', 0, 1, 0, 0, 0, 0, NULL),
(1257, 'Sprite', '45.00', 0, 1, 0, 0, 0, 0, NULL),
(1258, 'Sprite Zero', '45.00', 0, 1, 0, 0, 0, 0, NULL),
(1260, 'Trago: Fernet', '80.00', 0, 1, 1, 1, 1, 0, NULL),
(1261, 'Trago: Gancia', '80.00', 0, 1, 0, 1, 1, 0, NULL),
(1262, 'Trago: Campari', '80.00', 0, 1, 0, 1, 1, 0, NULL),
(1263, 'Trago: Destornillador', '80.00', 0, 1, 0, 1, 1, 0, NULL),
(1264, 'Trago: Sex on the beach', '80.00', 0, 1, 0, 1, 1, 0, NULL),
(1265, 'Trago: Gin Tonic', '80.00', 0, 1, 0, 1, 1, 0, NULL),
(1266, 'Trago: Cuba Libre', '80.00', 0, 1, 0, 1, 1, 0, NULL),
(1267, 'Trago: Piel de Iguana', '80.00', 0, 1, 0, 1, 1, 0, NULL),
(1268, 'Trago: Whiscola', '80.00', 0, 1, 0, 1, 1, 0, NULL),
(1269, 'Adicional Beefeater', '50.00', 0, 1, 0, 0, 0, 0, NULL),
(1271, 'Trago: Mojito', '100.00', 0, 1, 1, 0, 0, 0, NULL),
(1272, 'Trago: Capirinha/Caipiroska', '100.00', 0, 1, 0, 0, 0, 0, NULL),
(1273, 'Trago: Daiquiri', '100.00', 0, 1, 0, 0, 0, 0, NULL),
(1274, 'Trago: Adicional maracuya, guarana,mango', '30.00', 0, 1, 0, 0, 0, 0, NULL),
(1276, 'Whisky: Ballantines', '120.00', 0, 1, 1, 0, 0, 0, NULL),
(1277, 'Whisky: Red Label', '120.00', 0, 1, 0, 0, 0, 0, NULL),
(1279, 'Whisky: Chivas 12', '200.00', 0, 1, 0, 0, 0, 0, NULL),
(1280, 'Jagermeister/Spice', '100.00', 0, 1, 0, 0, 0, 0, NULL),
(1281, 'Jugo: Naranja  natural exprimido', '70.00', 0, 1, 0, 0, 0, 0, NULL),
(1282, 'Jugo: Limon  natural exprimido', '70.00', 0, 1, 0, 0, 0, 0, NULL),
(1283, 'Jugo: Limón natural con azúcar orgánica,menta y jengibre', '90.00', 0, 1, 0, 0, 0, 0, NULL),
(1284, 'Jugo: Naranja y limon exprimido + menta + jengibre', '80.00', 0, 1, 0, 0, 0, 0, NULL),
(1285, 'Papas Juana de Arco', '140.00', 1, 0, 0, 0, 0, 0, NULL),
(1286, 'Papas Barbaroja', '140.00', 1, 0, 0, 0, 0, 0, NULL),
(1287, 'Papas Bastón', '75.00', 1, 0, 0, 0, 0, 0, NULL),
(1288, 'Papas Becon & Cheddar', '140.00', 1, 0, 0, 0, 0, 0, NULL),
(1289, 'Papas Rusticas', '100.00', 1, 0, 0, 0, 0, 0, NULL),
(1290, 'Papas Provenzal', '135.00', 1, 0, 0, 0, 0, 0, NULL),
(1291, 'Baston de Muzarella', '130.00', 1, 0, 0, 0, 0, 0, NULL),
(1292, 'Bastón de Pollo', '130.00', 1, 0, 0, 0, 0, 0, NULL),
(1294, 'Nachos con guacamole y salsa picante', '135.00', 1, 0, 0, 0, 0, 0, NULL),
(1295, 'Rabas', '200.00', 1, 0, 0, 0, 0, 0, NULL),
(1296, 'Cornalitos', '120.00', 1, 1, 0, 0, 0, 0, NULL),
(1298, 'Mejillones Provenzal', '250.00', 1, 1, 1, 0, 0, 0, NULL),
(1300, 'Pizza Muzarella', '140.00', 1, 0, 1, 0, 0, 0, NULL),
(1301, 'Pizza Muzarella Doble', '155.00', 1, 0, 0, 0, 0, 0, NULL),
(1302, 'Pizza Napolitana', '155.00', 1, 0, 0, 0, 0, 0, NULL),
(1303, 'Pizza Calabresa', '165.00', 1, 0, 0, 0, 0, 0, NULL),
(1304, 'Pizza Fugazeta', '155.00', 1, 0, 0, 0, 0, 0, NULL),
(1305, 'Pizza 3Quesos', '180.00', 1, 0, 0, 0, 0, 0, NULL),
(1306, 'Pizza Parmesano y Panceta', '180.00', 1, 0, 0, 0, 0, 0, NULL),
(1307, 'Pizza Roquefort', '180.00', 1, 0, 0, 0, 0, 0, NULL),
(1308, 'Pizza Vegetariana', '180.00', 1, 0, 0, 0, 0, 0, NULL),
(1309, 'Pizza Champignones', '180.00', 1, 0, 0, 0, 0, 0, NULL),
(1310, 'Pizza Rucula', '165.00', 1, 0, 0, 0, 0, 0, NULL),
(1311, 'Hamburguesa: Classic Biere Burger (Ternera)', '115.00', 1, 0, 0, 0, 0, 0, NULL),
(1312, 'Hamburguesa: Bomb Biere Burger (Ternera)', '115.00', 1, 0, 0, 0, 0, 0, NULL),
(1313, 'Hamburguesa: Natural Biere Burger (Ternera)', '115.00', 1, 0, 0, 0, 0, 0, NULL),
(1314, 'Hamburguesa: Hot Biere Burger (Ternera)', '115.00', 1, 0, 0, 0, 0, 0, NULL),
(1315, 'Hamburguesa: Special Biere Burger (Cordero)', '135.00', 1, 0, 0, 0, 0, 0, NULL),
(1316, 'Sandwich de Milanesa', '100.00', 1, 0, 0, 0, 0, 0, NULL),
(1317, 'Sandwich de Bondiola', '120.00', 1, 0, 0, 0, 0, 0, NULL),
(1318, 'Pancho Alemán', '80.00', 1, 0, 0, 0, 0, 0, NULL),
(1319, 'Pancho Soja Vegetariano', '65.00', 1, 0, 0, 0, 0, 0, NULL),
(1320, 'Menú infantil Hamburguesa+Papas+Bebida', '160.00', 1, 0, 0, 0, 0, 0, NULL),
(1321, 'Menú infantil Bastones de Pollo+Papas+Bebida', '160.00', 1, 0, 0, 0, 0, 0, NULL),
(1322, 'Picada Clasica', '275.00', 1, 0, 0, 0, 0, 0, NULL),
(1323, 'Picada Contemporanea', '350.00', 1, 0, 0, 0, 0, 0, NULL),
(1326, 'Panqueque Salado: Vegetales al wok', '150.00', 1, 0, 1, 0, 0, 0, NULL),
(1327, 'Panqueque  Salado: Pollo c/queso gouda,tomate,hierbas finas', '150.00', 1, 0, 0, 0, 0, 0, NULL),
(1328, 'Panqueque Salado: Muzarella,queso gouda,tomate y albahaca', '150.00', 1, 0, 0, 0, 0, 0, NULL),
(1329, 'Ravioles Fritos (Espinaca/Remolacha)', '130.00', 1, 0, 0, 0, 0, 0, NULL),
(1330, 'Panqueque c/dulce de leche', '60.00', 1, 0, 0, 0, 0, 0, NULL),
(1331, 'Panqueque c/dulce de leche, choco, coco y nueces', '80.00', 1, 0, 0, 0, 0, 0, NULL),
(1332, 'Bombón Suizo con Dulce de Leche', '60.00', 1, 1, 0, 0, 0, 0, NULL),
(1333, 'Frutillas con crema', '60.00', 1, 0, 0, 0, 0, 0, NULL),
(1334, 'Panqueque c/dulce de leche y rocklets', '75.00', 1, 0, 0, 0, 0, 0, NULL),
(1335, 'Panqueque Salado c/pollo,queso gouda,tomate y finas hierbas', '150.00', 1, 0, 0, 0, 0, 0, NULL),
(1336, 'Panqueque Salado: c/muzarella,queso gouda,tomate y albahaca', '135.00', 1, 0, 0, 0, 0, 0, NULL),
(1337, 'Panqueque c/muzarella y vegetales al wok', '135.00', 1, 0, 0, 0, 0, 0, NULL),
(1338, 'Ravioles Fritos (Remolacha)', '130.00', 1, 0, 0, 0, 0, 0, NULL),
(1339, 'Speed', '50.00', 1, 0, 0, 0, 0, 0, NULL),
(1340, 'Bondiola de cerdo', '130.00', 1, 0, 0, 0, 0, 0, NULL),
(1341, 'Cerveza: Belgain Rubi', '90.00', 0, 1, 0, 1, 1, 0, NULL),
(1342, 'Brown Ale', '90.00', 0, 1, 0, 1, 1, 0, NULL),
(1343, 'Cerveza :Z Media Pinta Beer Lemon', '65.00', 0, 1, 0, 0, 0, 0, NULL),
(1344, 'Cerveza: Z Media Pinta Belgain Tripel', '65.00', 0, 1, 0, 0, 0, 0, NULL),
(1346, 'Cerveza: Z Media Pinta Brown Ale', '55.00', 0, 1, 1, 0, 0, 0, NULL),
(1348, 'Cerveza :Z Media Pinta Irish Stout', '60.00', 0, 1, 1, 0, 0, 0, NULL),
(1349, 'Cerveza :Z Media Pinta Triple AAA', '60.00', 0, 1, 0, 0, 0, 0, NULL),
(1350, 'Hamburguesa: Vegan Biere Burger (Soja)', '90.00', 1, 0, 0, 0, 0, 0, NULL),
(1351, 'Sandwich Vegetariano', '110.00', 1, 0, 0, 0, 0, 0, NULL),
(1352, 'Panqueque c/dulce de leche,coco,dulce frambueza y almendras', '95.00', 1, 0, 0, 0, 0, 0, NULL),
(1353, 'Vinos: Ampakama Malbec', '160.00', 0, 1, 0, 0, 0, 0, NULL),
(1354, 'Vinos: Marcus Blanco Dulce', '160.00', 0, 1, 0, 0, 0, 0, NULL),
(1355, 'Vinos: Fuego Negro Blend', '220.00', 0, 1, 0, 0, 0, 0, NULL),
(1357, 'Licuados: Frutas de estacion', '70.00', 0, 1, 0, 0, 0, 0, NULL),
(1358, 'Daiquiri', '100.00', 0, 1, 0, 0, 0, 0, NULL),
(1359, 'Promocion: Papas a eleccion+2 pintas', '280.00', 1, 1, 0, 0, 0, 0, NULL),
(1360, 'Ensaladas: Rucula,pollo y queso parmesano', '80.00', 1, 0, 0, 0, 0, 0, NULL),
(1361, 'Ensalada Muzarella,queso gouda,tomate y albahaca', '80.00', 1, 0, 0, 0, 0, 0, NULL),
(1362, 'Ensalada: Champignones,tomates cherry,almendras y semillas', '100.00', 1, 0, 0, 0, 0, 0, NULL),
(1363, 'Ensalada de frutas', '75.00', 1, 0, 0, 0, 0, 0, NULL),
(1364, 'Flan casero c/dulce de leche', '60.00', 1, 0, 0, 0, 0, 0, NULL),
(1365, 'Papas 3Quesos', '135.00', 1, 0, 0, 0, 0, 0, NULL),
(1366, 'Cerveza: Media Pinta Scotch Ale', '60.00', 0, 1, 0, 0, 0, 0, NULL),
(1367, 'Cerveza :Z Media Pinta Honey', '65.00', 0, 1, 0, 0, 0, 0, NULL),
(1368, 'Cerveza :Z Media Pinta IPA', '65.00', 0, 1, 0, 1, 0, 0, NULL),
(1369, 'Cerveza :Z Media Pinta IPA Session', '60.00', 0, 1, 0, 0, 0, 0, NULL),
(1370, 'Cerveza :Z Media Pinta Porter', '60.00', 0, 1, 0, 0, 0, 0, NULL),
(1371, 'Cerveza :Z Media Pinta Irish Red', '60.00', 0, 1, 0, 0, 0, 0, NULL),
(1372, 'Adicional Limon', '20.00', 0, 1, 0, 0, 0, 0, NULL),
(1373, 'Coca Cola Zero', '45.00', 0, 1, 0, 0, 0, 0, NULL),
(1374, 'Aquarius Manzana', '45.00', 0, 1, 0, 0, 0, 0, NULL),
(1375, 'Cerveza :Z Media Belgain Blonde', '65.00', 0, 1, 0, 0, 0, 0, NULL),
(1376, 'Cerveza :Z Media Pinta Scotch Ale', '60.00', 0, 1, 0, 0, 0, 0, NULL),
(1377, 'Cerveza :Z Media Pinta Golden', '60.00', 0, 1, 0, 0, 0, 0, NULL),
(1378, 'Cerveza :Z Media Cream Ale', '60.00', 0, 1, 0, 0, 0, 0, NULL),
(1379, 'Cerveza :Z Media Out MealOut', '65.00', 0, 1, 0, 0, 0, 0, NULL),
(1380, 'Cerveza :Z Media Pinta Cream Ale', '60.00', 0, 1, 0, 0, 0, 0, NULL),
(1381, 'Adicional Jugo Naranja', '20.00', 0, 1, 0, 0, 0, 0, NULL),
(1382, 'Cerveza :Z Media Pinta Brown Ale', '0.00', 0, 1, 0, 0, 0, 0, NULL),
(1383, 'Tequila', '50.00', 0, 1, 0, 0, 0, 0, NULL),
(1384, 'Cerveza: Rauch Beer', '90.00', 0, 1, 0, 0, 0, 0, NULL),
(1385, 'Tabla Degustacion', '150.00', 0, 1, 0, 0, 0, 0, NULL),
(1386, 'Cerveza :Z Media Pinta Kolsch', '60.00', 0, 1, 0, 0, 0, 0, NULL),
(1388, 'Promo:Pizza+2Pinta (a eleccion)', '300.00', 1, 1, 0, 0, 0, 0, NULL),
(1389, 'Trago: Cuba Libre', '80.00', 0, 1, 0, 0, 0, 0, NULL),
(1390, 'Cerveza: Black Chocolate Stout', '105.00', 0, 1, 0, 0, 0, 0, NULL),
(1392, 'Cerveza: Red Honey', '95.00', 0, 1, 0, 0, 0, 0, NULL),
(1393, 'Cerveza :Z Media Red Honey', '65.00', 0, 1, 0, 0, 0, 0, NULL),
(1394, 'Promo:Pizza+Papas (Libre)', '150.00', 0, 1, 0, 0, 0, 0, NULL),
(1396, 'Cerveza: Z Media Pinta Belgan Blonde', '65.00', 0, 1, 1, 0, 0, 0, NULL),
(1397, 'Trago: Ron C/Speed', '125.00', 0, 1, 0, 0, 0, 0, NULL),
(1398, 'Filet de Merluza c/guarnición', '160.00', 1, 0, 0, 0, 0, 0, NULL),
(1399, 'Cafe Cortado', '45.00', 0, 1, 0, 0, 0, 0, NULL),
(1400, 'Cafe C/Crema', '50.00', 0, 1, 0, 0, 0, 0, NULL),
(1401, 'Adicional Huevo Frito', '15.00', 1, 0, 0, 0, 0, 0, NULL),
(1402, 'Milanesa de Ternera', '90.00', 1, 0, 0, 0, 0, 0, NULL),
(1403, 'Porción de Pure', '75.00', 1, 0, 0, 0, 0, 0, NULL),
(1404, 'Postre: Almendrado', '50.00', 1, 0, 0, 0, 0, 0, NULL),
(1405, 'Cerveza: Imperial Stout', '120.00', 0, 1, 0, 0, 0, 0, NULL),
(1406, 'Pancho Alemán + Pinta', '135.00', 0, 0, 0, 0, 0, 0, NULL),
(1407, 'Pizza Especial', '155.00', 1, 1, 0, 0, 0, 0, NULL),
(1408, 'Adicional Crema y/o Dulce De Leche', '20.00', 1, 0, 0, 0, 0, 0, NULL),
(1409, 'Media Porc. Papas', '90.00', 1, 0, 0, 0, 0, 0, NULL),
(1411, 'Gaseosa Grande', '90.00', 0, 1, 1, 0, 0, 0, NULL),
(1412, 'Menú Menor', '90.00', 0, 1, 0, 0, 0, 0, NULL),
(1413, 'Tortas', '780.00', 0, 1, 0, 0, 0, 0, NULL),
(1414, 'Cerveza: IPA FALSO FONDO', '95.00', 0, 1, 0, 1, 1, 4, NULL),
(1415, 'Matambre a la pizza C/Papas Rusticas', '160.00', 1, 0, 0, 0, 0, 0, NULL),
(1416, 'Jager C/Speed', '120.00', 0, 1, 0, 0, 0, 0, NULL),
(1417, 'Cerveza :Z Media Pinta IPA FALSO FONDO', '65.00', 0, 1, 0, 0, 0, 0, NULL),
(1418, 'SuperPancho', '45.00', 1, 0, 0, 0, 0, 0, NULL),
(1419, 'Adicional Guacamole', '20.00', 1, 0, 0, 0, 0, 0, NULL),
(1420, 'Papas 4Quesos', '160.00', 1, 0, 0, 0, 0, 0, NULL),
(1421, 'Lomito a la plancha', '120.00', 1, 0, 0, 0, 0, 0, NULL),
(1422, 'Ensalada', '80.00', 1, 0, 0, 0, 0, 0, NULL),
(1423, 'Sandwich de Milanesa Suprema', '120.00', 1, 0, 0, 0, 0, 0, NULL),
(1424, 'Merluza con guarnicio', '150.00', 1, 0, 0, 0, 0, 0, NULL),
(1425, 'Media Pinta Black Chocolate Stout', '70.00', 0, 1, 0, 0, 0, 0, NULL),
(1426, 'Picada p/6', '500.00', 1, 0, 0, 0, 0, 0, NULL),
(1427, 'cerveza :z media belgian dubbel', '60.00', 0, 1, 0, 0, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cajas_diarias`
--

DROP TABLE IF EXISTS `cajas_diarias`;
CREATE TABLE IF NOT EXISTS `cajas_diarias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idClima` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `evento` tinyint(1) NOT NULL,
  `monto` decimal(10,2) DEFAULT NULL,
  `totalventa` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idClima` (`idClima`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `climas`
--

DROP TABLE IF EXISTS `climas`;
CREATE TABLE IF NOT EXISTS `climas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `climas`
--

INSERT INTO `climas` (`id`, `nombre`) VALUES
(5, 'Excelente'),
(15, 'Muy Bueno'),
(16, 'Bueno'),
(17, 'Regular'),
(18, 'Malo'),
(19, 'Pesimo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `combos`
--

DROP TABLE IF EXISTS `combos`;
CREATE TABLE IF NOT EXISTS `combos` (
  `codigoCombo` int(11) NOT NULL,
  `codigoArticulo` int(11) NOT NULL,
  `cantidad` smallint(6) NOT NULL,
  PRIMARY KEY (`codigoCombo`,`codigoArticulo`),
  KEY `codigoArticulo` (`codigoArticulo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `config`
--

DROP TABLE IF EXISTS `config`;
CREATE TABLE IF NOT EXISTS `config` (
  `Inicio` time DEFAULT NULL,
  `Fin` time DEFAULT NULL,
  `Socio` decimal(5,2) DEFAULT NULL,
  `Happy` decimal(5,2) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `config`
--

INSERT INTO `config` (`Inicio`, `Fin`, `Socio`, `Happy`, `id`) VALUES
('23:00:00', '00:00:00', '0.00', '0.00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

DROP TABLE IF EXISTS `estados`;
CREATE TABLE IF NOT EXISTS `estados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` int(11) NOT NULL,
  `nro` int(11) NOT NULL,
  `nota` varchar(200) DEFAULT NULL,
  `pedido` time DEFAULT NULL,
  `listo` time DEFAULT NULL,
  `servido` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `codigo` int(11) NOT NULL,
  `nroVenta` int(11) NOT NULL,
  `cantidad` smallint(6) NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `nroVenta` (`nroVenta`),
  KEY `codigo` (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `items_socios`
--

DROP TABLE IF EXISTS `items_socios`;
CREATE TABLE IF NOT EXISTS `items_socios` (
  `codigo` int(11) NOT NULL,
  `nroVenta` int(11) NOT NULL,
  `nroSocio` int(11) NOT NULL,
  `cantidad` smallint(6) NOT NULL,
  `monto` decimal(10,2) DEFAULT NULL,
  `puntos` smallint(6) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `nroSocio` (`nroSocio`),
  KEY `nroVenta` (`nroVenta`),
  KEY `codigo` (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesas`
--

DROP TABLE IF EXISTS `mesas`;
CREATE TABLE IF NOT EXISTS `mesas` (
  `nro` int(11) NOT NULL,
  PRIMARY KEY (`nro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `mesas`
--

INSERT INTO `mesas` (`nro`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15),
(16),
(17),
(18),
(19),
(20),
(21),
(22),
(23),
(24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socios`
--

DROP TABLE IF EXISTS `socios`;
CREATE TABLE IF NOT EXISTS `socios` (
  `nro` int(11) NOT NULL,
  `nombre` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `puntos` int(11) DEFAULT NULL,
  PRIMARY KEY (`nro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `alta` tinyint(1) NOT NULL,
  `permiso` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `password`, `alta`, `permiso`) VALUES
(4, 'Fran', '$2y$04$36ksXrIhhJvyNJVpxiumfeOUEVec0toRixSkAafZvnFeeJ7Rplv.y', 1, 'ROLE_ADMIN'),
(6, 'Lucas', '$2y$04$TW2KwH4U3jzt1kxL.5nPXuLYj3nZ2v.MguG22w80viLge1ZVCSium', 1, 'ROLE_MOZO'),
(7, 'cocinero', '$2y$04$Uqaf/Js29YTFT8iwFTlIKuYTidiVpY9boBM6hDesL7PgvdYYn81SS', 1, 'ROLE_COCINERO'),
(8, 'facu', '$2y$04$UG2kZAUbbHUJvrX0MRGho.0zTShA8I1q9IN1pAipG6/qO0OLsYdvW', 1, 'ROLE_MOZO'),
(9, 'marina', '$2y$04$yiLh2lAvtAt75dEFJrIXjuSHV923ti9SoX6mkstmGX.evsU6kKFom', 1, 'ROLE_MOZO'),
(10, 'santiago', '$2y$04$WvflvciRPxPTJKzBWRESquR88FbtmyxBDCAFdi8nh4B4raZKixVei', 1, 'ROLE_MOZO'),
(11, 'ayelen', '$2y$04$iZNSoK3rclJa399uAkxI.O2/VxbYu5n8zC5vG17yY/pGc6gOIky5O', 1, 'ROLE_MOZO'),
(12, 'sarah', '$2y$04$VgEYlcbrpFGJSSx2U58ikePUzVxw29IWSs63QwfVzBpTkx5eHDGgm', 1, 'ROLE_MOZO'),
(13, 'lucas', '$2y$04$Ac/sE.iXEJcehNL3zrgeaOU.mFPP/bNb7CY8bCUBZXkJKPj2LcOk2', 1, 'ROLE_MOZO'),
(14, 'Suki', '$2y$04$onJ06EH38yaXN82skpCbAOhH4l0p9jX4yFO663idjyVY33gdhlqDi', 1, 'ROLE_MOZO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

DROP TABLE IF EXISTS `ventas`;
CREATE TABLE IF NOT EXISTS `ventas` (
  `nro` int(11) NOT NULL AUTO_INCREMENT,
  `idCajaDiaria` int(11) NOT NULL,
  `nroMesa` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `abierta` time NOT NULL,
  `puntos` int(11) DEFAULT NULL,
  `cerrada` time DEFAULT NULL,
  `descuento` decimal(10,2) DEFAULT NULL,
  `total` decimal(10,0) NOT NULL,
  `personas` int(11) DEFAULT '1',
  PRIMARY KEY (`nro`),
  KEY `nroMesa` (`nroMesa`),
  KEY `idUsuario` (`idUsuario`),
  KEY `id_caja_diaria` (`idCajaDiaria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cajas_diarias`
--
ALTER TABLE `cajas_diarias`
  ADD CONSTRAINT `cajas_diarias_ibfk_1` FOREIGN KEY (`idClima`) REFERENCES `climas` (`id`);

--
-- Filtros para la tabla `combos`
--
ALTER TABLE `combos`
  ADD CONSTRAINT `combos_ibfk_1` FOREIGN KEY (`codigoCombo`) REFERENCES `articulos` (`codigo`),
  ADD CONSTRAINT `combos_ibfk_2` FOREIGN KEY (`codigoArticulo`) REFERENCES `articulos` (`codigo`);

--
-- Filtros para la tabla `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`nroVenta`) REFERENCES `ventas` (`nro`),
  ADD CONSTRAINT `items_ibfk_2` FOREIGN KEY (`codigo`) REFERENCES `articulos` (`codigo`);

--
-- Filtros para la tabla `items_socios`
--
ALTER TABLE `items_socios`
  ADD CONSTRAINT `items_socios_ibfk_1` FOREIGN KEY (`nroSocio`) REFERENCES `socios` (`nro`),
  ADD CONSTRAINT `items_socios_ibfk_2` FOREIGN KEY (`nroVenta`) REFERENCES `ventas` (`nro`),
  ADD CONSTRAINT `items_socios_ibfk_3` FOREIGN KEY (`codigo`) REFERENCES `articulos` (`codigo`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`nroMesa`) REFERENCES `mesas` (`nro`),
  ADD CONSTRAINT `ventas_ibfk_3` FOREIGN KEY (`idCajaDiaria`) REFERENCES `cajas_diarias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
