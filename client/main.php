<?php 
require('client.php');

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

function jsonToArray($chemin){
    $str = file_get_contents($chemin);
    if($str == null){
        return [];
    }
    else{
        $tab = json_decode($str, true);
        return $tab;
    }
}
function arrayToJson($chemin, $tab){
    $data = jsonToArray($chemin);
    $data = array_merge($data, $tab);
    $fichier = fopen($chemin, "w");
    fwrite($fichier, json_encode($_POST, JSON_PRETTY_PRINT));
    fclose($fichier);
}

echo ($Client->nom);
?>