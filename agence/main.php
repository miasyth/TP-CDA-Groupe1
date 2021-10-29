<?php

    require ("Agence.php");
    require ("connection.php");

    $Agence = new Agence (" ", " ", 0 , 0 , " ");

    $Agence -> setAgence ($_POST["Agence"]);

    $Agence -> setAdresse ($_POST["Adresse"]);

    $Agence -> setCodePostal ($_POST["Code_Postal"]);

    $Agence -> setTéléphone ($_POST["Téléphone"]);

    $Agence -> setMail ($_POST["Mail"]);

    @$valider=$_POST["Envoyer"];

    if(isset($valider)){
          $sql = "insert into public.agence(_date,agence,adresse,code_postal,téléphone,mail)values(nextval('seq_agence'),CURRENT_TIMESTAMP,'".$_POST["Agence"]."','".$_POST["Adresse"]."','".$_POST["Code_Postal"]."','".$_POST["Téléphone"].$_POST["Mail"]."')";
          $ret = pg_query($dbconn, $sql);
          if($ret){
            echo("Enregistrement reussi!");
          }else{
            echo("Il y a eu un probleme...");
          }
        }
?>