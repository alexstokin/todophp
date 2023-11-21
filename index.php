<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Todo NSA</title>
</head>
<body>
    <h3 style="text-align:center;">Todos</h3>
    <main class="container">
        <form action="insert.php" method="post">
            <div class="grid">
                <label for="todo">
                    <input type="text" id="todo" name="description" placeholder="Add todo" required>
                </label>
                <button type="submit">Dodaj</button>
            </div>
        </form>
        <table>
            <thead>
                <tr>
                    <th>Todo</th>
                    <th>Odstranitev</th>
                </tr>
                <tbody>
                    <?php
                        include 'retrive.php';
                    ?>
                        <script>
                            function deleteRow(id) {
                                if (confirm("Ali sigurno zelite izbrisati TODO?")) {
                                    // Poslje AJAX klic v PHP, ki zbrise todo.
                                    $.ajax({
                                        type: "POST",
                                        url: "delete_row.php",
                                        data: { id: id },
                                        success: function (response) {
                                            // Reloada stran, da se odstrani todo
                                            location.reload();
                                        }
                                    });
                                }
                            }
                        </script>
                </tbody>
            </thead>
        </table>
    </main>
</body>
</html>