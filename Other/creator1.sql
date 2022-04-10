CREATE DATABASE epenna;
USE epenna;

CREATE TABLE szd_jogosultsag (
    jogId INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    jogosultsag VARCHAR(10) NOT NULL
);

CREATE TABLE szd_felhasznalo (
	felhId INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    felhnev VARCHAR(40) NOT NULL,
    salt VARCHAR(90) NOT NULL,
    jelszo VARCHAR(90) NOT NULL,
    jogId INT NOT NULL, -- szd_Jogosultsag
    csaladnev VARCHAR(15) NOT NULL,
    utonev VARCHAR(25) NOT NULL,
    szulido DATE NOT NULL,
    szulhely VARCHAR(20) NOT NULL,
    FOREIGN KEY (jogId) REFERENCES szd_jogosultsag(jogId)
);

CREATE TABLE szd_osztaly (
	osztalyId INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    megnevezeselo INT NOT NULL,
    megnevezesuto VARCHAR(3) NOT NULL,
    ofId INT NOT NULL, -- szd_Felhasznalo
    FOREIGN KEY (ofId) REFERENCES szd_felhasznalo(felhId)
);

CREATE TABLE szd_diakosztaly (
	osztalyId INT NOT NULL, -- szd_Osztaly 
    diakId INT NOT NULL, -- szd_Felhasznalo
    FOREIGN KEY (osztalyId) REFERENCES szd_osztaly(osztalyId),
    FOREIGN KEY (diakId) REFERENCES szd_felhasznalo(felhId)
);

CREATE TABLE szd_tantargy (
	tantargyId INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    megnevezes VARCHAR(60) NOT NULL
);

CREATE TABLE szd_tgytr (
	TTId INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    tantargyId INT NOT NULL, -- szd_Tantargy
    tanarId INT NOT NULL, -- szd_Felhasznalo
    FOREIGN KEY (tantargyId) REFERENCES szd_tantargy(tantargyId),
    FOREIGN KEY (tanarId) REFERENCES szd_felhasznalo(felhId)
);

CREATE TABLE szd_oszttgytr (
	osztalyId INT NOT NULL, -- szd_Osztaly
    TTId INT NOT NULL, -- szd_TgyTr
    FOREIGN KEY (osztalyId) REFERENCES szd_osztaly(osztalyId),
    FOREIGN KEY (TTId) REFERENCES szd_tgytr(TTId)
);

CREATE TABLE szd_jegytipus (
	tipusId INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    suly VARCHAR(5) NOT NULL
);

CREATE TABLE szd_beiras (
	beirasId INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    datum DATE,
    tanarId INT NOT NULL, -- szd_Felhasznalo
    diakId INT NOT NULL, -- szd_Felhasznalo
    tantargyId INT NOT NULL, -- szd_Tantargy
    tema VARCHAR(200) NULL,
    jegy INT NOT NULL,
    tipusId INT NOT NULL, -- szd_JegyTipus
    FOREIGN KEY (tanarId) REFERENCES szd_felhasznalo(felhId),
    FOREIGN KEY (diakId) REFERENCES szd_felhasznalo(felhId),
    FOREIGN KEY (tantargyId) REFERENCES szd_tantargy(tantargyId),
    FOREIGN KEY (tipusId) REFERENCES szd_jegytipus(tipusId)
);