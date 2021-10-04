<?PHP

$csv = "agence.csv" ;
$tab = [];

function read($csv){
    $file = fopen($csv, 'r');
    while (!feof($file) ) {
        $line[] = fgetcsv($file, 1024, ";");
    }
    fclose($file);
    return $line;
}

$tab = read($csv);


$tab=add_agence($tab);


function write($csv, $tab){
    $file = fopen($csv, 'w');
    foreach($tab as $valeur) {
        if($valeur != null) {
            fputcsv($file, $valeur, ";");
        }
        
        //print_r($valeur); 
    }
    fclose($file);
}

write($csv, $tab);
?>