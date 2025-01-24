    <?php
    session_start(); // Start the session

    // Check if the admin is logged in, if not, redirect to login page
    if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
        header("Location: login.php");
        exit;
    }

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
                const allDataLink = document.getElementById('all-data-link');
                const homeLink = document.getElementById('home_link');
                const iframe = document.getElementById('content-frame'); // Reference to iframe

                console.log('Script loaded and DOM content is ready');

                // Handle Update link click
                updateLink.addEventListener('click', (e) => {
                    e.preventDefault(); // Prevent default link behavior
                    iframe.src = 'update.php'; // Set iframe src to update.php
                });

                // Handle All Data link click
                allDataLink.addEventListener('click', (e) => {
                    e.preventDefault();
                    iframe.src = 'alldata.php'; // Set iframe src to alldata.php
                });

                // Handle Home link click
                homeLink.addEventListener('click', (e) => {
                    e.preventDefault();
                    iframe.src = 'Home.php'; // Set iframe src to Home.php
                });
            });
        </script>
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
                        <a href="./Home.php" target="main_frame" id="home_link" class="flex items-center text-gray-300 hover:text-white">
                            <i class="fas fa-home mr-3"></i> Home
                        </a>
                    </li>
                    <li>
                        <a href="#" id="update-link" class="flex items-center text-gray-300 hover:text-white">
                            <i class="fas fa-edit mr-3"></i> Update
                        </a>
                    </li>
                    <li>
                        <a href="./alldata.php" target="_blank"  class="flex items-center text-gray-300 hover:text-white">
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
            <main id="main-content" class="bg-gray-50 p-6 md:col-span-3 flex flex-col" style="overflow-x: hidden;">
                <h1 class="text-3xl font-bold mb-4">Welcome, <?php echo htmlspecialchars($admin_username); ?></h1>

                <!-- Iframe for Dynamic Content -->
                <iframe  id="content-frame" name="main_frame" class=" w-full h-full border-none" src="Home.php"></iframe>
            </main>
        </div>

        <!-- Footer -->
        <footer class="bg-gray-800 text-white text-center py-2 h-[5vh] fixed bottom-0 w-full">
            <p class="text-sm">&copy; <?php echo date("Y"); ?> RVMAS. All rights reserved.</p>
        </footer>
    </body>
    </html>
