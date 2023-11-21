<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Pridobi podatke iz forma
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    // Vstavi podatke v bazo in preveri, da niso prazni
    if ($description != '') {
        $query = "INSERT INTO todos (description) VALUES (?)";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "s", $description);
        mysqli_stmt_execute($stmt);

        // Preusmeri na index.php
        header('Location: index.php');
        exit();
    }
}

mysqli_close($conn);
?>