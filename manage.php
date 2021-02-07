<?php 

include("config.php"); 
if($_POST["user"] != "" and $_POST["password"] != "") {
	$uname = mysqli_real_escape_string($conn,$_POST['user']);
    $pass = mysqli_real_escape_string($conn,$_POST['password']);
	$sql_query = "select count(*) as cntUser from users where username='".$uname."' and password='".$pass."'";
    $result = mysqli_query($conn,$sql_query);
    $row = mysqli_fetch_array($result);

    $count = $row['cntUser'];

    if($count > 0) {
		if($uname == "admin") {
			$_SESSION["admin"] = true; 
			$_SESSION["user"] = $uname; 
			$_SESSION["password"] = $pass; 
			header("Location:admin.php");
		}
		
		else {
		    $_SESSION['user'] = $uname;
			$_SESSION["user"] = $uname; 
			$_SESSION["password"] = $pass;
		    header('Location: user.php');
		}	
	}
	 

	else {
		echo "Username or password incorrect.<br>"; 
		echo "<a href='login.php'><button class='btn btn-info'>Go Back</button></a>";
	}
}

else {
	echo "Fields can not be empty..<br>"; 
	echo "<a href='login.php'><button class='btn btn-info'>Go Back</button></a>";
}
    
?> 
