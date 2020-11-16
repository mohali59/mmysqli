<?php
session_start();

if(!isset($_SESSION['mail']))

  { 
    header ('location:formulaireconnexion.php');
 } 
 
?>
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
        <title>formulaire ajouter</title>
    </head>
    <body>
        
            <div>
                <div>
                           <form action="tableau-Controller.php?action=ajout" method="post">
                                <div>
                                <label for="no_emp">no_emp</label>
                                <input type="text" class="form-control" name="no_emp" placeholder=""></input>
                                <div class="invalid-feedback">
                                </div>
                                
                                <div>
                                    <label for="nom">nom</label>
                                    <input type="text" class="form-control" name="nom" placeholder=""></input>
                                <div>
                                    <label for="prenom">prénom</label>
                                    <input type="text" class="form-control" name="prenom" placeholder=""></input>
                                </div>
                                <div>
                                    <label for="emploi">emploi</label>
                                    <input type="text" class="form-control" name="emploi" placeholder=""></input>
                                </div>
                                <div>
                                    <label for="sup">superieur</label>
                                    <input type="number" class="form-control" name="sup" placeholder=""></input>
                                </div>
                                <div>
                                    <label for="enmauche">embauche</label>
                                    <input type="date" class="form-control" name="embauche" placeholder="jj/mm/aaaa"></input>
                                </div>
                                <div>
                                    <label for="sal">salaire</label>
                                    <input type="number" class="form-control" name="sal" placeholder=""></input>
                                </div>
                                <div>
                                    <label for="comm">commission</label>
                                    <input type="number" class="form-control" name="comm" placeholder=""></input>
                                </div>
                                <div>
                                     <label for="noserv">numéro de service</label>
                                    <input type="number" class="form-control" name="noserv" placeholder=""></input>
                                </div>
                                <input class="btn btn-primary" type="submit" value="Submit">
                            </form>
                </div>
        </div>
</body>
</html>