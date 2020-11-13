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
            $stmt->bind_param("issssddii",$nom,$prenom, $emploi,$sup, $emb, $sal, $comm, $noserv, $no_emp);
            $stmt->execute();
            var_dump ($updateEmploye);var_dump($stmt);
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
    $mysqli->close();
    return $data;
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
    $rs->free();
    $mysqli->close();
    return $data;
    }

    
}