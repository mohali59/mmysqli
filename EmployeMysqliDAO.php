<?php
include_once('Employe.php');




class EmployeMysqliDAO{
   

    function addEmploye(Employe $employe)
{   
    $mysqli=new mysqli('localhost','mohali','mohali59','entreprise1');
    if(!$stmt=$mysqli->prepare("INSERT into employe  values (?,?,?,?,?,?,?,?,?)"))
        {
            echo $mysqli->error;
        }
    $no_emp=$employe->getNo_emp();
    $nom=$employe->getNom();
    $prenom=$employe->getPrenom();
    $emploi=$employe->getEmploi();
    $emb=$employe->getEmbauche();
    $sal=$employe->getSal();
    $comm=$employe->getComm();
    $noserv=$employe->getNoserv();
    $sup=$employe->getSup();
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

    function update(Employe $updateEmploye)
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
            
            

            $no_emp=$updateEmploye->getNo_emp();
            $nom=$updateEmploye->getNom();
            $prenom=$updateEmploye->getPrenom();
            $emploi=$updateEmploye->getEmploi();
            $emb=$updateEmploye->getEmbauche();
            $sal=$updateEmploye->getSal();
            $comm=$updateEmploye->getComm();
            $noserv=$updateEmploye->getNoserv();
            $sup=$updateEmploye->getSup();
            $stmt->bind_param("sssisddii",$nom,$prenom, $emploi,$sup, $emb, $sal, $comm, $noserv, $no_emp);
            $stmt->execute();
           
            $mysqli->close();
            
    }  
    function search(int $no_emp)
{   
    $mysqli=new mysqli('localhost','mohali','mohali59','entreprise1');
    if(!$stmt=$mysqli->prepare(" SELECT * FROM employe  where no_emp=?"))
        {
            echo $mysqli->error;
        }
  

    $stmt->bind_param('i',$no_emp);
    $stmt->execute();
    $rs = $stmt->get_result();
    $data=$rs->fetch_array(MYSQLI_ASSOC);
    $research=new Employe();
    $research->setNo_emp($data["no_emp"])
             ->setNom($data['nom'])
             ->setPrenom($data['prenom'])
             ->setEmploi($data['emploi'])
             ->setSup($data["sup"])
             ->setEmbauche($data["embauche"])
             ->setSal($data["sal"])
             ->setComm($data["comm"])
             ->setNoserv($data["noserv"]);
    
    $mysqli->close();
    return $research;

}


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
    $tableau=[];  //creation d un tableau vide
    foreach ($data as $key => $value) 
    {
    $research=new Employe();
    $research->setNo_emp($value["no_emp"])
             ->setNom($value['nom'])
             ->setPrenom($value['prenom'])
             ->setEmploi($value['emploi'])
             ->setSup($value["sup"])
             ->setEmbauche($value["embauche"])
             ->setSal($value["sal"])
             ->setComm($value["comm"])
             ->setNoserv($value["noserv"]);
             
            $tableau[]=$research; //permet de remplir un"tableau" vide ave des objets qu on viens de creer//
    }

    $rs->free();
    $mysqli->close();
    return $tableau;
    }

    
}