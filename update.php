<?php
    include ('config.php');
    if (isset($_GET['update'])) {
        $namaasli = $_GET['nama_lama'];
        $name = $_GET['nama_baru'];
        $status = $_GET['status_baru'];
        try {
            $sql = "UPDATE keluarga SET nama='$name', id_status='$status' WHERE nama='$namaasli'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            echo $stmt->rowCount() . " berhasil di-Update";
            header("location:index.php");
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $conn = null;
    }
    $nama = $_GET['name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
    <title>Update</title>
</head>
<body class="bg-light">
    <!-- navbar -->
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
    <!-- end of navbar -->

    <!-- content -->
    <div class="container mt-3 mx-auto bg-white border rounded">
        <div class="card mx-auto border-rounded my-3" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Update Data Keluarga</h5>
                <form action="update.php" method="get">
                    <input type="hidden" class="form-control" name="nama_lama" value="<?php echo $nama ?>" readonly>
                    <div class="form-group">
                        <label>Nama baru : </label>
                        <input type="text" class="form-control" name="nama_baru" value="<?php echo $nama ?>">
                    </div>
                    <div class="form-group">
                        <label>Status baru didalam keluarga : </label>
                        <select name="status_baru" class="form-control">
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
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="update">Update</button>
                        <a href="index.php" type="cancel" class="btn btn-danger" name="cancel">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end of content -->
</body>
</html>

