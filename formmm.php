<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table class="table table-bordered">
                                <thead class="thead-dark">
                                    <th scope="col">Email</th>
                                    <th scope="col">Prénom</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Date de naissance</th>
                                    <th scope="col">Ville</th>
                                    <th scope="col">Suppression données</th>
                                    <th scope="col">Détails</th>
                                    <th scope="col">Modification données</th>
                                </thead>
                                <tbody>

                                <?php
$mysqli= mysqli_init();
mysqli_real_connect($mysqli,'localhost','mohali','mohali59','entreprise');
$rs=mysqli_query($mysqli,'select*from emp');
$data=mysqli_fetch_all($rs,MYSQLI_ASSOC); //MYSQLI_ASSOC permet d afficher un tableau par personne avec tout les infos.
mysqli_close($mysqli);
mysqli_free_result($rs); // conseiller a faire pour liberer de l espace memoire 

echo '<pre>';   // echo <pre></pre> sert a afficher en tableau dans le php 
print_r($data);
echo '</pre>';
?>


                            </body>
</html>





