
<?php

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
?>