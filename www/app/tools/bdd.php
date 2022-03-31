<?php
function bddconnect(){
    $user = 'root';
    $pass = 'rootpass';
    try {
        $pdo = new PDO('mysql:host=db;dbname=stageo;port=3306;charset=UTF8',$user,$pass);
    } catch (Exception $e) {
        die('Error : ' . $e->getMessage());
    }
    return $pdo;
}
function bddselectlog($pdo,$ident,$lastn,$firstn){
    try{
        $queryselect ='SELECT * FROM Personne WHERE user_login=:ident AND nom=:lastn AND prenom=:firstn AND bool_del = 0';
        $stmt = $pdo->prepare($queryselect);
        $stmt->bindValue(':ident', $ident);
        $stmt->bindValue(':lastn', $lastn);
        $stmt->bindValue(':firstn', $firstn);
        $stmt->execute();
        $queryreturns = $stmt->fetchAll(PDO::FETCH_OBJ);
    //la normalement c'est ajouté 
        return $queryreturns;  
    } catch (Exception $e){
        var_dump($pdo->errorInfo());
        die('Error:' . $e->getMessage());
    }
}
function bddselectglobalpersonne($pdo,$condition){
    try{
        $query = "SELECT * FROM personne INNER JOIN centre INNER JOIN ville WHERE user_role = '".$condition."' AND bool_del = false and personne.centre_id = centre.centre_id and centre.ville_id = ville.ville_id";
        $stmt = $pdo->prepare($query);
        $stmt->execute($rows);
        $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
    } catch (Exception $e){
        var_dump($pdo->errorInfo());
        die('Error:' . $e->getMessage());
    }
    return $rows;
}
function bddsupprglobal($pdo,$table,$compare,$condition){
    try{
        $query = "UPDATE ".$table." SET bool_del = 1 WHERE ".$compare." = '".$condition."'";
        $stmt = $pdo->prepare($query);
        echo($query);
        $stmt->execute($rows);
        $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
        print_r($rows);
    } catch (Exception $e){
        var_dump($pdo->errorInfo());
        die('Error:' . $e->getMessage());
    }
    return $rows;
}
function bddcreate($pdo,$prenom,$nom,$userlogin,$password,$nom_ville,$condition){
    try{
        
        $CONV = "SELECT ville_id FROM Ville WHERE nom_ville = '".$nom_ville."'; ";
        
        $TESTCONV = $pdo->prepare($CONV);
        $TESTCONV->execute($rows);
        $rows = $TESTCONV->fetchAll();
        $VILLEID = $rows[0][0];
        $query = "INSERT INTO Personne (prenom, nom, user_login, user_password, centre_id, bool_del, user_role, bool_delegue) VALUE ('".$prenom."','".$nom."','".$userlogin."','".$password."','".$VILLEID."', '0', '".$condition."', '0')";
        $stmt = $pdo->prepare($query);
        $stmt->execute($rows);
        $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
        // var_dump($rows);
    } catch (Exception $e){
        var_dump($pdo->errorInfo());
        die('Error:' . $e->getMessage());
    }
    return $rows;
}

function bddselectcentre_idbyville($pdo){
    try{
        $query = "SELECT nom_ville FROM Ville NATURAL JOIN Centre WHERE centre_id = ville_id";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $rowscenter = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $rowscenter;
    }catch (Exception $e){
        var_dump($pdo->errorInfo());
        die('Error:' . $e->getMessage());
    }   
}

function update_personne($pdo,$nom,$prenom,$user_login,$centre_id,$id_personne){
    try{
        $CONV = "SELECT ville_id FROM Ville WHERE nom_ville = '".$centre_id."'; ";
        $TESTCONV = $pdo->prepare($CONV);
        $TESTCONV->execute($rows);
        $rows = $TESTCONV->fetchAll();
        $VILLEID = $rows[0][0];

        $query = " UPDATE Personne SET nom = '".$nom."', prenom = '".$prenom."', user_login = '".$user_login."', centre_id = '".$VILLEID."' WHERE personne_id = '".$id_personne."'; ";
        $stmt = $pdo->prepare($query);
        $stmt->execute($rows);
        $rows = $stmt->fetchAll();
    } catch (Exception $e){
        var_dump($pdo->errorInfo());
        die('Error:' . $e->getMessage());
    }
    return $rows;
}
//----------------------------------offers--------------------------------------//
function bddselectglobaloffers($pdo){
    try{
        $query = "SELECT * from Stage inner join Entreprise inner join necessite inner join Skills where Stage.entreprise_id = Entreprise.entreprise_id and Stage.stage_id = necessite.stage_id and necessite.competence_id = skills.competence_id and Stage.bool_del = 0 and Entreprise.bool_del = 0";
        $stmt = $pdo->prepare($query);
        $stmt->execute($rows);
        $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
    } catch (Exception $e){
        var_dump($pdo->errorInfo());
        die('Error:' . $e->getMessage());
    }
    return $rows;
}
function bddsupproffers($pdo,$table,$compare,$condition){
    try{
        $query = "UPDATE ".$table." SET bool_del = 1 WHERE ".$compare." = '".$condition."'";
        $stmt = $pdo->prepare($query);
        $stmt->execute($rows);
        $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
    } catch (Exception $e){
        var_dump($pdo->errorInfo());
        die('Error:' . $e->getMessage());
    }
    return $rows;
}
function bddcreateOffers($pdo,$remuneration,$date_debut_stage,$date_fin_stage,$nb_places,$date_offre,$competence,$nom_entreprise){
    try{
        $COMP = "SELECT competence_id FROM skills WHERE competence = '".$competence."'; ";
        $TESTCOMP = $pdo->prepare($COMP);
        $TESTCOMP->execute($rowscomp);
        $rowscomp = $TESTCOMP->fetchAll();
        $COMPETENCEID = $rowscomp[0][0];

        $CONV = "SELECT entreprise_id FROM Entreprise WHERE nom_entreprise = '".$nom_entreprise."'; ";
        $TESTCONV = $pdo->prepare($CONV);
        $TESTCONV->execute($rows);
        $rows = $TESTCONV->fetchAll();
        $ENTREPRISEID = $rows[0][0];

        $query = "INSERT INTO Stage (remuneration,date_debut_stage,date_fin_stage,nb_places,date_offre,bool_del,entreprise_id) VALUE ('".$remuneration."','".$date_debut_stage."','".$date_fin_stage."','".$nb_places."','".$date_offre."','0','".$ENTREPRISEID."')";
        $stmt = $pdo->prepare($query);
        $stmt->execute($rows);
        $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
        $STAGEID = $pdo->lastInsertId();
        echo("stage____");
        var_dump($STAGEID);

        $NESS = "INSERT INTO necessite (competence_id,stage_id) VALUE ('".$COMPETENCEID."','".$STAGEID."') ";
        $stmtness = $pdo->prepare($NESS);
        $stmtness->execute($rowness);
        $rowness = $stmtness->fetchAll(PDO::FETCH_OBJ);
    } catch (Exception $e){
        var_dump($pdo->errorInfo());
        die('Error:' . $e->getMessage());
    }
    return $rows;
}

function bddselectentreprise_idbyentreprise($pdo){
    try{
        $query = "SELECT nom_entreprise FROM Entreprise ";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $rowsentreprise = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $rowsentreprise;
    }catch (Exception $e){
        var_dump($pdo->errorInfo());
        die('Error:' . $e->getMessage());
    }   
}
function bddselectskill($pdo){
    try{
        $query = "SELECT competence FROM skills";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $rowsskills = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $rowsskills;
    }catch (Exception $e){
        var_dump($pdo->errorInfo());
        die('Error:' . $e->getMessage());
    }   
}

function update_offers($pdo,$remuneration,$date_debut_stage,$date_fin_stage,$nb_places,$date_offre,$competence,$nom_entreprise,$stage_id){
    try{
        $CONV = "SELECT entreprise_id FROM Entreprise WHERE nom_entreprise = '".$nom_entreprise."'; ";
        $TESTCONV = $pdo->prepare($CONV);
        $TESTCONV->execute($rows);
        $rows = $TESTCONV->fetchAll();
        $ENTREPRISEID = $rows[0][0];

        $query = "UPDATE stage SET remuneration = '".$remuneration."', date_debut_stage = '".$date_debut_stage."', date_fin_stage = '".$date_fin_stage."', nb_places = '".$nb_places."', date_offre = '".$date_offre."', entreprise_id = '".$ENTREPRISEID."' WHERE stage_id = '".$stage_id."'; ";
        $stmt = $pdo->prepare($query);
        var_dump($stmt);
        $stmt->execute($rows);
        $rows = $stmt->fetchAll();

        $COMP = "SELECT competence_id FROM skills WHERE competence = '".$competence."'; ";
        $TESTCOMP = $pdo->prepare($COMP);
        $TESTCOMP->execute($rowscomp);
        $rowscomp = $TESTCOMP->fetchAll();
        $COMPETENCEID = $rowscomp[0][0];

        $upOffers = "UPDATE necessite SET competence_id = '".$COMPETENCEID."' WHERE stage_id = '".$stage_id."' ";
        $stmtupd = $pdo->prepare($upOffers);
        var_dump($stmtupd);
        $stmtupd->execute($rowupd);
        $rowupd = $stmtupd->fetchAll(PDO::FETCH_OBJ);
    } catch (Exception $e){
        var_dump($pdo->errorInfo());
        die('Error:' . $e->getMessage());
    }
    return $rows;
}

// ===================
// E N T R E P R I S E
// ===================
function select_entreprise($pdo){
    try{
        $query = "SELECT entreprise.entreprise_id, entreprise.nom_entreprise, entreprise.nb_stagiaire, entreprise.bool_del, ville.ville_id, 
        ville.nom_ville, secteur.secteur_id, secteur.nom_secteur, Avg(ambiance + localisation + ambiance + interet)/5.0 as Moyenne_Note FROM Entreprise
        left join localiser on localiser.entreprise_id = entreprise.entreprise_id 
        left join ville on ville.ville_id = localiser.ville_id left join relation2 on relation2.entreprise_id = entreprise.entreprise_id 
        left join secteur on secteur.secteur_id = relation2.secteur_id
        left join relation4 on relation4.entreprise_id = Entreprise.entreprise_id
        left join Evaluation on Evaluation.evaluation_id = relation4.evaluation_id WHERE bool_del = false
        group by entreprise.entreprise_id, entreprise.nom_entreprise, entreprise.nb_stagiaire, entreprise.bool_del, ville.ville_id, 
        ville.nom_ville, secteur.secteur_id, secteur.nom_secteur;";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $rowscompanie = $stmt->fetchAll(PDO::FETCH_OBJ);
        // print_r($rowscompanie);
        return $rowscompanie;
    }catch (Exception $e){
        var_dump($pdo->errorInfo());
        die('Error:' . $e->getMessage());
    }   
}

function ville_entreprise($pdo){
    try{
        $query = "SELECT nom_ville FROM Entreprise INNER JOIN Localiser INNER JOIN ville WHERE entreprise.entreprise_id = Localiser.entreprise_id AND localiser.ville_id = ville.ville_id;";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $rowscompanie_ville = $stmt->fetchAll(PDO::FETCH_OBJ);
        // print_r($rowscompanie);
        return $rowscompanie_ville;
    }catch (Exception $e){
        var_dump($pdo->errorInfo());
        die('Error:' . $e->getMessage());
    }   
}

function bddcreate_companie($pdo, $nom_entreprise, $nb_stagiaire, $nom_ville, $nom_secteur){
    try{
        // P R E M I E R E  Q U E R Y  (I N S E R T I O N  T A B L E  E N T R E P R I S E)
        $query1 = "INSERT INTO Entreprise (nom_entreprise, nb_stagiaire, bool_del) VALUE ('".$nom_entreprise."', '".$nb_stagiaire."', '0');";
        $stmt = $pdo->prepare($query1);
        $stmt->execute($rows);
        $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
        

        // D E U X I E M E  Q U E R Y

        // CONVERTION NOM ENTREPRISE EN ID ENTREPRISE
        $TESTID = "SELECT entreprise_id FROM Entreprise WHERE nom_entreprise = '".$nom_entreprise."' ";
        $uwu = $pdo->prepare($TESTID);
        $uwu->execute($rowss);
        $rowss = $uwu->fetchAll();
        $entreprise_id = $rowss[0][0];


        // CONVERTION NOM VILLE EN ID VILLE
        $CONV_VILLE = "SELECT ville_id FROM Ville WHERE nom_ville = '".$nom_ville."';";
        $TESTCONV = $pdo->prepare($CONV_VILLE);
        $TESTCONV->execute($rows2);
        $rows2 = $TESTCONV->fetchAll();
        $VILLEID = $rows2[0][0];
        // var_dump($CONV_VILLE);

        // INSERTION TABLE LOCALISER
        $query3 = "INSERT INTO Localiser (entreprise_id, ville_id) VALUE ('".$entreprise_id."', '".$VILLEID."');";
        $stmt3 = $pdo->prepare($query3);
        $stmt3->execute($rows3);
        $rows3 = $stmt3->fetchAll(PDO::FETCH_OBJ);
        // var_dump($rows);
        

        // T R O I S E M E  Q U E R Y
        $CONV_SECTEUR = "SELECT secteur_id FROM Secteur WHERE nom_secteur = '".$nom_secteur."';";
        $CONV2 = $pdo->prepare($CONV_SECTEUR);
        $CONV2->execute($rows4);
        $rows4 = $CONV2->fetchAll();
        $SECTEURID = $rows4[0][0];

        var_dump($CONV_SECTEUR);
        var_dump($SECTEURID);

        $query4 = "INSERT INTO relation2 (entreprise_id, secteur_id) VALUE ('".$entreprise_id."', '".$SECTEURID."');";
        $stmt4 = $pdo->prepare($query4);
        $stmt4->execute($rows4);
        $rows4 = $stmt4->fetchAll(PDO::FETCH_OBJ);

    } catch (Exception $e){
        var_dump($pdo->errorInfo());
        die('Error:' . $e->getMessage());
    }
    return $rows;
}

function nom_ville($pdo){
    try{
        $query = "SELECT nom_ville FROM Ville";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $rowscenter = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $rowscenter;
    }catch (Exception $e){
        var_dump($pdo->errorInfo());
        die('Error:' . $e->getMessage());
    }   
}

function nom_secteur($pdo){
    try{
        $query = "SELECT nom_secteur FROM Secteur";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        // var_dump($query);
        $rowscenter = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $rowscenter;
    }catch (Exception $e){
        var_dump($pdo->errorInfo());
        die('Error:' . $e->getMessage());
    }   
}

function update_companies($pdo, $nom_entreprise, $nb_stagiaire, $nom_ville, $nom_secteur, $entreprise_id){
    try{
      

        // P R E M I E R E  Q U E R Y  (I N S E R T I O N  T A B L E  E N T R E P R I S E)
        $query1 = "UPDATE Entreprise SET nom_entreprise = '".$nom_entreprise."', nb_stagiaire = '".$nb_stagiaire."'  WHERE entreprise_id = '".$entreprise_id."' ;";
        $stmt = $pdo->prepare($query1);
        $stmt->execute($rows);
        $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
        


        // CONVERTION NOM VILLE EN ID VILLE
        $CONV_VILLE = "SELECT ville_id FROM Ville WHERE nom_ville = '".$nom_ville."';";
        $TESTCONV = $pdo->prepare($CONV_VILLE);
        $TESTCONV->execute($rows2);
        $rows2 = $TESTCONV->fetchAll();
        $VILLEID = $rows2[0][0];
        // var_dump($CONV_VILLE);

        // INSERTION TABLE LOCALISER
        $query3 = "UPDATE Localiser SET ville_id = '".$VILLEID."' WHERE entreprise_id = '".$entreprise_id."';";
        $stmt3 = $pdo->prepare($query3);
        $stmt3->execute($rows3);
        $rows3 = $stmt3->fetchAll(PDO::FETCH_OBJ);
        var_dump($query3);
        

        // T R O I S E M E  Q U E R Y
        $CONV_SECTEUR = "SELECT secteur_id FROM Secteur WHERE nom_secteur = '".$nom_secteur."';";
        $CONV2 = $pdo->prepare($CONV_SECTEUR);
        $CONV2->execute($rows4);
        $rows4 = $CONV2->fetchAll();
        $SECTEURID = $rows4[0][0];

        // var_dump($CONV_SECTEUR);
        // var_dump($SECTEURID);

        $query4 = "UPDATE relation2 SET secteur_id = '".$SECTEURID."' WHERE entreprise_id = '".$entreprise_id."';";
        $stmt4 = $pdo->prepare($query4);
        $stmt4->execute($rows4);
        $rows4 = $stmt4->fetchAll(PDO::FETCH_OBJ);
        var_dump($query4);

    } catch (Exception $e){
        var_dump($pdo->errorInfo());
        die('Error:' . $e->getMessage());
    }
    return $rows;
}

?>
