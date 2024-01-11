INSERT INTO UNITE (nom_unite) VALUES 
('kg'),
('l'),
('unite'),
('la douzaine'),
('la 1/2 douzaine');
 
INSERT INTO CATEGORIE (nom_categorie) VALUES
('Fruits'),
('Légumes'),
('Vins et bières'),
('Viandes'),
('Poissons et fruits de mer'),
('Produits Bio'),
('Fromages et crémerie'),
('Epicerie Salée'),
('Épices sucrée'),
('Boissons');
INSERT INTO CATEGORIE (nom_categorie,id_categorie_1) VALUES ('Tomate',1); -- une tomate est un fruit

INSERT INTO STATUT VALUES
(0,'en cours serveur'),
(1,'Préparation client'),
(2,'En preparation producteur'),
(3,'Prête'),
(4,'Livrée'),
(5,'Annulée');