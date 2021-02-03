<!doctype html>

<?php
include("config.php");

if (!isset($_SESSION["kullanici"])) {
	echo "Bu sayfayı görüntüleme yetkiniz yoktur.<br>";
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

	<title>Profil</title>
</head>

<body>
	<div class="container-fluid">
		<div class="row m-0 p-0  d-flex  justify-content-center">
			<div class="col-10 search-box mt-3 ">
				<h4>Profil</h4>
				<div class="tab">
					<button class="tablinks btn btn-outline-primary mr-1" onclick="openCity(event, 'My Advertisements')" id="defaultOpen">My Advertisements</button>
					<button class="tablinks btn btn-outline-primary" onclick="openCity(event, 'Add Advertisement')">Add Advertisement</button>
				</div>

				<div id="My Advertisements" class="tabcontent w-100">
					<?php
					$sql = "SELECT * FROM isler WHERE owner='" . $_SESSION["kullanici"] . "'";
					$query = mysqli_query($conn, $sql);
					while ($row = mysqli_fetch_array($query)) {
						$blob = $row['foto'];
						$pos = $row['pozisyon'];
						$comp = $row['sirket'];
						$sehir = $row['sehir'];
						$aciklama = $row['aciklama'];

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
						$productHTML .= '<h6>Şehir : ' . $sehir . '</h6>';
						$productHTML .= '<h6>Açıklama : ' . $aciklama . '</h6>';
						$productHTML .= '</div>';
						$productHTML .= '</div>';
						$productHTML .= '</div>';
						$productHTML .= '</div>';
						$productHTML .= '<hr>';

						echo $productHTML;
					}
					?>
				</div>

				<div id="Add Advertisement" class="tabcontent mt-3 w-50">
					<form method="post" action="upload.php" enctype="multipart/form-data">
						<div id="div_ilan">
							<input class="form-control mb-2" type="file"  id="logo" name="logo"></input>
							<input class="form-control mb-2" type="text" class="textbox" id="txt_pos" name="poz" placeholder="Pozisyon.." />
							<input class="form-control mb-2" type="text" class="textbox" id="txt_comp" name="sirket" placeholder="Kurum.." />
							<input class="form-control mb-2" type="text" class="textbox" id="txt_city" name="sehir" placeholder="Şehir.." />
							<input class="form-control mb-2" type="text" class="textbox" id="txt_disc" name="aciklama" placeholder="Açıklama.." />
							<input class="btn btn-success" type="submit" value="Ekle" name="but_submit" id="but_submit" />
						</div>
					</form>
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
				if (isset($_SESSION["kullanici"])) {
					echo '<a href="index.php">
					<button type="button" class="btn btn-primary mr-1">Tüm İlanlar </button>
					</a>' . '<a href="logout.php"><button type="button" class="btn btn-danger">Çıkış Yap</button></a>';
				}
				?>
			</div>
		</div>

	</div>
	</div>
</body>

</html>