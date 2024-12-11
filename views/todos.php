<?php
require 'views/components/header.php';
require 'views/components/navbar.php';
?>

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
                foreach ($todos as $data)
                {
                        echo '<li class="' . $data['status'] . ' list-group-item d-flex justify-content-between align-items-center">'
                            . $data['title'] . '
                                <div>
                                    <a href="/todos/' . $data['id'] . '/edit" class="btn btn-outline-primary">Edit</a>
                                    <a href="/todos/' . $data['id'] . '/delete" class="btn btn-outline-danger">Delete</a>
                                </div>                                
                           </li>';
//                    elseif ($data['status'] == 'pending') {
//                        echo '<li class="' . $data['status'] . ' list-group-item d-flex justify-content-between align-items-center">'
//                            . $data['title'] . '
//                                <div>
//                                    <a href="/todos/' . $data['id'] . '/inProgress" class="btn btn-outline-success">In progress</a>
//                                    <a href="/todos/' . $data['id'] . '/complete" class="btn btn-outline-success">Complete</a>
//                                </div>
//                            </li>';
//                    } elseif ($data['status'] == 'in_progress') {
//                        echo '<li class="' . $data['status'] . ' list-group-item d-flex justify-content-between align-items-center">'
//                            . $data['title'] . '
//                                <div>
//                                    <a href="/todos/' . $data['id'] . '/pending" class="btn btn-outline-success">Pending</a>
//                                    <a href="/todos/' . $data['id'] . '/complete" class="btn btn-outline-success">Complete</a>
//                                </div>
//                            </li>';
                }
                ?>
            </ul>
        </div>
    </div>
</div>
<div style="position: fixed; width: 100%; bottom: 0; ">
    <?php
    require 'views/components/footer.php';
    ?>
</div>