<?php

require "library.php";
//require "filereader.php";

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
            add_agence([]);
            break;
        case 2:
            add_client([],[]);
            break;
        case 3:       
            add_compte([],[],[]);
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