<?php
include 'conn.php';

// Fetch all records (without filtering or sorting)
$query = "SELECT * FROM reports";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Data</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- DataTables CSS and JS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold mb-6 text-center">All Records</h1>

        <!-- Records Table -->
        <div class="overflow-x-auto bg-white shadow rounded-lg p-6">
            <table id="dataTable" class="min-w-full table-auto border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 px-4 py-2">ID</th>
                        <th class="border border-gray-300 px-4 py-2">Health Package</th>
                        <th class="border border-gray-300 px-4 py-2">Name</th>
                        <th class="border border-gray-300 px-4 py-2">Email</th>
                        <th class="border border-gray-300 px-4 py-2">Gender</th>
                        <th class="border border-gray-300 px-4 py-2">Date of Birth</th>
                        <th class="border border-gray-300 px-4 py-2">Location</th>
                        <th class="border border-gray-300 px-4 py-2">Phone</th>
                        <th class="border border-gray-300 px-4 py-2">Visiting Date</th>
                        <th class="border border-gray-300 px-4 py-2">Created At</th>
                        <th class="border border-gray-300 px-4 py-2">Report</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result && mysqli_num_rows($result) > 0): ?>
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($row['id']); ?></td>
                                <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($row['health_package']); ?></td>
                                <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($row['name']); ?></td>
                                <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($row['email']); ?></td>
                                <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($row['gender']); ?></td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <?php 
                                    $dob = new DateTime($row['date_of_birth']);
                                    echo $dob->format('d/m/y'); 
                                    ?>
                                </td>
                                <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($row['location']); ?></td>
                                <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($row['phone_no']); ?></td>
                                <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($row['visiting_date']); ?></td>
                                <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($row['created_at']); ?></td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <?php 
                                    // Check if the report exists and create the link
                                    $report = $row['report'];
                                    if (!empty($report)): ?>
                                        <a href="../uploads/<?php echo htmlspecialchars($report); ?>" target="_blank" class="text-blue-500 hover:underline">View Report</a>
                                    <?php else: ?>
                                        No Report
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="11" class="border border-gray-300 px-4 py-2 text-center text-red-500">No records found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Initialize DataTable -->
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();  // Initialize DataTable functionality
        });
    </script>
</body>
</html>
