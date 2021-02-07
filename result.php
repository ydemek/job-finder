<?php
	include("config.php"); 
    mysqli_query($conn, "SET NAMES utf8");

    if ($_REQUEST['term']) { 
        $term = $_REQUEST['term']; 
        $check_query = mysqli_query($conn, "SELECT * FROM jobs WHERE position LIKE '%".$term."%'");
        $check_row = mysqli_fetch_array($check_query);
        if ($check_row) { 
            $query = mysqli_query($conn, "SELECT * FROM jobs WHERE position LIKE '%".$term."%'");
            while ($row = mysqli_fetch_array($query)){
                $blob = $row['photo'];
                $pos = $row['position'];
                $comp = $row['company'];
                $city = $row['city'];
                $definition = $row['definition'];
                
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
				$productHTML .= '<h6>City : '.$city.'</h6>';
				$productHTML .= '<h6>Definition : '.$definition.'</h6>';
				$productHTML .= '</div>';
				$productHTML .= '</div>';
				$productHTML .= '</div>';
				$productHTML .= '</div>';

				echo $productHTML;
            }
        }

        else{
            echo '<li class="list-group-item">There is no match..</li>';
        }
    }
?>
