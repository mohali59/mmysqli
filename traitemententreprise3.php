<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Document</title
</head>
<body>

    <?php
        include("crud-utilisateur.php");
if (!empty($_POST)) {
    if  (!isset($_POST["email"]) && empty($_POST["email"]) && 
        !isset($_POST["password"]) && empty($_POST["password"])) {

            $mail = $_POST["email"];
            $password = $_POST["password"];
            $newPassword=password_hash($password, PASSWORD_DEFAULT) ;
            ajoutUtilisateur ($mail,$newPassword);

    } 

    else  {
    echo "la saisie de tous les champs est obligatoire !"; 
      }
}


?>


 
    </body>
</html>