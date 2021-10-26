<?php

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
    fwrite($fichier, json_encode($data, JSON_PRETTY_PRINT));
    fclose($fichier);
}

?>