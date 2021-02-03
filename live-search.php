<?php

    include("config.php"); 
    mysqli_query($conn, "SET NAMES utf8");
    if ($_REQUEST['term']) { // Bir terim gelip gelmediğini kontrol ediyoruz.
        $term = $_REQUEST['term']; // Gelen terimi değişkene atıyoruz.
        /* Gelen terim ile eşleşen kayıt olup olmadığını sorguluyoruz. */
        $check_query = mysqli_query($conn, "SELECT * FROM isler WHERE pozisyon LIKE '%".$term."%'");
        $check_row = mysqli_fetch_array($check_query);
        /* Gelen terim ile eşleşen kayıt olup olmadığını sorguluyoruz. */
        if ($check_row) { // Sorgulama sonucu dolu olursa eğer sonuçları ekrana basıyoruz.
            $query = mysqli_query($conn, "SELECT DISTINCT pozisyon FROM isler WHERE pozisyon LIKE '%".$term."%'");
            while ($row = mysqli_fetch_array($query)){

                $pos = $row['pozisyon'];

                echo '<li class="list-group-item" style="cursor: pointer">'.$pos.'</li>';
            }
        }

        else{
            // Eğer eşleşen kayıt yoksa alttaki uyarıyı ekrana basıyoruz.
            echo '<li class="list-group-item">Pozisyon bulunamadı.</li>';
        }
    }
