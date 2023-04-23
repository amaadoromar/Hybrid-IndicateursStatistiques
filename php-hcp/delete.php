<?php
include './config/db.php';
include('header.php');
if(isset($_SESSION['ROLE']) && $_SESSION['ROLE']!='1'){
	header('location:news.php');
	die();
}

else if($_SESSION['ROLE']=='1'){
    if(isset($_GET['id_substatistique'])){
    $article_id=$_GET["id_substatistique"];
    $query_articles = 
    "SELECT * FROM substatistiques WHERE id = $article_id";
    $select_articles = mysqli_query($connection,$query_articles);
    $articles = mysqli_fetch_assoc($select_articles);
    $query_delete_article = "DELETE FROM substatistiques WHERE id = $article_id ;";
    $delete_article = mysqli_query($connection,$query_delete_article);
    $location="./substatistiques.php";

    if(!$delete_article)
    {
        echo (mysqli_error($connection));
    }
  else {
    
$file_pointer = "./api/uploads/".$articles['info']; 
   
// Use unlink() function to delete a file 
if (!unlink($file_pointer)) { 
    echo ("$file_pointer cannot be deleted due to an error"); 
} 
else { 
    echo ("$file_pointer has been deleted"); 
} 
}

header('Location:'.$location);
    }
}
?> 