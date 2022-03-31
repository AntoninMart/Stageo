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
        visible        Boolean NOT NULL
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
# Table: Permission
#------------------------------------------------------------

CREATE TABLE Permission(
        permission_id   Int  Auto_increment  NOT NULL ,
        code_permission Text NOT NULL
	,CONSTRAINT Permission_PK PRIMARY KEY (permission_id)
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
        personne_id Int  NOT NULL Auto_increment ,
        nom         Text NOT NULL ,
        prenom      Text NOT NULL ,
        login       Text NOT NULL ,
        userpassword    Text NOT NULL ,
        centre_id   Int NOT NULL
	,CONSTRAINT Personne_PK PRIMARY KEY (personne_id)

	,CONSTRAINT Personne_Centre_FK FOREIGN KEY (centre_id) REFERENCES Centre(centre_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Pilote
#------------------------------------------------------------

CREATE TABLE Pilote(
        pilote_id    Int  Auto_increment  NOT NULL ,
        suppr_pilote Boolean NOT NULL ,
        personne_id  Int NOT NULL
	,CONSTRAINT Pilote_PK PRIMARY KEY (pilote_id)

	,CONSTRAINT Pilote_Personne_FK FOREIGN KEY (personne_id) REFERENCES Personne(personne_id)
	,CONSTRAINT Pilote_Personne_AK UNIQUE (personne_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Etudiant
#------------------------------------------------------------

CREATE TABLE Etudiant(
        etudiant_id    Int  Auto_increment  NOT NULL ,
        suppr_etudiant Boolean NOT NULL ,
        delegue        Boolean NOT NULL ,
        promotion_id   Int NOT NULL ,
        personne_id    Int NOT NULL
	,CONSTRAINT Etudiant_PK PRIMARY KEY (etudiant_id)

	,CONSTRAINT Etudiant_Promotion_FK FOREIGN KEY (promotion_id) REFERENCES Promotion(promotion_id)
	,CONSTRAINT Etudiant_Personne0_FK FOREIGN KEY (personne_id) REFERENCES Personne(personne_id)
	,CONSTRAINT Etudiant_Personne_AK UNIQUE (personne_id)
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
        duree_stage   Date NOT NULL ,
        nb_places     Int NOT NULL ,
        date_offre    Date NOT NULL ,
        competences   Text NOT NULL ,
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
        pilote_id     Int NOT NULL ,
        etudiant_id   Int NOT NULL
	,CONSTRAINT Evaluation_PK PRIMARY KEY (Evaluation_id)

	,CONSTRAINT Evaluation_Pilote_FK FOREIGN KEY (pilote_id) REFERENCES Pilote(pilote_id)
	,CONSTRAINT Evaluation_Etudiant0_FK FOREIGN KEY (etudiant_id) REFERENCES Etudiant(etudiant_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: candidature
#------------------------------------------------------------

CREATE TABLE candidature(
        candidature_id   Int  Auto_increment  NOT NULL ,
        cv               Text NOT NULL ,
        Im               Text NOT NULL ,
        suppr_offre      Boolean NOT NULL ,
        fiche_validation Text NOT NULL ,
        convention_stage Text NOT NULL ,
        step             Int NOT NULL
	,CONSTRAINT candidature_PK PRIMARY KEY (candidature_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Gere
#------------------------------------------------------------

CREATE TABLE Gere(
        promotion_id Int NOT NULL ,
        pilote_id    Int NOT NULL
	,CONSTRAINT Gere_PK PRIMARY KEY (promotion_id,pilote_id)

	,CONSTRAINT Gere_Promotion_FK FOREIGN KEY (promotion_id) REFERENCES Promotion(promotion_id)
	,CONSTRAINT Gere_Pilote0_FK FOREIGN KEY (pilote_id) REFERENCES Pilote(pilote_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: PeutPersonne
#------------------------------------------------------------

CREATE TABLE Peut(
        personne_id   Int NOT NULL ,
        permission_id Int NOT NULL
	,CONSTRAINT Peut_PK PRIMARY KEY (personne_id,permission_id)

	,CONSTRAINT Peut_Personne_FK FOREIGN KEY (personne_id) REFERENCES Personne(personne_id)
	,CONSTRAINT Peut_Permission0_FK FOREIGN KEY (permission_id) REFERENCES Permission(permission_id)
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
        etudiant_id    Int NOT NULL ,
        candidature_id Int NOT NULL
	,CONSTRAINT candidate_PK PRIMARY KEY (etudiant_id,candidature_id)

	,CONSTRAINT candidate_Etudiant_FK FOREIGN KEY (etudiant_id) REFERENCES Etudiant(etudiant_id)
	,CONSTRAINT candidate_candidature0_FK FOREIGN KEY (candidature_id) REFERENCES candidature(candidature_id)
)ENGINE=InnoDB;

