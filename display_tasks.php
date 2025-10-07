<?php
// Include the database connection file
include 'db_connect.php';

// SQL query to select all tasks, ordered by the creation date
$sql = "SELECT id, task, created_at, is_completed FROM tasks ORDER BY created_at DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        $taskText = htmlspecialchars($row["task"]);
        $isCompleted = ($row["is_completed"] == 1);
        $taskClass = $isCompleted ? "completed" : "";

        echo "<li class='task-item " . $taskClass . "'>";
        echo "<span>" . $taskText . "</span>";
        echo "<div class='task-actions'>";
        // Link to mark the task as complete/incomplete
        echo "<a href='complete_task.php?id=" . $row['id'] . "' class='mark-complete'>" . ($isCompleted ? "Undo" : "Complete") . "</a>";
        // Link to delete the task
        echo "<a href='delete_task.php?id=" . $row['id'] . "' class='delete-task'>Delete</a>";
        echo "</div>";
        echo "</li>";
    }
} else {
    echo "<li class='no-tasks'>No tasks found.</li>";
}

$conn->close();
?>
