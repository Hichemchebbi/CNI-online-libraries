<?php
	session_start();
	require_once "./functions/database_functions.php";
	$conn = db_connect();

	$query = "SELECT * FROM categorie ORDER BY categorie_id";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Can't retrieve data " . mysqli_error($conn);
		exit;
	}
	if(mysqli_num_rows($result) == 0){
		echo "Empty categorie ! Something wrong! check again";
		exit;
	}

	$title = "List Of Categorie";
	require "./template/header.php";
?>
	<p class="lead">List of Catégorie</p>
	<ul>
	<?php 
		while($row = mysqli_fetch_assoc($result)){
			$count = 0; 
			$query = "SELECT categorie_id FROM books";
			$result2 = mysqli_query($conn, $query);
			if(!$result2){
				echo "Can't retrieve data " . mysqli_error($conn);
				exit;
			}
			while ($pubInBook = mysqli_fetch_assoc($result2)){
				if($pubInBook['categorie_id'] == $row['categorie_id']){
					$count++;
				}
			}
	?>
		<li>
			<span class="badge"><?php echo $count; ?></span>
		    <a href="bookPerPub.php?pubid=<?php echo $row['categorie_id']; ?>"><?php echo $row['categorie_name']; ?></a>
		</li>
	<?php } ?>
		<li>
			<a href="books.php">List full of books</a>
		</li>
	</ul>