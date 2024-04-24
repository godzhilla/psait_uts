<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>

<?php
 $nim = $_GET['nim']; 
 $curl = curl_init();
 curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
 
 // Set URL dengan dua parameter nim dan kode_mk
 $url = 'http://localhost/psait_uts_api/uts_mahasiswa_api.php?nim='.$nim;
 curl_setopt($curl, CURLOPT_URL, $url);
 $res = curl_exec($curl);
 $json = json_decode($res, true);
//var_dump($json);
?>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update Data</h2>
                    </div>
                    <p>Please fill this form and submit to add student record to the database.</p>
                    <form action="updateMahasiswaDo.php" method="post">
                        <input type = "hidden" name="id" value="<?php echo"$id";?>">
                        <div class="form-group">
                            <label>Nim</label>
                            <input type="text" name="nim" class="form-control" value="<?php echo($json["data"][0]["nim"]); ?>">
                        </div>
                        <div class="form-group">
                            <label>Kode Mata Kuliah</label>
                            <input type="mobile" name="kode_mk" class="form-control" value="<?php echo($json["data"][0]["kode_mk"]); ?>">
                        </div>
                        <div class="form-group">
                            <label>Nilai</label>
                            <input type="mobile" name="nilai" class="form-control" value="<?php echo($json["data"][0]["nilai"]); ?>">
                        </div>
                        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>