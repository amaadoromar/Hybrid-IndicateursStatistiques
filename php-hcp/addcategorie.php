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
        <label for="Titre">Nom de la catégorie</label>
        <input style="width: 50%;" type="text" class="form-control" id="nom" name="nom" placeholder="nom">
            <br><input value="Ajouter la catégorie" type="submit" name="addcategorie" class="btn btn-primary">
        </form>
        <?php 

        ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
 
</center>

</body>


<?php include('footer.php')?>
  