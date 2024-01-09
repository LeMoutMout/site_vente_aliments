
DROP TABLE IF EXISTS RECEPTION;
DROP TABLE IF EXISTS COMPOSITION;
DROP TABLE IF EXISTS CATEGORISATION;
DROP TABLE IF EXISTS CATEGORIE;
DROP TABLE IF EXISTS PRODUIT;
DROP TABLE IF EXISTS PRODUCTEUR;
DROP TABLE IF EXISTS UNITE;
DROP TABLE IF EXISTS AVIS;
DROP TABLE IF EXISTS PANIER;
DROP TABLE IF EXISTS STATUT;
DROP TABLE IF EXISTS MESSAGE;
DROP TABLE IF EXISTS ADMINISTRATEUR;
DROP TABLE IF EXISTS UTILISATEUR;

CREATE TABLE UTILISATEUR(
   id_util INT AUTO_INCREMENT,
   mail_util VARCHAR(50) NOT NULL,
   nom_util VARCHAR(25) NOT NULL,
   pren_util VARCHAR(25) NOT NULL,
   mdp_util VARCHAR(150) NOT NULL,
   tel_util VARCHAR(10) NOT NULL,
   adresse_util VARCHAR(100) NOT NULL,
   CONSTRAINT cle_primaire_utilisateur PRIMARY KEY(id_util),
   UNIQUE(mail_util)
);

CREATE TABLE PRODUCTEUR(
   id_production INT AUTO_INCREMENT,
   nom_production VARCHAR(50) NOT NULL,
   descr_production VARCHAR(255),
   valid_production TINYINT NOT NULL,
   id_util INT NOT NULL,
   CONSTRAINT cle_primaire_producteur PRIMARY KEY(id_production),
   CONSTRAINT cle_etrangere_producteur_utilisateur FOREIGN KEY(id_util) REFERENCES UTILISATEUR(id_util)
);

CREATE TABLE UNITE(
   id_unite INT AUTO_INCREMENT,
   nom_unite VARCHAR(20) NOT NULL,
   CONSTRAINT cle_primaire_unite PRIMARY KEY(id_unite),
   UNIQUE(nom_unite)
);

CREATE TABLE CATEGORIE(
   id_categorie INT AUTO_INCREMENT,
   nom_categorie VARCHAR(50) NOT NULL,
   id_categorie_1 INT,
   CONSTRAINT cle_primaire_categorie PRIMARY KEY(id_categorie),
   UNIQUE(nom_categorie),
   CONSTRAINT cle_etrangere_categorie_categorie FOREIGN KEY(id_categorie_1) REFERENCES CATEGORIE(id_categorie)
);

CREATE TABLE STATUT(
   id_statut INT,
   nom_statut VARCHAR(30) NOT NULL,
   CONSTRAINT cle_primaire_statut PRIMARY KEY(id_statut),
   UNIQUE(nom_statut)
);

CREATE TABLE ADMINISTRATEUR(
   id_admin INT AUTO_INCREMENT,
   id_util INT NOT NULL,
   CONSTRAINT cle_primaire_administrateur PRIMARY KEY(id_admin),
   UNIQUE(id_util),
   CONSTRAINT cle_etrangere_administrateur_utilisateur FOREIGN KEY(id_util) REFERENCES UTILISATEUR(id_util)
);

CREATE TABLE PANIER(
   id_panier INT AUTO_INCREMENT,
   date_panier DATE NOT NULL,
   id_util INT NOT NULL,
   id_statut INT NOT NULL,
   CONSTRAINT cle_primaire_panier PRIMARY KEY(id_panier),
   CONSTRAINT cle_etrangere_panier_utilisateur FOREIGN KEY(id_util) REFERENCES UTILISATEUR(id_util),
   CONSTRAINT cle_etrangere_panier_statut FOREIGN KEY(id_statut) REFERENCES STATUT(id_statut)
);

CREATE TABLE AVIS(
   id_avis int AUTO_INCREMENT,
   note_avis DECIMAL(3,2) NOT NULL,
   date_avis DATE NOT NULL,
   contenu_avis VARCHAR(255),
   id_panier INT NOT NULL,
   CONSTRAINT cle_primaire_avis PRIMARY KEY(id_avis),
   UNIQUE(id_panier),
   FOREIGN KEY(id_panier) REFERENCES PANIER(id_panier)
);

CREATE TABLE PRODUIT(
   id_produit INT AUTO_INCREMENT,
   nom_produit VARCHAR(50) NOT NULL,
   quantite_produit INT NOT NULL,
   prix_produit FLOAT NOT NULL,
   promotion_produit INT,
   id_production INT NOT NULL,
   id_unite INT NOT NULL,     
   bio_produit TINYINT NOT NULL,
   CONSTRAINT cle_primaire_produit PRIMARY KEY (id_produit),
   CONSTRAINT cle_etrangere_produit_production FOREIGN KEY(id_production) REFERENCES PRODUCTEUR(id_production),
   CONSTRAINT cle_etrangere_produit_unite FOREIGN KEY(id_unite) REFERENCES UNITE(id_unite)
);

CREATE TABLE CATEGORISATION(
   id_categorie INT,
   id_produit INT,
   ordre_produit_categorie INT NOT NULL AUTO_INCREMENT,
   CONSTRAINT cle_primaire_categorisation PRIMARY KEY(id_categorie, id_produit),
   UNIQUE(ordre_produit_categorie),
   CONSTRAINT cle_etrangere_categorisation_categorie FOREIGN KEY(id_categorie) REFERENCES CATEGORIE(id_categorie),
   CONSTRAINT cle_etrangere_categorisation_produit FOREIGN KEY(id_produit) REFERENCES PRODUIT(id_produit)
);

CREATE TABLE COMPOSITION(
   id_panier INT,
   id_produit INT,
   qte_produit_commandee INT not null,
   id_produit_panier INT NOT NULL AUTO_INCREMENT,
   CONSTRAINT cle_primaire_composition PRIMARY KEY(id_panier, id_produit),
   UNIQUE(id_produit_panier),
   CONSTRAINT cle_etrangere_composition_panier FOREIGN KEY(id_panier) REFERENCES PANIER(id_panier),
   CONSTRAINT cle_etrangere_composition_produit FOREIGN KEY(id_produit) REFERENCES PRODUIT(id_produit)
);

CREATE TABLE MESSAGE(
   id_message INT auto_increment,
--   objet_message VARCHAR(50) NOT NULL,
   contenu_message VARCHAR(2000) NOT NULL,
   date_message DATETIME NOT NULL,
   id_util INT NOT NULL,
   CONSTRAINT cle_primaire_message PRIMARY KEY(id_message),
   CONSTRAINT cle_message_utilisateur FOREIGN KEY(id_util) REFERENCES UTILISATEUR(id_util)
);

CREATE TABLE RECEPTION(
   id_message int,
   id_util INT,
   id_message_receveur INT NOT NULL AUTO_INCREMENT,
   CONSTRAINT cle_primaire_reception PRIMARY KEY(id_message, id_util),
   UNIQUE(id_message_receveur),
   CONSTRAINT cle_reception_message FOREIGN KEY(id_message) REFERENCES MESSAGE(id_message),
   CONSTRAINT cle_reception_utilisateur FOREIGN KEY(id_util) REFERENCES UTILISATEUR(id_util)
);