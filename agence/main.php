<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de création d'agence.</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="formulaireagence.html">
</head>

<body>
<?php
    require ("Agence.php");
    $chemin = "Agence.php";

    $Agence = new Agence (" ", " ", 0 , 0 , " ");

    $Agence -> setAgence ($Ag = $_POST["Agence"]);

    $Agence -> setAdresse ($Ad = $_POST["Adresse"]);

    $Agence -> setCodePostal ($Cp = $_POST["Code_Postal"]);

    $Agence -> setTéléphone ($T = $_POST["Téléphone"]);

    $Agence -> setMail ($M = $_POST["Mail"]);

    $tab=$_POST;
    
    foreach($tab as $key => $val){
        $data[] = $val;
        print_r("$val |");
    }
    
    /*$fp = fopen('agence.json', 'w');
    fwrite($fp, json_encode($data, JSON_PRETTY_PRINT));
    fclose($fp);*/

    $json = json_encode(array_values($data));
	file_put_contents("agence.json",$json,LOCK_EX);

?>  


<!--Voir pour transférer les valeurs dans un tableau appelé das une fonction, puis les renvoyer dans sur la page html et afficher le tout dans une case.-->
    
</body>

</html>