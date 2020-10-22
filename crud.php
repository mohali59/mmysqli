<?php

function add($noemp,$nom,$prenom,$emploi,$sup,$emb,$sal,$comm,$noserv){
    $query=<<<INSERT
      insert into emp values ({$noemp},"{$nom}","{$prenom}",{$emploi},{$sup},{$emb},{$sal},{$comm},{$noserv};
INSERT;
    $mysqli= mysqli_init();
    mysqli_real_connect($mysqli,'localhost','mohali','mohali59','entreprise');
 
    mysqli_query($mysqli ,$query);
}

?>


<!-- {                       
                       $query=<<<INSERT
                       insert into emp values ({$_POST["noemp"]}, "{$_POST['nom']}", "{$_POST['prenom']}","{$_POST['emploi']}", {$_POST["sup"]}, "{$_POST['emb']}",
                       {$_POST["sal"]}, {$_POST["comm"]}, {$_POST["noserv"]});
INSERT;
                      $mysqli= mysqli_init();
                      mysqli_real_connect($mysqli,'localhost','mohali','mohali59','entreprise');
                      $rs=mysqli_query($mysqli ,$query);
                       } -->