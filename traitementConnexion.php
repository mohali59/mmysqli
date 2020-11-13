<?php
session_start();
include("crud-utilisateur.php");

if (!empty($_POST)) {
    if  (isset($_POST["email"]) && !empty($_POST["email"]) && 
         isset($_POST["password"]) && !empty($_POST["password"])) {

            $mail = $_POST["email"];  
            $data = rechercheUtilisateur($mail);
            if ($data) {
                $passwordCorrect=password_verify($_POST["password"], $data["password"]);
                $profil = $data["profil"];
                if ($passwordCorrect){
                    $_SESSION["mail"] =$mail;
                    $_SESSION["profil"] =$profil;
                    header("Location: tableau.php");
                }
                else{
                    echo"invalide";
                    // header("Location: formulaireconnexion.php");
                }
             } 
             else{
                echo"mail invalide";
                //  header ("Location: formulaireconnexion.php");
             }
                
            }
      } 

    else  {
    echo "la saisie de tous les champs est obligatoire !"; 
}


?>
