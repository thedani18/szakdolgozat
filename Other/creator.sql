CREATE TABLE szd_Jogosultsag (
    jogId INT NOT NULL PRIMARY KEY,
    jogosultsag VARCHAR(10) NOT NULL
);

CREATE TABLE szd_Felhasznalo (
	felhId INT NOT NULL PRIMARY KEY,
    felhnev VARCHAR(40) NOT NULL,
    salt VARCHAR(90) NOT NULL,
    jelszo VARCHAR(90) NOT NULL,
    jogId INT NOT NULL -- szd_Jogosultsag
    csaladnev VARCHAR(15) NOT NULL,
    utonev VARCHAR(25) NOT NULL,
    szulido DATE NOT NULL,
    szulhely VARCHAR(20) NOT NULL,
    FOREIGN KEY (jogId) REFERENCES szd_Jogosultsag(jogId)
);

CREATE TABLE szd_Osztaly (
	osztalyId INT NOT NULL PRIMARY KEY,
    megnevezes VARCHAR(6) NOT NULL,
    ofId INT NOT NULL, -- szd_Felhasznalo
    FOREIGN KEY (ofId) REFERENCES szd_Felhasznalo(felhId)
);

CREATE TABLE szd_DiakOsztaly (
	osztalyId INT NOT NULL, -- szd_Osztaly 
    diakId INT NOT NULL, -- szd_Felhasznalo
    FOREIGN KEY (osztalyId) REFERENCES szd_Osztaly(osztalyId),
    FOREIGN KEY (diakId) REFERENCES szd_Felhasznalo(felhId)
);

CREATE TABLE szd_Tantargy (
	tantargyId INT NOT NULL PRIMARY KEY,
    megnevezes VARCHAR(60) NOT NULL
);

CREATE TABLE szd_TgyTr (
	TTId INT NOT NULL PRIMARY KEY,
    tantargyId INT NOT NULL, -- szd_Tantargy
    tanarId INT NOT NULL, -- szd_Felhasznalo
    FOREIGN KEY (tantargyId) REFERENCES szd_Tantargy(tantargyId),
    FOREIGN KEY (tanarId) REFERENCES szd_Felhasznalo(felhId)
);

CREATE TABLE szd_OsztTgyTr (
	osztalyId INT NOT NULL, -- szd_Osztaly
    TTId INT NOT NULL -- szd_TgyTr
    FOREIGN KEY (osztalyId) REFERENCES szd_Osztaly(osztalyId),
    FOREIGN KEY (TTId) REFERENCES szd_TgyTr(TTId)
);

CREATE TABLE szd_JegyTipus (
	tipusId INT NOT NULL,
    suly VARCHAR(5) NOT NULL
);

CREATE TABLE szd_Beiras (
	beirasId INT NOT NULL PRIMARY KEY,
    datum DATE,
    tanarId INT NOT NULL, -- szd_Felhasznalo
    diakId INT NOT NULL, -- szd_Felhasznalo
    tantargyId INT NOT NULL, -- szd_Tantargy
    jegy INT NOT NULL,
    tipusId INT NOT NULL, -- szd_JegyTipus
    FOREIGN KEY (tanarId) REFERENCES szd_Felhasznalo(felhId),
    FOREIGN KEY (diakId) REFERENCES szd_Felhasznalo(felhId),
    FOREIGN KEY (tantargyId) REFERENCES szd_Tantargy(tantargyId),
    FOREIGN KEY (tipusId) REFERENCES szd_JegyTipus(tipusId)
);