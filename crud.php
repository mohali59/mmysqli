<?php

////////////////////////////////////fonction connexion bdd////////////////////////////

function connectdb(){
    $mysqli = mysqli_init();
    mysqli_real_connect($mysqli,'localhost','mohali','mohali59','entreprise');
    
    return $mysqli;
}

////////////////////////////////////fonction ajouter////////////////////////////////// 

function add($noemp,$nom,$prenom,$emploi,$sup,$emb,$sal,$comm,$noserv){
    $query=<<<INSERT
      insert into emp values ({$noemp},"{$nom}","{$prenom}","{$emploi}",{$sup},"{$emb}",{$sal},{$comm},{$noserv});
INSERT;

    $mysqli = connectdb();  //connexion base de donnees
    mysqli_query($mysqli ,$query);
}
             
/////////////////////////////////////fonction supprimer////////////////////////////////////                  
function delete ($noemp){
    $query=<<<SUPP
    delete from emp where noemp={$noemp};
SUPP;
    
    $mysqli = connectdb();  //connexion base de donnees

    $rs=mysqli_query($mysqli ,$query);

}               

///////////////////////////////////fonction modifier////////////////////////////////////

function update($noemp,$nom,$prenom,$emploi,$sup,$emb,$sal,$comm,$noserv){
    $modifier="UPDATE `emp` SET `nom`='$nom',`prenom`='$prenom',`emploi`='$emploi',`sup`=$sup,
    `embauche`='$emb',`sal`=$sal,`comm`=$comm,`noserv`=$noserv WHERE noemp=".$_GET["noemp"];
    echo $modifier;
    
    $mysqli = connectdb(); //connexion base de donnees 

    $rs=mysqli_query($mysqli ,$modifier);

}

//////////////////////////////fonction chercher employes////////////////////////////////////

function search(){
    $mysqli = connectdb();  //connexion base de donnees

    //Requete sql select tout les employes de la table emp
    $query=<<<SEARCH
    SELECT * FROM emp WHERE noemp= $_GET["noemp"])

SEARCH;

    $rs = mysqli_query($mysqli ,$query);
    $data=mysqli_fetch_all($rs,MYSQLI_ASSOC); //MYSQLI_ASSOC permet d afficher un tableau par personne avec tout les infos.
    mysqli_close($mysqli);
    mysqli_free_result($rs); // conseiller a faire pour liberer de l espace memoire

    return $data;

}



