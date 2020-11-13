<?php

////////////////////////////////////fonction connexion bdd////////////////////////////

function connectdb(){
    $mysqli = mysqli_init();
    mysqli_real_connect($mysqli,'localhost','mohali','mohali59','entreprise1');
    
    return $mysqli;
}

////////////////////////////////////fonction ajouter////////////////////////////////// 

// function add($no_emp,$nom,$prenom,$emploi,$sup,$emb,$sal,$comm,$noserv){
//     $query=<<<INSERT
//       insert into employe values ({$no_emp},"{$nom}","{$prenom}","{$emploi}","{$emb}",{$sal},{$comm},{$noserv},{$sup});
// INSERT;

//     $mysqli = connectdb();  //connexion base de donnees
//     mysqli_query($mysqli ,$query);
//     echo $query; //on affiche la requete sur l ecran pour pouvoir verifier ou le copier coller sur php my admin//

// }
function addEmploye(int $no_emp, string $nom, string $prenom, string $emploi, string $emb, float $sal, float $comm, int $noserv, int $sup)
{   
    if(!$stmt=$mysqli->prepare("INSERT into employe  values (?,?,?,?,?,?,?,?,?)"))
        {
            echo $mysqli->error;
        }
    $stmt->bind_param("issssddii",$no_emp,$nom,$prenom, $emploi, $emb, $sal, $comm, $noserv, $sup);
    $stmt->execute();
    $mysqli->close();

    }  




function delete(int $no_emp)
{   
    $mysqli=new mysqli('localhost','mohali','mohali59','entreprise1');
    if(!$stmt=$mysqli->prepare(" DELETE FROM employe  where no_emp=?"))
        {
            echo $mysqli->error;
        }
    $stmt->bind_param('i',$no_emp);
    $stmt->execute();
    $mysqli->close();
}

function update(string $nom, string $prenom, string $emploi,int $sup, string $emb, float $sal, float $comm, int $noserv)
{   
                $mysqli=new mysqli('localhost','mohali','mohali59','entreprise1');
                        if(!$stmt=$mysqli->prepare("UPDATE employe  SET `nom`=?,
                        `prenom`=?,
                        `emploi`=?,
                        `sup`=?,
                        `embauche`=?,
                        `sal`=?,
                        `comm`=?,
                        `noserv`=?
                    WHERE no_emp=?"))
        {
            echo $mysqli->error;
        }
    $stmt->bind_param("sssisddii",$nom,$prenom, $emploi,$sup, $emb, $sal, $comm, $noserv,$_GET["no_emp"]);
    $stmt->execute();
    $mysqli->close();

    }  

// function search($no_emp){
//     $mysqli = connectdb();  //connexion base de donnees

//     //Requete sql select tout les employes de la table emp
//     $query=<<<SEARCH
//     select * from employe where no_emp={$no_emp} ;

// SEARCH;

//     $rs = mysqli_query($mysqli ,$query);
//     $data=mysqli_fetch_array($rs,MYSQLI_ASSOC); //MYSQLI_ASSOC permet d afficher un tableau par personne avec tout les infos.
//     mysqli_close($mysqli);
//     mysqli_free_result($rs); // conseiller a faire pour liberer de l espace memoire

//     return $data;


function search(int $no_emp)
{   
    $mysqli=new mysqli('localhost','mohali','mohali59','entreprise1');
    if(!$stmt=$mysqli->prepare(" SELECT 'no_emp' FROM employe  where no_emp=?"))
        {
            echo $mysqli->error;
        }
    $stmt->bind_param('i',$no_emp);
    $stmt->execute();
    $rs = $stmt->get_result();
    $data=$rs->fetch_array(MYSQLI_ASSOC);
    $mysqli->close();
}



//////////////////////////////fonction chercher tout les employes////////////////////////////////////

// function searchAll(){
//     $mysqli = connectdb();  //connexion base de donnees

//     //Requete sql select tout les employes de la table emp
//     $query=<<<SEARCH
//     select * from employe;

// SEARCH;

//     $rs = mysqli_query($mysqli ,$query);
//     $data=mysqli_fetch_all($rs,MYSQLI_ASSOC); //MYSQLI_ASSOC permet d afficher un tableau par personne avec tout les infos.
//     mysqli_close($mysqli);
//     mysqli_free_result($rs); // conseiller a faire pour liberer de l espace memoire

//     return $data;


function searchAll()
{   
    $mysqli=new mysqli('localhost','mohali','mohali59','entreprise1');
    if(!$stmt=$mysqli->prepare(" SELECT * FROM employe"))
        {
            echo $mysqli->error;
        }
  
    $stmt->execute();
    $rs = $stmt->get_result();
    $data=$rs->fetch_all(MYSQLI_ASSOC);
    $rs->free();
    $mysqli->close();
    return $data;
    }
    


// function searchSup()
// {
//     $mysqli = connectdb();
//     $query= "SELECT `sup` FROM `employe`";
//     $rs=mysqli_query($mysqli ,$query);
//     $data = mysqli_fetch_array($rs, MYSQLI_ASSOC);
//     return $data;
// }

function searchSup(int $sup)
{   
    $mysqli=new mysqli('localhost','mohali','mohali59','entreprise1');
    if(!$stmt=$mysqli->prepare("SELECT 'sup' FROM employe"))
        {
            echo $mysqli->error;
        }
    $stmt->bind_param('i',$sup);
    $stmt->execute();
    $rs = $stmt->get_result();
    $data=$rs->fetch_array(MYSQLI_ASSOC);
    $mysqli->close();
}




