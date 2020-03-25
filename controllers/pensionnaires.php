<?php 
require_once "../models/animal.dao.php";
require_once "../config/config.php";
$_GET['idstatut']=1;
$animaux = getAnimalFromStatut($_GET['idstatut']);

$titreH1 = "";
if((int)$_GET['idstatut'] === ID_STATUT_A_L_ADOPTION)
    $titreH1 = "Ils cherchent une famille";
else if((int)$_GET['idstatut'] === ID_STATUT_ADOPTE)
    $titreH1 = "Les anciens";
else if((int)$_GET['idstatut'] === ID_STATUT_FALD)
    $titreH1 = "Famille d'accueil longue durée";

foreach($animaux as $key => $animal){
    $image = getFirstImageAnimal($animal['id_animal']);
    $animaux[$key]['image'] = $image;

    $caracteres = getCaracteresFromAnimal($animal['id_animal']);
    $animaux[$key]['caracteres'] = $caracteres;
}


require_once "../views/pensionnaires.view.php";
