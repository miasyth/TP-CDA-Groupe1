<?php

require "client.php";

function add_client($tableAgence=[], $tableClient=[]){ // ajoute un client
    $tablebackup=$tableClient; // backup en cas de non existence d'agence
    $count=count($tableClient)-1; // recupere le nombre de clients
    $iN=0; // initiale nom
    $iP=0; // initiale prenom
    $i=0; // valeur outil
    $x=0; // choix agence
    $y=-1; // numero client, auto-attribue
    $c="A"; // confirmation

    $x=check_agence($tableAgence);

    if($x==null){
        return $tablebackup;
    }

    if($x>="010" && $x<="100"){ // gere les ajouts de zero pour l'id Agence

        $x="0".$x;

    } else if($x>="001"){

        $x="00".$x;

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

    if(substr($y,5)=="999"){ // dans le cas ou l'agence a deja 999 clients

        echo("Desole, le nombre maximum de clients pour cette agence est atteint\n");
        return $tablebackup;

    } else if($y==-1){ // dans le cas ou l'agence n'a pas encore de client (On pars tous de zero...)
        $y=0;
    }

    $tableClient[$count][++$i]=0;
    
    $tableClient[$count][++$i]=readline("Entrez le nom du client: ");

    if($tableClient[$count][$i]==null){
        return $tablebackup;
    }

    $iN=$tableClient[$count][$i][0];

    $tableClient[$count][++$i]=readline("Entrez le prenom du client: ");

    if($tableClient[$count][$i]==null){
        return $tablebackup;
    }

    $iP=$tableClient[$count][$i][0];

    
    if($tableClient[$count-1]==$tableClient[0]){ // gere les ajouts de zero pour l'id Client

        $idClient=$iN.$iP.$x."001";

    } else if(substr($y,5)>"100"){

        $idClient=$iN.$iP.$x.substr($y,5)+1;

    } else if(substr($y,5)>"010"){

        $idClient=$iN.$iP.$x."0".substr($y,5)+1;

    } else if(substr($y,5)>="001"){

        $idClient=$iN.$iP.$x."00".substr($y,5)+1;

    } else if($y==0){
        $idClient=$iN.$iP.$x."001";
    }

    $tableClient[$count][1]=$idClient; // Id Client


    $tableClient[$count][++$i]=readline("Entrez la date de naissance du client (jj/mm/aaaa): ");

    if($tableClient[$count][$i]==null){
        return $tablebackup;
    }

    // module conf sex
    $c=readline("Entrez le sexe du client (H/F): ");

    while($c!='H' && $c!='F'){ // si $c est different de "H" et "F" redemande a l'utilisateur de rentrer une valeur correcte
        $c=readline('vous avez entre un mauvais caractere, veuillez entrer "H" ou "F" ');
    }

    $tableClient[$count][++$i]=$c;
    
    $c="A";
    //

    $tableClient[$count][++$i]=readline("Entrez l'adresse du client (numero et rue): ");

    if($tableClient[$count][$i]==null){
        return $tablebackup;
    }

    $tableClient[$count][++$i]=readline("Entrez la ville du client: ");

    if($tableClient[$count][$i]==null){
        return $tablebackup;
    }

    $tableClient[$count][++$i]=readline("Entrez le code postal du client: ");

    if($tableClient[$count][$i]==null){
        return $tablebackup;
    }

    $tableClient[$count][++$i]=readline("Entrez le telephone portable du client: ");

    if($tableClient[$count][$i]==null){
        return $tablebackup;
    }

    $tableClient[$count][++$i]=readline("Entrez le telephone fixe du client: ");

    if($tableClient[$count][$i]==null){
        return $tablebackup;
    }

    $tableClient[$count][++$i]=readline("Entrez l'adresse e-mail du client: ");

    if($tableClient[$count][$i]==null){
        return $tablebackup;
    }

    return $tableClient;
}


$fp = fopen("client.json", "w+");
    fwrite($fp, json_encode($tab));
    fclose($fp);

?>