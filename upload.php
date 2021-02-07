<?php

include("config.php");

if( $_POST["poz"] != "" and $_POST["company"] != "" and $_POST["city"] != "" and $_POST["definition"] != "")	{
	if($_FILES["logo"]["name"] == ""){
		$_FILES["logo"]["name"] = "default.png" ;
	}

	$owner = $_SESSION["user"];
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["logo"]["name"]);

	$uploadOk = 1;

	if ($_FILES["logo"]["size"] > 500000) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}

	// else {
	// 	if (move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file)) {
	// 	    ;
	// 	} else {
	// 	    echo "Sorry, there was an error uploading your file.";
	// 	}
	// }
	
	$blob = $_FILES["logo"]["name"] /* || move_uploaded_file($_FILES["logo"]["tmp_name"], "uploads/default.png") */;
    $pos = $_POST["poz"];
    $comp = $_POST["company"];
    $city = $_POST["city"];
	$definition = $_POST["definition"];
	
	echo $blob;

	$sql = "INSERT INTO jobs(photo, position, company, city, definition, owner) VALUES ('".$blob."','".$pos."','".$comp."','".$city."','".$definition."','".$owner."')";

	if(mysqli_query($conn, $sql)) {
		header("Location:index.php");
	}

	else {
		echo "hata</br>";
		echo "<a href=\"user.php\">Geri</a>";
	}
}

else {
	echo "Formun tamamını doldurmalısınız.</br>";
	echo "<a href=\"user.php\">Geri</a>";
}

?>
