#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Entreprise
#------------------------------------------------------------

CREATE TABLE Entreprise(
        entreprise_id  Int  Auto_increment  NOT NULL ,
        nom_entreprise Text NOT NULL ,
        nb_stagiaire   Text NOT NULL ,
        bool_del        Bool NOT NULL
	,CONSTRAINT Entreprise_PK PRIMARY KEY (entreprise_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Promotion
#------------------------------------------------------------

CREATE TABLE Promotion(
        promotion_id       Int  Auto_increment  NOT NULL ,
        promotion_assignee Text NOT NULL
	,CONSTRAINT Promotion_PK PRIMARY KEY (promotion_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Delegue
#------------------------------------------------------------

CREATE TABLE Delegue(
        permission_id   Int  Auto_increment  NOT NULL ,
        code_permission Text NOT NULL
	,CONSTRAINT Delegue_PK PRIMARY KEY (permission_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: ville
#------------------------------------------------------------

CREATE TABLE ville(
        ville_id  Int  Auto_increment  NOT NULL ,
        nom_ville Text NOT NULL
	,CONSTRAINT ville_PK PRIMARY KEY (ville_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Centre
#------------------------------------------------------------

CREATE TABLE Centre(
        centre_id Int  Auto_increment  NOT NULL ,
        ville_id  Int NOT NULL
	,CONSTRAINT Centre_PK PRIMARY KEY (centre_id)

	,CONSTRAINT Centre_ville_FK FOREIGN KEY (ville_id) REFERENCES ville(ville_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Personne
#------------------------------------------------------------

CREATE TABLE Personne(
        personne_id  Int  Auto_increment  NOT NULL ,
        nom          Text NOT NULL ,
        prenom       Text NOT NULL ,
        user_login        Text NOT NULL ,
        user_password        Text NOT NULL ,
        bool_del   Boolean NOT NULL ,
        user_role         Text NOT NULL ,
        bool_delegue Boolean NOT NULL ,
        centre_id    Int
	,CONSTRAINT Personne_PK PRIMARY KEY (personne_id)

	,CONSTRAINT Personne_Centre_FK FOREIGN KEY (centre_id) REFERENCES Centre(centre_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Secteur
#------------------------------------------------------------

CREATE TABLE Secteur(
        secteur_id  Int  Auto_increment  NOT NULL ,
        nom_secteur Text NOT NULL
	,CONSTRAINT Secteur_PK PRIMARY KEY (secteur_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Stage
#------------------------------------------------------------

CREATE TABLE Stage(
        stage_id      Int  Auto_increment  NOT NULL ,
        remuneration  Float NOT NULL ,
        date_debut_stage Date NOT NULL ,
        date_fin_stage Date NOT NULL ,
        nb_places     Int NOT NULL ,
        date_offre    Date NOT NULL ,
        bool_del   Boolean NOT NULL ,
        entreprise_id Int NOT NULL
	,CONSTRAINT Stage_PK PRIMARY KEY (stage_id)

	,CONSTRAINT Stage_Entreprise_FK FOREIGN KEY (entreprise_id) REFERENCES Entreprise(entreprise_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Evaluation
#------------------------------------------------------------

CREATE TABLE Evaluation(
        Evaluation_id Int  Auto_increment  NOT NULL ,
        salaire       Int NOT NULL ,
        localisation  Int NOT NULL ,
        ambiance      Int NOT NULL ,
        interet       Int NOT NULL ,
        personne_id   Int NOT NULL
	,CONSTRAINT Evaluation_PK PRIMARY KEY (Evaluation_id)

	,CONSTRAINT Evaluation_Personne_FK FOREIGN KEY (personne_id) REFERENCES Personne(personne_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: candidature
#------------------------------------------------------------

CREATE TABLE candidature(
        candidature_id   Int  Auto_increment  NOT NULL ,
        cv               Text NOT NULL ,
        Im               Text NOT NULL ,
        bool_del      Bool NOT NULL ,
        fiche_validation Text NOT NULL ,
        convention_stage Text NOT NULL ,
        step             Int NOT NULL
	,CONSTRAINT candidature_PK PRIMARY KEY (candidature_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Skills
#------------------------------------------------------------

CREATE TABLE skills(
        competence_id Int  Auto_increment  NOT NULL ,
        competence    Text NOT NULL
	,CONSTRAINT skills_PK PRIMARY KEY (competence_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Appartient
#------------------------------------------------------------

CREATE TABLE Appartient(
        personne_id  Int NOT NULL ,
        promotion_id Int NOT NULL
	,CONSTRAINT Appartient_PK PRIMARY KEY (personne_id,promotion_id)

	,CONSTRAINT Appartient_Personne_FK FOREIGN KEY (personne_id) REFERENCES Personne(personne_id)
	,CONSTRAINT Appartient_Promotion0_FK FOREIGN KEY (promotion_id) REFERENCES Promotion(promotion_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Peut
#------------------------------------------------------------

CREATE TABLE Peut(
        personne_id   Int NOT NULL ,
        permission_id Int NOT NULL
	,CONSTRAINT Peut_PK PRIMARY KEY (personne_id,permission_id)

	,CONSTRAINT Peut_Personne_FK FOREIGN KEY (personne_id) REFERENCES Personne(personne_id)
	,CONSTRAINT Peut_Delegue0_FK FOREIGN KEY (permission_id) REFERENCES Delegue(permission_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Localiser
#------------------------------------------------------------

CREATE TABLE Localiser(
        ville_id      Int NOT NULL ,
        entreprise_id Int NOT NULL
	,CONSTRAINT Localiser_PK PRIMARY KEY (ville_id,entreprise_id)

	,CONSTRAINT Localiser_ville_FK FOREIGN KEY (ville_id) REFERENCES ville(ville_id)
	,CONSTRAINT Localiser_Entreprise0_FK FOREIGN KEY (entreprise_id) REFERENCES Entreprise(entreprise_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: relation2
#------------------------------------------------------------

CREATE TABLE relation2(
        secteur_id    Int NOT NULL ,
        entreprise_id Int NOT NULL
	,CONSTRAINT relation2_PK PRIMARY KEY (secteur_id,entreprise_id)

	,CONSTRAINT relation2_Secteur_FK FOREIGN KEY (secteur_id) REFERENCES Secteur(secteur_id)
	,CONSTRAINT relation2_Entreprise0_FK FOREIGN KEY (entreprise_id) REFERENCES Entreprise(entreprise_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: relation4
#------------------------------------------------------------

CREATE TABLE relation4(
        entreprise_id Int NOT NULL ,
        Evaluation_id Int NOT NULL
	,CONSTRAINT relation4_PK PRIMARY KEY (entreprise_id,Evaluation_id)

	,CONSTRAINT relation4_Entreprise_FK FOREIGN KEY (entreprise_id) REFERENCES Entreprise(entreprise_id)
	,CONSTRAINT relation4_Evaluation0_FK FOREIGN KEY (Evaluation_id) REFERENCES Evaluation(Evaluation_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: repond
#------------------------------------------------------------

CREATE TABLE repond(
        candidature_id Int NOT NULL ,
        stage_id       Int NOT NULL
	,CONSTRAINT repond_PK PRIMARY KEY (candidature_id,stage_id)

	,CONSTRAINT repond_candidature_FK FOREIGN KEY (candidature_id) REFERENCES candidature(candidature_id)
	,CONSTRAINT repond_Stage0_FK FOREIGN KEY (stage_id) REFERENCES Stage(stage_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: candidate
#------------------------------------------------------------

CREATE TABLE candidate(
        personne_id    Int NOT NULL ,
        candidature_id Int NOT NULL
	,CONSTRAINT candidate_PK PRIMARY KEY (personne_id,candidature_id)

	,CONSTRAINT candidate_Personne_FK FOREIGN KEY (personne_id) REFERENCES Personne(personne_id)
	,CONSTRAINT candidate_candidature0_FK FOREIGN KEY (candidature_id) REFERENCES candidature(candidature_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: necessite
#------------------------------------------------------------

CREATE TABLE necessite(
        competence_id Int NOT NULL ,
        stage_id      Int NOT NULL
	,CONSTRAINT necessite_PK PRIMARY KEY (competence_id,stage_id)

	,CONSTRAINT necessite_Skills_FK FOREIGN KEY (competence_id) REFERENCES Skills(competence_id)
	,CONSTRAINT necessite_Stage0_FK FOREIGN KEY (stage_id) REFERENCES Stage(stage_id)
)ENGINE=InnoDB;

INSERT INTO ville(nom_ville) VALUES ('Toronto');
INSERT INTO ville(nom_ville) VALUES ('Sydney');
INSERT INTO ville(nom_ville) VALUES ('Washington');
INSERT INTO ville(nom_ville) VALUES ('London');
INSERT INTO ville(nom_ville) VALUES ('Paris');

INSERT INTO entreprise(nom_entreprise, nb_stagiaire, bool_del) VALUES ('Bosch', '2', '0');
INSERT INTO entreprise(nom_entreprise, nb_stagiaire, bool_del) VALUES ('Citroen', '1', '0');
INSERT INTO entreprise(nom_entreprise, nb_stagiaire, bool_del) VALUES ('Intel', '3', '0');
INSERT INTO entreprise(nom_entreprise, nb_stagiaire, bool_del) VALUES ('Nestle', '1', '0');
INSERT INTO entreprise(nom_entreprise, nb_stagiaire, bool_del) VALUES ('Sprite', '4', '0');

INSERT INTO candidature(cv, Im, bool_del, fiche_validation, convention_stage, step) VALUES ('CV', 'text', '0','fiche de validation','convention de stage', '1'); 
INSERT INTO candidature(cv, Im, bool_del, fiche_validation, convention_stage, step) VALUES ('CV2', 'text2', '1','fiche de validation2','convention de stage2', '1'); 
INSERT INTO candidature(cv, Im, bool_del, fiche_validation, convention_stage, step) VALUES ('CV3', 'text3', '0','fiche de validation3','convention de stage3', '2'); 
INSERT INTO candidature(cv, Im, bool_del, fiche_validation, convention_stage, step) VALUES ('CV4', 'text4', '0','fiche de validation4','convention de stage4', '1'); 

INSERT INTO Delegue(code_permission) VALUES ('SFx2');
INSERT INTO Delegue(code_permission) VALUES ('SFx3');
INSERT INTO Delegue(code_permission) VALUES ('SFx4');
INSERT INTO Delegue(code_permission) VALUES ('SFx5');
INSERT INTO Delegue(code_permission) VALUES ('SFx6');
INSERT INTO Delegue(code_permission) VALUES ('SFx7');
INSERT INTO Delegue(code_permission) VALUES ('SFx8');
INSERT INTO Delegue(code_permission) VALUES ('SFx9');
INSERT INTO Delegue(code_permission) VALUES ('SFx10');
INSERT INTO Delegue(code_permission) VALUES ('SFx11');
INSERT INTO Delegue(code_permission) VALUES ('SFx12');
INSERT INTO Delegue(code_permission) VALUES ('SFx13');
INSERT INTO Delegue(code_permission) VALUES ('SFx14');
INSERT INTO Delegue(code_permission) VALUES ('SFx15');
INSERT INTO Delegue(code_permission) VALUES ('SFx16');
INSERT INTO Delegue(code_permission) VALUES ('SFx17');
INSERT INTO Delegue(code_permission) VALUES ('SFx18');
INSERT INTO Delegue(code_permission) VALUES ('SFx19');
INSERT INTO Delegue(code_permission) VALUES ('SFx20');
INSERT INTO Delegue(code_permission) VALUES ('SFx22');
INSERT INTO Delegue(code_permission) VALUES ('SFx23');
INSERT INTO Delegue(code_permission) VALUES ('SFx24');
INSERT INTO Delegue(code_permission) VALUES ('SFx25');
INSERT INTO Delegue(code_permission) VALUES ('SFx26');
INSERT INTO Delegue(code_permission) VALUES ('SFx32');
INSERT INTO Delegue(code_permission) VALUES ('SFx33');

INSERT INTO promotion(promotion_assignee) VALUES ('A1');
INSERT INTO promotion(promotion_assignee) VALUES ('A2');
INSERT INTO promotion(promotion_assignee) VALUES ('A3');
INSERT INTO promotion(promotion_assignee) VALUES ('A4');
INSERT INTO promotion(promotion_assignee) VALUES ('A5');

INSERT INTO secteur(nom_secteur) VALUES ('Informatique');
INSERT INTO secteur(nom_secteur) VALUES ('BTP');
INSERT INTO secteur(nom_secteur) VALUES ('Generaliste');
INSERT INTO secteur(nom_secteur) VALUES ('Systèmes embarqués');

INSERT INTO relation2(secteur_id, entreprise_id) VALUES ('1', '2');
INSERT INTO relation2(secteur_id, entreprise_id) VALUES ('2', '4');
INSERT INTO relation2(secteur_id, entreprise_id) VALUES ('4', '5');
INSERT INTO relation2(secteur_id, entreprise_id) VALUES ('3', '1');
INSERT INTO relation2(secteur_id, entreprise_id) VALUES ('2', '3');

INSERT INTO centre(ville_id) VALUES ('1');
INSERT INTO centre(ville_id) VALUES ('2');
INSERT INTO centre(ville_id) VALUES ('3');

INSERT INTO personne(prenom, nom, user_login, user_password, centre_id, bool_del, user_role, bool_delegue) VALUE ('Alexandre', 'Milhas', 'alex@free.fr', '$2y$15$SnWND00utnmgzpAwQvs4NOyABZVht/I3avM1ET8aBu1myj/b6VaBe', '1','0', 'student','0');
INSERT INTO personne(prenom, nom, user_login, user_password, centre_id, bool_del, user_role, bool_delegue)VALUE ('Vincent', 'Leclercq', 'vincent@free.fr', '$2y$15$YcyhKNcs2b.yOU3cByxe7O5ogWnqIqEqQdUpbpyG2Dt1KuImjWop2', '2','0', 'admin','0');
INSERT INTO personne(prenom, nom, user_login, user_password, centre_id, bool_del, user_role, bool_delegue) VALUE ('Antonin', 'Martinez', 'anto@gmail.com', '$2y$15$r/Sd4sE8yTD6c1q1hUOrqOYXAatP5DCvS74mNFSwMobITxeIaWTrK', '1','0', 'student','0');
INSERT INTO personne(prenom, nom, user_login, user_password, centre_id, bool_del, user_role, bool_delegue) VALUE ('Jean', 'Tremeau', 'jean@outlook.com', '$2y$15$cb.OZ0pwv5maGBPh93qQYuL5xZOBUcnb6pFw8OeRzmtyjNYiKWxyS', '3','0', 'student','0');
INSERT INTO personne(prenom, nom, user_login, user_password, centre_id, bool_del, user_role, bool_delegue) VALUE ('Maxence', 'Leroux', 'maxence@free.fr', '$2y$15$C/tNozWzoH2G9vQMZ/0zCeqIUyL6VRkLIEMBLBocLUw.P4ePon26.', '2','0', 'delegate','1');
INSERT INTO personne(prenom, nom, user_login, user_password, centre_id, bool_del, user_role, bool_delegue) VALUE ('Titouan', 'Laporte', 'titoo@gmail.com', '$2y$15$0odQF1.7HRf3Gr2G47iHsOLiM5jdXP.kex4tSx8nb9vyE8UZki2vi', '3','0', 'delegate','1');
INSERT INTO personne(prenom, nom, user_login, user_password, centre_id, bool_del, user_role, bool_delegue) VALUE ('Guillaume', 'Deschamps', 'guigui@outlook.com', '$2y$15$hSIJFnV.oGrguCpve7U2fuOVmoY3XzxK6OP7PMgyZrj7xAP2QYVR.', '3', '0','pilot', '1');
INSERT INTO personne(prenom, nom, user_login, user_password, centre_id, bool_del, user_role, bool_delegue) VALUE ('Sinuhe', 'Martinez', 'sinuhez@outlook.com', '$2y$15$hgIleTq1TjXWYwACywt5YecIuxoBoxbjSMmBFWs16MO7OTBxWPk32', '2','0', 'pilot','0');

INSERT INTO stage(remuneration, date_debut_stage, date_fin_stage, nb_places, date_offre, entreprise_id, bool_del) VALUES ('170', '2021-03-11', '2021-05-12', '2', '2021-03-01', '1',0);
INSERT INTO stage(remuneration, date_debut_stage, date_fin_stage, nb_places, date_offre, entreprise_id, bool_del) VALUES ('3200', '2021-04-02', '2021-08-10', '3', '2021-03-01', '2',0);
INSERT INTO stage(remuneration, date_debut_stage, date_fin_stage, nb_places, date_offre, entreprise_id, bool_del) VALUES ('170', '2022-01-02', '2022-08-12', '2', '2021-12-12', '3',0);
INSERT INTO stage(remuneration, date_debut_stage, date_fin_stage, nb_places, date_offre, entreprise_id, bool_del) VALUES ('170', '2021-02-04', '2021-07-12', '2', '2021-01-01', '1',0);

INSERT INTO skills(competence) VALUES ('mechanics');
INSERT INTO skills(competence) VALUES ('programming');
INSERT INTO skills(competence) VALUES ('management');
INSERT INTO skills(competence) VALUES ('electronics');

INSERT INTO candidate(personne_id, candidature_id) VALUES ('3','1');
INSERT INTO candidate(personne_id, candidature_id) VALUES ('3','2');
INSERT INTO candidate(personne_id, candidature_id) VALUES ('4','3');

INSERT INTO evaluation(salaire, localisation, ambiance, interet, personne_id) VALUES ('5', '4', '3', '1', '1');
INSERT INTO evaluation(salaire, localisation, ambiance, interet, personne_id) VALUES ('3', '2', '2', '5', '2');
INSERT INTO evaluation(salaire, localisation, ambiance, interet, personne_id) VALUES ('4', '3', '1', '2', '5');

INSERT INTO peut(personne_id, permission_id) VALUES ('5', '1');
INSERT INTO peut(personne_id, permission_id) VALUES ('5', '2');
INSERT INTO peut(personne_id, permission_id) VALUES ('5', '3');
INSERT INTO peut(personne_id, permission_id) VALUES ('5', '4');
INSERT INTO peut(personne_id, permission_id) VALUES ('5', '5');
INSERT INTO peut(personne_id, permission_id) VALUES ('5', '6');
INSERT INTO peut(personne_id, permission_id) VALUES ('5', '7');
INSERT INTO peut(personne_id, permission_id) VALUES ('5', '8');
INSERT INTO peut(personne_id, permission_id) VALUES ('5', '9');
INSERT INTO peut(personne_id, permission_id) VALUES ('5', '10');
INSERT INTO peut(personne_id, permission_id) VALUES ('5', '11');
INSERT INTO peut(personne_id, permission_id) VALUES ('5', '12');
INSERT INTO peut(personne_id, permission_id) VALUES ('5', '13');
INSERT INTO peut(personne_id, permission_id) VALUES ('5', '14');
INSERT INTO peut(personne_id, permission_id) VALUES ('5', '15');
INSERT INTO peut(personne_id, permission_id) VALUES ('5', '16');
INSERT INTO peut(personne_id, permission_id) VALUES ('5', '17');
INSERT INTO peut(personne_id, permission_id) VALUES ('5', '18');
INSERT INTO peut(personne_id, permission_id) VALUES ('5', '19');
INSERT INTO peut(personne_id, permission_id) VALUES ('5', '20');
INSERT INTO peut(personne_id, permission_id) VALUES ('5', '21');

INSERT INTO peut(personne_id, permission_id) VALUES ('6', '6');
INSERT INTO peut(personne_id, permission_id) VALUES ('6', '7');
INSERT INTO peut(personne_id, permission_id) VALUES ('6', '8');
INSERT INTO peut(personne_id, permission_id) VALUES ('6', '9');
INSERT INTO peut(personne_id, permission_id) VALUES ('6', '10');
INSERT INTO peut(personne_id, permission_id) VALUES ('6', '11');
INSERT INTO peut(personne_id, permission_id) VALUES ('6', '12');
INSERT INTO peut(personne_id, permission_id) VALUES ('6', '13');
INSERT INTO peut(personne_id, permission_id) VALUES ('6', '14');
INSERT INTO peut(personne_id, permission_id) VALUES ('6', '15');
INSERT INTO peut(personne_id, permission_id) VALUES ('6', '16');
INSERT INTO peut(personne_id, permission_id) VALUES ('6', '17');
INSERT INTO peut(personne_id, permission_id) VALUES ('6', '18');
INSERT INTO peut(personne_id, permission_id) VALUES ('6', '19');
INSERT INTO peut(personne_id, permission_id) VALUES ('6', '20');
INSERT INTO peut(personne_id, permission_id) VALUES ('6', '21');
INSERT INTO peut(personne_id, permission_id) VALUES ('6', '22');
INSERT INTO peut(personne_id, permission_id) VALUES ('6', '23');
INSERT INTO peut(personne_id, permission_id) VALUES ('6', '24');
INSERT INTO peut(personne_id, permission_id) VALUES ('6', '25');
INSERT INTO peut(personne_id, permission_id) VALUES ('6', '26');

INSERT INTO peut(personne_id, permission_id) VALUES ('7', '1');
INSERT INTO peut(personne_id, permission_id) VALUES ('7', '2');
INSERT INTO peut(personne_id, permission_id) VALUES ('7', '3');
INSERT INTO peut(personne_id, permission_id) VALUES ('7', '4');
INSERT INTO peut(personne_id, permission_id) VALUES ('7', '5');
INSERT INTO peut(personne_id, permission_id) VALUES ('7', '6');
INSERT INTO peut(personne_id, permission_id) VALUES ('7', '7');
INSERT INTO peut(personne_id, permission_id) VALUES ('7', '8');
INSERT INTO peut(personne_id, permission_id) VALUES ('7', '9');
INSERT INTO peut(personne_id, permission_id) VALUES ('7', '10');
INSERT INTO peut(personne_id, permission_id) VALUES ('7', '11');
INSERT INTO peut(personne_id, permission_id) VALUES ('7', '12');
INSERT INTO peut(personne_id, permission_id) VALUES ('7', '13');
INSERT INTO peut(personne_id, permission_id) VALUES ('7', '14');
INSERT INTO peut(personne_id, permission_id) VALUES ('7', '15');
INSERT INTO peut(personne_id, permission_id) VALUES ('7', '16');
INSERT INTO peut(personne_id, permission_id) VALUES ('7', '17');
INSERT INTO peut(personne_id, permission_id) VALUES ('7', '18');
INSERT INTO peut(personne_id, permission_id) VALUES ('7', '19');
INSERT INTO peut(personne_id, permission_id) VALUES ('7', '20');
INSERT INTO peut(personne_id, permission_id) VALUES ('7', '21');
INSERT INTO peut(personne_id, permission_id) VALUES ('7', '22');
INSERT INTO peut(personne_id, permission_id) VALUES ('7', '23');
INSERT INTO peut(personne_id, permission_id) VALUES ('7', '24');
INSERT INTO peut(personne_id, permission_id) VALUES ('7', '25');
INSERT INTO peut(personne_id, permission_id) VALUES ('7', '26');

INSERT INTO localiser(ville_id, entreprise_id) VALUES ('2','1');
INSERT INTO localiser(ville_id, entreprise_id) VALUES ('1','2');
INSERT INTO localiser(ville_id, entreprise_id) VALUES ('3','3');

INSERT INTO relation4(entreprise_id, evaluation_id) VALUES ('2','1');
INSERT INTO relation4(entreprise_id, evaluation_id) VALUES ('4','2');
INSERT INTO relation4(entreprise_id, evaluation_id) VALUES ('1','3');

INSERT INTO repond(candidature_id, stage_id) VALUES ('1', '1');
INSERT INTO repond(candidature_id, stage_id) VALUES ('4', '2');
INSERT INTO repond(candidature_id, stage_id) VALUES ('2', '3');

INSERT INTO necessite(competence_id,stage_id) VALUES ('1','1');
INSERT INTO necessite(competence_id,stage_id) VALUES ('2','4');
INSERT INTO necessite(competence_id,stage_id) VALUES ('4','2');
INSERT INTO necessite(competence_id,stage_id) VALUES ('3','3');
