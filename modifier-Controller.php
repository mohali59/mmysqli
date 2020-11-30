
<?php
session_start();
require_once('presentationModifier.php');
if(!isset($_SESSION['mail'])){

  // { echo "non connecter";
    header ('location:formulaireconnexion.php');
 } 

?>

       <?php
       require_once ('EmployeService.php');
      
       $searchEmploye = new EmployeService;
       $data=$searchEmploye->search($_GET['no_emp']);

      //  html(); //fonction html:fonction creer dans presentationmodifier elle contient tt le header
      //  formulaireModif($data);//fonction qui contient tt le body
       affichePageMmodif($data) //fonction contenant les deux fonction ci dessus
    
    ?>
                