<?php
session_start();
require_once ('EmployeService.php');
if(!isset($_SESSION['mail']))
  {

  // { echo non connecter;
    header ('location:formulaireconnexion.php');
 } 


?>
<!DOCTYPE html>
<html lang="en">
<head>
 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
        
           
            
  
            <!-- // bouton dconnexion// -->
            <div>
            <form method="post" action="traitementDeconnexion.php" id="form">
            <input type="hidden" id="deconnexion" name="deconnexion"/>
            </form>
            <buttton id="delete"  onclick="disconnect()">Deconnexion</button>
            </div>
          

<?php

        // <!--             formulaire ajouter          -->

              if(isset($_GET["action"])&& $_GET["action"]=="ajout" && !empty($_POST) &&
                  isset($_POST["no_emp"]) && !empty($_POST["no_emp"]) &&
                  isset($_POST["noserv"]) && !empty($_POST["noserv"]))
                  {    

                    /* $nom = $_POST['nom']; mettre le dollar post "nom" dans une variable */
                
                $employe = new Employe;
                $employe->setNo_emp(empty($_POST["no_emp"]) ? NULL : $_POST["no_emp"])
                        ->setNom(empty($_POST['nom']) ? NULL : $_POST["nom"])
                        ->setPrenom(empty($_POST['prenom']) ? NULL : $_POST['prenom'])
                        ->setEmploi (empty($_POST['emploi']) ? NULL : $_POST['emploi'])
                        ->setEmbauche (empty($_POST['embauche']) ? NULL:$_POST['embauche'])
                        ->setSal(empty( $_POST["sal"]) ? NULL:$_POST["sal"])
                        ->setComm(empty($_POST["comm"]) ? NULL:$_POST["comm"])
                        ->setNoserv(empty($_POST["noserv"]) ? NULL:$_POST["noserv"])
                        ->setSup(empty($_POST["sup"]) ? NULL: $_POST["sup"]);
                         var_dump ($employe);
                        $employeService = new EmployeService;
                        $employeService->addEmploye($employe);
                
                  }

                      //<!-- formulaire supprimer -->
              
                if(isset($_GET["action"])&& $_GET["action"]=="supprimer" && isset($_GET["no_emp"]))
                {
                $deleteEmployeService = new EmployeService;
                $deleteEmployeService->delete($_GET["no_emp"]);

                // $deleteEmploye=new Employe;
                // $deleteEmploye->delete($_GET["no_emp");
                // 
                }

        // form modification

        if(isset($_GET["action"])&& $_GET["action"]=="modifier" && isset($_GET["no_emp"]))
              {            
                if( isset($_POST["noserv"]) && !empty($_POST["noserv"]))
                {
                  $updateEmploye = new Employe;
                  $updateEmploye->setNo_emp(empty ($_GET["no_emp"]) ? NULL :$_GET["no_emp"])
                                ->setNom(empty($_POST["nom"]) ? NULL : $_POST["nom"])
                                ->setPrenom(empty($_POST["prenom"]) ? NULL :$_POST["prenom"])
                                ->setEmploi(empty($_POST["emploi"]) ? NULL :$_POST["emploi"])
                                ->setSup(empty($_POST["sup"])  ? NULL :$_POST ["sup"])
                                ->setEmbauche(empty ($_POST["embauche"]) ? NULL :$_POST["embauche"])
                                ->setSal(empty($_POST["sal"]) ? NULL : $_POST["sal"])
                                ->setComm(empty($_POST["comm"]) ? NULL :$_POST["comm"])
                                ->setNoserv(empty ($_POST["noserv"]) ? NULL :$_POST["noserv"]);
                                

                  
                  $updateEmployeService = new EmployeService;
                  $updateEmployeService->update($updateEmploye);
                      var_dump($updateEmploye);
                }
                
            }
          ?>
          <div>
            <div style="position: relative; float: right;">
                <a href='traitementDeconnexion.php'> <button type='button' class='btn btn-primary' value='disconnect'>Deconnexion</button> </a>
          </div>
          </div>
          <?php
          if ($_SESSION['profil']=='administrateur'){
         echo '<div>
            <div style="position: relative; float: right;">
                <a href="formajout.php"> <button type"button" class="btn btn-primary" value="ajouter">Ajouter</button> </a>
          </div>
          </div>';
          }
          ?>
          <table class="table table-bordered">
            <thead>
              <tr>
              <th scope="col">N°emp</th>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">Emploi</th>
                <th scope="col">Sup</th>
                <th scope="col">Embauche</th>
               <?php
               if ($_SESSION['profil']=='administrateur'){

               echo '<th scope="col">Sal</th>
                <th scope="col">Comm</th>';
}
?>
                
                <th scope="col">N°serv</th>
                <th scope="col">modifier</th>
                <th scope="col">ajouter</th>
              </tr>
            </thead>
                <?php
                $newSearchAll=new EmployeService;
                $data=$newSearchAll->searchAll();

                  foreach ($data as $value)
                  {
                    echo "<tr>";
                    echo "<td>".$value["no_emp"]."</td>";
                    echo "<td>".$value["nom"]."</td>";
                    echo "<td>".$value["prenom"]."</td>";
                    echo "<td>".$value["emploi"]."</td>";
                    echo "<td>".$value["sup"]."</td>";
                    echo "<td>".$value["embauche"]."</td>";
                    if ($_SESSION['profil']=='administrateur'){

                    echo "<td>".$value["sal"]."</td>";
                    echo "<td>".$value["comm"]."</td>";
                    }
                   
                    echo "<td>".$value["noserv"]."</td>";
                          // echo  "<td class='ajout'><a href='modifier.php'> <button typr 'button' class='btn btn-primary' value='modifier'>modifier</button> </a></td>";
                          

                  
                   
                   
                   
                    if ($_SESSION['profil']=='administrateur'){
                            
                    $butmodif=<<<BUTMODIF
                    <td class='modifier'><a href='modifier.php?action=modifier&no_emp={$value['no_emp']}'>
                    <button type 'button' class='btn btn-primary' value='modifier'>modifier</button> </a></td>                          
BUTMODIF;
                    echo $butmodif;

                    $bouton=<<<BOUTON
                    <td class='supprimer'><a href='tableau.php?action=supprimer&no_emp={$value['no_emp']}'>
                    <button type 'button' class='btn btn-danger' value='supprimer'>supprimer</button> </a></td>
BOUTON;                            
                    echo $bouton;
                  }
                }
                ?>
          </table>
    </body>
</html>
