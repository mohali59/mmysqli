<?php
include("crud-utilisateur.php");
if (!empty($_POST)) {
    if  (isset($_POST["email"]) && !empty($_POST["email"]) && 
        isset($_POST["password"]) && !empty($_POST["password"])) {

        $mail = $_POST["email"];
        $password = $_POST["password"];
        $newPassword=password_hash($password, PASSWORD_DEFAULT) ;
        ajoutUtilisateur ($mail,$newPassword);

    } else  {
        echo "la saisie de tous les champs est obligatoire !"; 
    }
}


?>


 
    </body>
</html>