<?php 
session_start();
if($_SESSION['role']==='admin' || $_SESSION['role']==='pilot'){
    require_once 'functions/auth.php';
    user_connect();
    session_start();
    require 'tools/bdd.php';
    require_once 'templates/head.php';
    require_once 'templates/header.php';
    $pdo=bddconnect();
    $table = "Personne";
    $condition = "student";

    if(isset($_POST['Update'])){
        $id_personne = $_POST["updateid"];
        $prenom = $_POST["updatefn"]; 
        $nom = $_POST["updateln"];
        $userlogin = $_POST['updatel'];
        //$password = password_hash($_POST["user_password"]);
        $centre_id = $_POST["updatev"];   
        update_personne($pdo, $nom, $prenom, $userlogin, $centre_id, $id_personne);
    }

    if(isset($_POST['Delete'])){ 
        bddsupprglobal($pdo, $table, "personne_id", $_POST['id']);
    }
    if(isset($_POST['Create'])){
        $prenom = $_POST["createfnid"]; 
        $nom = $_POST["createlnid"];
        $userlogin = $_POST['createlid'];
        $password = password_hash($_POST["createpid"],PASSWORD_DEFAULT,['cost'=>15]);
        $nom_ville = $_POST["createvid"];
        bddcreate($pdo, $prenom, $nom, $userlogin, $password, $nom_ville,$condition);
    }
    $rowscenter=bddselectcentre_idbyville($pdo);
    $rows=bddselectglobalpersonne($pdo,$condition);
    require_once 'templates/tpl_students.php';
    require_once 'templates/modal_delete.php';
    require_once 'templates/modal_create.php';
    require_once 'templates/modal_update.php';
    require_once 'templates/modal_confirm_create.php';
    require_once 'templates/footer.php';
    }else{ header('Location:/index.php');}
?>