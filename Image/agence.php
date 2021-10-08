<?php

$strJson = file_get_contents('agences.json');

$agences = json_decode($strJson, TRUE);

echo($agences)

?>