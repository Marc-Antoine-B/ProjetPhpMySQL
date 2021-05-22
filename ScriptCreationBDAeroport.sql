//**DROP DATABASE IF EXISTS BdAeroport;
CREATE DATABASE IF NOT EXISTS BdAeroport;**/

CREATE TABLE tblPays
(
	codePays CHAR(2) 			NOT NULL,
	nomPays VARCHAR(30)			NOT NULL
);

CREATE TABLE tblClient
(
	noClient INTEGER(11)		NOT NULL,
	nomClient VARCHAR(25)		NOT NULL,
	prenomClient VARCHAR(25)	NOT NULL,
	noTelClient VARCHAR(14) 	NOT NULL,
	adresseClient VARCHAR(50)	NOT NULL,
	escompte DECIMAL(2,2)		NOT NULL	
);

CREATE TABLE tblClasseBillet
(
	codeClasse CHAR(2)			NOT NULL,
	nomClasse VARCHAR(20)		NOT NULL
);

CREATE TABLE tblCompagnieAerienne
(
	codeCie CHAR(2)				NOT NULL,
	nomCie VARCHAR(20)			NOT NULL
);

CREATE TABLE tblTypeAppareil
(
	codeTypeAppareil VARCHAR(15)	NOT NULL,
	descTypeAppareil VARCHAR(20)	NOT NULL,
	vitesseCroissier SMALLINT(6)	NOT NULL,
	autonomieVol SMALLINT(6)		NOT NULL,
	nbSieges SMALLINT(6)			NOT NULL
);

CREATE TABLE tblVille
(
	codeVille CHAR(3) 			NOT NULL,
	nomVille VARCHAR(50) 		NOT NULL,
	codePays CHAR(2) 			NOT NULL
);

CREATE TABLE tblAeroport
(
	codeAeroport CHAR(3) 		NOT NULL,
	nomAeroport VARCHAR(50)		NOT NULL,
	noTelAeroport VARCHAR(14)	NULL,
	HeureGmt SMALLINT(6)		NULL,
	aeroportDepart CHAR(3)		NOT NULL,
	aeroportArrivee CHAR(3)		NOT NULL,
	codeVille CHAR(3) 			NOT NULL
);

CREATE TABLE tblVol
(
	noVol CHAR(5)				NOT NULL,
	heureDepart TIME(6)			NOT NULL,
	heureArrivee TIME(6)		NOT NULL,
	distanceTokm SMALLINT(6)	NOT NULL,
    dureeTotalVol TINYINT(4)    NOT NULL,
	codeTypeAppareil VARCHAR(15)	NOT NULL,
	codeCie CHAR(2)				NOT NULL
);

CREATE TABLE tblBillet
(
	noBillet INTEGER(11)		NOT NULL,
	noVol CHAR(5)				NOT NULL,
	dateVol DATE				NOT NULL,
	noSiege VARCHAR(4) 			NOT NULL,
	codeClasse CHAR(2)			NOT NULL,
	prixBillet DECIMAL(6,2)		NOT NULL,
	typeRepas VARCHAR(30)		NOT NULL,
	noReservation INTEGER(11)	NOT NULL	
);

CREATE TABLE tblReservation
(
	noReservation INTEGER(11)	NOT NULL,
	dateReservation DATE		NOT NULL,
	statuReservation VARCHAR(15)NOT NULL,
	modePaiement VARCHAR(20)	NOT NULL,
	statuPaiement VARCHAR(9)	NOT NULL,
	noClient INTEGER(11)		NOT NULL	
);

CREATE TABLE tblUsagers
(
    nomUsager   VARCHAR(25)     NOT NULL,
    pwdUsager   CHAR(8)         NOT NULL,
    prenomUtilisateur   VARCHAR(20)    NOT NULL,
    nomUtilisateur  VARCHAR(25) NOT NULL,
    dateCreation    DATE        NOT NULL
);
