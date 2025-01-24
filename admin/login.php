<?php
session_start(); // Start the session

// Check if the admin is already logged in, if so, redirect to index.php
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header("Location: index.php");
    exit;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Admin credentials (username and password)
    $admin_username = "admin";
    $admin_password = "admin123"; // You can change this to a hashed password in a real-world app

    // Get the input values from the login form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate the credentials
    if ($username === $admin_username && $password === $admin_password) {
        // Set session variables to indicate that the admin is logged in
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_username'] = $username;

        // Redirect to index.php after successful login
        header("Location: index.php");
        exit;
    } else {
        $error_message = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> <!-- Tailwind CSS CDN -->
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-3xl font-bold text-center text-gray-700 mb-6">Admin Login</h2>
        
        <?php
        if (isset($error_message)) {
            echo '<p class="text-red-500 text-center mb-4">' . $error_message . '</p>';
        }
        ?>
        
        <form action="login.php" method="post">
            <div class="mb-4">
                <label for="username" class="block text-gray-600 text-sm font-medium mb-2">Username</label>
                <div class="relative">
                    <input type="text" id="username" name="username" class="w-full p-3 pl-10 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
              
                </div>
            </div>
            
            <div class="mb-6">
                <label for="password" class="block text-gray-600 text-sm font-medium mb-2">Password</label>
                <div class="relative">
                    <input type="password" id="password" name="password" class="w-full p-3 pl-10 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
              
                </div>
            </div>

            <button type="submit" class="w-full py-3 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 transition duration-300">
                Login <!-- Font Awesome Icon on Button -->
            </button>
        </form>

      
    </div>

</body>
</html>
