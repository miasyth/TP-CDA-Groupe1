<?php

function add_agence($array=[]) { // ajoute une agence
    $count=count($array); //recupere le nombre d'agences
    $i=0;

    $array[$count][$i]=($array[$count-1][$i])+1; // Id Agence

    $array[$count][$i++]=readline("Entrez le nom de l'agence ");

    $array[$count][$i++]=readline("Entrez l'adresse de l'agence ");

    $array[$count][$i++]=readline("Entrez la ville de l'agence ");

    $array[$count][$i++]=readline("Entrez le code postal de l'agence ");

    return $array;
}

function add_client($array=[], $array2=[]) { // ajoute un client
    $count=count($array); //recupere le nombre de client 
    $i=0;

    $array[$count][$i]=($array[$count-1][$i]); // Id Agence a retravailler

    $array[$count][$i++]=($array[$count-1][$i])+1; // Id Client

    $array[$count][$i++]=readline("Entrez le nom du client ");

    $array[$count][$i++]=readline("Entrez le prenom du client ");

    $array[$count][$i++]=readline("Entrez l'age du client (en chiffres) ");

    $array[$count][$i++]=readline("Entrez le sexe du client (H/F) ");

    $array[$count][$i++]=readline("Entrez l'adresse du client (numero et rue) ");

    $array[$count][$i++]=readline("Entrez la ville du client ");

    $array[$count][$i++]=readline("Entrez le code postal du client ");

    $array[$count][$i++]=readline("Entrez le telephone portable du client ");

    $array[$count][$i++]=readline("Entrez le telephone fixe du client ");

    $array[$count][$i++]=readline("Entrez l'adresse e-mail du client ");

    return $array;
}

function add_compte($array=[], $array2=[], $array3=[]) { // ajoute un compte
    $count=count($array); //recupere le nombre de comptes
    $i=0;

    $array[$count][$i]=($array[$count-1][$i]); // Id Agence a retravailler

    $array[$count][$i++]=($array[$count-1][$i]); // Id Client a retravailler

    $array[$count][$i++]=($array[$count-1][$i])+1; // Id Compte

    $array[$count][$i++]=readline("Entrez le type de compte ");

    $array[$count][$i++]=readline("Un decouvert est il authorise? ");

    $array[$count][$i++]=readline("Entrez la solde de depart ");

    return $array;
}

?>
