<?php

require 'filereader.php';

/*
    1- Créer une agence. --
    2- Crée un client. --
    3- Créer un compte bancaire. --
    4- Recherche de compte (numéro de compte). --
    5- Recherche de client (Nom, Numéro de compte,Identifiant de client). --
    6- Afficher la liste des comptes d'un client (Identifiant client). --
    7- Imprimer les infos client (Identifiant client)
*/

function feach1d($array=[]){ // affichage $array (1 dimension)
    
    foreach($array as $key => $v){ // affiche toutes les valeurs de $array
        echo($key<count($array)-1) ? "|".$v : "|".$v."|" ;
    }
    unset($key, $v);

    echo("\n\n");
}

function hfeach1d($array=[],$array2=[]){ // affichage $array (1 dimension)

    
    foreach($array as $key => $v){ // affiche toutes les valeurs de $array
        echo($key<count($array)-1) ? "|".$v : "|".$v."|" ;
    }
    unset($key, $v);

    foreach($array2 as $key => $v){ // affiche toutes les valeurs de $array2
        echo($key<count($array2)-1) ? "|".$v : "|".$v."|" ;
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

function feach2dbis($array=[]){ // affichage $array (2 dimensions) en ignorant la derniere ligne (a utiliser pour les CSV)
    $count=count($array)-1;
    
    foreach($array as $v){ // affiche toutes les valeurs de $array
        if($v!=$array[$count]){
            foreach($v as $v2){
                echo("|".$v2);
            }
            echo("|\n");
        }
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

function add_agence($tableAgence=[]){ // ajoute une agence
    $count=count($tableAgence)-1; // recupere le nombre d'agences
    $i=0; // valeur outil

    $tableAgence[$count][$i]=($tableAgence[1][0]==1) ? $tableAgence[$count-1][0]+1 : 1 ; // Id Agence // ternaire gerant le cas ou il n'y a pas encore d'agence (On pars tous de zero...)

    $tableAgence[$count][++$i]=readline("Entrez le nom de l'agence: ");

    $tableAgence[$count][++$i]=readline("Entrez l'adresse de l'agence: ");

    $tableAgence[$count][++$i]=readline("Entrez la ville de l'agence: ");

    $tableAgence[$count][++$i]=readline("Entrez le code postal de l'agence: ");

    return $tableAgence;
}

function add_client($tableAgence=[], $tableClient=[]){ // ajoute un client
    $count=count($tableClient)-1; // recupere le nombre de clients
    $i=0; // valeur outil
    $x=0; // choix agence
    $y=-1; // numero client, auto-attribue
    $c="A"; // confirmation

    while(1){ // entre une agence et verifie qu'elle existe 

        echo("Voici des agences:\n");
        feach2dbis($tableAgence);
    
        $x=readline("Entrez le numero de votre agence: ");

        foreach($tableAgence as $v){ // verifie l'existence de l'agence
            if($v!=null){
                if($v[0]==$x){
                    unset($v);
                    break 2;
                }
            }
        }

        unset($v);

        echo("Cette agence n'existe pas. Veuillez reesayer. \n\n");
    }

    $tableClient[$count][$i]=$x; // Id Agence

    foreach($tableClient as $v){ // recupere le dernier numero de client de l'agence
        if($v!=$tableClient[0] && $v!=$tableClient[$count]){
            if($v[0]==$x){
                $y=$v[1];
            }
        }
    }

    unset($v);

    if($y==-1){// dans le cas ou l'agence n'a pas encore de client (On pars tous de zero...)
        $y=0;
    }

    $tableClient[$count][++$i]=$y+1; // Id Client

    $tableClient[$count][++$i]=readline("Entrez le nom du client: ");

    $tableClient[$count][++$i]=readline("Entrez le prenom du client: ");

    $tableClient[$count][++$i]=readline("Entrez la date de naissance du client (jj/mm/aaaa): ");

    // module conf sex
    $c=readline("Entrez le sexe du client (H/F): ");

    while($c!='H' && $c!='F'){ // si $c est different de "H" et "F" redemande a l'utilisateur de rentrer une valeur correcte
        $c=readline('vous avez entre un mauvais caractere, veuillez entrer "H" ou "F" ');
    }

    $tableClient[$count][++$i]=$c;
    
    $c="A";
    //

    $tableClient[$count][++$i]=readline("Entrez l'adresse du client (numero et rue): ");

    $tableClient[$count][++$i]=readline("Entrez la ville du client: ");

    $tableClient[$count][++$i]=readline("Entrez le code postal du client: ");

    $tableClient[$count][++$i]=readline("Entrez le telephone portable du client: ");

    $tableClient[$count][++$i]=readline("Entrez le telephone fixe du client: ");

    $tableClient[$count][++$i]=readline("Entrez l'adresse e-mail du client: ");

    return $tableClient;
}

function add_compte($tableAgence=[], $tableClient=[], $tableCompte=[]){ // ajoute un compte
    $count=count($tableCompte)-1; // recupere le nombre de comptes
    $tablebackup=$tableCompte; // backup en cas de compte en trop
    $tableclient[]=$tableClient[0]; // liste des client de l'agence selectionnee
    $count=count($tableCompte)-1; // recupere le nombre de comptes
    $i=0; // valeur outil
    $x=0; // choix agence
    $y=0; // choix client
    $z=-1; // numero compte, auto-attribue
    $c="A"; // confirmation

    while(1){ // entre une agence et verifie qu'elle existe 

        echo("Voici des agences:\n");
        feach2dbis($tableAgence);
    
        $x=readline("Entrez le numero de votre agence: ");

        foreach($tableAgence as $v){ // verifie l'existence de l'agence
            if($v!=null){
                if($v[0]==$x){
                    unset($v);
                    break 2;
                }
            }
        }

        unset($v);

        echo("Cette agence n'existe pas. Veuillez reesayer. \n\n");

    }

    echo("\n");

    $tableCompte[$count][$i]=$x; // Id Agence

    foreach($tableClient as $v){ // recupere la liste de clients de l'agence selectionnee
        if($v!=null){
            if($v[0]==$x){
                $tableclient[]=$v;
            }
        }
    }

    unset($v);

    while(1){ // entre un client et verifie qu'il existe 

        echo("Voici les clients de cette agence:\n");
        feach2d($tableclient);
    
        $y=readline("Entrez le numero du client: ");

        foreach($tableClient as $v){ // verifie l'existence du client
            if($v!=null){
                if($v[1]==$y){
                    unset($v);
                    break 2;
                }
            }
        }
        echo("Ce client n'existe pas. Veuillez reesayer. \n\n");

        unset($v);
    }

    $tableCompte[$count][++$i]=$y; // Id Client

    foreach($tableCompte as $v){ // recupere le dernier Compte du client
        if($v!=$tableCompte[0] && $v!=$tableCompte[$count]){
            if($v[0]==$x && $v[1]==$y){
                $z=$v[2];
            }
        }
    }
    
    unset($v);

    if($z>2){ // dans le cas ou le client a deja 3 comptes
        echo("Desole, ce client a deja le maximum de comptes possibles \n");

        return $tablebackup;

    } else if($z==-1){// dans le cas ou le client n'a pas encore de compte (On pars tous de zero...)
        $z=0;
    }

    $tableCompte[$count][++$i]=$z+1; // Id Compte

    // module conf type
    $c=readline("Entrez le type de compte (C=Courant, A=Livret A, PEL=Plan Epargne Logement): ");

    while($c!='C' && $c!='A' && $c!="PEL"){ // si $c est different de "C" et "A" et "PEL" redemande a l'utilisateur de rentrer une valeur correcte
        $c=readline('vous avez entre un mauvais caractere, veuillez entrer "C" ou "A" ou "PEL" ');
    }

    $tableCompte[$count][++$i]=$c;
    
    $c="A";
    //

    // module conf decouvert
    $c=readline("Un decouvert est il authorise? (O/N): ");

    while($c!='O' && $c!='N'){ // si $c est different de "C" et "A" et "PEL" redemande a l'utilisateur de rentrer une valeur correcte
        $c=readline('vous avez entre un mauvais caractere, veuillez entrer "O" ou "N" ');
    }

    $tableCompte[$count][++$i]=$c;
    
    $c="A";
    //    

    $tableCompte[$count][++$i]=readline("Entrez la solde de depart: ");

    $tableCompte[count($tableCompte)]=null;

    return $tableCompte;
}

function search_compte($tableAgence=[], $tableClient=[] , $tableCompte=[]){ // Recherche de compte
    $tableclient[]=$tableClient[0]; // liste des client de l'agence selectionnee
    $tablecompte[]=$tableCompte[0]; // liste des comptes du client selectionne
    $x=0; // valeur outil
    $y=0; // valeur outil
    $z=0; // valeur outil

    while(1){ // entre une agence et verifie qu'elle existe 

        echo("Voici les agences:\n");
        feach2dbis($tableAgence);
    
        $x=readline("Entrez le numero de votre agence: ");

        foreach($tableAgence as $v){ // verifie l'existence de l'agence
            if($v!=null){
                if($v[0]==$x){
                    unset($v);
                    break 2;
                }
            }
        }

        unset($v);

        echo("Cette agence n'existe pas. Veuillez reesayer. \n\n");

    }

    foreach($tableClient as $v){ // recupere la liste de clients de l'agence selectionnee
        if($v!=null){
            if($v[0]==$x){
                $tableclient[]=$v;
            }
        }
    }

    while(1){ // entre un client et verifie qu'il existe 

        echo("Voici les clients de cette agence:\n");
        feach2d($tableclient);
    
        $y=readline("Entrez le numero du client: ");

        foreach($tableClient as $v){ // verifie l'existence du client
            if($v!=null){
                if($v[1]==$y){
                    unset($v);
                    break 2;
                }
            }
        }
        echo("Ce client n'existe pas. Veuillez reesayer. \n\n");

        unset($v);
    }

    foreach($tableCompte as $v){ // recupere la liste de clients de l'agence selectionnee
        if($v!=null){
            if($v[0]==$x){
                $tablecompte[]=$v;
            }
        }
    }

    $z=readline("Entrez le numero de compte: ");

    echo("");

    foreach($tableCompte as $val){ // affiche le header et le compte recherche
        if($val[0]==$x && $val[1]==$y && $val[2]==$z){
            hfeach1d($tableCompte[0], $val);
            break;
        }
    }

    unset($val);
}

function search_client($tableClient=[]){ // Recherche de client
    $x=0; // valeur outil
    $y=0; // valeur outil
    $z=0; // valeur outil

    while(1){
    
        $z=readline("souhaitez vous chercher un client par rapport a son nom (1) ou a son identifiant client (2)? ");

        switch ($z):

            case 1: // par nom
                $x=readline("Entrez le nom du client: ");
                $y=readline("Entrez le prenom du client: ");

                foreach($tableClient as $val){ // affiche le header et le client recherche
                    if($val[2]==$x && $val[3]==$y){
                        feach1d($tableClient[0]);
                        feach1d($val);
                        break;
                    }
                }

                unset($val);

                break 2;

            case 2: // par identifiant
                $x=readline("Entrez le numero de l'agence du client: ");
                $y=readline("Entrez le numero du client: ");
        
                foreach($tableClient as $val){ // affiche le header et le client recherche
                    if($val[0]==$x && $val[1]==$y){
                        feach1d($tableClient[0]);
                        feach1d($val);
                        break;
                    }
                }

                unset($val);
                break 2;
        
            default: // ^^
                echo("re-essayez avec les option proposee...\n");

                break;

        endswitch;
    }
}

function list_comptes($tableCompte=[]){ // Affiche la liste des comptes d'un client
    $x=0; // valeur outil
    $y=0; // valeur outil
    $z=0; // valeur outil

    $x=readline("Entrez le numero de l'agence du client: ");
    $y=readline("Entrez le numero du client: ");

    foreach($tableCompte as $val){ // affiche le header et la liste des comptes appartenant a ce client
        if($val[0]==$x && $val[1]==$y){
            if($z==0){
                feach1d($tableCompte[0]);
            }
            feach1d($val);
            $z=1;
        }
    }

    unset($val);
}

function print_client($tableClient=[], $tableCompte=[]){
    $tclient=[]; // valeur outil
    $tcomptes=[]; // tableau avec les comptes du client
    $x=0; // valeur outil
    $y=0; // valeur outil

    $x=readline("Entrez le numero de l'agence du client: ");
    $y=readline("Entrez le numero du client: ");

    foreach($tableClient as $val){ // recupere les infos du client recherche
        if($val[0]==$x && $val[1]==$y){
            $tclient=$val;
            break;
        }
    }

    unset($val);

    foreach($tableCompte as $val){ // recupere les comptes du client recherche
        if($val[0]==$x && $val[1]==$y){
            $tcompte[]=$val;
        }
    }

    echo("Fiche CLient\n\n");

    echo("Numero client: ".$tclient[0].$tclient[1]."\n");
    echo("Nom: ".$tclient[2]."\n");
    echo("Prenom: ".$tclient[3]."\n");
    echo("Date de naissance: ".$tclient[4]."\n");

    echo("\n----------------------------------------------------------------------------------------------------\n");

    echo("Liste de comptes");

    echo("\n----------------------------------------------------------------------------------------------------\n");



    echo("\n----------------------------------------------------------------------------------------------------\n");
    unset($val);

}

function opall(){ // ouvre tous les fichiers CSV et les place dans un tableau
    $array=[];

    $array[0]=read('agence.csv');
    $array[1]=read('client.csv');
    $array[2]=read('compte.csv');
    
    return $array;
}

function clall($array){ // sauvegarde tous les tableaux et les place dans un fichiers CSV

    write('agence.csv', $array[0]);
    write('client.csv', $array[1]);
    write('compte.csv', $array[2]);
}

/*

// unused functions

function get_header($array=[]){ // recupere le header d'une table
    $header=[];

    $header=$array[0];

    return $header;
}

function del_header($array=[]){ // supprime le header d'une table
    $count=count($array);

    for($i=0 ; $i<$count-1 ; $i++){ // decale toutes les valeures de $array vers la gauche
        $array[$i]=$array[$i+1];
    }
    unset($array[$count-1]); // supprime la case restante a la fin d'$array
    
    return $array;
}

function add_header($array=[], $header=[]){ // rajoute le header d'une table
    $count=count($array);

    for($i=$count-1 ; $i>0 ; $i--){ // decale toutes les valeures de $array vers la droite
        $array[$i]=$array[$i+1];
    }
    unset($array[$count-1]); // supprime la case restante a la fin d'$array
    
    $array[0]=$header;

    return $array;
}

*/

?>