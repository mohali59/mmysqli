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
    echo $query; //o affiche la requete sur m ecran pour pouvoir verifier ou le copier coller sur php my admin//

}
             
/////////////////////////////////////fonction supprimer////////////////////////////////////                  
function delete ($noemp){
    $mysqli = connectdb();  //connexion base de donnees

    $query=<<<SUPP
    delete from emp where noemp={$noemp};
SUPP;

    $rs=mysqli_query($mysqli ,$query);

}               

///////////////////////////////////fonction modifier////////////////////////////////////

function update($noemp,$nom,$prenom,$emploi,$sup,$emb,$sal,$comm,$noserv){
    $db = connectdb(); //connexion base de donnees 
    $modifier="UPDATE `emp` 
                SET `nom`='$nom',
                    `prenom`='$prenom',
                    `emploi`='$emploi',
                    `sup`=$sup,
                    `embauche`='$emb',
                    `sal`=$sal,
                    `comm`=$comm,
                    `noserv`=$noserv 
                WHERE noemp=".$_GET["noemp"];
    
    if(mysqli_query($mysqli ,$modifier)){
        echo"<script>alert('ok')</script>";
    } else {
        echo"<script>alert('dead')</script>";
    }

}

//////////////////////////////fonction chercher employes selon noemp////////////////////////////////////

function search($noemp){
    $mysqli = connectdb();  //connexion base de donnees

    //Requete sql select tout les employes de la table emp
    $query=<<<SEARCH
    select * from emp where noemp={$noemp} ;

SEARCH;

    $rs = mysqli_query($mysqli ,$query);
    $data=mysqli_fetch_array($rs,MYSQLI_ASSOC); //MYSQLI_ASSOC permet d afficher un tableau par personne avec tout les infos.
    mysqli_close($mysqli);
    mysqli_free_result($rs); // conseiller a faire pour liberer de l espace memoire

    return $data;

}


//////////////////////////////fonction chercher tout les employes////////////////////////////////////

function searchAll(){
    $mysqli = connectdb();  //connexion base de donnees

    //Requete sql select tout les employes de la table emp
    $query=<<<SEARCH
    select * from emp;

SEARCH;

    $rs = mysqli_query($mysqli ,$query);
    $data=mysqli_fetch_all($rs,MYSQLI_ASSOC); //MYSQLI_ASSOC permet d afficher un tableau par personne avec tout les infos.
    mysqli_close($mysqli);
    mysqli_free_result($rs); // conseiller a faire pour liberer de l espace memoire

    return $data;

}

//////////////////////////////fonction chercher sup////////////////////////////////////
function searchSup()
{
    $db = connectdb();

    $query= "SELECT `sup` FROM `emp`";

    $rs=mysqli_query($mysqli ,$query);
    return $data;
    echo $query;
}




