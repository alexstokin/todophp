<?php 
include 'config.php';

// Naredi SQL query ki pridobi podatke iz tabele students
$query = "SELECT * FROM todos";

// Zazene SQL query, pridobi podatke iz baze
$result = mysqli_query($conn, $query);

// Preveri ce je SQL query vrnil vrstice
if (mysqli_num_rows($result) > 0) {
    // Gre cez vse vrstice in zapise podatke v table
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr><td>' . $row["description"] . '</td><td><button type="button" class="btn btn-danger" onclick="deleteRow(' . $row["id"] . ')">Odstrani todo</button></td></tr>';
    }
}

mysqli_close($conn);
?>