<?php 

include("config.php"); 

if($_POST["kullanici"] != "" and $_POST["parola"] != "") {
	$uname = mysqli_real_escape_string($conn,$_POST['kullanici']);
    $pass = mysqli_real_escape_string($conn,$_POST['parola']);
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
	echo "Alanlar boş bırakılamaz.<br>"; 
	echo "<a href='login.php'>Geri dön</a>";
}
    
?> 
