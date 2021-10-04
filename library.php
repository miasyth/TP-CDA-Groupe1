<?php

//require 'filereader.php';

/*
    1- Créer une agence. -- dans library.php
    2- Crée un client. -- dans library.php
    3- Créer un compte bancaire. -- dans library.php
    4- Recherche de compte (numéro de compte).
    5- Recherche de client (Nom, Numéro de compte,Identifiant de client).
    6- Afficher la liste des comptes d'un client (Identifiant client).
    7- Imprimer les infos client (Identifiant client)
*/

function feach1d($array=[]){ // affichage $array (1 dimension)
    
    foreach($array as $key => $v){ // affiche toutes les valeurs de $array
        echo($key<count($array)-1) ? "|".$v : "|".$v."|" ;
    }
    unset($key, $v);

    echo("\n\n");
}

function feach2d($array=[]){ // affichage $array (2 dimensions)
    
    foreach($array as $v){ // affiche toutes les valeurs de $array
        foreach($v as $v2){
            echo("|".$v2);
        }
        echo("|\n");
    }
    unset($v, $v2);

    echo("\n");
}

function feach3d($array=[]){ // affichage $array (3 dimensions)
    
    foreach($array as $v){ // affiche toutes les valeurs de $array
        foreach($v as $v2){
            foreach ($v2 as $v3){
                echo("|".$v3);
            }
            echo("|\n");
        }
        echo("\n");
    }
    unset($v, $v2, $v3);
}

function get_header($array=[]){ // recupere le header d'une table
    
    $array=$array[0];

    return $array;
}

function del_header($array=[]){ // supprime le header d'une table
    $count=count($array);

    for($i=0 ; $i<$count-1 ; $i++){ //decale toutes les valeures de $array vers la gauche
        $array[$i]=$array[$i+1];
    }
    unset($array[$count-1]); // supprime la case restante a la fin d'$array
    return $array;
}

function add_header($array=[], ){ // rajoute le header d'une table
    $count=count($array);

    for($i=$count-1 ; $i>0 ; $i--){ //decale toutes les valeures de $array vers la droite
        $array[$i]=$array[$i+1];
    }
    unset($array[$count-1]); // supprime la case restante a la fin d'$array
    return $array;
}

function add_agence($tableAgence=[]) { // ajoute une agence
    $count=count($tableAgence)-1; //recupere le nombre d'agences
    $i=0; // valeur outil

    //print_r($tableAgence);

    $tableAgence[$count][$i] = 45; // Id Agence

    $tableAgence[$count][$i++]=readline("Entrez le nom de l'agence ");

    $tableAgence[$count][$i++]=readline("Entrez l'adresse de l'agence ");

    $tableAgence[$count][$i++]=readline("Entrez la ville de l'agence ");

    $tableAgence[$count][$i++]=readline("Entrez le code postal de l'agence ");

    return $tableAgence;
}

function add_client($tableAgence=[], $tableClient=[]) { // ajoute un client
    $count=count($tableClient); //recupere le nombre de client 
    $i=0; // valeur outil
    $x=0; // valeur outil
    $y=0; // valeur outil

    while(1){ // entre une agence et verifie qu'elle existe 

        feach2d($tableAgence);
    
        $x=readline("Entrez le numero de votre agence ");

        foreach($tableAgence as $v){
            if($v==$x){
                unset($v);
                break 2;
            }
        }

        echo("Cette agence n'existe pas. Veuillez reesayer.");

        unset($v);
    }

    $tableClient[$count][$i]=$x; // Id Agence

    foreach($tableClient as $v){
        if($tableClient[$v]){

        }
    }

    $tableClient[$count][$i++]=($tableClient[$count-1][$i])+1; // Id Client

    $tableClient[$count][$i++]=readline("Entrez le nom du client ");

    $tableClient[$count][$i++]=readline("Entrez le prenom du client ");

    $tableClient[$count][$i++]=readline("Entrez l'age du client (en chiffres) ");

    $tableClient[$count][$i++]=readline("Entrez le sexe du client (H/F) ");

    $tableClient[$count][$i++]=readline("Entrez l'adresse du client (numero et rue) ");

    $tableClient[$count][$i++]=readline("Entrez la ville du client ");

    $tableClient[$count][$i++]=readline("Entrez le code postal du client ");

    $tableClient[$count][$i++]=readline("Entrez le telephone portable du client ");

    $tableClient[$count][$i++]=readline("Entrez le telephone fixe du client ");

    $tableClient[$count][$i++]=readline("Entrez l'adresse e-mail du client ");

    return $tableClient;
}

function add_compte($tableAgence=[], $tableClient=[], $tableCompte=[]) { // ajoute un compte
    $count=count($tableCompte); //recupere le nombre de comptes
    $i=0; // valeur outil
    $x=0; // valeur outil

    while(1){ // entre une agence et verifie qu'elle existe 

        feach2d($tableAgence);
    
        $x=readline("Entrez le numero de votre agence ");

        foreach($tableAgence as $v){
            
            if($v==$x){
                unset($v);
                break 2;
            }
        }
        echo("Cette agence n'existe pas. Veuillez reesayer.");

        unset($v);
    }

    $tableCompte[$count][$i]=$x; // Id Agence

    $x=0;

    while(1){ // entre un client et verifie qu'il existe 

        feach2d($tableClient);
    
        $x=readline("Entrez le numero du client ");

        foreach($tableClient as $v){
            
            if($v==$x){
                unset($v);
                break 2;
            }
        }
        echo("Ce client n'existe pas. Veuillez reesayer.");

        unset($v);
    }

    $tableCompte[$count][$i++]=$x; // Id Client

    $tableCompte[$count][$i++]=($tableCompte[$count-1][$i])+1; // Id Compte

    $tableCompte[$count][$i++]=readline("Entrez le type de compte ");

    $tableCompte[$count][$i++]=readline("Un decouvert est il authorise? (O/N) ");

    $tableCompte[$count][$i++]=readline("Entrez la solde de depart ");

    return $tableCompte;
}

?>