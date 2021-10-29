<?php

$host = "localhost";
$port = "5432";
$dbname = "postgres";
$user = "postgres";
$password = "Lucas240598+";
$connection_string = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password}";
$dbconn = pg_connect($connection_string);

?>