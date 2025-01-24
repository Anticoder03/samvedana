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

<main class="bg-gray-50 p-6 md:col-span-3 flex flex-col">
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