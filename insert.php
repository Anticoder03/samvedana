<?php
// Include the database connection file
include('conn.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $health_package = $_POST['h_pack'];
    $tests = $_POST['test'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $vdate = $_POST['vdate'];

    // Handle the file upload
    $report = NULL;
    if (isset($_FILES['report']) && $_FILES['report']['error'] == 0) {
        $report = $_FILES['report']['name'];
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($report);
        
        // Move the uploaded file to the server's folder
        if (move_uploaded_file($_FILES['report']['tmp_name'], $targetFile)) {
            // Successfully uploaded the file
        } else {
            echo "Error uploading the report file.";
        }
    }

    // Get the current timestamp for created_at
    $created_at = date('Y-m-d H:i:s');

    // Prepare the SQL statement to insert the data into the 'reports' table
    $query = "INSERT INTO reports (health_package, tests, name, email, gender, date_of_birth, location, phone_no, visiting_date, report, created_at) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare the statement
    if ($stmt = $conn->prepare($query)) {
        // Bind the parameters to the prepared statement
        $stmt->bind_param("iisssssssss", $health_package, $tests, $name, $email, $gender, $dob, $address, $contact, $vdate, $report, $created_at);
        
        // Execute the query
        if ($stmt->execute()) {
            echo "<script>alert('Form Submitted');</script>";
            header('Location: index.html');
        } else {
            echo "Error inserting data: " . $stmt->error;
        }
        
        // Close the prepared statement
        $stmt->close();
    } else {
        echo "Error preparing the statement: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
