<?php

include_once('employe.php');

$newEmploye=new Employe();
$newEmploye->setNoemp(2500)->setNom("mahrez")->setPrenom("riad")->setEmploi("footballer")->setSup(1000)->setEmbauche(25/11/1999)->setSal(250000)->setComm(1)->setNoserv(8);

echo $newEmploye;

$newEmploye2=new Employe();
$newEmploye2->setNoemp(8888)->setNom("jean")->setPrenom("marc")->setEmploi("caissier")->setSup(1000)->setEmbauche(27/11/1999)->setSal(1000)->setComm(1)->setNoserv(9);

include_once('service.php');

$service=new Service();
$newService->setNoserv(8)->setService("sport")->setVille("londres");

$newService2=new Service();
$newService2->setNoserv(9)->setService("commercial")->setVille("leers");