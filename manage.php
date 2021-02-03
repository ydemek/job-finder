<?php 

include("config.php"); 

if($_POST["kullanici"] != "" and $_POST["parola"] != "") {
	$uname = mysqli_real_escape_string($conn,$_POST['kullanici']);
    $pass = mysqli_real_escape_string($conn,$_POST['parola']);
	$sql_query = "select count(*) as cntUser from users where username='".$uname."' and password='".$pass."'";
    $result = mysqli_query($conn,$sql_query);
    $row = mysqli_fetch_array($result);

    $count = $row['cntUser'];

    if($count > 0) {
		if($uname == "admin") {
			$_SESSION["admin"] = true; 
			$_SESSION["kullanici"] = $uname; 
			$_SESSION["parola"] = $pass; 
			header("Location:admin.php");
		}
		
		else {
		    $_SESSION['user'] = $uname;
			$_SESSION["kullanici"] = $uname; 
			$_SESSION["parola"] = $pass;
		    header('Location: user.php');
		}	
	}
	 

	else {
		echo "Kullanıcı adı veya parola yanlış.<br>"; 
		echo "<a href='login.php'><button class='btn btn-info'>Geri Dön</button></a>";
	}
}

else {
	echo "Alanlar boş bırakılamaz.<br>"; 
	echo "<a href='login.php'><button class='btn btn-info'>Geri Dön</button></a>";
}
    
?> 
