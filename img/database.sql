#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Adherant
#------------------------------------------------------------

CREATE TABLE Adherant(
        adh_num    Varchar (50) NOT NULL ,
        adh_nom    Varchar (50) NOT NULL ,
        adh_prenom Varchar (50) NOT NULL ,
        adh_cp     Varchar (50) NOT NULL ,
        adh_ville  Varchar (50) NOT NULL ,
        adh_rue    Varchar (50) NOT NULL ,
        adh_nb_emp Int NOT NULL
	,CONSTRAINT Adherant_PK PRIMARY KEY (adh_num)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Auteur
#------------------------------------------------------------

CREATE TABLE Auteur(
        nom_aut    Varchar (50) NOT NULL ,
        prenom_aut Varchar (50) NOT NULL
	,CONSTRAINT Auteur_PK PRIMARY KEY (nom_aut,prenom_aut)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Livre
#------------------------------------------------------------

CREATE TABLE Livre(
        liv_num    Int NOT NULL ,
        liv_titre  Varchar (50) NOT NULL ,
        nom_aut    Varchar (50) NOT NULL ,
        prenom_aut Varchar (50) NOT NULL
	,CONSTRAINT Livre_PK PRIMARY KEY (liv_num)

	,CONSTRAINT Livre_Auteur_FK FOREIGN KEY (nom_aut,prenom_aut) REFERENCES Auteur(nom_aut,prenom_aut)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: emprunter
#------------------------------------------------------------

CREATE TABLE emprunter(
        liv_num     Int NOT NULL ,
        adh_num     Varchar (50) NOT NULL ,
        date_emprun Date NOT NULL ,
        date_rendu  Date NOT NULL ,
        delai       Date NOT NULL
	,CONSTRAINT emprunter_PK PRIMARY KEY (liv_num,adh_num)

	,CONSTRAINT emprunter_Livre_FK FOREIGN KEY (liv_num) REFERENCES Livre(liv_num)
	,CONSTRAINT emprunter_Adherant0_FK FOREIGN KEY (adh_num) REFERENCES Adherant(adh_num)
)ENGINE=InnoDB;

