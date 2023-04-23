<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X- 
Request-With');
include "config.php";

$connection=mysqli_connect("localhost", "root", "", "hcp");
$filename = $_FILES['file']['name'];
$valid_extensions = array("csv");
$extension = pathinfo($filename, PATHINFO_EXTENSION);
$nom = $_POST['nom'];
$categorie = $_POST['categorie'];
$thematique = $_POST['thematique'];

    $query_add_article = "INSERT INTO substatistiques (titre, categorie,thematique, info) VALUES ('$nom' , '$categorie', '$thematique' , '$filename' )";
    $insert_new_article = mysqli_query($connection,$query_add_article);

    if(!$insert_new_article)
    {
        echo 0;
    }
    else
    {

// Check extension
if(in_array(strtolower($extension),$valid_extensions) ) {

   // Upload file
   if(move_uploaded_file($_FILES['file']['tmp_name'], "uploads/".$filename)){
      echo 1;
   }else{
      echo 0;
   }
}else{
   echo 0;
}



    }


exit;