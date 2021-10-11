<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

$nom=$_POST["name_id"];
$tab=$_POST;
echo($_POST["name_id"]);

$prenom=$_POST["prenom_id"];
$tab=$_POST;
echo($_POST["prenom_id"]);

$age=$_POST["user_id"];
$tab=$_POST;
echo($_POST["user_id"]);

$adress=$_POST["adress_id"];
$tab=$_POST;
echo($_POST["adress_id"]);

$codePostal=$_POST["code_id"];
$tab=$_POST;
echo($_POST["code_id"]);

$portable=$_POST["port_id"];
$tab=$_POST;
echo($_POST["port_id"]);

$fixe=$_POST["fixe_id"];
$tab=$_POST;
echo($_POST["fixe_id"]);

$mail=$_POST["mail_id"];
$tab=$_POST;
echo($_POST["mail_id"]);



foreach($tab as $key => $val){
    echo($key);
};
?>

</body>
</html>
