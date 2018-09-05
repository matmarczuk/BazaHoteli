
delete from Pobyt;
delete from Zamowienie;
delete from Pokoj;
delete from Pietro;
delete from WidokZOkna;
delete from StandardPokoju;
delete from Menedzer;
delete from Pracownik;
delete from Hotel;
delete from Klient;

alter table Hotel auto_increment = 1; 

INSERT INTO `Hotel` (nazwa, lokalizacja, adres_miasto, `adres_kodPocztowy`, adres_ulica, adres_nrBudynku) VALUES ('Górski Potok','Góry','Zakopane',82931,'Lipcowa',23);
INSERT INTO `Hotel` (nazwa, lokalizacja, adres_miasto, `adres_kodPocztowy`, adres_ulica, adres_nrBudynku) VALUES ('Raj nad jeziorem', 'Mazury','Giżycko',47189,'Lodowcowa',29);
INSERT INTO `Hotel` (nazwa, lokalizacja, adres_miasto, `adres_kodPocztowy`, adres_ulica, adres_nrBudynku) VALUES ('Morska Bryza','Morze','Władysławowo',38911,'Słona',422);
INSERT INTO `Hotel` (nazwa, lokalizacja, adres_miasto, `adres_kodPocztowy`, adres_ulica, adres_nrBudynku) VALUES ('Śnieżka','Góry','Bukowina Tatrzańska',82121,'Czerwińska',54);
INSERT INTO `Hotel` (nazwa, lokalizacja, adres_miasto, `adres_kodPocztowy`, adres_ulica, adres_nrBudynku) VALUES ('Srebrna toń','Mazury','Orzysz',71287,'Lotna',52);


SELECT * FROM `Hotel`;


alter table Klient auto_increment = 1;

INSERT INTO `Klient` (adresMailowy, imie, nazwisko, nrDowodu, adres_miasto, `adres_kodPocztowy`, adres_ulica, adres_nrBudynku) VALUES ('jeff@bezos.com','Jeff','Bezos','ABC813791','Seattle',290,'Morelowa',23);
INSERT INTO `Klient` (adresMailowy, imie, nazwisko, nrDowodu, adres_miasto, `adres_kodPocztowy`, adres_ulica, adres_nrBudynku) VALUES ('Bill@Gates.com','Bill','Gates','ABC128947','Washington',214,'Koralowa',4);
INSERT INTO `Klient` (adresMailowy, imie, nazwisko, nrDowodu, adres_miasto, `adres_kodPocztowy`, adres_ulica, adres_nrBudynku) VALUES ('warren@buffett.net','Warren','Buffett','DHR263973','New York',3819,'Kubkowa',11);
INSERT INTO `Klient` (adresMailowy, imie, nazwisko, nrDowodu, adres_miasto, `adres_kodPocztowy`, adres_ulica, adres_nrBudynku) VALUES ('bernard@arnault.com','Bernard','Arnault','FRA287390','Paris',133,'Angielska',142);
INSERT INTO `Klient` (adresMailowy, imie, nazwisko, nrDowodu, adres_miasto, `adres_kodPocztowy`, adres_ulica, adres_nrBudynku) VALUES ('mark@facebook.com','Mark','Zuckerberg','FAC281947','Chicago',1892,'Bloombegr',213);
INSERT INTO `Klient` (adresMailowy, imie, nazwisko, nrDowodu, adres_miasto, `adres_kodPocztowy`, adres_ulica, adres_nrBudynku) VALUES ('liliane@bettencourt.com','Liliane','Bettencourt','ABC1253645','Marsylia',221,'Wrzosowa',213);
INSERT INTO `Klient` (adresMailowy, imie, nazwisko, nrDowodu, adres_miasto, `adres_kodPocztowy`, adres_ulica, adres_nrBudynku) VALUES ('amancio@ortega.com','Amancia','Ortega','ABC132453','Barcelona',234,'Piękna',213);
INSERT INTO `Klient` (adresMailowy, imie, nazwisko, nrDowodu, adres_miasto, `adres_kodPocztowy`, adres_ulica, adres_nrBudynku) VALUES ('carlos@slim.com','Carlos','Helu','ABC879363','Meksyk',145,'Zielona',7656);
INSERT INTO `Klient` (adresMailowy, imie, nazwisko, nrDowodu, adres_miasto, `adres_kodPocztowy`, adres_ulica, adres_nrBudynku) VALUES ('charles@kochcom','Charles','Koch','ABC835267','San Francisco',547,'Górska',52);
INSERT INTO `Klient` (adresMailowy, imie, nazwisko, nrDowodu, adres_miasto, `adres_kodPocztowy`, adres_ulica, adres_nrBudynku) VALUES ('david@koch.com','David','Koch','ABC835267','San Francisco',547,'Górska',52);
INSERT INTO `Klient` (adresMailowy, imie, nazwisko, nrDowodu, adres_miasto, `adres_kodPocztowy`, adres_ulica, adres_nrBudynku) VALUES ('larry@ellison.com','Larry','Ellison','ABC345383','Detroit',335,'Lekka',1);

alter table Pracownik auto_increment = 1;

INSERT INTO `Pracownik` (nazwisko, imie, PESEL, pensja, adres_miasto, `adres_kodPocztowy`, adres_ulica, adres_nrBudynku, Hotel_idHotel) VALUES ('Zarzycki','Zbigniew',012298439,4500,NULL,NULL,NULL,NULL, 1);
INSERT INTO `Pracownik` (nazwisko, imie, PESEL, pensja, adres_miasto, `adres_kodPocztowy`, adres_ulica, adres_nrBudynku, Hotel_idHotel) VALUES ('Wiśniewski','Arkadiusz',122891898,4700,NULL,NULL,NULL,NULL, 2);
INSERT INTO `Pracownik` (nazwisko, imie, PESEL, pensja, adres_miasto, `adres_kodPocztowy`, adres_ulica, adres_nrBudynku, Hotel_idHotel) VALUES ('Szymański','Grzegorz',070819829,4600,NULL,NULL,NULL,NULL, 3);
INSERT INTO `Pracownik` (nazwisko, imie, PESEL, pensja, adres_miasto, `adres_kodPocztowy`, adres_ulica, adres_nrBudynku, Hotel_idHotel) VALUES ('Sodyl','Mariusz',030492839,4500,NULL,NULL,NULL,NULL,4);
INSERT INTO `Pracownik` (nazwisko, imie, PESEL, pensja, adres_miasto, `adres_kodPocztowy`, adres_ulica, adres_nrBudynku, Hotel_idHotel) VALUES ('Paszkiewicz','Romuald',060529829,4600,NULL,NULL,NULL,NULL,5);

INSERT INTO Menedzer VALUES (5);
INSERT INTO Menedzer VALUES (1);
INSERT INTO Menedzer VALUES (2);
INSERT INTO Menedzer VALUES (3);
INSERT INTO Menedzer VALUES (4);

SELECT * FROM Menedzer;

alter table Pietro auto_increment = 1;

INSERT INTO Pietro (Hotel_idHotel, ktorePietro) VALUES ( 5, 0);
INSERT INTO Pietro (Hotel_idHotel, ktorePietro) VALUES ( 5, 1);
INSERT INTO Pietro (Hotel_idHotel, ktorePietro) VALUES ( 5, 2);
INSERT INTO Pietro (Hotel_idHotel, ktorePietro) VALUES ( 5, 3);
INSERT INTO Pietro (Hotel_idHotel, ktorePietro) VALUES ( 1, 0);
INSERT INTO Pietro (Hotel_idHotel, ktorePietro) VALUES ( 1, 1);
INSERT INTO Pietro (Hotel_idHotel, ktorePietro) VALUES ( 1, 2);
INSERT INTO Pietro (Hotel_idHotel, ktorePietro) VALUES ( 2, 0);
INSERT INTO Pietro (Hotel_idHotel, ktorePietro) VALUES ( 2, 1);
INSERT INTO Pietro (Hotel_idHotel, ktorePietro) VALUES ( 2, 2);
INSERT INTO Pietro (Hotel_idHotel, ktorePietro) VALUES ( 2, 3);
INSERT INTO Pietro (Hotel_idHotel, ktorePietro) VALUES ( 3, 0);
INSERT INTO Pietro (Hotel_idHotel, ktorePietro) VALUES ( 3, 1);
INSERT INTO Pietro (Hotel_idHotel, ktorePietro) VALUES ( 4, 0);
INSERT INTO Pietro (Hotel_idHotel, ktorePietro) VALUES ( 4, 1);
INSERT INTO Pietro (Hotel_idHotel, ktorePietro) VALUES ( 4, 2);
SELECT * FROM Pietro;

delete from Sezon;
alter table Sezon auto_increment = 1;

INSERT INTO Sezon (miesiac_od, miesiac_do) VALUES ( 1, 4);
INSERT INTO Sezon (miesiac_od, miesiac_do) VALUES ( 5, 8);
INSERT INTO Sezon (miesiac_od, miesiac_do) VALUES ( 9, 12);

SELECT * FROM `Sezon`;

delete from Rezerwacja;
alter table Rezerwacja auto_increment = 1;

INSERT INTO Rezerwacja VALUES ();
INSERT INTO Rezerwacja VALUES ();
INSERT INTO Rezerwacja VALUES ();
INSERT INTO Rezerwacja VALUES ();
INSERT INTO Rezerwacja VALUES ();
INSERT INTO Rezerwacja VALUES ();
INSERT INTO Rezerwacja VALUES ();
INSERT INTO Rezerwacja VALUES ();
INSERT INTO Rezerwacja VALUES ();
INSERT INTO Rezerwacja VALUES ();

SELECT * FROM Rezerwacja;

alter table StandardPokoju auto_increment = 1;

INSERT INTO `StandardPokoju` (udogodnienia, liczbaPomieszczen, StandardPokoju, maxLiczbaOsob) VALUES ( 'Standardowe wyposazenie+aneks kuchenny', 2, 'Apartament', 5);
INSERT INTO `StandardPokoju` (udogodnienia, liczbaPomieszczen, StandardPokoju, maxLiczbaOsob) VALUES ( 'Przystosowany dla rodzin(wieksza szafa itp.)', 1, 'Rodzinny', 4);
INSERT INTO `StandardPokoju` (udogodnienia, liczbaPomieszczen, StandardPokoju, maxLiczbaOsob) VALUES ( 'Standardowe: łozko, szafa, stol, lazienka', 1, 'Standard', 2);

SELECT * FROM `StandardPokoju`;



INSERT INTO `WidokZOkna` VALUES (4, 'Widok na morze');
INSERT INTO `WidokZOkna` VALUES (1, 'Widok na jezioro');
INSERT INTO `WidokZOkna` VALUES (2, 'Widok na gory');
INSERT INTO `WidokZOkna` VALUES (3, 'Widok na miasto');

SELECT * FROM `WidokZOkna`;

alter table Pokoj auto_increment = 1;

INSERT INTO Pokoj (StandardPokoju_idStandardPokoju, Pietro_idPietro, WidokZOkna_idWidokZOkna, Rezerwacja_idRezerwacja, Cena, Rabat_kod) VALUES ( 1, 3, 1, 10, 200, NULL);
INSERT INTO Pokoj (StandardPokoju_idStandardPokoju, Pietro_idPietro, WidokZOkna_idWidokZOkna, Rezerwacja_idRezerwacja, Cena, Rabat_kod) VALUES ( 2, 2, 1, 1, 150, NULL);
INSERT INTO Pokoj (StandardPokoju_idStandardPokoju, Pietro_idPietro, WidokZOkna_idWidokZOkna, Rezerwacja_idRezerwacja, Cena, Rabat_kod) VALUES ( 3, 1, 3, 2, 100, NULL);
INSERT INTO Pokoj (StandardPokoju_idStandardPokoju, Pietro_idPietro, WidokZOkna_idWidokZOkna, Rezerwacja_idRezerwacja, Cena, Rabat_kod) VALUES ( 3, 4, 1, NULL, 80, NULL);
INSERT INTO Pokoj (StandardPokoju_idStandardPokoju, Pietro_idPietro, WidokZOkna_idWidokZOkna, Rezerwacja_idRezerwacja, Cena, Rabat_kod) VALUES ( 1, 6, 3, 4, 180, NULL);
INSERT INTO Pokoj (StandardPokoju_idStandardPokoju, Pietro_idPietro, WidokZOkna_idWidokZOkna, Rezerwacja_idRezerwacja, Cena, Rabat_kod) VALUES ( 2, 5, 2, NULL, 120, NULL);
INSERT INTO Pokoj (StandardPokoju_idStandardPokoju, Pietro_idPietro, WidokZOkna_idWidokZOkna, Rezerwacja_idRezerwacja, Cena, Rabat_kod) VALUES ( 3, 7, 3, 6, 100, NULL);
INSERT INTO Pokoj (StandardPokoju_idStandardPokoju, Pietro_idPietro, WidokZOkna_idWidokZOkna, Rezerwacja_idRezerwacja, Cena, Rabat_kod) VALUES ( 1, 8, 1, 7, 210, NULL);
INSERT INTO Pokoj (StandardPokoju_idStandardPokoju, Pietro_idPietro, WidokZOkna_idWidokZOkna, Rezerwacja_idRezerwacja, Cena, Rabat_kod) VALUES ( 2, 9, 1, NULL, 150, NULL);
INSERT INTO Pokoj (StandardPokoju_idStandardPokoju, Pietro_idPietro, WidokZOkna_idWidokZOkna, Rezerwacja_idRezerwacja, Cena, Rabat_kod) VALUES ( 3, 10, 3, 9, 50, NULL);
INSERT INTO Pokoj (StandardPokoju_idStandardPokoju, Pietro_idPietro, WidokZOkna_idWidokZOkna, Rezerwacja_idRezerwacja, Cena, Rabat_kod) VALUES ( 3, 14, 2, 3, 60, NULL);
INSERT INTO Pokoj (StandardPokoju_idStandardPokoju, Pietro_idPietro, WidokZOkna_idWidokZOkna, Rezerwacja_idRezerwacja, Cena, Rabat_kod) VALUES ( 1, 11, 1, NULL, 180, NULL);
INSERT INTO Pokoj (StandardPokoju_idStandardPokoju, Pietro_idPietro, WidokZOkna_idWidokZOkna, Rezerwacja_idRezerwacja, Cena, Rabat_kod) VALUES ( 2, 12, 4, 5, 140, NULL);
INSERT INTO Pokoj (StandardPokoju_idStandardPokoju, Pietro_idPietro, WidokZOkna_idWidokZOkna, Rezerwacja_idRezerwacja, Cena, Rabat_kod) VALUES ( 1, 15, 2, NULL, 200, NULL);
INSERT INTO Pokoj (StandardPokoju_idStandardPokoju, Pietro_idPietro, WidokZOkna_idWidokZOkna, Rezerwacja_idRezerwacja, Cena, Rabat_kod) VALUES ( 2, 16, 3, 8, 100, NULL);
INSERT INTO Pokoj (StandardPokoju_idStandardPokoju, Pietro_idPietro, WidokZOkna_idWidokZOkna, Rezerwacja_idRezerwacja, Cena, Rabat_kod) VALUES ( 3, 13, 3, NULL, 90, NULL);

SELECT * FROM Pokoj;

alter table Zamowienie auto_increment = 1;

INSERT INTO Zamowienie (data_od, data_do, cena, Klient_idKlient, Rezerwacja_idRezerwacja, Pokoj_nrPokoju) VALUES ( '2018-05-3', '2018-05-5', 800, 10, 10, 1);
INSERT INTO Zamowienie (data_od, data_do, cena, Klient_idKlient, Rezerwacja_idRezerwacja, Pokoj_nrPokoju) VALUES ( '2018-06-15','2018-06-18', 2000, 1, 1, 2);
INSERT INTO Zamowienie (data_od, data_do, cena, Klient_idKlient, Rezerwacja_idRezerwacja, Pokoj_nrPokoju) VALUES ( '2018-05-16','2018-05-20', 1000, 2, 2, 3);
INSERT INTO Zamowienie (data_od, data_do, cena, Klient_idKlient, Rezerwacja_idRezerwacja, Pokoj_nrPokoju) VALUES ( '2018-06-22','2018-06-25', 600, 3, 3, 11);
INSERT INTO Zamowienie (data_od, data_do, cena, Klient_idKlient, Rezerwacja_idRezerwacja, Pokoj_nrPokoju) VALUES ( '2018-06-16','2018-06-17', 200, 4, 4, 5);
INSERT INTO Zamowienie (data_od, data_do, cena, Klient_idKlient, Rezerwacja_idRezerwacja, Pokoj_nrPokoju) VALUES ( '2018-07-06','2018-07-12', 1600, 5, 5, 13);
INSERT INTO Zamowienie (data_od, data_do, cena, Klient_idKlient, Rezerwacja_idRezerwacja, Pokoj_nrPokoju) VALUES ( '2018-07-23','2018-07-28', 1000, 6, 6, 7);
INSERT INTO Zamowienie (data_od, data_do, cena, Klient_idKlient, Rezerwacja_idRezerwacja, Pokoj_nrPokoju) VALUES ( '2018-08-10','2018-08-14', 900, 7, 7, 8);
INSERT INTO Zamowienie (data_od, data_do, cena, Klient_idKlient, Rezerwacja_idRezerwacja, Pokoj_nrPokoju) VALUES ( '2018-08-25','2018-08-26', 300, 8, 8, 15);
INSERT INTO Zamowienie (data_od, data_do, cena, Klient_idKlient, Rezerwacja_idRezerwacja, Pokoj_nrPokoju) VALUES ( '2018-08-30','2018-08-31', 300, 9, 9, 10);

SELECT * FROM Zamowienie;

alter table Pobyt auto_increment = 1;

INSERT INTO Pobyt (dataRozpoczecia, dataZakonczenia, Zamowienie_idZamowienie) VALUES ('2018-06-15','2018-06-18',1);
INSERT INTO Pobyt (dataRozpoczecia, dataZakonczenia, Zamowienie_idZamowienie) VALUES ('2018-05-16','2018-05-20',2);
INSERT INTO Pobyt (dataRozpoczecia, dataZakonczenia, Zamowienie_idZamowienie) VALUES ('2018-07-06','2018-07-12',5);
INSERT INTO Pobyt (dataRozpoczecia, dataZakonczenia, Zamowienie_idZamowienie) VALUES ('2018-06-16','2018-06-17',4);
INSERT INTO Pobyt (dataRozpoczecia, dataZakonczenia, Zamowienie_idZamowienie) VALUES ('2018-08-10','2018-08-14',7);
INSERT INTO Pobyt (dataRozpoczecia, dataZakonczenia, Zamowienie_idZamowienie) VALUES ('2018-07-23','2018-07-28',6);
INSERT INTO Pobyt (dataRozpoczecia, dataZakonczenia, Zamowienie_idZamowienie) VALUES ('2018-08-31','2018-09-02',9);
INSERT INTO Pobyt (dataRozpoczecia, dataZakonczenia, Zamowienie_idZamowienie) VALUES ('2018-06-22','2018-06-25',3);
INSERT INTO Pobyt (dataRozpoczecia, dataZakonczenia, Zamowienie_idZamowienie) VALUES ('2018-08-25','2018-08-26',8);

SELECT * FROM Pobyt;





