<?php 
require_once 'functions/auth.php';
user_connect();
session_start();
require 'tools/bdd.php';
require_once 'templates/head.php';
require_once 'templates/header.php';
$pdo=bddconnect();
$table = "entreprise";
$condition = "pilot";

if(isset($_POST['Delete'])){ 
    bddsupprglobal($pdo, $table, "entreprise_id", $_POST['id']);
}

if(isset($_POST['Create_companie'])){
    $nom_entreprise = $_POST['nom_entreprise'];
    $nb_stagiaire = $_POST['nb_stagiaire'];
    $nom_ville = $_POST['nom_ville'];
    $nom_secteur = $_POST['nom_secteur'];
    var_dump($nom_ville);
    var_dump($nom_secteur);

    var_dump($nb_stagiaire);
    bddcreate_companie($pdo, $nom_entreprise, $nb_stagiaire, $nom_ville, $nom_secteur, $entreprise_id);
}

if(isset($_POST['Update_companie'])){
    $nom_entreprise = $_POST['nom_entreprise'];
    $nb_stagiaire = $_POST['nb_stagiaire'];
    $nom_ville = $_POST['ville_entreprise'];
    $nom_secteur = $_POST['nom_secteur'];
    $entreprise_id = $_POST['id_entreprise'];
    // var_dump($_POST);
    // var_dump($nom_entreprise);
    // var_dump($nb_stagiaire);
    // var_dump($nom_ville);
    // var_dump($nom_secteur);
    update_companies($pdo, $nom_entreprise, $nb_stagiaire, $nom_ville, $nom_secteur, $entreprise_id);
}

$nom_secteur_select = nom_secteur($pdo);
$rowscompanie = select_entreprise($pdo);
$rowscompanie_ville = ville_entreprise($pdo);
$nom_ville = nom_ville($pdo);
// $rows=bddselectglobalpersonne($pdo,$condition);
require_once 'templates/tpl_companies.php';
require_once 'templates/modal_delete.php';
require_once 'templates/modal_create_companie.php';
require_once 'templates/footer.php';
?>