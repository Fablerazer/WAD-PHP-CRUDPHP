<?php
    include ('config.php');
    if (isset($_GET['submit'])) {
        $id = $_GET['id'];
        $name = $_GET['nama'];
        $status = $_GET['statusnya'];
        try {
            $sql = "INSERT INTO keluarga (id, nama, id_status) VALUES ('$id', '$name','$status')";
            $conn->exec($sql);
            echo "Berhasil di tambah";
            header("location:index.php");
        } catch (PDOExecption $e) {
            echo 'Gagal';
            echo $sql . "<br>" . $e->getMessage();
        }
        $conn=null;
    }
    if (isset($_GET['cancel'])) {
        header("location:index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
    <title>Tambah Data</title>
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#16a2f7">
        <a class="navbar-brand" href="index.php">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
            </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-3 mx-auto bg-white border rounded">
        <div class="my-3 table-responsive">
            <div class="card mx-auto" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Tambah Data</h5>
                    <form action="tambah.php" method="get">
                        <div class="form-group">
                            <label>Masukkan nama :</label>
                            <input type="text" class="form-control" name="nama">
                        </div>
                        <div class="form-group">
                            <label>Pilih Status : </label>
                            <select name="statusnya" class="form-control">
                                <option value ="1">Orang Tua</option>
                                <option value ="2">Saudara Kandung</option>
                                <option value ="3">Paman / Om</option>
                                <option value ="4">Bibi / Tante</option>
                                <option value ="5">Bude</option>
                                <option value ="6">Pakde</option>
                                <option value ="7">Eyang Putri</option>
                                <option value ="8">Eyang Kangkung</option>
                                <option value ="9">Saudara Sepupu</option>
                                <option value ="10">Anak</option>
                            </select>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary mr-3">Submit</a>
                        <button type="cancel" name="cancel" class="btn btn-danger">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>