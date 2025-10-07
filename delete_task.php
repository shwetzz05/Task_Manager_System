<?php
include 'db_connect.php';

// Check if an ID is passed in the URL
if (isset($_GET['id'])) {
    $taskId = $_GET['id'];

    // SQL query to delete the task
    $sql = "DELETE FROM tasks WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $taskId);

    if ($stmt->execute() === TRUE) {
        // Redirect back to the main page
        header("Location: index.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    
    $stmt->close();
}

$conn->close();
?>
