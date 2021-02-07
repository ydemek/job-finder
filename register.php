<?php 

include("config.php"); 

if($_POST["user"] != "" and $_POST["password"] != "") {
	$uname = mysqli_real_escape_string($conn,$_POST['user']);
    $pass = mysqli_real_escape_string($conn,$_POST['password']);
	$sql = "INSERT INTO users(username, password) VALUES ('".$uname."','".$pass."')";

    if(mysqli_query($conn, $sql)) {
		header("Location:login.php");
	}

	else {
		echo "hata</br>";
		echo "<a href=\"login.php\">Geri</a>";
	}	
}

else {
	echo "Fields can not be empty..<br>"; 
	echo "<a href='login.php'><button class='btn btn-info'>Go Back</button></a>";
}
    
?> 
