<?php
include_once('Utilisateur.php');

class UtilisateurMysqliDAO
{


    function ajoutUtilisateur(string $mail, string $password)
    {   
        $mysqli=new mysqli('localhost','mohali','mohali59','entreprise1');
        if(!$stmt=$mysqli->prepare("INSERT into utilisateur  values (null, ?,?,'user')"))
            {
                echo $mysqli->error;
            }
        $stmt->bind_param("ss",$mail,$password);
        $stmt->execute();
        $mysqli->close();
    }

    function rechercheUtilisateur(string $mail)
    {
        $mysqli=new mysqli('localhost','mohali','mohali59','entreprise1');
        $stmt = $mysqli->prepare("SELECT * from utilisateur where mail = ?");
        $stmt->bind_param("s",$mail);
        $stmt->execute();
        $rs = $stmt->get_result();
        $data = $rs->fetch_array(MYSQLI_ASSOC);
        $rs->free();
        $mysqli->close();

        return $data;

    }
}

?>