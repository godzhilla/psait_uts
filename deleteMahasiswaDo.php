<?php

if(isset($_GET['nim']) && isset($_GET['kode_mk'])) {
    $nim = $_GET['nim'];
    $kode_mk = $_GET['kode_mk'];

    //Pastikan sesuai dengan alamat endpoint dari REST API di ubuntu
    $url='http://localhost/psait_uts_api/uts_mahasiswa_api.php?nim='.$nim.'&kode_mk='.$kode_mk;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    // pastikan methodnya adalah delete
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $result = curl_exec($ch);
    $result = json_decode($result, true);

    curl_close($ch);

    // tampilkan return statusnya, apakah sukses atau tidak
    print("<center><br>status :  {$result["status"]} "); 
    print("<br>");
    print("message :  {$result["message"]} "); 
    //
    echo "<br>Sukses menghapus data !";
    echo "<br><a href=selectMahasiswaView.php> OK </a>";
} else {
    echo "Parameter 'nim' or 'kode_mk' is missing";
}

?>
