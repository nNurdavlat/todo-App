<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .edit-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .edit-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .btn-actions {
            display: flex;
            justify-content: space-between;
        }

        body {
            background-image: url('https://media.istockphoto.com/id/1285308242/photo/to-do-list-text-on-notepad.jpg?s=612x612&w=0&k=20&c=p85bCVQZwvkrqqqNOJGg2QuPDu6ynTlQHkASQOTELh8=');
            background-size: cover; /* Rasmni butun sahifaga moslashtirish */
            background-position: center; /* Rasmni markazga joylashtirish */
            height: 100vh;
            margin: 0;
        }

        .todo-body {
            max-width: 700px;
            box-shadow: 0 0 5px #ccc;
            background-color: rgba(255, 255, 255, 0.8); /* Oq fon uchun qilindi*/
            border-radius: 10px;
        }

        .todo-text {
            font-weight: bold;
        }

        .completed {
            text-decoration: line-through;
            color: green;
        }

        .in_progress {
            text-decoration: underline;
            color: orange;
        }
    </style>
</head>
<body>