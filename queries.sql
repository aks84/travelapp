CREATE TABLE `travelapp`.`travels` (`id` SMALLINT NOT NULL AUTO_INCREMENT , `froms` VARCHAR(100) NOT NULL , `tos` VARCHAR(100) NOT NULL , `d_date` DATE NOT NULL , `a_date` DATE NOT NULL , `vehicle_type` VARCHAR(40) NOT NULL , `persons` TINYINT NOT NULL , `price` FLOAT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

INSERT INTO `travels` (`id`, `froms`, `tos`, `d_date`, `a_date`, `vehicle_type`, `persons`, `price`) VALUES (NULL, 'Delhi', 'Mumbai', '2023-08-31', '2023-09-05', 'Bus', '2', '2500');





INSERT INTO `travels` (`id`, `froms`, `tos`, `thumbnail`, `d_date`, `a_date`, `vehicle_type`, `persons`, `price`) VALUES 
(NULL, 'indore', 'nagpur', 'indore-to-nagpur.png', '2023-08-20', '2023-08-23', 'Bus', '2', '2200'),
(NULL, 'thane', 'bhopal', 'thane-to-bhopal.png', '2023-08-20', '2023-08-23', 'Bus', '2', '2200'),
(NULL, 'agra', 'meerut', 'Agra-to-meerut.png', '2023-08-20', '2023-08-23', 'Bus', '2', '2200'),
(NULL, 'rajkot', 'varansi', 'rajkot-to-varansi.png', '2023-08-20', '2023-08-23', 'Bus', '2', '2200'),
(NULL, 'delhi', 'mathura', 'delhi-to-mathura.png', '2023-08-20', '2023-08-23', 'Bus', '2', '2200'),
(NULL, 'srinagar', 'amitsar', 'srinagar-to-amitsar.png', '2023-08-20', '2023-08-23', 'Bus', '2', '2200'),
(NULL, 'delhi', 'lucknow', 'delhi-to-lucknow.png', '2023-08-20', '2023-08-23', 'Bus', '2', '2200'),
(NULL, 'Surat', 'Pune', 'surat-to-pune.png', '2023-08-20', '2023-08-23', 'Bus', '2', '2200'),
(NULL, 'Surat', 'Pune', 'surat-to-pune.png', '2023-08-20', '2023-08-23', 'Bus', '2', '2200'),
(NULL, 'Surat', 'Pune', 'surat-to-pune.png', '2023-08-20', '2023-08-23', 'Bus', '2', '2200'),
(NULL, 'Surat', 'Pune', 'surat-to-pune.png', '2023-08-20', '2023-08-23', 'Bus', '2', '2200'),
(NULL, 'Surat', 'Pune', 'surat-to-pune.png', '2023-08-20', '2023-08-23', 'Bus', '2', '2200'),
(NULL, 'Surat', 'Pune', 'surat-to-pune.png', '2023-08-20', '2023-08-23', 'Bus', '2', '2200'),
(NULL, 'Surat', 'Pune', 'surat-to-pune.png', '2023-08-20', '2023-08-23', 'Bus', '2', '2200'),
(NULL, 'Surat', 'Pune', 'surat-to-pune.png', '2023-08-20', '2023-08-23', 'Bus', '2', '2200'),
(NULL, 'Surat', 'Pune', 'surat-to-pune.png', '2023-08-20', '2023-08-23', 'Bus', '2', '2200'),
(NULL, 'Surat', 'Pune', 'surat-to-pune.png', '2023-08-20', '2023-08-23', 'Bus', '2', '2200'),
(NULL, 'Surat', 'Pune', 'surat-to-pune.png', '2023-08-20', '2023-08-23', 'Bus', '2', '2200'),
(NULL, 'Surat', 'Pune', 'surat-to-pune.png', '2023-08-20', '2023-08-23', 'Bus', '2', '2200'),
(NULL, 'Surat', 'Pune', 'surat-to-pune.png', '2023-08-20', '2023-08-23', 'Bus', '2', '2200'),
(NULL, 'Surat', 'Pune', 'surat-to-pune.png', '2023-08-20', '2023-08-23', 'Bus', '2', '2200'),
(NULL, 'Surat', 'Pune', 'surat-to-pune.png', '2023-08-20', '2023-08-23', 'Bus', '2', '2200')

;