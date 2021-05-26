<?php 
    include ('config.php');
    
    try {
        $sql = "DELETE FROM keluarga WHERE id='" . $_GET['name'] . "'";
        $conn->exec($sql);
        echo "Deletion Succeeded";
        header("location:index.php");
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
?>