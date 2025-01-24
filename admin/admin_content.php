
<?php
include 'conn.php';

// Get search and filter values
$search = isset($_GET['search']) ? $_GET['search'] : '';
$filter_column = isset($_GET['filter_column']) ? $_GET['filter_column'] : 'id';

// Fetch reports based on the search and filter
$query_reports = "SELECT * FROM reports WHERE $filter_column LIKE '%$search%' ORDER BY id DESC";
$result_reports = mysqli_query($conn, $query_reports);

?>
<div class="bg-white shadow rounded p-6">
    <h2 class="text-xl font-semibold mb-4">Report Details</h2>
    <table class="min-w-full table-auto border-collapse border border-gray-200">
        <thead>
            <tr class="bg-gray-100">
                <th class="border border-gray-300 px-4 py-2 text-left">ID</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Health Package</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Name</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Email</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Date of Birth</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result_reports && mysqli_num_rows($result_reports) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($result_reports)): ?>
                    <tr>
                        <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($row['id']); ?></td>
                        <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($row['health_package']); ?></td>
                        <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($row['name']); ?></td>
                        <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($row['email']); ?></td>
                        <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($row['date_of_birth']); ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="border border-gray-300 px-4 py-2 text-center text-red-500">No records found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
