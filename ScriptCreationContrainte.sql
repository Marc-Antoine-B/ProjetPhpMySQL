ALTER TABLE tblVille ADD PRIMARY KEY (codeVille);
ALTER TABLE tblPays ADD PRIMARY KEY (codePays);
ALTER TABLE tblAeroport ADD PRIMARY KEY (codeAeroport);
ALTER TABLE tblVol ADD PRIMARY KEY (noVol);
ALTER TABLE tblReservation ADD PRIMARY KEY (noReservation);
ALTER TABLE tblBillet ADD PRIMARY KEY (noBillet);
ALTER TABLE tblClient ADD PRIMARY KEY (noClient);
ALTER TABLE tblClasseBillet ADD PRIMARY KEY (codeClasse);
ALTER TABLE tblCompagnieAerienne ADD PRIMARY KEY (codeCie);
ALTER TABLE tblTypeAppareil ADD PRIMARY KEY (codeTypeAppareil);
ALTER TABLE tblUsagers ADD PRIMARY KEY (nomUsager);

ALTER TABLE tblAeroport ADD FOREIGN KEY (codeVille) REFERENCES tblVille(codeVille)
ALTER TABLE tblVille ADD FOREIGN KEY (codePays) REFERENCES tblPays(codePays)
ALTER TABLE tblReservation ADD FOREIGN KEY (noClient) REFERENCES tblClient(noClient)
ALTER TABLE tblVol ADD FOREIGN KEY (heureDepart) REFERENCES tblAeroport(aeroportDepart)
ALTER TABLE tblVol ADD FOREIGN KEY (heureArrivee) REFERENCES tblAeroport(aeroportArrivee)
ALTER TABLE tblVol ADD FOREIGN KEY (codeTypeAppareil) REFERENCES tblTypeAppareil(codeTypeAppareil)
ALTER TABLE tblVol ADD FOREIGN KEY (codeCie) REFERENCES tblCompagnieAerienne(codeCie)
ALTER TABLE tblBillet ADD FOREIGN KEY (noVol) REFERENCES tblVol(noVol)
ALTER TABLE tblBillet ADD FOREIGN KEY (codeClasse) REFERENCES tblClasseBillet(codeClasse)
ALTER TABLE tblBillet ADD FOREIGN KEY (noReservation) REFERENCES tblReservation(noReservation)

ALTER TABLE tblClient ALTER noClient SET DEFAULT AUTO_INCREMENT = 1000;
ALTER TABLE tblReservation ALTER noReservation SET DEFAULT AUTO_INCREMENT = 1900;
ALTER TABLE tblBillet ALTER noBillet SET DEFAULT AUTO_INCREMENT = 500;

ALTER TABLE tblReservation ALTER statuReservation ADD CHECK(EN ATTENTE || CONFIRMEE || ANNULEE)
ALTER TABLE tblReservation ALTER modePaiement ADD CHECK(MASTERCARD || VISA || DEBIT || AMERICAN EXPRESS)
ALTER TABLE tblReservation ALTER statuReservation ADD CHECK(NON PAYE || PAYE)

ALTER TABLE tblClient ALTER escompte SET DEFAULT 0.00