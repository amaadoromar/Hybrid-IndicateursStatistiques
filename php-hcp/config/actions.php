<?php
include "db.php";
session_start();

if(isset($_SESSION['ROLE'])){
    if(isset($_GET["id_thematique"]))
    {
        $id = $_GET["id_thematique"];
      //  $query_delete_article = "DELETE FROM indicateurs WHERE id_thematique = $id ;";
      //  $delete_article = mysqli_query($connection,$query_delete_article);
        $query_delete_article = "DELETE FROM thematiques WHERE id_thematique = $id ;";
        $delete_article = mysqli_query($connection,$query_delete_article);
        $location="../thematiques.php";
    
        if(!$delete_article)
        {
            echo (mysqli_error($connection));
            
        }
       header('Location:'.$location);
       
    }

    if(isset($_POST["updatethematique"]))
    {
        $nom = $_POST["nom"];
        $id_category = $_POST["idcategory"];
        $id = $_POST["id"];
        $query_update_article = "UPDATE thematiques SET titre  = '$nom' ,  id_categories  = $id_category WHERE  id_thematique = $id ;";
        $insert_new_article = mysqli_query($connection,$query_update_article);
        $location="../thematiques.php";
    
        if(!$insert_new_article)
        {
            echo (mysqli_error($connection));
            
        }
       header('Location:'.$location);
       
    }

    if(isset($_POST["addthematique"]))
{
    $nom = $_POST["nom"];
    $id_category = $_POST["idcategory"];
    $query_add_article = "INSERT INTO thematiques(id_categories,titre)
    VALUES ('$id_category','$nom');";
    $insert_new_article = mysqli_query($connection,$query_add_article);
    $location="../thematiques.php";

    if(!$insert_new_article)
    {
        echo (mysqli_error($connection));
        
    }
   header('Location:'.$location);
   
}
    if(isset($_GET["id_category"]))
    {
        $id = $_GET["id_category"];
    //    $query_delete_article = "DELETE FROM indicateurs WHERE id_categories = $id ;";
     //   $delete_article = mysqli_query($connection,$query_delete_article);
        $query_delete_article = "DELETE FROM thematiques WHERE id_categories = $id ;";
        $delete_article = mysqli_query($connection,$query_delete_article);
        $query_delete_article = "DELETE FROM categories WHERE  id = $id ;";
        $delete_article = mysqli_query($connection,$query_delete_article);
        $location="../categories.php";
    
        if(!$delete_article)
        {
            echo (mysqli_error($connection));
            
        }
       header('Location:'.$location);
       
    }

    if(isset($_POST["updatecategorie"]))
    {
        $nom = $_POST["nom"];
        $id = $_POST["id"];
        $query_update_article = "UPDATE categories SET category_name  = '$nom' WHERE  id = $id ;";
        $insert_new_article = mysqli_query($connection,$query_update_article);
        $location="../categories.php";
    
        if(!$insert_new_article)
        {
            echo (mysqli_error($connection));
            
        }
       header('Location:'.$location);
       
    }

    if(isset($_POST["addcategorie"]))
{
    $nom = $_POST["nom"];

    $query_add_article = "INSERT INTO categories(category_name)
    VALUES ('$nom');";
    $insert_new_article = mysqli_query($connection,$query_add_article);
    $location="../categories.php";

    if(!$insert_new_article)
    {
        echo (mysqli_error($connection));
        
    }
   header('Location:'.$location);
   
}

    if(isset($_GET['id_existindicateur']))
{
    $id_newindicateur=$_GET["id_existindicateur"];
    $query_delete_article = "DELETE FROM indicateurs WHERE id_indicateur = $id_newindicateur ;";
    $delete_article = mysqli_query($connection,$query_delete_article);
    $query_delete_article = "DELETE FROM data WHERE id_indicateur = $id_newindicateur ;";
    $delete_article = mysqli_query($connection,$query_delete_article);
    $location="../indicateurs.php";

    if(!$delete_article)
    {
        echo (mysqli_error($connection));
    }
   header('Location:'.$location);
}


if(isset($_GET['id_newindicateur']))
{
    $id_newindicateur=$_GET["id_newindicateur"];
    $query_delete_article = "DELETE FROM indicateurs WHERE id_indicateur = $id_newindicateur ;";
    $delete_article = mysqli_query($connection,$query_delete_article);
    $location="../newindicateurs.php";

    if(!$delete_article)
    {
        echo (mysqli_error($connection));
    }
   header('Location:'.$location);
}

if(isset($_GET['id_newindicateur']))
{
    $id_newindicateur=$_GET["id_newindicateur"];
    $query_delete_article = "DELETE FROM indicateurs WHERE id_indicateur = $id_newindicateur ;";
    $delete_article = mysqli_query($connection,$query_delete_article);
    $location="../newindicateurs.php";

    if(!$delete_article)
    {
        echo (mysqli_error($connection));
    }
   header('Location:'.$location);
}

if(isset($_POST["addindicateur"]))
{
    $definition = $_POST["definition"];
    $unite = $_POST["unite"];
    $indication = $_POST["indication"];
    $source = $_POST["source"];
    $periodicite = $_POST["periodicite"];
    $couverture = $_POST["couverture"];
    $categorie = $_POST["categorie"];

    $query_add_article = "INSERT INTO indicateurs(definition, unite, indication,source,periodicite,couverture,id_categories)
    VALUES ('$definition', '$unite', '$indication', '$source', '$periodicite', '$couverture', '$categorie');";
    $insert_new_article = mysqli_query($connection,$query_add_article);
    $location="../newindicateurs.php";

    if(!$insert_new_article)
    {
        echo (mysqli_error($connection));
        
    }
   header('Location:'.$location);
   
}

if(isset($_POST["updateindicateur"]))
{
    $annee = 22;
    $id_indicateur  = $_POST['indicateur'];
    $id_thematique = $_POST['thematique'];
    for ($i = 1; $i <= $annee; $i++)
     {
        if(!(empty($_POST["$i"]))){
            $j = $_POST["$i"];
            $query_count = "SELECT * FROM data where id_indicateur = $id_indicateur and id_annee = $i ";
            $count = mysqli_query($connection,$query_count);
            $rows = mysqli_num_rows($count);
            if($rows > 0)
            {
    $query_add_article = "UPDATE data SET valeur = $j WHERE id_indicateur = '$id_indicateur' and id_annee = $i ";
      $insert_new_article = mysqli_query($connection,$query_add_article); 
            }
            else{
            $query_add_article = "INSERT INTO data (id_annee , id_indicateur, valeur) VALUES('$i' , '$id_indicateur', '$j')";
            $insert_new_article = mysqli_query($connection,$query_add_article);
            }
      }
      }
    
      $query_add_article = "UPDATE indicateurs SET id_thematique = '$id_thematique' WHERE id_indicateur = '$id_indicateur' ";
      $insert_new_article = mysqli_query($connection,$query_add_article); 
    $location="../indicateurs.php";

    if(!$insert_new_article)
    {
        echo (mysqli_error($connection));
       
    }
 header('Location:'.$location);
}

//presidents forms for backend 
if(isset($_POST["updateindicateurnew"]))
{
    $annee = 22;
    $id_indicateur  = $_POST['indicateur'];
    $id_thematique = $_POST['thematique'];
    for ($i = 1; $i <= $annee; $i++)
     {
        if(!(empty($_POST["$i"]))){
            $j = $_POST["$i"];
            $query_add_article = "INSERT INTO data (id_annee , id_indicateur, valeur) VALUES('$i' , '$id_indicateur', '$j')";
            $insert_new_article = mysqli_query($connection,$query_add_article);
      }
      }
    
      $query_add_article = "UPDATE indicateurs SET id_thematique = '$id_thematique' WHERE id_indicateur = '$id_indicateur' ";
      $insert_new_article = mysqli_query($connection,$query_add_article); 
   $location="../newindicateurs.php";

    if(!$insert_new_article)
    {
        echo (mysqli_error($connection));
       
    }
    header('Location:'.$location);
}

}

?>