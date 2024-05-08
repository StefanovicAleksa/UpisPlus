-- Unos polova
INSERT INTO polovi (Ime) VALUES ('M'), ('Ž');

-- Unos upisnih rokova
INSERT INTO upisniRokovi (Ime) VALUES ('Prvi'), ('Drugi'), ('Treći');

-- Unos tipova fakulteta
INSERT INTO tipoviFakulteta (Ime) VALUES ('Državni'), ('Privatni');

-- Unos fakulteta
INSERT INTO fakulteti (Ime, ID_tipaFakulteta) VALUES
('Elektronski fakultet u Nišu', 1), 
('Fakultet organizacionih nauka', 1),
('Elektrotehnički fakultet u Beogradu', 1),
('Pravni fakultet u Beogradu', 1);

-- Unos smerova fakulteta
INSERT INTO smeroviFakulteta (Ime, ID_fakulteta) VALUES
('Informatički', 1), ('Energetski', 1), 
('Organizacioni', 2), ('Informatički', 2),
('Informatički', 3), ('Energetski', 3),
('Pravni', 4), ('Ekonomski', 4), ('Fizički', 4);

-- Unos generacija
INSERT INTO generacije (Ime) VALUES ('2003/2004'), ('2004/2005');

-- Unos smerova
INSERT INTO smerovi (Ime) VALUES
('Jezički'),
('Matematički'),
('Informatički'),
('Biohemijski');


-- Unos odeljenja
INSERT INTO odeljenja (Oznaka, ID_generacije, ID_smera) VALUES
(1, 1, 1), (2, 1, 2), (3, 1, 3), (4, 1, 4), 
(1, 2, 1), (2, 2, 2), (3, 2, 3), (4, 2, 4); 

-- Unos ucenika
-- Unos ucenika
INSERT INTO ucenici (JMBG, ImeIPrezime, ID_pola, ID_odeljenja) VALUES
('1111111111111', 'Ana Anić', 2, 1),
('2222222222222', 'Ivan Ivić', 1, 2),
('3333333333333', 'Petra Petrović', 2, 3),
('4444444444444', 'Nikola Nikolić', 1, 4),
('5555555555555', 'Jelena Jelić', 2, 5),
('6666666666666', 'Stefan Stefanović', 1, 6),
('7777777777777', 'Milica Milić', 2, 7),
('8888888888888', 'Vladimir Vladić', 1, 8),
('9999999999999', 'Marina Marić', 2, 1),
('1010101010101', 'Luka Lukić', 1, 2),
('1212121212121', 'Marija Marijić', 2, 3),
('1313131313131', 'Filip Filipović', 1, 4),
('1414141414141', 'Tamara Tamić', 2, 5),
('1515151515151', 'Stefana Stefanović', 2, 6),
('1616161616161', 'Nemanja Nemanjić', 1, 7),
('1717171717171', 'Jovica Jović', 1, 8),
('1818181818181', 'Milan Milanković', 1, 1),
('1919191919191', 'Katarina Katić', 2, 2),
('2020202020202', 'Dunja Dunjić', 2, 3),
('2121212121212', 'Branimir Branić', 1, 4),
('2222222222222', 'Mina Minić', 2, 5),
('2323232323232', 'Nikolina Nikolić', 2, 6),
('2424242424242', 'Đorđe Đorđević', 1, 7),
('2525252525252', 'Nevena Nevenić', 2, 8),
('2626262626262', 'Viktor Vuković', 1, 1),
('2727272727272', 'Andrea Anđelić', 2, 2),
('2828282828282', 'Nina Ninčević', 2, 3),
('2929292929292', 'Miloš Milošević', 1, 4),
('3030303030303', 'Sara Sarić', 2, 5),
('3131313131313', 'Lazar Lazić', 1, 6),
('3232323232323', 'Milena Milićević', 2, 7),
('3333333333333', 'Stefanija Stefanović', 2, 8),
('3434343434343', 'Aleksandar Aleksić', 1, 1),
('3535353535353', 'Jana Janković', 2, 2),
('3636363636363', 'Stefan Stojanović', 1, 3),
('3737373737373', 'Maša Mašić', 2, 4),
('3838383838383', 'Dunja Đorđević', 2, 5),
('3939393939393', 'Miloš Milanović', 1, 6),
('4040404040404', 'Marijana Marković', 2, 7),
('4141414141414', 'Milica Milenković', 2, 8),
('4242424242424', 'Nikola Nikolić', 1, 1),
('4343434343434', 'Mina Minić', 2, 2),
('4444444444444', 'Aleksa Aleksić', 1, 3),
('4545454545454', 'Teodora Teodorović', 2, 4),
('4646464646464', 'Vladimir Vukić', 1, 5),
('4747474747474', 'Ana Anđelić', 2, 6),
('4848484848484', 'Jovana Jović', 2, 7),
('4949494949494', 'Miloš Milenković', 1, 8),
('5050505050505', 'Petar Petrović', 1, 1),
('5151515151515', 'Jelena Jović', 2, 2),
('5252525252525', 'Stefan Stefanović', 1, 3),
('5353535353535', 'Milica Milenković', 2, 4),
('5454545454545', 'Nikola Nikolić', 1, 5),
('5555555555555', 'Jovana Jović', 2, 6),
('5656565656565', 'Milan Milenković', 1, 7),
('5757575757575', 'Stefan Stefanović', 1, 8),
('5858585858585', 'Marija Marić', 2, 1),
('5959595959595', 'Nikola Nikolić', 1, 2);


-- Unos upisa
INSERT INTO upisi (Godina, ID_upisnogRoka, ID_ucenika, ID_smeraFakulteta) VALUES
(YEAR(CURDATE()), 1, 3, 3),
(YEAR(CURDATE()), 1, 4, 4),
(YEAR(CURDATE()), 1, 5, 5),
(YEAR(CURDATE()), 1, 6, 6),
(YEAR(CURDATE()), 1, 7, 7),
(YEAR(CURDATE()), 1, 8, 8),
(YEAR(CURDATE()), 1, 9, 1),
(YEAR(CURDATE()), 1, 10, 2),
(YEAR(CURDATE()), 1, 11, 3),
(YEAR(CURDATE()), 1, 12, 4),
(YEAR(CURDATE()), 1, 13, 5),
(YEAR(CURDATE()), 1, 14, 6),
(YEAR(CURDATE()), 1, 15, 7),
(YEAR(CURDATE()), 1, 16, 8),
(YEAR(CURDATE()), 1, 17, 1),
(YEAR(CURDATE()), 1, 18, 2),
(YEAR(CURDATE()), 1, 19, 3),
(YEAR(CURDATE()), 1, 20, 4),
(YEAR(CURDATE()), 1, 21, 5),
(YEAR(CURDATE()), 1, 22, 6),
(YEAR(CURDATE()), 1, 23, 7),
(YEAR(CURDATE()), 1, 24, 8),
(YEAR(CURDATE()), 1, 25, 1),
(YEAR(CURDATE()), 1, 26, 2),
(YEAR(CURDATE()), 1, 27, 3),
(YEAR(CURDATE()), 1, 28, 4),
(YEAR(CURDATE()), 1, 29, 5),
(YEAR(CURDATE()), 1, 30, 6),
(YEAR(CURDATE()), 1, 31, 7),
(YEAR(CURDATE()), 1, 32, 8),
(YEAR(CURDATE()), 1, 33, 1),
(YEAR(CURDATE()), 1, 34, 2),
(YEAR(CURDATE()), 1, 35, 3),
(YEAR(CURDATE()), 1, 36, 4),
(YEAR(CURDATE()), 1, 37, 5),
(YEAR(CURDATE()), 1, 38, 6),
(YEAR(CURDATE()), 1, 39, 7),
(YEAR(CURDATE()), 1, 40, 8),
(YEAR(CURDATE()), 1, 41, 1),
(YEAR(CURDATE()), 1, 42, 2),
(YEAR(CURDATE()), 1, 43, 3),
(YEAR(CURDATE()), 1, 44, 4),
(YEAR(CURDATE()), 1, 45, 5),
(YEAR(CURDATE()), 1, 46, 6),
(YEAR(CURDATE()), 1, 47, 7),
(YEAR(CURDATE()), 1, 48, 8),
(YEAR(CURDATE()), 1, 49, 1),
(YEAR(CURDATE()), 1, 50, 2),
(YEAR(CURDATE()), 1, 51, 3),
(YEAR(CURDATE()), 1, 52, 4),
(YEAR(CURDATE()), 1, 53, 5),
(YEAR(CURDATE()), 1, 54, 6),
(YEAR(CURDATE()), 1, 55, 7),
(YEAR(CURDATE()), 1, 56, 8),
(YEAR(CURDATE()), 1, 57, 1);

