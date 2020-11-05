<?php

////////////////////////////////////fonction connexion bdd////////////////////////////

function connectdb(){
    $mysqli = mysqli_init();
    mysqli_real_connect($mysqli,'localhost','root','','afpa_test');
    
    return $mysqli;
}

////////////////////////////////////fonction ajouter////////////////////////////////// 

function add($no_emp,$nom,$prenom,$emploi,$sup,$emb,$sal,$comm,$noserv){
    $query=<<<INSERT
      insert into employe values ({$no_emp},"{$nom}","{$prenom}","{$emploi}","{$emb}",{$sal},{$comm},{$noserv},{$sup}, null);
INSERT;

    $mysqli = connectdb();  //connexion base de donnees
    mysqli_query($mysqli ,$query);
    echo $query; //on affiche la requete sur l ecran pour pouvoir verifier ou le copier coller sur php my admin//

}
             
/////////////////////////////////////fonction supprimer////////////////////////////////////                  
function delete ($no_emp){
    $mysqli = connectdb();  //connexion base de donnees

    $query=<<<SUPP
    delete from employe where no_emp={$no_emp};
SUPP;

    $rs=mysqli_query($mysqli ,$query);

}               

///////////////////////////////////fonction modifier////////////////////////////////////

function update($prenom,$nom,$emploi,$sup,$emb,$sal,$comm,$noserv){
    $mysqli = connectdb(); //connexion base de donnees 
    $modifier="UPDATE `employe` 
                SET `nom`='$nom',
                    `prenom`='$prenom',
                    `emploi`='$emploi',
                    `sup`=$sup,
                    `embauche`='$emb',
                    `sal`=$sal,
                    `comm`=$comm,
                    `noserv`=$noserv 
                WHERE no_emp=".$_GET["no_emp"];
    
    if(mysqli_query($mysqli ,$modifier)){
        echo"<script>alert('ok')</script>";
    } else {
        echo"<script>alert('dead')</script>";
    }

}

//////////////////////////////fonction chercher employes selon no_emp////////////////////////////////////

function search($no_emp){
    $mysqli = connectdb();  //connexion base de donnees

    //Requete sql select tout les employes de la table emp
    $query=<<<SEARCH
    select * from employe where no_emp={$no_emp} ;

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
    select * from employe;

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
    $mysqli = connectdb();
    $query= "SELECT `sup` FROM `employe`";
    $rs=mysqli_query($mysqli ,$query);
    $data = mysqli_fetch_array($rs, MYSQLI_ASSOC);
    return $data;
}





