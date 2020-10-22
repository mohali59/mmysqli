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
                    <!--             formulaire ajouter          -->
                    <?php
                    include ('crud.php');
                    if(isset($_GET["action"])&& $_GET["action"]=="ajout" && !empty($_POST) &&
                       isset($_POST["noemp"]) && !empty($_POST["noemp"]) &&
                       isset($_POST["noserv"]) && !empty($_POST["noserv"]))
                       {    
                         
                        add($_POST["noemp"],$_POST['nom'],$_POST['prenom'],$_POST['emploi'],$_POST["sup"],$_POST['emb'],$_POST["sal"],$_POST["comm"],$_POST["noserv"]);














                       
                       }
                            //<!-- formulaire supprimer -->
                   
                      if(isset($_GET["action"])&& $_GET["action"]=="supprimer" && isset($_GET["noemp"]))
                      {

                      $query=<<<SUPP
                      delete from emp where noemp={$_GET["noemp"]};  
SUPP;
                      
                      $rs=mysqli_query($mysqli ,$query);
                      }
                    // form modification

                    if(isset($_GET["action"])&& $_GET["action"]=="modifier" && isset($_GET["noemp"]))
                        {             
                        if( isset($_POST["noserv"]) && !empty($_POST["noserv"]))
                        {
                          $nom=$_POST["nom"];
                          $prenom=$_POST["prenom"];
                          $emploi=$_POST["emploi"];
                          $sup=$_POST["sup"];
                          $embauche=$_POST["embauche"];
                          $sal=$_POST["sal"];
                          $comm=$_POST["comm"];
                          $noserv=$_POST["noserv"];

                      $modifier="UPDATE `emp` SET `nom`='$nom',`prenom`='$prenom',`emploi`='$emploi',`sup`=$sup,`embauche`='$embauche',`sal`=$sal,`comm`=$comm,`noserv`=$noserv WHERE noemp=".$_GET["noemp"];
                              echo $modifier;
                              $mysqli= mysqli_init();
                      mysqli_real_connect($mysqli,'localhost','mohali','mohali59','entreprise');
                        if (mysqli_query($mysqli ,$modifier)){
                          echo "modification ok";
                        }
                        else{
                          echo "echec modification";
                        }

                       } 
                      }
                     ?>

                      <div>
                        <div style="position: relative; float: right;">
                            <a href='formajout.php'> <button type='button' class='btn btn-primary' value='ajouter'>Ajouter</button> </a>
                      </div>
                      </div>
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                          <th scope="col">N°emp</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prénom</th>
                            <th scope="col">Emploi</th>
                            <th scope="col">Sup</th>
                            <th scope="col">Embauche</th>
                            <th scope="col">Sal</th>
                            <th scope="col">Comm</th>
                            <th scope="col">N°serv</th>
                            <th scope="col">modifier</th>
                            <th scope="col">ajouter</th>
                          </tr>
                        </thead>
                            <?php
                                      $mysqli= mysqli_init();
                                      mysqli_real_connect($mysqli,'localhost','mohali','mohali59','entreprise');
                                      $rs=mysqli_query($mysqli,'select*from emp');
                                      $data=mysqli_fetch_all($rs,MYSQLI_ASSOC); //MYSQLI_ASSOC permet d afficher un tableau par personne avec tout les infos.
                                      mysqli_close($mysqli);
                                      mysqli_free_result($rs); // conseiller a faire pour liberer de l espace memoire 

                                  foreach ($data as $value){
                                          echo "<tr>";
                                          echo "<td>".$value["noemp"]."</td>";
                                          echo "<td>".$value["nom"]."</td>";
                                          echo "<td>".$value["prenom"]."</td>";
                                          echo "<td>".$value["emploi"]."</td>";
                                          echo "<td>".$value["sup"]."</td>";
                                          echo "<td>".$value["embauche"]."</td>";
                                          echo "<td>".$value["sal"]."</td>";
                                          echo "<td>".$value["comm"]."</td>";
                                          echo "<td>".$value["noserv"]."</td>";
                                          // echo  "<td class='ajout'><a href='modifier.php'> <button typr 'button' class='btn btn-primary' value='modifier'>modifier</button> </a></td>";
                                          
                                          $butmodif=<<<BUTMODIF
                                          <td class='modifier'><a href='modifier.php?action=modifier&noemp={$value['noemp']}'>
                                          <button type 'button' class='btn btn-primary' value='modifier'>modifier</button> </a></td>
                                          
BUTMODIF;
                                          echo $butmodif;

                                          $bouton=<<<BOUTON
                                          <td class='supprimer'><a href='tableau.php?action=supprimer&noemp={$value['noemp']}'>
                                          <button type 'button' class='btn btn-danger' value='supprimer'>supprimer</button> </a></td>
BOUTON;
                                          
                                          echo $bouton;
                                         }
                            ?>
</table>
  
    </body>
</html>
