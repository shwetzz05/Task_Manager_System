<?php
// Include the database connection file
include 'db_connect.php';

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the task from the form data
    $task = $_POST['task'];

    // SQL query to insert a new task with a placeholder for the task name to prevent SQL injection
    $sql = "INSERT INTO tasks (task, created_at, is_completed) VALUES (?, NOW(), 0)";
    
    // Prepare the statement to prevent SQL injection
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $task);

    // Execute the statement
    if ($stmt->execute() === TRUE) {
        // Redirect back to the main page after successful insertion
        header("Location: index.php");
        exit();
    } else {
        // Display an error message if something goes wrong
        echo "Error: " . $stmt->error;
    }

    // Close the statement and the connection
    $stmt->close();
}

$conn->close();
?>