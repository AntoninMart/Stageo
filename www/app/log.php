<?php
session_start();
$error = null;
require_once 'tools/bdd.php';
$pdo=bddconnect();
if(isset($_POST['submit'])){
    if (!empty($_POST['identifier']) && !empty($_POST['password']) && !empty($_POST['last_name']) && !empty($_POST['first_name'])){
        $ident=$_POST['identifier'];
        $lastn=$_POST['last_name'];
        $firstn=$_POST['first_name'];
        $pass=$_POST['password'];
        $queryreturns=bddselectlog($pdo,$ident,$lastn,$firstn);
        $_SESSION['role']=$queryreturns[0]->user_role;
        $validident=$queryreturns[0]->user_login;
        $validpass=$queryreturns[0]->user_password;
        $validlastn=$queryreturns[0]->nom;
        $validfirstn=$queryreturns[0]->prenom;
        if ($_POST['identifier'] === $validident && $_POST['last_name'] === $validlastn && $_POST['first_name'] === $validfirstn && password_verify($pass,$validpass) === true){
            $_SESSION['connect'] = 1;
            header('Location:/index.php');
            exit();
        }else {
            $error = "Incorrect login or password";
        }
    }else {
        $error = "You must fill in the 2 fields";
    }
}
require_once 'functions/auth.php';

if (connect()){
    header('Location:/index.php');
    exit();
}

require_once('./templates/head.php');
require_once('./templates/signin.php');
require_once('./templates/footer.php'); ?>