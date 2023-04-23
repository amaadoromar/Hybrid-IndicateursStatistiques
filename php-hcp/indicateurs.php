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
         <div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			   <thead>
				  <tr>
					 <th>Definition</th>
					 <th>Categorie</th>
					 <th>Thematique</th>
					 <th>Indication</th>
					 <th>Source</th>
					 <th>Periodicité</th>
					 <th>Couverture</th>
					 <th>Unité</th>
					 <th>Data</th>
                     <th>Mise à jour</th>
					 <th>Supprimer</th>
				  </tr>
			   </thead>
			   <tfoot>
				  <tr>
					 <th>Definition</th>
					 <th>Categorie</th>
					 <th>Thematique</th>
					 <th>Indication</th>
					 <th>Source</th>
					 <th>Periodicité</th>
					 <th>Couverture</th>
					 <th>Unité</th>
					 <th>Data</th>
                     <th>Mise à jour</th>
					 <th>Supprimer</th>
				  </tr>
			   </tfoot>
			   <tbody>
			   	<?php
$connection = new mysqli("localhost","root","","hcp");
    $query_articles = 
    "SELECT * FROM (SELECT * FROM indicateurs,categories WHERE indicateurs.id_categories = categories.id) AS A ,thematiques WHERE A.id_thematique = thematiques.id_thematique";
    $select_articles = mysqli_query($connection,$query_articles);
    while($articles = mysqli_fetch_assoc($select_articles))
    {

    
    $id = $articles['id_indicateur'];
    $titre=$articles['definition'];
    $source=$articles['source'];
    $categorie=$articles['category_name'];
	$thematique=$articles['titre'];
	$unite=$articles['unite'];
	$periodicite=$articles['periodicite'];
	$indication=$articles['indication'];
	$couverture=$articles['couverture'];

?>
				  <tr>
					 <td><?php echo $titre;?></td>
					 <td><?php echo $categorie;?></td>
					 <td><?php echo $thematique;?></td>
					 <td><?php echo $indication;?></a></td>
					 <td><?php echo $source;?></a></td>
					 <td><?php echo $periodicite;?></a></td>
					 <td><?php echo $couverture;?></a></td>
					 <td><?php echo $unite;?></a></td>
					
					 <td><a class="btn btn-primary" href="./api/download.php?id_indicateur=<?php echo $id ;?>">Exporter CSV</a></td>
                     <td><a class="btn btn-warning" href="./updateindicateurexist.php?id_indicateur=<?php echo $id ;?>">Mise à jour</a></td>
					 <td><a class="btn btn-danger" href="./config/actions.php?id_existindicateur=<?php echo $id ;?>">Supprimer</a></td>
				  </tr>
			   </tbody>
			   <?php }?>
			</table>
		 </div>
	  </div>
   </div>
</div>
<?php include('footer.php')?>