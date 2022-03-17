<?php
    require './config.php';

    if (!empty($_GET['message']) && $_GET['message'] == 'error') {
        echo "<script>alert('Ops, ocorreu um erro ao processar registro!')</script>";
    }

    if (!empty($_GET['error']) && $_GET['error'] == 'required') {
        echo "<script>alert('Ops, campo requirido não informado!')</script>";
    }

    $todos = $conn->query("SELECT * FROM todos ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My First Amazing PHP Todolist</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="./assets/app.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-6">
                <div class="card mt-5">
                <h1 class="titulo"> Cronograma Semanal </h1>
                    <div class="card-body">
                        <form action="./actions/store.php" method="POST" autocomplete="off">
                            <div class="d-flex justify-content-between">
                                <input class="form-control mb-2 mr-2" type="text" name="title" placeholder="Quais suas tarefas desta semana ? "/>
                                <button class="btn btn-primary" type="submit"><i class="fa fa-plus"></i> Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-md-center">
            <?php if ($todos->rowCount() > 0): ?>
                <div class="col-6">
                    <?php while ($todo = $todos->fetch(PDO::FETCH_ASSOC)): ?>
                        <div class="card mt-5">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <form action="./actions/update.php" method="POST">
                                        <p <?= $todo['checked'] ? 'style="text-decoration: line-through"' : '' ?>>
                                            <input type="hidden" value="<?= $todo['id']; ?>" name="id">
                                            <input onChange="this.form.submit();" type="checkbox" data-todo-id="<?= $todo['id']; ?>" class="check-box" <?= $todo['checked'] ? 'checked' : '' ?> />
                                            <span><?= $todo['title']; ?></span>
                                        </p>
                                    </form>
                                    <form action="./actions/destroy.php" method="POST">
                                        <input type="hidden" value="<?= $todo['id']; ?>" name="id">
                                        <button class="btn btn-danger destroy-todo" type="submit" data-todo-id="<?= $todo['id']; ?>">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        <button class="btn btn-danger destroy-todo" type="submit" data-todo-id="<?= $todo['id']; ?>">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                                <small>Created: <?= date('d/m/Y H:i:s', strtotime($todo['created_at'])); ?></small>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>