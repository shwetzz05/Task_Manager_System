<?php
include 'db_connect.php';

// Check if an ID is passed in the URL
if (isset($_GET['id'])) {
    $taskId = $_GET['id'];

    // Get the current completion status
    $sql_check = "SELECT is_completed FROM tasks WHERE id = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("i", $taskId);
    $stmt_check->execute();
    $result = $stmt_check->get_result();
    $row = $result->fetch_assoc();
    $is_completed = $row['is_completed'];
    $stmt_check->close();

    // Toggle the completion status
    $new_status = ($is_completed == 1) ? 0 : 1;

    // SQL query to update the completion status
    $sql = "UPDATE tasks SET is_completed = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $new_status, $taskId);

    if ($stmt->execute() === TRUE) {
        // Redirect back to the main page
        header("Location: index.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>
