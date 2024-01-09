-- VUES

-- Vue pour afficher les produits les plus vendus
DROP VIEW IF EXISTS produitsLesPlusVendusView;

CREATE VIEW produitsLesPlusVendusView AS
SELECT nom_produit, SUM(qte_produit_commandee) AS quantite_vendue FROM PRODUIT
	INNER JOIN COMPOSITION ON COMPOSITION.id_produit = PRODUIT.id_produit
	INNER JOIN PANIER ON COMPOSITION.id_panier = PANIER.id_panier
	INNER JOIN CATEGORISATION ON CATEGORISATION.id_produit = PRODUIT.id_produit
	INNER JOIN CATEGORIE ON CATEGORISATION.id_categorie = CATEGORIE.id_categorie
	GROUP BY nom_produit
	ORDER BY quantite_vendue DESC LIMIT 5;

-- SELECT * FROM produitsLesPlusVendusView;


-- Vue qui renseigne que les producteurs validés par un admin (vu par les clients)
drop view if exists producteurValider;

create view producteurValider as 
	select id_production,
		PRODUCTEUR.id_util,
		nom_production,
		descr_production, 
		mail_util as 'mail_producteur',
		nom_util as 'nom_producteur',
		pren_util as 'prenom_producteur',
		tel_util as 'telephone_producteur',
		adresse_util as 'adresse_producteur' 
	from PRODUCTEUR 
	join UTILISATEUR on UTILISATEUR.id_util = PRODUCTEUR.id_util 
	where valid_production = 1;


-- SELECT * FROM producteurValider;

use sae;
-- Vue qui renseigne que les producteurs non validés par un admin (non vu par les clients)
drop view if exists producteurNonValider;

create view producteurNonValider as 
	select id_production,
		nom_production,
		descr_production, 
        UTILISATEUR.id_util as 'id_producteur',
		mail_util as 'mail_producteur',
		nom_util as 'nom_producteur',
		pren_util as 'prenom_producteur',
		tel_util as 'telephone_producteur',
		adresse_util as 'adresse_producteur' 
	from PRODUCTEUR 
	join UTILISATEUR on UTILISATEUR.id_util = PRODUCTEUR.id_util 
	where valid_production = 0;


-- SELECT * FROM producteurNonValider;


-- Vue qui affiche les propduits des producteurs
drop view if exists producteurProduit;

create view producteurProduit as select PRODUCTEUR.id_production,id_produit,nom_production,nom_produit,prix_produit,nom_unite 
	from PRODUCTEUR
	join PRODUIT on PRODUIT.id_production = PRODUCTEUR.id_production
	join UNITE on PRODUIT.id_unite = UNITE.id_unite;
	; 


-- SELECT * FROM producteurProduit;


-- Vue qui donnc le nombre de produits possèdés par les producteurs
drop view if exists nbProduitProducteur;

create view nbProduitProducteur as 
	select producteurValider.id_production,nom_production,descr_production, nom_producteur, prenom_producteur, telephone_producteur, adresse_producteur, COUNT(id_produit) as 'nombreDeProduit'  from producteurValider 
		join PRODUIT on producteurValider.id_production = PRODUIT.id_production
		group by producteurValider.id_production,nom_production,descr_production, nom_producteur, prenom_producteur, telephone_producteur, adresse_producteur
	;


-- SELECT * FROM nbProduitProducteur;


-- Vue qui affiche les paniers des des producteurs
drop view if exists producteurPanier;

create view producteurPanier as 
	select distinct id_production,id_util, nom_production, PANIER.id_panier, date_panier, id_statut from producteurProduit
		join COMPOSITION on producteurProduit.id_produit = COMPOSITION.id_produit
		join PANIER on PANIER.id_panier = COMPOSITION.id_panier
        where id_statut in (2,3,4) order by date_panier desc;
	;


-- SELECT * FROM producteurPanier;


-- Vue qui donne les avis des producteurs
drop view if exists producteurAvis;

create view producteurAvis as -- (producteur valider) 
	select UTILISATEUR.id_util, id_production, nom_util,pren_util, note_avis, contenu_avis, date_avis 
		from PRODUIT
        join COMPOSITION on COMPOSITION.id_produit = PRODUIT.id_produit
        join PANIER on PANIER.id_panier = COMPOSITION.id_panier
        join AVIS on PANIER.id_panier = AVIS.id_panier
        join UTILISATEUR on UTILISATEUR.id_util = PANIER.id_util;


-- SELECT * FROM producteurAvis;


-- Vue qui donne la moyenne des avis des producteurs
drop view if exists producteurAvgAvis;

create view producteurAvgAvis as -- (producteur valider) 
	select id_production,AVG(note_avis) as moyen_avis from producteurAvis
	group by id_production
	;


-- SELECT * FROM producteurAvgAvis;


-- PROCEDURE

-- procedure permettant de recuperer les données de l'utilisateur qui se connecte
drop procedure if exists loginUtilisateur;

DELIMITER $$
CREATE PROCEDURE loginUtilisateur(IN mail varchar(50), IN mdp varchar(50))
BEGIN
	IF exists (select nom_util from UTILISATEUR where mail_util=mail and mdp_util = mdp) THEN
		select id_util,mail_util,nom_util,pren_util,tel_util,adresse_util from UTILISATEUR where mail_util=mail and mdp_util = mdp;
	END IF;
END $$
DELIMITER ;

-- exemple :
CALL loginUtilisateur('jean.dupont@gmail.com','75000paris');


-- procedure permettant d'insérer un produit dans un panier qu'il exite ou pas
DROP PROCEDURE IF EXISTS InsererProduitPanier;
DELIMITER $$
CREATE PROCEDURE InsererProduitPanier
( in id_util INT,
in qte_produit INT,
in id_produit INT,
in date_panier DATE)
BEGIN
	DECLARE id_panier INT;
	-- regarde si  la quantité souhaité est disponible en stock affiche erreure sinon
    IF(qte_produit>(SELECT produit.quantite_produit FROM PRODUIT WHERE PRODUIT.id_produit=id_produit)) THEN
        SELECT 'Erreur, la quantite souhaitee à commandé est supérieur à la quatité en stock' as errorMSG;
    ELSE
    	-- recupere l'id du panier s'il existe sinon null
    	SET id_panier = (select PANIER.id_panier from PANIER 
       		    join COMPOSITION on COMPOSITION.id_panier = PANIER.id_panier
            	join PRODUIT on PRODUIT.id_produit = COMPOSITION.id_produit
            	where panier.id_statut = 1 and PANIER.id_util = id_util and 
            	produit.id_production = (select produit.id_production from PRODUIT where PRODUIT.id_produit = id_produit) group by PANIER.id_panier);
    	IF (id_panier IS NOT NULL) THEN
			-- regarde si le produit demandé est déjà dans le panier
        	IF EXISTS (SELECT composition.id_produit FROM COMPOSITION WHERE composition.id_panier= id_panier AND COMPOSITION.id_produit=id_produit) then
            	-- on change la quantite qui etait commandé de base
            	UPDATE COMPOSITION SET qte_produit_commandee= qte_produit WHERE COMPOSITION.id_panier= id_panier AND COMPOSITION.id_produit= id_produit;
        	ELSE
				-- isnert le produit dans le panier (composition)
            	INSERT INTO COMPOSITION (id_produit, id_panier, qte_produit_commandee) VALUES (id_produit, id_panier, qte_produit);
        	END if;
			-- change la date du panier simodif
			UPDATE PANIER SET PANIER.date_panier = date_panier WHERE PANIER.id_panier = id_panier;
    	ELSE
			-- création d'un panier et insertion du produit dedans
        	INSERT INTO PANIER (date_panier, id_util, id_statut) VALUES (date_panier, id_util, 0);
        	set id_panier = (select PANIER.id_panier from PANIER 
            	where panier.id_statut = 0 and PANIER.id_util = id_util);
        	INSERT INTO COMPOSITION (id_produit, id_panier, qte_produit_commandee) VALUES (id_produit, id_panier, qte_produit);
        	UPDATE PANIER SET id_statut=1 WHERE PANIER.id_panier= id_panier;
    	END IF;
    END IF;
END $$
DELIMITER ;
 
-- exemple avec panier inexistant
SELECT * FROM PANIER WHERE id_statut=1; 
SELECT * FROM COMPOSITION WHERE id_produit=1;
CALL InsererProduitPanier (12, 20, 1, '2023-10-24');
SELECT * FROM PANIER WHERE id_statut=1; 
SELECT * FROM COMPOSITION WHERE id_produit=1;

-- exemple avec produit deja dans panier
SELECT * FROM PANIER WHERE id_statut=1; 
SELECT * FROM COMPOSITION WHERE id_produit=1;
CALL InsererProduitPanier (12, 10, 1, '2023-10-24');
SELECT * FROM PANIER WHERE id_statut=1;
SELECT * FROM COMPOSITION WHERE id_produit=1;

-- exemple avec panier existant mais pas le produit dedans
SELECT * FROM PANIER WHERE id_statut=1; 
SELECT * FROM COMPOSITION WHERE id_produit=2;
CALL InsererProduitPanier (12, 10, 2, '2023-10-24');
SELECT * FROM PANIER WHERE id_statut=1;
SELECT * FROM COMPOSITION WHERE id_produit=2;

-- exemple avec panier existant mais pas le produit dedans mais quantite>stock du produit
SELECT * FROM PANIER WHERE id_statut=1; 
SELECT * FROM COMPOSITION WHERE id_produit=1;
CALL InsererProduitPanier (12, 150, 1, '2023-10-24');
SELECT * FROM PANIER WHERE id_statut=1;
SELECT * FROM COMPOSITION WHERE id_produit=1;


-- procedure de changement de statut d’un panier
DROP PROCEDURE IF EXISTS changerStatutPanier;

DELIMITER $$
CREATE PROCEDURE changerStatutPanier(IN id_panier INT, IN id_statut INT)
BEGIN
	DECLARE id_produit INT;
   	DECLARE quantite_produit INT;
    DECLARE curentStatut int;
    DECLARE loop_finished INT DEFAULT 0;
    -- création d'un curseur pour avoir tous les produits du panier et leur quantite afin de les incrémente ou decremente dans les stocks
    DECLARE produitCursor CURSOR FOR SELECT composition.id_produit, composition.qte_produit_commandee
	FROM COMPOSITION WHERE composition.id_panier = id_panier;
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET loop_finished=1;

    SET curentStatut = (SELECT panier.id_statut FROM PANIER WHERE panier.id_panier = id_panier);
    SELECT curentStatut;
    -- Vérifier que @id_statut est valide (il ne peut pas être décrémenté)
    -- affiche erreur si le statut veut etre decremente
	IF id_statut < curentStatut THEN
        SELECT 'Erreur : Impossible de décrémenter le statut du panier.' as errorMSG;   
    ELSE
    	OPEN produitCursor;
    	FETCH produitCursor INTO id_produit, quantite_produit;
    	WHILE loop_finished=0 DO
			IF (curentStatut = 1) THEN
	    		IF id_statut = 2 THEN
		      		UPDATE PRODUIT
		      		SET produit.quantite_produit = produit.quantite_produit - quantite_produit
		      		WHERE produit.id_produit = id_produit;
				END IF;
			END IF;
			IF (curentStatut = 2 or curentStatut = 3) THEN
            	-- SELECT 'coucou';
				IF id_statut = 5 THEN
                	-- SELECT 'coucou';
					UPDATE PRODUIT
					SET produit.quantite_produit = produit.quantite_produit + quantite_produit
					WHERE produit.id_produit = id_produit;
				END IF;
			END IF;
        	FETCH produitCursor INTO id_produit, quantite_produit;
    	END WHILE;

    	CLOSE produitCursor;
   		-- met a jour le statut du panier
    	UPDATE PANIER SET panier.id_statut = id_statut WHERE panier.id_panier = id_panier;
	END IF;

END $$
DELIMITER ;

-- exemple annulation de commande de 10 unités de pommes
SELECT * FROM PRODUIT;
SELECT * FROM PANIER WHERE id_panier=13;
CALL changerStatutPanier(13, 5);
SELECT * FROM PRODUIT ;

-- ceci est un enchainement de procédures permettant la suppresion d'un utilisateur

-- les procédures supprimment les elements indiqués dans leur nom et ceux qui ont une cle etrangere qui vont vers eux

-- prodcedure de suppession des paniers d'un producteur
DROP PROCEDURE IF EXISTS supprPaniersProduct;
DELIMITER $$
CREATE PROCEDURE supprPaniersProduct
	(in id_production INT)
BEGIN
 	DECLARE id_panier INT;
 	DECLARE loop_finished int DEFAULT 0;
	DECLARE cursor_suppr_panier_product CURSOR FOR SELECT producteurPanier.id_panier FROM producteurPanier WHERE producteurPanier.id_production = id_production;
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET loop_finished = 1;
    
	OPEN cursor_suppr_panier_product;
 	FETCH cursor_suppr_panier_product INTO id_panier;
	WHILE loop_finished = 0 DO
		DELETE FROM AVIS WHERE AVIS.id_panier = id_panier;
		DELETE FROM COMPOSITION WHERE COMPOSITION.id_panier = id_panier;
		DELETE FROM PANIER WHERE PANIER.id_panier = id_panier;
		FETCH cursor_suppr_panier_product INTO id_panier;
 	END WHILE;
 	CLOSE cursor_suppr_panier_product;
END $$
DELIMITER ;

-- procedure suppression de produits
drop procedure if exists supprTousProduits;
DELIMITER $$
create procedure supprTousProduits(
	id_production int)
begin
	DECLARE id_produit int;
    DECLARE loop_finished INT DEFAULT 0;
	DECLARE cur CURSOR FOR SELECT producteurproduit.id_produit from producteurProduit where producteurproduit.id_production = id_production;
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET loop_finished=1;
    CALL supprPaniersProduct(id_production);
	OPEN cur;
	FETCH cur into id_produit; 
	while loop_finished = 0 DO
		DELETE FROM CATEGORISATION where categorisation.id_produit = id_produit;
		DELETE FROM PRODUIT where produit.id_produit = id_produit;
		FETCH cur into id_produit;
	END WHILE;
	CLOSE cur;
end $$
DELIMITER ;

-- processus de suppression des messages d'un utilisateur
drop procedure if exists supprTousMessages;
DELIMITER $$
create procedure supprTousMessages(IN id_util INT)
   begin
	DECLARE id_msg INT;
    DECLARE loop_finished INT DEFAULT 0;
	declare cursor_suppr_msg CURSOR FOR SELECT MESSAGE.id_message from MESSAGE where MESSAGE.id_util = id_util;
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET loop_finished = 1;
    DELETE from RECEPTION where RECEPTION.id_util = id_util;
	open cursor_suppr_msg;
	FETCH cursor_suppr_msg INTO id_msg;
	
	while loop_finished = 0 DO
		DELETE from RECEPTION where RECEPTION.id_message = id_msg;
		FETCH cursor_suppr_msg INTO id_msg;
	end while;
	close cursor_suppr_msg;
	DELETE from MESSAGE where MESSAGE.id_util = id_util;
end $$ 
DELIMITER ; 

-- procedure suppression de paniers d'un utilisateur
DROP PROCEDURE IF EXISTS supprPaniersUtil;
DELIMITER $$
CREATE PROCEDURE supprPaniersUtil(
	IN id_util INT)
BEGIN
	DECLARE id_panier INT;
    DECLARE loop_finished INT DEFAULT 0;
	DECLARE cursor_suppr_panier_util CURSOR FOR SELECT PANIER.id_panier FROM PANIER WHERE PANIER.id_util=id_util;
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET loop_finished=1;
	OPEN cursor_suppr_panier_util;
	FETCH cursor_suppr_panier_util INTO id_panier;
	WHILE loop_finished = 0 DO
		DELETE FROM AVIS WHERE AVIS.id_panier=id_panier;
		DELETE FROM COMPOSITION WHERE COMPOSITION.id_panier=id_panier;
		DELETE FROM PANIER WHERE PANIER.id_panier=id_panier;
		FETCH cursor_suppr_panier_util INTO id_panier;
	END WHILE;
	CLOSE cursor_suppr_panier_util;
END $$
DELIMITER ;

-- procedure de suppression de compte
DROP PROCEDURE IF EXISTS supprCompte;
DELIMITER $$
CREATE PROCEDURE supprCompte(
in id_util INT
)
BEGIN
	DECLARE id_production INT; 
    SET id_production = (SELECT PRODUCTEUR.id_production FROM PRODUCTEUR WHERE PRODUCTEUR.id_util = id_util);
	IF (id_production IS NOT NULL) THEN
		IF EXISTS (SELECT * FROM producteurProduit WHERE producteurProduit.id_production = id_production) THEN
			CALL supprTousProduits(id_production);
		END IF;
		DELETE FROM PRODUCTEUR WHERE PRODUCTEUR.id_production = id_production;
	END IF;
	IF EXISTS (SELECT * FROM ADMINISTRATEUR WHERE ADMINISTRATEUR.id_util = id_util) THEN
		DELETE FROM ADMINISTRATEUR WHERE ADMINISTRATEUR.id_util = id_util;
	END IF;
	CALL supprTousMessages(id_util);
	CALL supprPaniersUtil(id_util);
	DELETE FROM UTILISATEUR WHERE UTILISATEUR.id_util = id_util; 
END$$
DELIMITER ;

-- exemple avec un producteur avec produits et avis
SELECT * FROM UTILISATEUR;
SELECT * FROM MESSAGE;
CALL supprCompte(5);
SELECT * FROM MESSAGE;
SELECT * FROM UTILISATEUR;

-- exemple avec un producteur sans produit
SELECT * FROM UTILISATEUR;
SELECT * FROM MESSAGE;
CALL supprCompte(2);
SELECT * FROM MESSAGE;
SELECT * FROM UTILISATEUR;

-- exemple avec un utlisateur
SELECT * FROM UTILISATEUR;
SELECT * FROM MESSAGE;
CALL supprCompte(12);
SELECT * FROM MESSAGE;
SELECT * FROM UTILISATEUR;

-- exemple avec un administrateur
SELECT * FROM UTILISATEUR;
SELECT * FROM MESSAGE;
CALL supprCompte(11);
SELECT * FROM MESSAGE;
SELECT * FROM UTILISATEUR;

drop view if exists produitPageRecherche;

create view produitPageRecherche as 
	select 
			PRODUIT.id_produit,
			PRODUIT.nom_produit,
			PRODUIT.quantite_produit,
			PRODUIT.prix_produit,
			PRODUIT.promotion_produit,
			UNITE.nom_unite,
			PRODUIT.bio_produit,
			PRODUCTEUR.id_production,
            PRODUCTEUR.nom_production,
            PRODUCTEUR.id_util
        from PRODUIT 
		join PRODUCTEUR on PRODUIT.id_production = PRODUCTEUR.id_production
		join UNITE on UNITE.id_unite = PRODUIT.id_unite
        where PRODUCTEUR.valid_production=1 and PRODUIT.quantite_produit > 0;