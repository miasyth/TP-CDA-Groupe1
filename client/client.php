<?php 
require ('classclient.php') ;

$host = "localhost";
$port = "5432";
$dbname = "Banque";
$user = "postgres";
$password = "Lolita62128!";
$connection_string = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password}";
$dbconn = pg_connect($connection_string);

function colorLog($str, $type = 'i'){
    switch ($type) {
        case 'e': //error
            echo "\033[31m$str \033[0m\n";
        break;
        case 's': //success
            echo "\033[32m$str \033[0m\n";
        break;
        case 'w': //warning
            echo "\033[33m$str \033[0m\n";
        break;  
        case 'i': //info
            echo "\033[36m$str \033[0m\n";
        break;      
        default:
        # code...
        break;
    }
}

echo json_encode($_POST);

$tab=[];

$id=$_POST["IdAgence"]; // Choix de l'agence
$tab=$_POST;


$id1=$_POST["name_id"]; // Mettre son nom de famille
$tab=$_POST;


$id2=$_POST["prenom_id"]; // Mettre son prénom
$tab=$_POST;


$id3=$_POST["date_id"]; // Mettre sa date de naissance
$tab=$_POST;

if (!preg_match("/[0-9]{2}\/[0-9]{2}\/[0-9]{4}/", $id3))
  {
   $error = true;
   echo ("Veuillir saisir votre date de naissance sous ce format JJ/MM/AAAA");
  }


$id4=$_POST["sexe_id"]; // Choix du sexe
$tab=$_POST;



$id5=$_POST["adress_id"]; // renseignement sur l'adresse
$tab=$_POST;

if( preg_match('#[0-9]+[a-z]+ [a-z]+ [0-9]{5}#i', $id5) ){
    echo 'Bonne adresse !';
}
    
else{
    echo('Veuillez saisir une adresse valide (Exemple : 1 avenue du tour');
}
   

$id6=$_POST["code_id"];
$tab=$_POST;

if ( preg_match ("~^[0-9]{5}$~",$id6)){
    echo ("Vrai");
}
else{
    echo ("Faux");
}


$id7=$_POST["tel_id"]; // Renseignement sur les contacts 
$tab=$_POST;

if(preg_match("#[0][1-9][- \.?]?([0-9][0-9][- \.?]?){4}$#", $id7)){
    echo ("Votre numéro de téléphone est : $id7");
}
else{
    echo ("Veuillez saisir un numéro de téléphone valide : $id7");
}
      

$id8=$_POST["mail_id"];
$tab=$_POST;

if(preg_match("/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,4}$/", $id8))  {
      echo ("L'adresse email '$id8' est valide.");
    } 
else {
        echo ("L'adresse email '$id8' est invalide.");
}


foreach($tab as $key => $val){
    echo($key);
};


?>