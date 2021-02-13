<!doctype html>

<?php
include("config.php");

if (!isset($_SESSION["admin"])) {
	echo "There is noting for you in here.<br>";
	echo "<iframe src='https://giphy.com/embed/6uGhT1O4sxpi8' width='480' height='240' frameBorder='0' ></iframe>";
	echo "<p></p>";
	echo "<a href=index.php><button class='btn btn-info'>Home</button></a>";
	die();
}
?>
<html lang="tr">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

	<title>Management</title>
</head>

<body>
	<div class="container-fluid">
		<div class="row m-0 p-0  d-flex  justify-content-center">
			<div class="col-10 search-box mt-3 ">
				<h4>Management</h4>
				<div class="tab">
					<button class="tablinks btn btn-outline-primary mr-1" onclick="openCity(event, 'My Posts')" id="defaultOpen">My Posts</button>
					<button class="tablinks btn btn-outline-primary mr-1" onclick="openCity(event, 'Add Post')">Add Post</button>
					<button class="tablinks btn btn-outline-primary" onclick="openCity(event, 'Users')">Users</button>
				</div>

				<div id="My Posts" class="tabcontent w-100">
					<?php
					$sql = "SELECT * FROM jobs WHERE owner='" . $_SESSION["user"] . "'";
					$query = mysqli_query($conn, $sql);
					while ($row = mysqli_fetch_array($query)) {
						$blob = $row['photo'];
						$pos = $row['position'];
						$comp = $row['company'];
						$city = $row['city'];
						$definition = $row['definition'];

						$productHTML = '';
						$productHTML .= '<div class="card mt-3">';
						$productHTML .= '<h4 class="card-header">' . $pos . '</h4>';
						$productHTML .= '<div class="card-body">';
						$productHTML .= '<div class="row d-flex">';
						$productHTML .= '<div class="col-4">';
						$productHTML .= '<img width="150" height="150" src="uploads/' . $blob . '"/>';
						$productHTML .= '</div>';
						$productHTML .= '<div class="col-8">';
						$productHTML .= '<h5>' . $comp . '</h5>';
						$productHTML .= '<h6>City : ' . $city . '</h6>';
						$productHTML .= '<h6>Definition : ' . $definition . '</h6>';
						$productHTML .= '</div>';
						$productHTML .= '</div>';
						$productHTML .= '</div>';
						$productHTML .= '</div>';
						$productHTML .= '<hr>';

						echo $productHTML;
					}
					?>
				</div>

				<div id="Add Post" class="tabcontent mt-3 w-50">
					<form method="post" action="upload.php" enctype="multipart/form-data">
						<div id="div_ilan">
							<input class="form-control mb-2" type="file"  id="logo" name="logo"></input>
							<input class="form-control mb-2" type="text" class="textbox" id="txt_pos" name="poz" placeholder="Position.." />
							<input class="form-control mb-2" type="text" class="textbox" id="txt_comp" name="company" placeholder="Company.." />
							<input class="form-control mb-2" type="text" class="textbox" id="txt_city" name="city" placeholder="City.." />
							<input class="form-control mb-2" type="text" class="textbox" id="txt_disc" name="definition" placeholder="Definition.." />
							<input class="btn btn-success" type="submit" value="Add" name="but_submit" id="but_submit" />
						</div>
					</form>
				</div>

				<div id="Users" class="tabcontent">

						
						

                        <?php
							$sql = "SELECT * FROM users";
							$query = mysqli_query($conn, $sql);
							while ($row = mysqli_fetch_array($query)){
								$name = $row['username'];
								$pass = $row['password'];
								
								$productHTML = '';
								$productHTML .= '<div class="item row shadow p-2 mt-3 align-items-center w-50" style="border-radius: 10px;">';
								$productHTML .= '<div class="col-6">';
								$productHTML .= '<h6><strong>User Name: </strong>'.$name.'</h6>';
								$productHTML .= '<h6><b>Password: </b>****</h6>';
								$productHTML .= '</div>';
								$productHTML .= '<div class="col-3">';
								$productHTML .= '</div>';
								$productHTML .= '<div class="col-3">';
								$productHTML .= '<input type="button" class="search-box btn btn-danger" id="'.$name.'" value="Delete" />';
								$productHTML .= '</div>';
								$productHTML .= '</div>';

								echo $productHTML;
							}
						?>
						<script type = "text/javascript">
							
						

								$(document).ready(function(){
									$('.search-box input[type="button"]').on("click", function(){
										var name = this.id;
										
										if(confirmation(name)){
											$.get('delete.php', {term: name}).done(function(data){
												console.log(data);
											});
										}
									});
								});

							function confirmation(name) {

								var val = confirm(name + " kullanıcısı silinecektir, onaylıyor musunuz?");
								if(val) return true;
								else return false;
							}
					  </script>
                    </div>

					<script>
                        function openCity(evt, cityName) {
                            var i, tabcontent, tablinks;
                            tabcontent = document.getElementsByClassName("tabcontent");
                            for (i = 0; i < tabcontent.length; i++) {
                                tabcontent[i].style.display = "none";
                            }
                            tablinks = document.getElementsByClassName("tablinks");
                            for (i = 0; i < tablinks.length; i++) {
                                tablinks[i].className = tablinks[i].className.replace(" active", "");
                            }
                            document.getElementById(cityName).style.display = "block";
                            evt.currentTarget.className += " active";
                        }

                        // Get the element with id="defaultOpen" and click on it
                        document.getElementById("defaultOpen").click();
                    </script>
				<ul class="list-group liveresult"></ul>
				<ul class="result_view" id="result_list">

			</div>
			<div class="col-2 mt-4 d-flex">
				<?php
				if (isset($_SESSION["user"])) {
					echo '<a href="index.php">
					<button type="button" class="btn btn-primary mr-1">All Posts </button>
					</a>' . '<a href="logout.php"><button type="button" class="btn btn-danger">Logout</button></a>';
				}
				?>
			</div>
		</div>

	</div>
	</div>
</body>

</html>