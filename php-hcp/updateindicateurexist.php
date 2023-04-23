<?php
include('./header.php');
if(isset($_SESSION['ROLE']) && $_SESSION['ROLE']!='1'){
	header('location:./news.php');
	die();
}
include "./db.php";
  $exist = true;
  $db = mysqli_connect("localhost", "root", "", "hcp");
  $id_indicateur = $_GET['id_indicateur'];
  $result2 = mysqli_query($db,"SELECT * from indicateurs WHERE id_indicateur=$id_indicateur ");
  $row2= mysqli_fetch_array($result2);
  $id_categorie = $row2['id_categories'];
  $result3 = mysqli_query($db,"SELECT * from thematiques WHERE id_categories=$id_categorie ");
  $row3= mysqli_fetch_array($result3);
  $result4 = mysqli_query($db,"SELECT * from data WHERE id_indicateur=$id_indicateur ");
  $row4= mysqli_fetch_array($result4);
  $cnt = mysqli_num_rows($result4);

  ?>

<body style="text-align:center;">
    <center>
    <form class="myPost" method="post" action="./config/actions.php">
        <label for="Titre">Thematique</label>
       <input style="width: 20%;" value="<?php echo $row2['id_thematique'] ?>" class="form-control" list="browsers" id="thematique" cols="1" rows="1" name="thematique"  >
      <datalist id="browsers">
      <?php
			do  {
         echo"<option value=".$row3['id_thematique']." >" ;
         echo"<h1>".$row3['titre']."</h1>";
      }while ($row3 = mysqli_fetch_array($result3));
      ?>
</datalist>
<div class="card-body">
		 <div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			   <thead>
				  <tr>
          <th>ID Année</th>
					 <th>Année</th>
					 <th>Valeur</th>
				  </tr>
			   </thead>
			   <tbody>
			   	<?php
    $query_articles = 
    "SELECT * FROM periodes";
    $select_articles = mysqli_query($connection,$query_articles);
    while($articles = mysqli_fetch_assoc($select_articles))
    {
    $id_annee=$articles['id_annee'];
    $annee=$articles['annee'];
    $id_indicateur = $_GET['id_indicateur'];
    $query_data = "SELECT * FROM data WHERE id_indicateur= $id_indicateur and id_annee=$id_annee";
    $select_data = mysqli_query($connection,$query_data);
    $datas = mysqli_fetch_assoc($select_data);
    $cnt = mysqli_num_rows($select_data);
?>
				  <tr>
					 <td><?php echo $id_annee;?>  <input type="hidden"  value="<?php echo $id_annee; ?>" id="idannee" name="idannee"></td>
					 <td><?php echo $annee;?></td>
           <td><input value="<?php if($cnt > 0)  {echo $datas['valeur'];} ?>" style="width: 50%;" type="text" class="form-control" id="<?php echo $id_annee; ?>" name="<?php echo $id_annee; ?>" placeholder="<?php echo $id_annee; ?>"></td>
				  </tr>
			   </tbody>
			   <?php }?>
			</table>
		 </div>
	  </div>
    <input type="hidden"  value="<?php echo $_GET['id_indicateur']; ?>" id="indicateur" name="indicateur">
            <br><input value="Mise a jour d'indicateur" type="submit" name="updateindicateur" class="btn btn-primary">
        </form>
        </center>

</body>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
 



<?php include('footer.php')?>
  