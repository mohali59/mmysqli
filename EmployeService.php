<?php
require_once("EmployeMysqliDAO.php");
require_once("Employe.php");

class EmployeService
{
public  function addEmploye(Employe $employe){
$emp= new EmployeMysqliDAO();
$emp-> addEmploye($employe);

}
public  function delete(int $no_emp){

    $delEmp=new EmployeMysqliDAO();
    $delEmp->delete($no_emp);

}

public  function update(Employe $employe)
{

    $updt=new EmployeMysqliDAO();
    $updt->update($employe);

} 

public  function searchAll(){
    $researchAll=new EmployeMysqliDAO;
    $data=$researchAll->searchAll();
    return $data;
}
public  function search(int $no_emp){

$searchEmploye = new EmployeMysqliDAO;
       $data=$searchEmploye->search($no_emp);
       return $data;
    }
}



?>