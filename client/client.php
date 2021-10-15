<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php


echo json_encode($_POST);

$tab=[];

$agence=$_POST["agence_id"]; // Choix de l'agence
$tab=$_POST;


$nom=$_POST["name_id"]; // Mettre son nom de famille
$tab=$_POST;


$prenom=$_POST["prenom_id"]; // Mettre son prénom
$tab=$_POST;


$age=$_POST["age_id"]; // Mettre sa date de naissance
$tab=$_POST;

if (!preg_match("/[0-9]{2}\/[0-9]{2}\/[0-9]{4}/", $age))
  {
   $error = true;
   echo ("Veuillir saisir votre date de naissance sous ce format JJ/MM/AAAA");
  }


$sexe=$_POST["sexe_id"]; // Choix du sexe
$tab=$_POST;



$adress=$_POST["adress_id"]; // renseignement sur l'adresse
$tab=$_POST;

if( preg_match('#[0-9]+[a-z]+ [a-z]+ [0-9]{5}#i', $adress) ){
    echo 'Bonne adresse !';
}
    
else{
    echo('Veuillez saisir une adresse valide (Exemple : 1 avenue du tour');
}
   

$codePostal=$_POST["code_id"];
$tab=$_POST;

if ( preg_match ("~^[0-9]{5}$~",$codePostal)){
    echo ("Vrai");
}
else{
    echo ("Faux");
}


$tel=$_POST["tel_id"]; // Renseignement sur les contacts 
$tab=$_POST;

if(preg_match("#[0][1-9][- \.?]?([0-9][0-9][- \.?]?){4}$#", $tel)){
    echo ("Votre numéro de téléphone est : $tel");
}
else{
    echo ("Veuillez saisir un numéro de téléphone valide : $tel");
}
      

$mail=$_POST["mail_id"];
$tab=$_POST;

if(preg_match("/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,4}$/", $mail))  {
      echo ("L'adresse email '$mail' est valide.");
    } 
else {
        echo ("L'adresse email '$mail' est invalide.");
}


foreach($tab as $key => $val){
    echo($key);
};

$fp = fopen("client.json", "w+");
    fwrite($fp, json_encode($tab));
    fclose($fp);

?>

</body>
</html>
