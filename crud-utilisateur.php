
<?php

function ajoutUtilisateur(string $mail, string $password)
{   
    $mysqli=new mysqli('localhost','root','','afpa_test');
    if(!$stmt=$mysqli->prepare("INSERT into utilisateur  values (null, ?,?,'user')"))
        {
            echo $mysqli->error;
        }
    $stmt->bind_param("ss",$mail,$password);
    $stmt->execute();
    $mysqli->close();
}

function rechercheUtilisateur(string $mail){
    $mysqli=new mysqli('localhost','root','','afpa_test');
    $stmt = $mysqli->prepare("SELECT * from utilisateur where mail = ?");
    $stmt->bind_param("s",$mail);
    $stmt->execute();
    $rs = $stmt->get_result();
    $data = $rs->fetch_array(MYSQLI_ASSOC);
    $rs->free();
    $mysqli->close();

    return $data;

}


?>