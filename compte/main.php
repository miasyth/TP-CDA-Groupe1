<?php

require ("Compte.php");

require_once ("connexion.php");

@$IdCompte=$_POST["IdCompte"];
@$Type=$_POST["Type"];
@$Decouvert=$_POST["Decouvert"];
@$Solde=$_POST["Solde"];
@$IdAgence=$_POST["IdAgence"];
@$IdClient=$_POST["IdClient"];
@$valider=$_POST["submit"];
$erreur="";

if(isset($valider)){
    $sql = "insert into public.utilisateur(id_user,_date,nom,prenom,login,pass)values(nextval('seq_utilisateur'),CURRENT_TIMESTAMP,'".$_POST['nom']."','".$_POST['prenom']."','".$_POST['login']."','".md5($_POST['pwd'])."')";
    $ret = pg_query($dbconn, $sql);
    
    if($ret){
        echo("Enregistrement reussi!");
    }else{
        echo("Il y a eu un probleme...");
    }

    }


?>