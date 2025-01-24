<?php
include 'conn.php';

// Fetch all records from the database
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
</head>
<body class="bg-gray-100 p-6">
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold mb-6 text-center">All Records</h1>

        <div class="overflow-x-auto bg-white shadow rounded-lg p-6">
            <table class="min-w-full table-auto border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 px-4 py-2">ID</th>
                        <th class="border border-gray-300 px-4 py-2">Health Package</th>
                        <th class="border border-gray-300 px-4 py-2">Tests</th>
                        <th class="border border-gray-300 px-4 py-2">Name</th>
                        <th class="border border-gray-300 px-4 py-2">Email</th>
                        <th class="border border-gray-300 px-4 py-2">Gender</th>
                        <th class="border border-gray-300 px-4 py-2">Date of Birth</th>
                        <th class="border border-gray-300 px-4 py-2">Location</th>
                        <th class="border border-gray-300 px-4 py-2">Phone</th>
                        <th class="border border-gray-300 px-4 py-2">Visiting Date</th>
                        <th class="border border-gray-300 px-4 py-2">Report</th>
                        <th class="border border-gray-300 px-4 py-2">Created At</th>
                        <th class="border border-gray-300 px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result && mysqli_num_rows($result) > 0): ?>
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($row['id']); ?></td>
                                <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($row['health_package']); ?></td>
                                <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($row['tests']); ?></td>
                                <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($row['name']); ?></td>
                                <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($row['email']); ?></td>
                                <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($row['gender']); ?></td>
                                <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($row['date_of_birth']); ?></td>
                                <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($row['location']); ?></td>
                                <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($row['phone_no']); ?></td>
                                <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($row['visiting_date']); ?></td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <a href="../uploads/<?php echo htmlspecialchars($row['report']); ?>" 
                                       class="text-blue-500 hover:underline" 
                                       target="_blank">
                                       <?php echo htmlspecialchars($row['report']); ?>
                                    </a>
                                </td>
                                <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($row['created_at']); ?></td>
                                <td class="border border-gray-300 px-4 py-2 text-center">
                                    <a href="update_report.php?id=<?php echo $row['id']; ?>" 
                                       class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                       Update
                                    </a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="13" class="border border-gray-300 px-4 py-2 text-center text-red-500">No records found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
