<?php 
session_start();
if($_SESSION['role']==='admin'){
    require_once 'functions/auth.php';
    user_connect();
    session_start();
    require 'tools/bdd.php';
    require_once 'templates/head.php';
    require_once 'templates/header.php';
    $pdo=bddconnect();
    $table = "Stage";
    $condition = "pilot";

    if(isset($_POST['Updateoffers'])){
        $remuneration = $_POST["updater"];
        $date_debut_stage = $_POST["updatejbo"];
        $date_fin_stage = $_POST["updatejfo"];
        $nb_places = $_POST["updatep"];
        $date_offre = $_POST["updatejdo"];
        $competence = $_POST["updatetjs"];
        $nom_entreprise = $_POST["updaten"];
        $stage_id = $_POST["updateidstage"];
        update_offers($pdo,$remuneration,$date_debut_stage,$date_fin_stage,$nb_places,$date_offre,$competence,$nom_entreprise,$stage_id);
    }

    if(isset($_POST['Delete'])){ 
        bddsupproffers($pdo, $table, "stage_id", $_POST['id']);
    }
    if(isset($_POST['CreateOffers'])){
        $remuneration = $_POST["createrem"];
    //$date_debut_stage = $_POST['createdds'];
        $date_debut_stage = preg_replace('#(\d{2})/(\d{2})/(\d{4})\s(.*)#', '$3-$2-$1 $4', $_POST['createdds']);
        echo($date_debut_stage);
    // $date_fin_stage = $_POST["createdfs"];
        $date_fin_stage = date('Y-m-d',strtotime(str_replace('-', '/', $_POST["createdfs"] )));
        $nb_places = $_POST["createnbo"];
        //$date_offre =  $_POST["createdo"];
        $date_offre = date('Y-m-d',strtotime(str_replace('-', '/', $_POST["createdo"] )));
        $competence = $_POST["createc"];
        $nom_entreprise = $_POST["createne"];
        bddcreateOffers($pdo,$remuneration,$date_debut_stage,$date_fin_stage,$nb_places,$date_offre,$competence,$nom_entreprise);
    }

    $rowsentreprise=bddselectentreprise_idbyentreprise($pdo);
    $rowsskills=bddselectskill($pdo);
    $rows=bddselectglobaloffers($pdo);
    require_once 'templates/tpl_offers.php';
    require_once 'templates/modal_delete.php';
    require_once 'templates/modal_create_offers.php';
    require_once 'templates/modal_update.php';
    require_once 'templates/modal_confirm_create.php';
    require_once 'templates/modal_confirm_create_offers.php';
    require_once 'templates/modal_update_offers.php';
    require_once 'templates/footer.php';
}else{ header('Location:/index.php');}  
?>