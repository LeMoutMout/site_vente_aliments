<?php

function deleteAcount($id){
    $db = getDBc();
    
    $db->prepare('CALL supprCompte(:id);')->execute([
        'id' => $id
    ]);
}

/*
 * DROP PROCEDURE IF EXISTS supprPaniersProduct;
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
 declare cursor_suppr_msg CURSOR FOR SELECT message.id_message from MESSAGE where message.id_util = id_util;
 DECLARE CONTINUE HANDLER FOR NOT FOUND SET loop_finished = 1;
 DELETE from RECEPTION where reception.id_util = id_util;
 open cursor_suppr_msg;
 FETCH cursor_suppr_msg INTO id_msg;
 
 while loop_finished = 0 DO
 DELETE from RECEPTION where reception.id_message = id_msg;
 FETCH cursor_suppr_msg INTO id_msg;
 end while;
 close cursor_suppr_msg;
 DELETE from MESSAGE where message.id_util = id_util;
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
 DECLARE cursor_suppr_panier_util CURSOR FOR SELECT panier.id_panier FROM PANIER WHERE panier.id_util=id_util;
 DECLARE CONTINUE HANDLER FOR NOT FOUND SET loop_finished=1;
 OPEN cursor_suppr_panier_util;
 FETCH cursor_suppr_panier_util INTO id_panier;
 WHILE loop_finished = 0 DO
 DELETE FROM AVIS WHERE avis.id_panier=id_panier;
 DELETE FROM COMPOSITION WHERE composition.id_panier=id_panier;
 DELETE FROM PANIER WHERE panier.id_panier=id_panier;
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
 * */