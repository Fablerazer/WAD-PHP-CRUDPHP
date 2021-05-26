<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
    <?php
        include ('config.php');
        $result = $conn->query('SELECT keluarga.id, keluarga.nama, status_keluarga.status FROM keluarga, status_keluarga WHERE keluarga.id_status = status_keluarga.id');
    ?>
    <title>Keluarga</title>
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#16a2f7">
        <a class="navbar-brand" href="#">Home</a>
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
            <table class="table table-sm table-bordered table-hover" style="text-align:center">
                <thead class="text-light" style="background-color:#16a2f7"> <!-- head table -->
                    <tr>
                        <th scope="col">No</th> 
                        <th scope="col">Nama</th> 
                        <th scope="col">Status</th> 
                        <th scope="col">Action</th> 
                    </tr>
                </thead> 
                <tbody>
                <?php
                    try {
                        $i=0;
                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                            echo '<tr>';
                            echo '<th scope="row">';
                            echo $i+=1;
                            echo '</th>';
                            
                            echo '<td>';
                            echo $row['nama'];
                            echo '</td>';

                            echo '<td>';
                            echo $row['status'];
                            echo '</td>';

                            echo '<td>';
                            ?>
                            <a href="update.php?name=<?php echo $row['nama']; ?>">Update Data</a> 
                            || <a href="hapus.php?name=<?php echo $row['id']; ?>">Delete</a>
                            <?php
                            echo '</td>';
                            echo '</tr>';
                        }
                    } catch (PDOException $e) {
                        echo "Gagal: " . $e->getMessage();
                    }
                    
                ?>
                </tbody>
            </table>
        </div> 
        <a href="tambah.php" type="button" class="btn btn-primary btn-md">Tambah Data</a>      
    </div>
</body>
</html>