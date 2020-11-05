<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<!-- jQuery and JS bundle w/ Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>formulaire modifier</title>
    </head>
    <body>

       
       <?php
       include ('crud.php');
       $data=search($_GET['no_emp']);
       print_r ($data);
    //    $mysqli= mysqli_init();
    //    mysqli_real_connect($mysqli,'localhost','mohali','mohali59','entreprise');
    //    $mysqli = connectdb();

    //    $rs=mysqli_query($mysqli,"select*from emp where no_emp=" .$_GET["no_emp"]);

    //    $data=mysqli_fetch_array($rs,MYSQLI_ASSOC); //MYSQLI_ASSOC permet d afficher un tableau par personne avec tout les infos.
    //    mysqli_close($mysqli);
    //    mysqli_free_result($rs);

     
       ?>
                <div>
                <form action="tableau.php?action=modifier&no_emp=<?php echo $data['no_emp'];?>" method="post">
                                
                                
                                <div>
                                    <label for="nom">nom</label>
                                    <input type="text" class="form-control" value="<?php echo $data["nom"]; ?>" name="nom" placeholder=""></input>
                                <div>
                                    <label for="prenom">prénom</label>
                                    <input type="text" class="form-control"value="<?php echo $data["prenom"]; ?>" name="prenom" placeholder=""></input>
                                </div>
                                <div>
                                    <label for="emploi">emploi</label>
                                    <input type="text" class="form-control"value="<?php echo $data["emploi"]; ?>" name="emploi" placeholder=""></input>
                                </div>
                                <div>
                                    <label for="sup">superieur</label>
                                    <input type="number" class="form-control"value="<?php echo $data["sup"]; ?>" name="sup" placeholder=""></input>
                                </div>
                                <div>
                                    <label for="enmauche">embauche</label>
                                    <input type="date" class="form-control" value="<?php echo $data["embauche"]; ?>" name="embauche" placeholder="jj/mm/aaaa"></input>
                                </div>
                                <div>
                                    <label for="sal">salaire</label>
                                    <input type="number" class="form-control" value="<?php echo $data["sal"]; ?>" name="sal" placeholder=""></input>
                                </div>
                                <div>
                                    <label for="comm">commission</label>
                                    <input type="number" class="form-control" value="<?php echo $data["comm"]; ?>" name="comm" placeholder=""></input>
                                </div>
                                <div>
                                     <label for="noserv">numéro de service</label>
                                    <input type="number" class="form-control" value="<?php echo $data["noserv"]; ?>" name="noserv" placeholder=""></input>
                                </div>
                                <input type="submit" class="btn btn-primary btn-lg btn-block"  value ="Modifier"/>
                      </div>
                            </form>
                </div>
       
    </body>