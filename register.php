<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Pripravi insert
    $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $password);

    // Zazene in preveri za napake
    if (!$stmt->execute()) {
        die("Error: " . $stmt->error);
    }

    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registracija</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#E1EAE2] selection:bg-[#DAE5DB]">
    <div>
    <div class="w-full max-w-xs absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
    <form class="shadow-md rounded px-8 pt-6 pb-8 mb-4 bg-[#FCFBF4] md:outline md:outline-4 md:outline-offset-8 md:outline-[#FCFBF4]" method="POST">

    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
        Ime
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" id="name" name="name">
    </div>

    <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
            Email
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="email" id="email" name="email">
        <div id="error-message" class="error-message text-red-500 text-xs italic"></div>
    </div>

    <div class="mb-6">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
        Password
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" type="password" id="password" name="password">
    </div>

    <div class="flex items-center justify-between">
      <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" value="Register">
        Registriraj se
      </button>
      <a class="inline-block align-baseline font-bold text-sm text-black-500 hover:text-green-600" href="login.php">
        Imas račun?
      </a>
    </div>
  </form>
</div>
<script>
    var errorDiv = document.getElementById("error-message");
    if (errorDiv && "<?php echo $bruh; ?>") {
        errorDiv.innerHTML = "<?php echo $bruh; ?>";
    }
</script>
</body>
</html>