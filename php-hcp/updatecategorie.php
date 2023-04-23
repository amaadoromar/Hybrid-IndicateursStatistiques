<?php
include('./header.php');
if(isset($_SESSION['ROLE']) && $_SESSION['ROLE']!='1'){
	header('location:./login.php');
	die();
}
include "./db.php";
  $id = $_GET['id_category'];
  $db = mysqli_connect("localhost", "root", "", "hcp");
  $result2 = mysqli_query($db,"SELECT * from categories WHERE  id = $id");
  $row2= mysqli_fetch_array($result2);
?>
<body style="text-align:center;">
<center>
    <form class="myPost" method="post" action="./config/actions.php">
        <label for="Titre">Nom de la catégorie</label>
        <input style="width: 50%;" type="text" value="<?php echo  $row2['category_name']; ?>" class="form-control" id="nom" name="nom" placeholder="nom">
        <input style="width: 50%;" type="hidden" value="<?php echo  $id; ?>" class="form-control" id="id" name="id" placeholder="id">
            <br><input value="Modifier le nom" type="submit" name="updatecategorie" class="btn btn-primary">
        </form>
        <?php 

        ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
 
</center>

</body>


<?php include('footer.php')?>
  