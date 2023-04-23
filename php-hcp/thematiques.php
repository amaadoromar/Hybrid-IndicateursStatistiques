<?php 
include('./header.php');
if(isset($_SESSION['ROLE']) && $_SESSION['ROLE']!='1'){
	header('location:./news.php');
	die();

include "./db.php";
}
?>
<div class="container-fluid">
   <!-- DataTables Example -->
   <div class="card mb-3">
	  <div class="card-header">
		 <i class="fas fa-book"></i>
		 Liste des thématiques
	  </div>
	  <div class="card-body">
	  <a class="btn btn-success" href="./addthematique.php">Ajouter une thématique</a>
	 
		 <div class="table-responsive">
		 <br />
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			   <thead>
				  <tr>
					 <th>ID</th>
					 <th>Nom de la Thématique</th>
					 <th>Catégorie</th>
					 <th>Modifier</th>
					 <th>Supprimer</th>
				  </tr>
			   </thead>
			   <tfoot>
				  <tr>
				  <th>ID</th>
					 <th>Nom de la Thématique</th>
					 <th>Catégorie</th>
					 <th>Modifier</th>
					 <th>Supprimer</th>
				  </tr>
			   </tfoot>
			   <tbody>
			   	<?php
$connection = new mysqli("localhost","root","","hcp");
    $query_articles = 
    "SELECT * FROM categories,thematiques WHERE thematiques.id_categories = categories.id";
    $select_articles = mysqli_query($connection,$query_articles);
    while($articles = mysqli_fetch_assoc($select_articles))
    {

    
    $id=$articles['id_thematique'];
    $titre=$articles['titre'];
    $categorie = $articles['category_name'];

?>
				  <tr>
					 <td><?php echo $id;?></td>
					 <td><?php echo $titre;?></td>
					 <td><?php echo $categorie;?></td>
					 <td><a class="btn btn-warning" href="./updatethematique.php?id_thematique=<?php echo $id;?>">Modifier</a></td>
					 <td><a class="btn btn-danger" href="./config/actions.php?id_thematique=<?php echo $id;?>">Supprimer</a></td>
				  </tr>
			   </tbody>
			   <?php }?>
			</table>
		 </div>
	  </div>
   </div>
</div>
<?php include('footer.php')?>