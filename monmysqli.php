<?php
$mysqli= mysqli_init();
mysqli_real_connect($mysqli,'localhost','mohali','mohali59','entreprise');
$rs=mysqli_query($mysqli,'select*from emp');
$data=mysqli_fetch_array($rs,MYSQLI_ASSOC); //MYSQLI_ASSOC permet d afficher un tableau par personne avec tout les infos.
mysqli_close($mysqli);
mysqli_free_result($rs); // conseiller a faire pour liberer de l espace memoire 

echo '<pre>';   // echo <pre></pre> sert a afficher en tableau dans le php 
print_r($data);
echo '</pre>';