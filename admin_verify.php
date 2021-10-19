<?php /*
	session_start();
	require_once "./functions/database_functions.php";
	$conn = db_connect();

	if(!isset($_POST['submit'])){
		echo "Something wrong! Check again!";
		exit;
	}


	$name = trim($_POST['name']);
	$pass = trim($_POST['pass']);

	if($name == "" || $pass == ""){
		echo "Name or Pass is empty!";
		exit;
	}

	$name = mysqli_real_escape_string($conn, $name);
	$pass = mysqli_real_escape_string($conn, $pass);
	$pass = sha1($pass);

	// get from db
	$query = "SELECT name, pass from admin";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Empty data " . mysqli_error($conn);
		exit;
	}
	$row = mysqli_fetch_assoc($result);

	if($name != $row['name'] && $pass != $row['pass']){
		echo "Name or pass is wrong. Check again!";
		$_SESSION['admin'] = false;
		exit;
	}

	if(isset($conn)) {mysqli_close($conn);}
	$_SESSION['admin'] = true;
	header("Location: admin_book.php");
*/
session_start();
require_once "./functions/database_functions.php";
$conn = db_connect();

if (isset($_POST['name']) && isset($_POST['pass'])) {
	$name = test_input($_POST['name']);
	$pass = test_input($_POST['pass']);

	if (empty($name)) {
		header("Location: ../admin.php?error=User Name is Required");
	}else if (empty($pass)) {
		header("Location: ../admin.php?error=Password is Required");
	}else {
    $pass = md5($pass);
    $sql = "SELECT name, pass FROM users WHERE name='$name' AND pass='$pass' ";
    $result = mysqli_query($conn , $sql) ;
    if (mysqli_num_rows($result) ===1) {
      $row = mysqli_fetch_assoc($result);
      if ($row['pass'] === $pass ){
        $_SESSION['name'] = $row['name'];

        if ($_SESSION['name'] !== 'admin') {  
            header("Location: index.php");}
        else if ($_SESSION['name'] == 'admin') { 
            header("Location: admin_book.php"); }   
      }else {
        header("Location: admin.php?error=Incorect User Name or Password");
      }
  } else {
    header("Location: admin.php?error=Incorect User Name or Password");
  }
    }

	}
	else {
	header("Location: admin.php");
}
?>
