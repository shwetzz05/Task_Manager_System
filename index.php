<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Task Manager</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 500px;
            box-sizing: border-box;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            margin-bottom: 20px;
        }
        form input[type="text"] {
            flex-grow: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        form button {
            padding: 10px 20px;
            background-color: #5cb85c;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-left: 10px;
            font-size: 16px;
        }
        form button:hover {
            background-color: #4cae4c;
        }
        ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        li {
            background-color: #f9f9f9;
            padding: 15px;
            border-left: 5px solid #5cb85c;
            margin-bottom: 10px;
            border-radius: 4px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .completed span {
            text-decoration: line-through;
            color: #888;
        }
        .task-actions {
            display: flex;
            gap: 10px;
        }
        .task-actions a {
            text-decoration: none;
            color: #fff;
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 14px;
        }
        .mark-complete {
            background-color: #5bc0de;
        }
        .delete-task {
            background-color: #d9534f;
        }
        .no-tasks {
            text-align: center;
            color: #888;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>My Task List</h1>

        <!-- Form to add new tasks -->
        <form action="add_task.php" method="POST">
            <input type="text" name="task" placeholder="Enter a new task" required>
            <button type="submit">Add Task</button>
        </form>

        <h2>Current Tasks</h2>
        <ul>
            <?php include 'display_tasks.php'; ?>
        </ul>
    </div>
</body>
</html>
