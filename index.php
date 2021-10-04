<?php

require "library.php";
require "filereader.php";

while (true) {
    echo ("\n 1- Créer une agence." . 
        "\n 2- Crée un client." . 
        "\n 3- Créer un compte bancaire." . 
        "\n 4- Recherche de compte (numéro de compte)." . 
        "\n 5- Recherche de client (Nom, Numéro de compte,Identifiant de client)." . 
        "\n 6- Afficher la liste des comptes d'un client (Identifiant client)." .
        "\n 7- Imprimer les infos client (Identifiant client)." .
        "\n 8- Quitter le programme.\n\n");
    $choixMenu = readline("\nVotre choix : ");
    echo ("\n");
        while (!preg_match("#^[1-8]$#", $choixMenu)) {
            $choixMenu = readline("Invalide! refaire votre choix : ");
            echo ("\n");
    };
    switch ($choixMenu){
        case 8: 
            exit;
        case 1:
            function add_agence($tableAgence=[]) { // ajoute une agence
                $count=count($tableAgence); //recupere le nombre d'agences
                $i=0; // valeur outil
            
                $tableAgence[$count][$i]=($tableAgence[$count-1][$i])+1; // Id Agence
            
                $tableAgence[$count][$i++]=readline("Entrez le nom de l'agence ");
            
                $tableAgence[$count][$i++]=readline("Entrez l'adresse de l'agence ");
            
                $tableAgence[$count][$i++]=readline("Entrez la ville de l'agence ");
            
                $tableAgence[$count][$i++]=readline("Entrez le code postal de l'agence ");
            
                return $tableAgence;
            }
            break;
        case 2:
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
            
            break;
        case 3:       
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
            break;
        case 4:
            echo(4);
            break;
        case 5:
            echo(5) ;
            break;
        case 6:
            echo(6);
            break;
        case 7:
            echo(7);
            break;
    };
}
?>