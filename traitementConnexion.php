<?php
session_start();
include("crud-utilisateur.php");

if (!empty($_POST)) {
    if  (isset($_POST["email"]) && !empty($_POST["email"]) && 
         isset($_POST["password"]) && !empty($_POST["password"])) {

            $mail = $_POST["email"];
            $password = $_POST["password"];
            $data = rechercheUtilisateur($mail);
            if ($data) {
                $passwordCorrect=password_verify($password, $data["password"]);
                if ($passwordCorrect){
                    $_SESSION["mail"] = $email;
                    header("Location: tableau.php");
                }
                else{
                    header("Location: formulaireconnexion.php");
                }
             } 
             else{
                 header ("Location: formulaireconnexion.php");
             }
                
            }
      } 

    else  {
    echo "la saisie de tous les champs est obligatoire !"; 
}


?>
