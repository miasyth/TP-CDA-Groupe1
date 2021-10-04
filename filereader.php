<?PHP

// Définir le chemin d'accès au fichier CSV
$csv = readline("Veuillez indiquer quel fichier vous souhaitez afficher : agence.csv|client.csv|compte.csv ");
$tab = [];

function read($csv){
    $file = fopen($csv, 'r');
    while (!feof($file) ) {
        $line[] = fgetcsv($file, 1024, ";");
    }
    fclose($file);
    return $line;
}

$csv = read($csv);
$tab [] = $csv;

print_r($csv);


?>