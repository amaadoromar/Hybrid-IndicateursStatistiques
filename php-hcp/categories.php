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
		 <i class="fas fa-chart-pie"></i>
		 Liste des catégories
	  </div>
	  <div class="card-body">
	  <a class="btn btn-success" href="./addcategorie.php">Ajouter une catégorie</a>
	 
		 <div class="table-responsive">
		 <br />
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			   <thead>
				  <tr>
					 <th>ID</th>
					 <th>Nom de la Categorie</th>
					 <th>Modifier</th>
					 <th>Supprimer</th>
				  </tr>
			   </thead>
			   <tfoot>
				  <tr>
				  <th>ID</th>
				<th>Nom de la Categorie</th>
				<th>Modifier</th>
					 <th>Supprimer</th>
				  </tr>
			   </tfoot>
			   <tbody>
			   	<?php
$connection = new mysqli("localhost","root","","hcp");
    $query_articles = 
    "SELECT * FROM categories";
    $select_articles = mysqli_query($connection,$query_articles);
    while($articles = mysqli_fetch_assoc($select_articles))
    {

    
    $id=$articles['id'];
    $titre=$articles['category_name'];

?>
				  <tr>
					 <td><?php echo $id;?></td>
					 <td><?php echo $titre;?></td>
					 <td><a class="btn btn-warning" href="./updatecategorie.php?id_category=<?php echo $id;?>">Modifier</a></td>
					 <td><a class="btn btn-danger" href="./config/actions.php?id_category=<?php echo $id;?>">Supprimer</a></td>
				  </tr>
			   </tbody>
			   <?php }?>
			</table>
		 </div>
	  </div>
   </div>
</div>
<?php include('footer.php')?>