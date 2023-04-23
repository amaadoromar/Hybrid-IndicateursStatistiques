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
		 <i class="fas fa-chart-line"></i>
		 Liste des indicateurs 
	  </div>
	  <div class="card-body">
      <a class="btn btn-success" href="./addindicateur.php">Ajouter Indicateur </a>
         <div class="table-responsive">
         <br />
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			   <thead>
				  <tr>
					 <th>Definition</th>
					 <th>Categorie</th>
					 <th>Indication</th>
					 <th>Source</th>
					 <th>Periodicité</th>
					 <th>Couverture</th>
					 <th>Unité</th>
					 <th>Mise à jour du Data</th>
                     <th>Supprimer</th>
				  </tr>
			   </thead>
			   <tbody>
			   	<?php
$connection = new mysqli("localhost","root","","hcp");
    $query_articles = 
    "SELECT * FROM indicateurs,categories WHERE indicateurs.id_categories = categories.id and id_thematique = 0";
    $select_articles = mysqli_query($connection,$query_articles);
    while($articles = mysqli_fetch_assoc($select_articles))
    {

    
    $id = $articles['id_indicateur'];
    $titre=$articles['definition'];
    $source=$articles['source'];
    $categorie=$articles['category_name'];
	$unite=$articles['unite'];
	$periodicite=$articles['periodicite'];
	$indication=$articles['indication'];
	$couverture=$articles['couverture'];

?>
				  <tr>
					 <td><?php echo $titre;?></td>
					 <td><?php echo $categorie;?></td>
					 <td><?php echo $indication;?></a></td>
					 <td><?php echo $source;?></a></td>
					 <td><?php echo $periodicite;?></a></td>
					 <td><?php echo $couverture;?></a></td>
					 <td><?php echo $unite;?></a></td>
					 <td><a class="btn btn-warning" href="./updateindicateur.php?id_indicateur=<?php echo $id ;?>">Mise à jour</a></td>
					 <td><a class="btn btn-danger" href="./config/actions.php?id_newindicateur=<?php echo $id ;?>">Supprimer</a></td>
                 
				  </tr>
			   </tbody>
			   <?php }?>
			</table>
		 </div>
	  </div>
   </div>
</div>
<?php include('footer.php')?>