-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2022 at 08:12 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `applicaton`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerID` int(10) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `PhoneNumber` int(11) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `Surname` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `CreditCard` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `flight`
--

CREATE TABLE `flight` (
  `FlightID` int(10) NOT NULL,
  `ArrivalTime` time(6) NOT NULL,
  `ArrivalDate` date NOT NULL,
  `DepatureTime` time(6) NOT NULL,
  `DepartureDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `origin` varchar(50) DEFAULT NULL,
  `destination` varchar(50) DEFAULT NULL,
  `cabin_class` enum('PREMIUM ECONOMY','BUSINESS CLASS','FIRST CLASS') DEFAULT NULL,
  `departure_date` date DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `tickets_count` int(11) DEFAULT '1',
  `trip_type` enum('ONE WAY','ROUND') DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `passport_number` varchar(30) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Table structure for table `passengers`
--

CREATE TABLE `passengers` (
  `PassengerID` int(10) NOT NULL,
  `PassengerName` varchar(255) NOT NULL,
  `Age` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `TicketID` int(10) NOT NULL,
  `Airline` varchar(255) NOT NULL,
  `FlightNumber` varchar(255) NOT NULL,
  `PassengerName` varchar(255) NOT NULL,
  `Gate` varchar(255) DEFAULT NULL,
  `SeatNumber` varchar(255) DEFAULT NULL,
  `Class` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `PhoneNumber` (`PhoneNumber`);

--
-- Indexes for table `flight`
--
ALTER TABLE `flight`
  ADD PRIMARY KEY (`FlightID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passengers`
--
ALTER TABLE `passengers`
  ADD PRIMARY KEY (`PassengerID`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`TicketID`),
  ADD UNIQUE KEY `FlightNumber` (`FlightNumber`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

 
/* ---------------------------- */

#create users table 
CREATE TABLE cloudusers (
username VARCHAR(255) NOT NULL, 
first_name VARCHAR(255) NOT NULL, 
last_name VARCHAR(255) NOT NULL, 
email VARCHAR(255) NOT NULL, 
phone_number VARCHAR(15) NOT NULL,
passport_number INT(9) NOT NULL, 
password VARCHAR(255) NOT NULL
);


#users table data
INSERT INTO cloudusers (username, first_name, last_name, email, phone_number, passport_number, password) VALUES 
("User1234", "firstname", "surname", "name@gmail.com", "07070707070", "000000001", "User123");


#users table data
INSERT INTO cloudusers (username, first_name, last_name, email, phone_number, passport_number, password) VALUES 
("User1234", "Saajidah", "Mohamed", "saajidahm@gmail.com", "07070707070", "015360201", "User121"),
("User1235", "Johnny", "M", "johnny00@gmail.com", "07070707111", "725340811", "User122"),
("User1236", "Ahmed", "O", "ahmed00@gmail.com", "07070707123", "064361205", "User123");


Create table cloudflights (
flight_date integer(6) NOT NULL,
flight_number VARCHAR(6) NOT NULL,
start_time integer(4) NOT NULL,
from_airport VARCHAR(20 )NOT NULL,
destination VARCHAR(20) NOT NULL
);
 
/*foreign key (flight_number) references adbt154Passenger (flight_number)); */


insert into cloudflights (flight_date, flight_number, start_time, from_airport, destination) values

insert into cloudflights (flight_date, flight_number, start_time, from_airport, destination) values
(221206, "HA3512", 1042, "Moscow", "Hong Kong"),
(221206, "BA7058", 1050, "Hong Kong", "Vietnam"), 
(221206, "HA1561", 1057, "Moscow", "Japan"),
(221206, "BA7059", 1103, "Hong Kong", "Moscow"), 
(221206, "OB2379", 1109, "Moscow", "Korea"),
(221206, "FH7121", 1115, "Hong Kong", "Vietnam"), 
(221206, "FH1162", 1126, "Moscow", "Vietnam"),
(221206, "OB2214", 1143, "Moscow", "Japan"),
(221206, "LA7138", 1151, "Hong Kong", "Rome"), 
(221206, "LA5231", 1222, "Moscow", "Japan"),
(221206, "BA7428", 1234, "Hong Kong", "Cambodia"), 
(221206, "FH1611", 1247, "Moscow", "Korea"),
(221206, "OB1291", 1310, "Moscow", "Cambodia"),
(221206, "HA7058", 1325, "Hong Kong", "Japan"), 
(221206, "BA7631", 1329, "Hong Kong", "Rome"), 
(221206, "OB1092", 1410, "Moscow", "Korea"),
(221206, "BA7058", 1415, "Hong Kong", "Thailand"),
(221206, "LA2812", 1419, "Moscow", "Singapore"),
(221206, "BA7222", 1423, "Hong Kong", "Thailand"), 
(221206, "FH1162", 1450, "Moscow", "Cambodia"),
(221206, "OB7058", 1512, "Hong Kong", "Moscow"), 
(221206, "LA0506", 1532, "Moscow", "Rome"),
(221206, "BA7323", 1548, "Hong Kong", "Singapore"),
(221206, "LA2323", 1610, "Moscow", "Vietnam"),
(221206, "BA7821", 1629, "Hong Kong", "Korea"), 
(221206, "FH0022", 1633, "Moscow", "Singapore"),
(221206, "OB7018", 1704, "Hong Kong", "Singapore"),
(221206, "LA0202", 1723, "Moscow", "Thailand"),
(221206, "LA0702", 1818, "Moscow", "Japan"),
(221206, "BA6058", 1836, "Hong Kong", "Cambodia"), 
(221206, "LA0903", 1850, "Moscow", "Cambodia"),
(221206, "BA2351", 1921, "Hong Kong", "Vietnam"), 
(221206, "FH7745", 1936, "Moscow", "Rome"),
(221206, "OB1058", 1952, "Hong Kong", "Korea"), 
(221206, "LA6621", 2022, "Moscow", "Rome"),
(221206, "OB7058", 2038, "Hong Kong", "Rome"),
(221206, "LA0532", 2107, "Moscow", "Singapore"),
(221206, "HA7232", 2132, "Hong Kong", "Japan"), 
(221206, "OB1154", 2146, "Moscow", "Hong Kong"),
(221206, "OB2566", 2158, "Moscow", "Vietnam"),
(221206, "BA7059", 2202, "Moscow", "Hong Kong"),
(221206, "FH1524", 2239, "Hong Kong", "Singapore"), 
(221206, "FH5562", 2256, "Moscow", "Thailand"),
(221206, "OB7018", 2338, "Moscow", "Hong Kong"), 
(221206, "FH3527", 2356, "Moscow", "Korea");

/**
(221206, "BA7058", 1050, "Hong Kong", "Vietnam"), 
(221206, "BA7058", 1050, "Hong Kong", "Moscow"), 
(221206, "BA7058", 1050, "Hong Kong", "Vietnam"), 
(221206, "BA7058", 1050, "Hong Kong", "Rome"), 
(221206, "BA7058", 1050, "Hong Kong", "Cambodia"), 
(221206, "BA7058", 1050, "Hong Kong", "Japan"), 
(221206, "BA7058", 1050, "Hong Kong", "Rome"), 
(221206, "BA7058", 1050, "Hong Kong", "Thailand"),
(221206, "BA7058", 1050, "Hong Kong", "Korea"), 
(221206, "BA7058", 1050, "Hong Kong", "Singapore"), 
(221206, "BA7058", 1050, "Hong Kong", "Cambodia"), 
(221206, "BA7058", 1050, "Hong Kong", "Vietnam"), 
(221206, "BA7058", 1050, "Hong Kong", "Korea"), 
(221206, "BA7058", 1050, "Hong Kong", "Rome"),
(221206, "BA7058", 1050, "Hong Kong", "Japan"), 
(221206, "BA7058", 1050, "Hong Kong", "Singapore"), 
(221206, "BA7058", 1050, "Hong Kong", "Singapore"), 
(221206, "BA7058", 1050, "Hong Kong", "Thailand"), 
(221206, "BA7058", 1050, "Hong Kong", "Moscow"), 

(221207, "LA5562", 1510, "Moscow", "Hong Kong"),
(221207, "LA5562", 1510, "Moscow", "Hong Kong"),
(221207, "LA5562", 1510, "Moscow", "Hong Kong"),
(221207, "LA5562", 1510, "Moscow", "Hong Kong"),
(221207, "LA5562", 1510, "Moscow", "Vietnam")
(221207, "LA5562", 1510, "Moscow", "Japan")
(221207, "LA5562", 1510, "Moscow", "Japan"),
(221207, "LA5562", 1510, "Moscow", "Vietnam"),
(221207, "LA5562", 1510, "Moscow", "Vietnam"),
(221207, "LA5562", 1510, "Moscow", "Singapore"),
(221207, "LA5562", 1510, "Moscow", "Singapore"),
(221207, "LA5562", 1510, "Moscow", "Singapore"),
(221207, "LA5562", 1510, "Moscow", "Vietnam"),
(221207, "LA5562", 1510, "Moscow", "Vietnam"),(221207, "LA5562", 1510, "Moscow", "Rome"),
(221207, "LA5562", 1510, "Moscow", "Rome"),
(221207, "LA5562", 1510, "Moscow", "Rome"),
(221207, "LA5562", 1510, "Moscow", "Thailand"),
(221207, "LA5562", 1510, "Moscow", "Thailand"),
(221207, "LA5562", 1510, "Moscow", "Thailand"),
(221207, "LA5562", 1510, "Moscow", "Japan"),
(221207, "LA5562", 1510, "Moscow", "Japan"),
(221207, "LA5562", 1510, "Moscow", "Japan"),
(221207, "LA5562", 1510, "Moscow", "Korea"),
(221207, "LA5562", 1510, "Moscow", "Korea"),
(221207, "LA5562", 1510, "Moscow", "Korea"),
(221207, "LA5562", 1510, "Moscow", "Cambodia"),
(221207, "LA5562", 1510, "Moscow", "Cambodia"),
(221207, "LA5562", 1510, "Moscow", "Cambodia"),
(221207, "LA5562", 1510, "Moscow", "Cambodia"),
(221207, "LA5562", 1510, "Moscow", "Korea");
*/

/** insert into cloudflights (flight_date, flight_number, start_time, from_airport, destination) values
(221206, "BA7058", 1050, "Hong Kong", "Vietnam"), 
(221206, "BA7058", 1050, "Hong Kong", "Moscow"), 
(221206, "BA7058", 1050, "Hong Kong", "Vietnam"), 
(221206, "BA7058", 1050, "Hong Kong", "Rome"), 
(221206, "BA7058", 1050, "Hong Kong", "Cambodia"), 
(221206, "BA7058", 1050, "Hong Kong", "Japan"), 
(221206, "BA7058", 1050, "Hong Kong", "Rome"), 
(221206, "BA7058", 1050, "Hong Kong", "Thailand"),
(221206, "BA7058", 1050, "Hong Kong", "Korea"), 
(221206, "BA7058", 1050, "Hong Kong", "Singapore"), 
(221206, "BA7058", 1050, "Hong Kong", "Cambodia"), 
(221206, "BA7058", 1050, "Hong Kong", "Vietnam"), 
(221206, "BA7058", 1050, "Hong Kong", "Korea"), 
(221206, "BA7058", 1050, "Hong Kong", "Rome"),
(221206, "BA7058", 1050, "Hong Kong", "Japan"), 
(221206, "BA7058", 1050, "Hong Kong", "Singapore"), 
(221206, "BA7058", 1050, "Hong Kong", "Singapore"), 
(221206, "BA7058", 1050, "Hong Kong", "Thailand"), 
(221206, "BA7058", 1050, "Hong Kong", "Moscow"), 
(221207, "LA5562", 1510, "Moscow", "Hong Kong"),
(221207, "LA5562", 1510, "Moscow", "Hong Kong"),
(221207, "LA5562", 1510, "Moscow", "Hong Kong"),
(221207, "LA5562", 1510, "Moscow", "Hong Kong"),
(221207, "LA5562", 1510, "Moscow", "Vietnam"),
(221207, "LA5562", 1510, "Moscow", "Japan"),
(221207, "LA5562", 1510, "Moscow", "Japan"),
(221207, "LA5562", 1510, "Moscow", "Vietnam"),
(221207, "LA5562", 1510, "Moscow", "Vietnam"),
(221207, "LA5562", 1510, "Moscow", "Singapore"),
(221207, "LA5562", 1510, "Moscow", "Singapore"),
(221207, "LA5562", 1510, "Moscow", "Singapore"),
(221207, "LA5562", 1510, "Moscow", "Vietnam"),
(221207, "LA5562", 1510, "Moscow", "Vietnam"),
(221207, "LA5562", 1510, "Moscow", "Rome"),
(221207, "LA5562", 1510, "Moscow", "Rome"),
(221207, "LA5562", 1510, "Moscow", "Rome"),
(221207, "LA5562", 1510, "Moscow", "Thailand"),
(221207, "LA5562", 1510, "Moscow", "Thailand"),
(221207, "LA5562", 1510, "Moscow", "Thailand"),
(221207, "LA5562", 1510, "Moscow", "Japan"),
(221207, "LA5562", 1510, "Moscow", "Japan"),
(221207, "LA5562", 1510, "Moscow", "Japan"),
(221207, "LA5562", 1510, "Moscow", "Korea"),
(221207, "LA5562", 1510, "Moscow", "Korea"),
(221207, "LA5562", 1510, "Moscow", "Korea"),
(221207, "LA5562", 1510, "Moscow", "Cambodia"),
(221207, "LA5562", 1510, "Moscow", "Cambodia"),
(221207, "LA5562", 1510, "Moscow", "Cambodia"),
(221207, "LA5562", 1510, "Moscow", "Cambodia"),
(221207, "LA5562", 1510, "Moscow", "Korea");

*/


(221222, "LA5562", 1510, "Moscow"),
(221227, "OB1431", 1325, "Rome"),
(221229, "IB3266", 0915, "Rome"),
(221229, "SL3029", 2320, "Singapore"),
(221230, "LA5562", 1830, "Cambodia"), 
(230101, "SL3029", 0340, "Vietnam"),


(230101, "IB3266", 0710, "Japan"), 
(230101, "BA7058", 1050, "Hong Kong"); 
(230104, "IB3266", 0530, "Thailand"),
(230104, "BA7058", 1120, "Hong Kong"), 
(230111, "OB1431", 1650, "Korea"), 
(230120, "LA5562", 1910, "Cambodia", ""), 


date number start destnation 
Cambodia
Hong Kong
India
Japan
Korea
Laos
Myanmar
Singapore
Thailand
Vietnam
				