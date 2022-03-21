CREATE TABLE szd_Felhasznalo (
	felhId INT NOT NULL PRIMARY KEY,
    felhnev VARCHAR(40) NOT NULL,
    jelszo VARCHAR(200) NOT NULL,
    salt VARCHAR(16) NOT NULL
);

CREATE TABLE szd_Info (
	infoID INT NOT NULL PRIMARY KEY,
    csaladnev VARCHAR(15) NOT NULL,
    utonev VARCHAR(25) NOT NULL,
    szulido DATE NOT NULL,
    szulhely VARCHAR(20) NOT NULL
);

CREATE TABLE szd_Diak (
	diakId INT NOT NULL PRIMARY KEY,
    infoId INT NOT NULL, -- szd_Info
    felhId INT NOT NULL, -- szd_Felhasznalo
    osztalyId INT NOT NULL -- szd_Osztaly
);

CREATE TABLE szd_Tanar (
	tanarId INT NOT NULL PRIMARY KEY,
    infoId INT NOT NULL, -- szd_Info
    felhID INT NOT NULL -- szd_Felhasznalo
);

CREATE TABLE szd_Osztaly (
	osztalyId INT NOT NULL PRIMARY KEY,
    megnevezes VARCHAR(6) NOT NULL,
    tanarId INT NOT NULL -- szd_Tanar
);

CREATE TABLE szd_TgyTr (
	TTId INT NOT NULL PRIMARY KEY,
    tantargyId INT NOT NULL, -- szd_Tantargy
    tanarId INT NOT NULL -- szd_Tanar
);

CREATE TABLE szd_OsztTgyTr (
	osztalyId INT NOT NULL, -- szd_Osztaly
    TTId INT NOT NULL -- szd_TgyTr
);

CREATE TABLE szd_Tantargy (
	tantargyId INT NOT NULL PRIMARY KEY,
    megnevezes VARCHAR(60) NOT NULL
);

CREATE TABLE szd_Beiras (
	beirasId INT NOT NULL PRIMARY KEY,
    datum DATE,
    tanarId INT NOT NULL, -- szd_Tanar
    diakId INT NOT NULL, -- szd_Diak
    tantargyId INT NOT NULL, -- szd_Tantargy
    jegy INT NOT NULL,
    tipusId INT NOT NULL -- szd_JegyTipus
);

CREATE TABLE szd_JegyTipus (
	tipusId INT NOT NULL,
    suly INT NOT NULL
);