<?php
include 'conn.php';

// Fetch package details by ID
if (isset($_GET['package_id'])) {
    $package_id = intval($_GET['package_id']);
    $query = "SELECT * FROM package WHERE package_id = $package_id";
    $result = mysqli_query($conn, $query);
    $package = mysqli_fetch_assoc($result);
}

// Handle form submission to update the package
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $package_id = intval($_POST['package_id']);
    $package_name = $_POST['package_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $features = $_POST['features'];

    $update_query = "UPDATE package SET 
        package_name = '$package_name', 
        description = '$description', 
        price = '$price', 
        features = '$features' 
        WHERE package_id = $package_id";
    
    if (mysqli_query($conn, $update_query)) {
        header("Location: index.php"); // Redirect back to the package list
        exit;
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Package</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="container mx-auto max-w-lg">
        <h1 class="text-3xl font-bold mb-6 text-center">Update Package</h1>
        
        <?php if (isset($package)): ?>
        <form method="POST" >
            <input type="hidden" name="package_id" value="<?php echo htmlspecialchars($package['package_id']); ?>">

            <!-- Package Name -->
            <div class="mb-4">
                <label for="package_name" class="block text-gray-700 font-bold mb-2">Package Name</label>
                <input 
                    type="text" 
                    name="package_name" 
                    id="package_name" 
                    class="w-full px-4 py-2 border rounded" 
                    value="<?php echo htmlspecialchars($package['package_name']); ?>" 
                    required>
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-bold mb-2">Description</label>
                <textarea 
                    name="description" 
                    id="description" 
                    class="w-full px-4 py-2 border rounded" 
                    rows="4" 
                    required><?php echo htmlspecialchars($package['description']); ?></textarea>
            </div>

            <!-- Price -->
            <div class="mb-4">
                <label for="price" class="block text-gray-700 font-bold mb-2">Price</label>
                <input 
                    type="number" 
                    name="price" 
                    id="price" 
                    class="w-full px-4 py-2 border rounded" 
                    value="<?php echo htmlspecialchars($package['price']); ?>" 
                    step="0.01" 
                    required>
            </div>

            <!-- Features -->
            <div class="mb-6">
                <label for="features" class="block text-gray-700 font-bold mb-2">Features</label>
                <textarea 
                    name="features" 
                    id="features" 
                    class="w-full px-4 py-2 border rounded" 
                    rows="4" 
                    required><?php echo htmlspecialchars($package['features']); ?></textarea>
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button 
                    type="submit" 
                    class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">
                    Update Package
                </button>
            </div>
        </form>
        <?php else: ?>
            <p class="text-red-500 font-bold">Package not found!</p>
        <?php endif; ?>
    </div>
</body>
</html>

