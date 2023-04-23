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
		 <i class="fas fa-user"></i>
		 Liste des indicateurs importés par les utilisateurs
	  </div>
	  <div class="card-body">
		 <div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			   <thead>
				  <tr>
					 <th>Nom d'indicateur</th>
					 <th>Categorie</th>
					 <th>Thematique</th>
					 <th>Fichier CSV</th>
					 <th>Supprimer</th>
				  </tr>
			   </thead>
			   <tfoot>
				  <tr>
					  <th>Nom d'indicateur</th>
					 <th>Categorie</th>
					 <th>Thematique</th>
					 <th>Fichier CSV</th>
					 <th>Supprimer</th>
				  </tr>
			   </tfoot>
			   <tbody>
			   	<?php
$connection = new mysqli("localhost","root","","hcp");
    $query_articles = 
    "SELECT * FROM substatistiques";
    $select_articles = mysqli_query($connection,$query_articles);
    while($articles = mysqli_fetch_assoc($select_articles))
    {

    
    $id=$articles['id'];
    $titre=$articles['titre'];
    $info=$articles['info'];
    $categorie=$articles['categorie'];
	$thematique=$articles['thematique'];

?>
				  <tr>
					 <td><?php echo $titre;?></td>
					 <td><?php echo $categorie;?></td>
					 <td><?php echo $thematique;?></td>
					 <td><a href="./api/uploads/<?php echo $info;?>"><button type="button" class="btn btn-success">Exporter CSV</button></a></td>
					 <td><a href="./delete.php?id_substatistique=<?php echo $id;?>"><button type="button" class="btn btn-danger">Supprimer</button></a></td>
				  </tr>
			   </tbody>
			   <?php }?>
			</table>
		 </div>
	  </div>
   </div>
</div>
<?php include('footer.php')?>