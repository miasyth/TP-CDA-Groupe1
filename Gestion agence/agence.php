<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de création d'agence.</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="Image/style.css">
</head>

<body>

<?php

    require 'formulaireagence.html';

    echo json_encode($_POST);


    if (isset($_POST['Adresse']) && (isset($_POST['Code_Postal']) && (isset($_POST['Agence'])))){ // si formulaire soumis
        //$tab = $_POST;
        echo $_POST['Adresse'];
        echo $_POST['Code_Postal'];
        echo $_POST['Agence'];
    }
    else if (isset($_POST['Télephone']) && (isset($_POST['Mail']))){ // si formulaire soumis
        //$tab = $_POST;
        echo $_POST['Télephone'];
        echo $_POST['Mail'];
    }


?>
    
</body>

</html>