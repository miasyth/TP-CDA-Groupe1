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

<h4>
    Bonjour, avez bous bien entré cette Adresse <?php echo $_POST['nom'] ?> pour cette agence ? <?php echo $_POST['Agence'] ?>
    Voici le code postal indiqué, <?php echo $_POST['Code_Postal'] ?> ainsi que le Téléphone <?php echo $_POST['Telephone'] ?> et le Mail <?php echo $_POST['Mail'] ?>.
</h4>

<?php
    $Ag = $_POST['Agence'];
    $Ad = $_POST['Adresse'];
    $Cp = $_POST['Code_Postal'];
    $T = $_POST['Télephone'];
    $M = $_POST['Mail'];
?>

<!--Voir pour transférer les valeurs dans un tableau appelé das une fonction, puis les renvoyer dans sur la page html et afficher le tout dans une case.-->
    
</body>

</html>