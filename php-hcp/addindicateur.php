<?php
include('./header.php');
if(isset($_SESSION['ROLE']) && $_SESSION['ROLE']!='1'){
	header('location:./login.php');
	die();
}
include "./db.php";
  $db = mysqli_connect("localhost", "root", "", "hcp");
  $result2 = mysqli_query($db,"SELECT * from categories");
  $row2= mysqli_fetch_array($result2);
?>
<body style="text-align:center;">
<center>
    <form class="myPost" method="post" action="./config/actions.php">
        <label for="Titre">Definition</label>
        <input style="width: 50%;" type="text" class="form-control" id="definition" name="definition" placeholder="Definition">
        <label for="Titre">Unité</label>
        <input style="width: 50%;" type="text" class="form-control" id="unite" name="unite" placeholder="Unité">
        <label for="Titre">Indication</label>
        <input style="width: 50%;" type="text" class="form-control" id="indication" name="indication" placeholder="indication">
        <label for="Titre">Source</label>
        <input style="width: 50%;" type="text" class="form-control" id="source" name="source" placeholder="source">
        <label for="Titre">Periodicité</label>
        <input style="width: 50%;" type="text" class="form-control" id="periodicite" name="periodicite" placeholder="periodicite">
        <label for="Titre">couverture</label>
        <input style="width: 50%;" type="text" class="form-control" id="couverture" name="couverture" placeholder="Couverture">
        <label for="Titre">Categorie</label>
       <input style="width: 20%;" class="form-control" list="browsers" id="categorie" cols="1" rows="1" name="categorie"  >
      <datalist id="browsers">
      <?php
			do  {
         echo"<option value=".$row2['id']." >" ;
         echo"<h1>".$row2['category_name']."</h1>";
      }while ($row2 = mysqli_fetch_array($result2))
      ?>
</datalist>
            <br><input value="Ajouter l'indicateur" type="submit" name="addindicateur" class="btn btn-primary">
        </form>
        <?php 

        ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
 
</center>

</body>


<?php include('footer.php')?>
  