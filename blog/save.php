<?php
include('includes/db.php');

if ($_POST) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category_id = $_POST['category_id'];

    $query = oci_parse($conn, "insert into posts (title, content, category_id) values ('{$title}', '{$content}', {$category_id})");
    oci_execute($query);
    oci_commit($conn);

    header('Location: list.php');
}
