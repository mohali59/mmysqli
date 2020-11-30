<?php
require_once("EmployeMysqliDAO.php");
require_once("Employe.php");
require_once('ServiceException.php');
require_once('ServiceException.php');
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

class EmployeService
{
public  function addEmploye(Employe $employe){
$emp= new EmployeMysqliDAO();


    try{
    $emp-> addEmploye($employe);
    }
    catch (DAOException $e){
    throw new ServiceException($e->getMessage(),$e->getcode());
    }
}

public function delete(int $no_emp){
    $delEmp=new EmployeMysqliDAO();

    try{
        $delEmp->delete($no_emp);
    }
        catch (DAOException $e){
            throw new ServiceException($e->getMessage(), $e->getCode());
    }

}

public  function update(Employe $employe){
    $updt=new EmployeMysqliDAO();

    try{
        $updt->update($employe);
    }
    catch (DAOException $e){
        throw new ServiceException($e->getMessage(), $e->getCode());
    }

} 

public  function searchAll(){
    $researchAll=new EmployeMysqliDAO;
    $data=$researchAll->recherche();
    return $data;
}
public  function search(int $no_emp){

$searchEmploye = new EmployeMysqliDAO;
       $data=$searchEmploye->search($no_emp);
       return $data;
    }
}



?>