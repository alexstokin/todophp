<?php
include 'config.php';

// Dobi ID vrstice iz AJAX klica funkcije deleteRow() v scripti index.php dokumenta
$id = $_POST['id'];

// SQL query, ki izbrise vrstico z dobljenim ID-jem iz baze
mysqli_query($conn, "DELETE FROM todos WHERE id = $id");

// Zapre povezavo z bazo
mysqli_close($conn);
?>