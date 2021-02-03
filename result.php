<?php
	include("config.php"); 
    mysqli_query($conn, "SET NAMES utf8");

    if ($_REQUEST['term']) { 
        $term = $_REQUEST['term']; 
        $check_query = mysqli_query($conn, "SELECT * FROM isler WHERE pozisyon LIKE '%".$term."%'");
        $check_row = mysqli_fetch_array($check_query);
        if ($check_row) { 
            $query = mysqli_query($conn, "SELECT * FROM isler WHERE pozisyon LIKE '%".$term."%'");
            while ($row = mysqli_fetch_array($query)){
                $blob = $row['foto'];
                $pos = $row['pozisyon'];
                $comp = $row['sirket'];
                $sehir = $row['sehir'];
                $aciklama = $row['aciklama'];
                
                $productHTML = '';
                $productHTML .= '<div class="card mt-3 shadow">';
				$productHTML .= '<h4 class="card-header">'.$pos.'</h4>';
				$productHTML .= '<div class="card-body">';
				$productHTML .= '<div class="row d-flex">';
				$productHTML .= '<div class="col-4">';
				$productHTML .= '<img width="150" height="150" src="uploads/'.$blob.'"/>';
				$productHTML .= '</div>';
				$productHTML .= '<div class="col-8">';
				$productHTML .= '<h5>'.$comp.'</h5>';
				$productHTML .= '<h6>Şehir : '.$sehir.'</h6>';
				$productHTML .= '<h6>Açıklama : '.$aciklama.'</h6>';
				$productHTML .= '</div>';
				$productHTML .= '</div>';
				$productHTML .= '</div>';
				$productHTML .= '</div>';

				echo $productHTML;
            }
        }

        else{
            echo '<li class="list-group-item">Eşleşen kayıt bulunamadı.</li>';
        }
    }
?>
