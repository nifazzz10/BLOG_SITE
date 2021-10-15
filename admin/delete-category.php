<?php 

include 'includes/dbconfig.php';

session_start();

if (isset($_SESSION['id'])) {
    if ($_SESSION['role'] == 1) {

        $id = $_GET['id'];

        $sql = "DELETE FROM categories WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header("Location: categories.php?remove_success=true");
        } else {
            header("Location: categories.php?remove_success=false");
        }

    } else {
        header("Location: index.php");
    }
}

?>