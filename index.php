<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            background-image: url('https://media.istockphoto.com/id/1285308242/photo/to-do-list-text-on-notepad.jpg?s=612x612&w=0&k=20&c=p85bCVQZwvkrqqqNOJGg2QuPDu6ynTlQHkASQOTELh8=');
            background-size: cover;  /* Rasmni butun sahifaga moslashtirish */
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
    </style>
</head>
<body>
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="todo-body my-5 p-3">
            <h1 class="text-center todo-text">Todo App</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam amet,
                aperiam asperiores atque delectus doloremque esse et id in incidunt,
                maiores non nulla numquam, omnis pariatur perferendis provident quo sed?</p>
            <form action="add.php" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Recipient's username"
                           aria-label="Recipient's username" aria-describedby="button-addon2" name="title">
                    <select name="status" style="margin:0 20px">
                        <option value="pending">Pending</option>
                        <option value="in_progress">In Progress</option>
                        <option value="completed">Completed</option>
                    </select>
                    <button class="btn btn-primary" type="submit" id="button-addon2">Add</button>
                </div>
            </form>
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    An item
                    <button class="btn btn-outline-success">Done</button>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    An item
                    <button class="btn btn-outline-success">Done</button>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    An item
                    <button class="btn btn-outline-success">Done</button>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    An item
                    <button class="btn btn-outline-success">Done</button>
                </li>
            </ul>
        </div>
    </div>
</div>
</body>
</html>
