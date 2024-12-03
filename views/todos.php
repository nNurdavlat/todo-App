<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
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
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="todo-body my-5 p-3">
            <h1 class="text-center todo-text">Todo App</h1>
            <h4 style="text-align: center">Enter the tasks you want to complete</h4>
            <form method="POST" action="/todos">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Recipient's username"
                           aria-label="Recipient's username" aria-describedby="button-addon2" name="title" required>
                    <input type="datetime-local" class="form-control" placeholder="Recipient's username"
                           aria-label="Recipient's username" aria-describedby="button-addon2"
                           name="dueDate" required>
                    <button class="btn btn-primary" type="submit" id="button-addon2">Add</button>
                </div>
            </form>
            <ul class="list-group">


                <?php
                /** @var TYPE_NAME $todos */
                foreach ($todos as $data) {
                    if ($data['status'] == 'completed') {
                        echo '<li class="' . $data['status'] . ' list-group-item d-flex justify-content-between align-items-center">'
                            . $data['title'] . '
                                <div>
                                    <a href="/inProgress/' . $data['id'] . '" class="btn btn-outline-success">In progress</a>
                                    <a href="/pending/' . $data['id'] . ' " class="btn btn-outline-success">Pending</a>
                                </div>                                
                            </li>';
                    } elseif ($data['status'] == 'pending') {
                        echo '<li class="' . $data['status'] . ' list-group-item d-flex justify-content-between align-items-center">'
                            . $data['title'] . '
                                <div>
                                    <a href="/inProgress/' . $data['id'] . '" class="btn btn-outline-success">In progress</a>
                                    <a href="/complete/' . $data['id'] . ' " class="btn btn-outline-success">Complete</a>
                                </div>                                
                            </li>';
                    } elseif ($data['status'] == 'in_progress') {
                        echo '<li class="' . $data['status'] . ' list-group-item d-flex justify-content-between align-items-center">'
                            . $data['title'] . '
                                <div>
                                    <a href="/pending/' . $data['id'] . '" class="btn btn-outline-success">Pending</a>
                                    <a href="/complete/' . $data['id'] . ' " class="btn btn-outline-success">Complete</a>
                                </div>                                
                            </li>';
                    }
                }
                ?>
            </ul>
        </div>
    </div>
</div>
</body>
</html>
