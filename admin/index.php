<?php
session_start(); // Start the session

// Check if the admin is logged in, if not, redirect to login page
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit;
}

// Include the database connection file
include 'conn.php';

// Fetch total number of reports
$query_total = "SELECT COUNT(*) AS total_reports FROM reports";
$result_total = mysqli_query($conn, $query_total);
$total_reports = ($result_total && mysqli_num_rows($result_total) > 0) ? mysqli_fetch_assoc($result_total)['total_reports'] : 0;

// Fetch report names and their counts
$query_reports = "SELECT health_package, COUNT(tests) AS total_tests FROM reports GROUP BY health_package";
$result_reports = mysqli_query($conn, $query_reports);

// Get the admin username from the session
$admin_username = $_SESSION['admin_username'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
    const updateLink = document.getElementById('update-link');
    const addLink = document.getElementById('add-link');
    const allDataLink = document.getElementById('all-data-link');
    const mainContent = document.getElementById('main-content');
    const homeLink = document.getElementById('home_link');

    // Handle Update link click
    updateLink.addEventListener('click', (e) => {
        e.preventDefault(); // Prevent default link behavior
        fetch('update.php') // Fetch content from update.php
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.text();
            })
            .then(html => {
                mainContent.innerHTML = html; // Replace main content
            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
            });
    });

    // Home Link click
   
    // Handle Add link click
    // addLink.addEventListener('click', (e) => {
    //     e.preventDefault(); // Prevent default link behavior
    //     fetch('add.php') // Fetch content from add.php (Make sure to create this file)
    //         .then(response => {
    //             if (!response.ok) {
    //                 throw new Error('Network response was not ok');
    //             }
    //             return response.text();
    //         })
    //         .then(html => {
    //             mainContent.innerHTML = html; // Replace main content
    //         })
    //         .catch(error => {
    //             console.error('There was a problem with the fetch operation:', error);
    //         });
    // });

    // Handle All Data link click
    allDataLink.addEventListener('click', (e) => {
        e.preventDefault(); // Prevent default link behavior
        fetch('alldata.php') // Fetch content from alldata.php (Make sure to create this file)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.text();
            })
            .then(html => {
                mainContent.innerHTML = html; // Replace main content
            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
            });
    });

    //home link
    home_link.addEventListener('click', (e) => {
        e.preventDefault(); // Prevent default link behavior
        fetch('Home.php') // Fetch content from alldata.php (Make sure to create this file)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.text();
            })
            .then(html => {
                mainContent.innerHTML = html; // Replace main content
            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
            });
    });
});

    </script>
   <style>
   
    #main-content{
        margin-left: -180px;
    }
   </style>
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">
    <!-- Container for Sidebar and Main Content -->

 
    <div class="grid grid-cols-1 md:grid-cols-4 h-[95vh]">
        <!-- Sidebar -->
        <div class="sidebar_cover">
        <aside class="bg-gray-800 text-white p-4 md:col-span-1 h-[90vh] flex flex-col fixed top-0 left-0 w-[250px]">
            
    <h2 class="text-2xl font-bold mb-6">Admin Menu</h2>
    <ul class="space-y-4">
        <li>
            <a href="#" id="home_link" class="flex items-center text-gray-300 hover:text-white">
                <i class="fas fa-home mr-3"></i> Home
            </a>
        </li>
        <li>
            <a href="#" id="update-link" class="flex items-center text-gray-300 hover:text-white">
                <i class="fas fa-edit mr-3"></i> Update
            </a>
        </li>
        <!-- <li>
            <a href="#" id="add-link" class="flex items-center text-gray-300 hover:text-white">
                <i class="fas fa-plus mr-3"></i> Add
            </a>
        </li> -->
        <li>
            <a href="#" id="all-data-link" class="flex items-center text-gray-300 hover:text-white">
                <i class="fas fa-database mr-3"></i> All Data
            </a>
        </li>
        <li>
            <a href="logout.php" class="flex items-center text-gray-300 hover:text-white">
                <i class="fas fa-sign-out-alt mr-3"></i> Logout
            </a>
        </li>
    </ul>
</aside>
</div>


        <!-- Main Content -->
        <main id="main-content" class="bg-gray-50 p-6 md:col-span-3 flex flex-col">
            <h1 class="text-3xl font-bold mb-4">Welcome, <?php echo htmlspecialchars($admin_username); ?></h1>

            <!-- Total Reports -->
            <div class="bg-white shadow rounded p-6 mb-6">
                <h2 class="text-xl font-semibold mb-4">Total Reports</h2>
                <p class="text-gray-600 text-lg"><?php echo $total_reports; ?> reports available.</p>
            </div>

            <!-- Reports Table -->
            <div class="bg-white shadow rounded p-6">
                <h2 class="text-xl font-semibold mb-4">Report Details</h2>
                <table class="min-w-full table-auto border-collapse border border-gray-200">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border border-gray-300 px-4 py-2 text-left">Health Package</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Total Tests</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result_reports && mysqli_num_rows($result_reports) > 0): ?>
                            <?php while ($row = mysqli_fetch_assoc($result_reports)): ?>
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($row['health_package']); ?></td>
                                    <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($row['total_tests']); ?></td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2" colspan="2">No reports available.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>

<!-- Footer -->
<footer class="bg-gray-800 text-white text-center py-2 h-[5vh] fixed bottom-0 w-full">
    <p class="text-sm">&copy; <?php echo date("Y"); ?> RVMAS. All rights reserved.</p>
</footer>

</body>
</html>