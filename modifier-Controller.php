
<?php
session_start();
        
if(!isset($_SESSION['mail'])){

  // { echo "non connecter";
    header ('location:formulaireconnexion.php');
 } 

?>


       
       <?php
       require_once ('EmployeService.php');
       
       



       $searchEmploye = new EmployeService;
       $data=$searchEmploye->search($_GET['no_emp']);
       require_once ('affichageModifier.php');

   
       ?>
                