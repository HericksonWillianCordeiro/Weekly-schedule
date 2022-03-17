<?php

if (!empty($_POST['id'])) {
    require '../config.php';

    $id = $_POST['id'];
    $todos = $conn->prepare("SELECT id, checked FROM todos WHERE id=?");
    $todos->execute([$id]);

    $todo = $todos->fetch();
    $todoId = $todo['id'];
    $checked = $todo['checked'];
    $isChecked = $checked ? 0 : 1;

    $stmt = $conn->prepare("UPDATE todos SET checked=$isChecked WHERE id=?");
    $res = $stmt->execute([$todoId]);

    if ($res) {
        header("Location: ../index.php?message=success");
    } else {
        header("Location: ../index.php?message=error");
    }

    $conn = null;
        exit();
} else {
    header("Location: ../index.php?message=required");
}